<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

use App\Models\Mensalidade;
use App\Models\Transacao;
use App\Models\Socio;

class NotificationController extends Controller
{
    public function notification(Request $request){

        //return response()->json($request->notification, 200);

        $notification_erro = [];

        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        $options = [
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
          'sandbox' => config('gerencianet.is_sandbox') // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];

        $token = $request->notification;

        $params = [
          'token' => $token
        ];

        try {
            $api = new Gerencianet($options);
            $chargeNotification = $api->getNotification($params, []);

            //return response()->json($chargeNotification, 200);
          // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.

          // Veja abaixo como acessar o ID e a String referente ao último status da transação.

            // Conta o tamanho do array data (que armazena o resultado)
            $i = count($chargeNotification["data"]);
            // Pega o último Object chargeStatus
            $ultimoStatus = $chargeNotification["data"][$i-1];
            // Acessando o array Status
            $status = $ultimoStatus["status"];
            // Obtendo o ID da transação
            $charge_id = $ultimoStatus["identifiers"]["charge_id"];
            // Obtendo a String do status atual
            $statusAtual = $status["current"];

            //Obtendo data da ultima modificacao
            $dataAtual = $ultimoStatus['created_at'];

            // Consultando transacao referente a notificacao informada
            $transacao_gn = $this->get_transacao($charge_id);
            //return response()->json($transacao_gn, 200);

            // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS


            //Consultar e Atualizar Mensalidade
            $mensalidade = Mensalidade::where('charge_id', $charge_id)->get()->first();
            $mensalidade_id = $mensalidade->id;
            $mensalidade_id = Mensalidade::whereId($mensalidade_id)->update([
                'status' => $statusAtual
            ]);

            //Consultar e Atualizar Transacao
            $transacao = Transacao::where('charge_id', $charge_id)->get()->first();
            $transacao_id = $transacao->id;
            $transacao_id = Transacao::whereId($transacao_id)->update([
                'status' => $statusAtual
            ]);

            //return response()->json($chargeNotification);

            //echo "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual;

            //print_r($chargeNotification);
        } catch (GerencianetException $e) {
            $notification_erro['erro_code'] = $e->code;
            $notification_erro['erro_error'] = $e->error;
            $notification_erro['erro_error_description'] = $e->errorDescription;
            return response()->json($notification_erro);
        } catch (Exception $e) {
            $notification_erro['erro_get_mensage'] = $e->getMessage();
            return response()->json($notification_erro);
        }
    }

    public function get_transacao($charge_id){
        $clientId = config('gerencianet.client_id'); // insira seu Client_Id, conforme o ambiente (Des ou Prod)
        $clientSecret = config('gerencianet.client_secret'); // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

        $options = [
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
          'sandbox' => config('gerencianet.is_sandbox') // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];

        // $charge_id refere-se ao ID da transação gerada anteriormente
        $params = [
          'id' => $charge_id
        ];

        try {
            $api = new Gerencianet($options);
            $charge = $api->detailCharge($params, []);
            //print_r($charge);
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

        return $charge;
    }
}
