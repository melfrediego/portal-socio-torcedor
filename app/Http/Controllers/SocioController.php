<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Plano;
use App\Models\Socio;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Pedido;
use App\Models\Mensalidade;
use App\User;

class SocioController extends Controller
{
    public function novo(Request $request){

        $title_browser = 'Socio Eterno Campeao | Novo Socio';
        $title_page = 'Novo Sócio';
        $subtitle_page = 'Faça parte da familia Riverina associe agora';

        $plano = Plano::find($request['id']);

        $estados = Estado::all();

        if (!$plano) {
            return view('site.home');
        }

        return view('site.socio.novo', compact('title_browser', 'title_page', 'subtitle_page', 'plano', 'estados'));
    }

    public function inserirNovo(Request $request){
        //$valor_parcela = 0;
        //$valor_total = 0;
        $data_primeira_mensalidade = date('d/m/Y', strtotime('+3 days'));

        $plano = Plano::find($request->input('plano_id'));

        if (!$plano) {
            return response()->json('Plano não encontrado na base de dados, volte e tente novamente!', 500);
        }

        $validatedData = Validator::make($request->all(), [
             'nome' => 'required',
             'cpf' => 'required',
             'telefone' => 'required',
             'email' => 'required|email',
             'data_nascimento' => 'required',
             'sexo' => 'required',
             'estado_civil' => 'required',
             'senha' => 'required',
             'local_retirada_kit' => 'required',
             'cep' => 'required',
             'logradouro' => 'required',
             'numero' => 'required',
             'bairro' => 'required',
             'estado' => 'required',
             'cidade' => 'required',
             'plano_id' => 'required',
         ]);

         if ($validatedData->fails()){
            return response()->json(['errors'=>$validatedData->errors()->all()], 422);
        }

        $data_form = $request->all();

        $matricula = $this->geraMatricula();

        $verifica_matricula = Socio::where('matricula', $matricula)->first();

        if (!$verifica_matricula) {
            $data_form['matricula'] = $matricula;
            $data_form['senha'] = bcrypt($request->senha);
            $data_form['cpf'] = $this->limpaCaracteresEspeciais($request->input('cpf'));
            $data_form['telefone'] = $this->limpaCaracteresEspeciais($request->input('telefone'));
            $socio = Socio::create($data_form);
        }

        //Inserindo Usuario
        $user = User::create([
            'name' => $request->nome,
             'email' => $request->email,
             'password' => bcrypt($request->senha),
             'socio_id' => $socio->id,
             'perfil' => "S", //Socio
        ]);

        //Inserindo pedido
        $pedido = Pedido::create([
            'socio_id' => $socio->id,
            'plano_id' => $plano->id,
            'forma_pagamento' => 'billet',
            'valor_parcela' => $plano->valor,
            'valor_total' => $plano->valor * 12,
            'qtd_parcela' => 12,
            'desconto' => 0

        ]);

        if (!$pedido) {
            return response()->json(['data' => 'Erro ao tentar inserir pedido'], 500);
        }

        //gerar mensalidades
        if (!$this->geraMensalidades($pedido->id, $pedido->valor_parcela, $pedido->qtd_parcela, $data_primeira_mensalidade)){
            return response()->json(['data' => 'Erro ao gerar mensalidades'], 500);
        }

        //return response()->json(['data' => 'Seu pedido foi salvo com sucesso e suas mensalidades geradas.!']);

        $user->password = base64_encode($user->password);

        return response()->json($user);


    }

    public function geraMatricula(){
        $ano = 2019;
        return rand(10000000, 99999999);
    }

    public function getCidade($idEstado){
        $cidades = Cidade::where('estado_id', '=', $idEstado)->get(['id','nome']);
        return response()->json($cidades);
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

    public function geraMensalidades($pedido_id, $valor_parcela, $nParcelas, $dataPrimeiraParcela = null){
      if($dataPrimeiraParcela != null){
        $dataPrimeiraParcela = explode( "/",$dataPrimeiraParcela);
        $dia = $dataPrimeiraParcela[0];
        $mes = $dataPrimeiraParcela[1];
        $ano = $dataPrimeiraParcela[2];
      } else {
        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");
      }

      for($x = 1; $x <= $nParcelas; $x++){

         if ($x == 1){
             $data_vencimento = date("Y-m-d",mktime(0, 0, 0,$mes,$dia,$ano));
         }else{
             $adiciona_mes = $x - 1;
             $data_vencimento = date("Y-m-d",mktime(0, 0, 0,$mes + $adiciona_mes ,$dia,$ano));
         }

        $mensalidades = Mensalidade::create([
            'numero_mensalidade' => $x,
            'pedido_id' => $pedido_id,
            'data_emissao' => date('Y-m-d'),
            'data_vencimento' => $data_vencimento,//date("Y-m-d",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano))),
            'valor_cobrado' => $valor_parcela,
            'status' => 'Pendente'
        ]);
      }

      if (!$mensalidades) {
          return false;
      }

      return true;
    }
}
