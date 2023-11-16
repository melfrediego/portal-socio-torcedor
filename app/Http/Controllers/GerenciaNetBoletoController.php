<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

use App\Models\Mensalidade;
use App\Models\Transacao;
use App\Models\Plano;
use App\Models\Pedido;
use App\User;


class GerenciaNetBoletoController extends Controller
{
    public function transaction($cliente_id, $cliente_secret, $transaction_item){

        $valor = $transaction_item->valor;
        $charge = null;

        $options = [
          'client_id' => $cliente_id,
          'client_secret' => $cliente_secret,
          'sandbox' => config('gerencianet.is_sandbox') // altere conforme o ambiente (true = desenvolvimento e false = producao)
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

        // Como enviar seu $body com o $metadata
        // $body  =  [
        //    'items' => $items,
        //    'metadata' => $metadata
        // ];

        $body  =  [
            'items' => $items,
            'metadata' => $metadata,
        ];

        try {
            $api = new Gerencianet($options);
            $charge = $api->createCharge([], $body);
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

    public function transaction_billet(Request $request){

        $pay_charge = null;
        $pay_charge_erro = [];

        $data_atual = date('Y-m-d');

        //Busca Plano/Item pelo ID mensalidade
        $mensalidade_id = $request->mensalidade_id;
        $mensalidade_pedido = Mensalidade::with(['transacao','pedido'])->where('id', $mensalidade_id)->get()->first();
        $pedido_plano_socio = Pedido::with(['plano','socio'])->where('id', $mensalidade_pedido->pedido->id)->first();

        if ($mensalidade_pedido->data_vencimento < $data_atual) {
            $data_vencimento = date('Y-m-d', strtotime('+2 days'));
        }else{
            $data_vencimento = $mensalidade_pedido->data_vencimento;
        }


        $transaction_item = $pedido_plano_socio->plano;

        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        //Criando uma transação
        $charge = $this->transaction($clientId, $clientSecret, $transaction_item);

        if ($charge['code'] == '200') {

            $charge_id = $charge['data']['charge_id'];

            $options = [
              'client_id' => $clientId,
              'client_secret' => $clientSecret,
              'sandbox' => config('gerencianet.is_sandbox') // altere conforme o ambiente (true = desenvolvimento e false = producao)//Esta configurado no .ENV
            ];

            // $charge_id refere-se ao ID da transação gerada anteriormente
            $params = [
              'id' => $charge_id
            ];

            $customer = [
              'name' => $pedido_plano_socio->socio->nome, // nome do cliente
              'cpf' => $pedido_plano_socio->socio->cpf , // cpf válido do cliente
              'phone_number' => $pedido_plano_socio->socio->telefone // telefone do cliente
            ];

            $bankingBillet = [
              'expire_at' => $data_vencimento, // data de vencimento do boleto (formato: YYYY-MM-DD)
              'message' => 'Boleto ref: mensalidade: ' . $mensalidade_pedido->numero_mensalidade ."/". $pedido_plano_socio->qtd_parcela, // mensagem a ser exibida no boleto
              'customer' => $customer
            ];

            $payment = [
              'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
            ];

            $body = [
              'payment' => $payment
            ];

            try {
                $api = new Gerencianet($options);
                $pay_charge = $api->payCharge($params, $body);

                //Adiciona transacao boleto
                $transacao = Transacao::create([
                    'charge_id' => $pay_charge['data']['charge_id'],
                    'status' => $pay_charge['data']['status'],
                    'payment_method' => $pay_charge['data']['payment'],
                    'banking_billet_barcode' => $pay_charge['data']['barcode'],
                    'banking_billet_link' => $pay_charge['data']['link'],
                    'banking_billet_link_pdf' => $pay_charge['data']['pdf']['charge'],
                    'banking_billet_expire_at' => $pay_charge['data']['expire_at'],
                    'socio_id' => $pedido_plano_socio->socio->id,
                    'mensalidade_id' => $mensalidade_id
                ]);

                //Atualizando mensalidade
                $mensalidade = new Mensalidade;
                $mensalidade_id = Mensalidade::whereId($mensalidade_id)->update([
                    'charge_id' => $pay_charge['data']['charge_id'],
                    'data_vencimento' => $data_vencimento,
                    'status' => $pay_charge['data']['status']
                ]);
                //$mensalidade->updateCharge($pay_charge['data']['charge_id'], $pay_charge['data']['status']);
                //return response()->json($pay_charge);

            } catch (GerencianetException $e) {
                $pay_charge_erro['erro_code'] = $e->code;
                $pay_charge_erro['erro_error'] = $e->error;
                $pay_charge_erro['erro_error_description'] = $e->errorDescription;
                return response()->json($pay_charge_erro);

            } catch (Exception $e) {
                //print_r($e->getMessage());
                $pay_charge_erro['erro_get_mensage'] = $e->getMessage();
                return response()->json($pay_charge_erro);
            }   # code...
        }

        return response()->json($pay_charge);
    }

    public function get_transacao($charge_id){
        $pay_charge = null;
        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        $options = [
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
          'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];

        // $charge_id refere-se ao ID da transação gerada anteriormente
        $params = [
          'id' => $charge_id
        ];

        try {
            $api = new Gerencianet($options);
            $pay_charge = $api->detailCharge($params, []);

            //print_r($charge);
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

        return $pay_charge;
    }

    public function alterar_vencimento_gerencia_net($charge_id){

        $transacao = Transacao::where('charge_id' ,intval($charge_id))->first();

        $novo_vencimento = date('Y-m-d', strtotime('+2 days'));

        if (!$transacao) {
            return response()->json("Nenhum boleto encontrado para alterar vencimento!", 500);
        }

        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        $options = [
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
          'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];

        // $charge_id refere-se ao ID da transação gerada anteriormente
        $params = [
          'id' => $transacao->charge_id
        ];

        $body = [
          'expire_at' => $novo_vencimento
        ];

        try {
            $api = new Gerencianet($options);
            $charge = $api->updateBillet($params, $body);

            if ($charge['code'] == 200) {
                //Atualizando data vencimento mensalidade
                Mensalidade::whereId($transacao->mensalidade_id)->update([
                    'data_vencimento' => $novo_vencimento
                ]);

                //Atualizando data vencimento mensalidade
                Transacao::whereId($transacao->id)->update([
                    'banking_billet_expire_at' => $novo_vencimento
                ]);
            }

            //print_r($charge);
        } catch (GerencianetException $e) {
            //print_r($e->code);
            //print_r($e->error);
            //print_r($e->errorDescription);
            return response()->json($e->errorDescription, 500);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
            //print_r($e->getMessage());
        }

        return response()->json("Vencimento do boleto e mensalidade alterado com sucesso!", 200);
    }


    public function format_transaction_value($value){
        return intval(
            strval(floatval(
                preg_replace("/[^0-9.]/", "", $value)
            ) * 100)
        );
    }

}
