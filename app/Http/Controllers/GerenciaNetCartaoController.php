<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

use App\Models\Mensalidade;
use App\Models\Transacao;
use App\Models\Plano;
use App\Models\Pedido;
use App\Models\Estado;
use App\Models\Cidade;
use App\User;

class GerenciaNetCartaoController extends Controller
{
    public function transaction($cliente_id, $cliente_secret, $transaction_item){


        $valor = $transaction_item->valor;

        $charge = null;
        //$clientId = 'Client_Id_9e33aa69cd688345b2cd8c6a21c093236b0a1c34'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        //$clientSecret = 'Client_Secret_1788be4e6981bca24e88323b97c48b219698cf9e'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        $options = [
          'client_id' => $cliente_id,
          'client_secret' => $cliente_secret,
          'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];

        $item_1 = [
            'name' => $transaction_item->titulo, // nome do item, produto ou serviço
            'amount' => 1, // quantidade
            'value' => $this->format_transaction_value($transaction_item->valor) // valor (1000 = R$ 10,00)
        ];

        $items =  [
            $item_1
        ];

        // Exemplo para receber notificações da alteração do status da transação:
        $metadata = ['notification_url'=>config('gerencianet.notification_url')];
        // Outros detalhes em: https://dev.gerencianet.com.br/docs/notificacoes

        $body  =  [
            'items' => $items,
            'metadata' => $metadata,
        ];

        try {
            $api = new Gerencianet($options);
            $charge = $api->createCharge([], $body);

            //print_r($charge);
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

        //return response()->json($charge);
        return $charge;
    }

    public function transaction_card(Request $request){
        $pay_charge = null;
        $pay_charge_erro = [];

        $payament_token = $request->payament_token;

        //Busca Plano/Item pelo ID mensalidade
        $mensalidade_id = $request->mensalidade_id;
        $mensalidade_pedido = Mensalidade::with(['pedido'])->where('id', $mensalidade_id)->get()->first();
        $pedido_plano_socio = Pedido::with(['plano','socio'])->where('id', $mensalidade_pedido->pedido->id)->first();

        $transaction_item = $pedido_plano_socio->plano;

        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        //Criando uma transação
        //$charge = (object) $this->transaction($clientId, $clientSecret);
        $charge = $this->transaction($clientId, $clientSecret, $transaction_item);

        if ($charge['code'] == '200') {

            $charge_id = $charge['data']['charge_id'];

            $options = [
              'client_id' => $clientId,
              'client_secret' => $clientSecret,
              'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
            ];

            // $charge_id refere-se ao ID da transação gerada anteriormente
            $params = [
              'id' => $charge_id
            ];

            $customer = [
                'name' => $pedido_plano_socio->socio->nome,
                'cpf' => $pedido_plano_socio->socio->cpf,
                'phone_number' => $pedido_plano_socio->socio->telefone,
                'email' => $pedido_plano_socio->socio->email,
                'birth' => '1986-01-01'
            ];

            //$paymentToken = $_POST["payament_token"];

            $billingAddress = [
                'street' => $pedido_plano_socio->socio->logradouro,
                'number' => $pedido_plano_socio->socio->numero,
                'neighborhood' => $pedido_plano_socio->socio->bairro,
                'zipcode' => $this->limpaCaracteresEspeciais($pedido_plano_socio->socio->cep),
                'city' => $this->cidade_nome($pedido_plano_socio->socio->cidade),
                'state' => $this->estado_sigla($pedido_plano_socio->socio->estado),
            ];

            $creditCard = [
                'installments' => 1,
                'billing_address' => $billingAddress,
                'payment_token' => $payament_token,
                'customer' => $customer
            ];

            $payment = [
                'credit_card' => $creditCard
            ];

            $body = [
                'payment' => $payment
            ];


            try {
                $api = new Gerencianet($options);
                $pay_charge = $api->payCharge($params, $body);

                //Adiciona transacao cartao de credito
                $transacao = Transacao::create([
                    'charge_id' => $pay_charge['data']['charge_id'],
                    'status' => $pay_charge['data']['status'],
                    'payment_method' => $pay_charge['data']['payment'],
                    'socio_id' => $pedido_plano_socio->socio->id,
                    'mensalidade_id' => $mensalidade_id
                ]);

                //Atualizando mensalidade
                $mensalidade = new Mensalidade;
                $mensalidade_id = Mensalidade::whereId($mensalidade_id)->update([
                    'charge_id' => $pay_charge['data']['charge_id'],
                    'status' => $pay_charge['data']['status']
                ]);

            } catch (GerencianetException $e) {
                $pay_charge_erro['erro_code'] = $e->code;
                $pay_charge_erro['erro_error'] = $e->error;
                $pay_charge_erro['erro_error_description'] = $e->errorDescription;

                return response()->json($pay_charge_erro);

                //print_r($e->code);
                //print_r($e->error);
                //print_r($e->errorDescription);
            } catch (Exception $e) {
                //print_r($e->getMessage());
                $pay_charge_erro['erro_get_mensage'] = $e->getMessage();
                return response()->json($pay_charge_erro);
            }   # code...
        }
        return response()->json($pay_charge);
        //dd($pay_charge);

    }

    public function format_transaction_value($value){
        return intval(
            strval(floatval(
                preg_replace("/[^0-9.]/", "", $value)
            ) * 100)
        );
    }

    private function limpaCaracteresEspeciais($valor){
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace(" ", "", $valor);
        $valor = str_replace("  ", "", $valor);
        return $valor;
    }

    public function estado_sigla($id){
        $estado = Estado::where('id', intval($id))->get()->first();
        $sigla = $estado->sigla;
        return $sigla;
    }

    public function cidade_nome($id){
        $cidade = Cidade::where('id', intval($id))->get()->first();
        $nome = $cidade->nome;
        return $nome;
    }

}
