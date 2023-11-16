<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Socio;

class CheckinController extends Controller
{
    public function get_socio_matricula($matricula){

        if (empty($matricula)) {
            return response()->json('Informe uma matricula para prosseguir!', 500);
        }

        $socio = Socio::where('matricula', $matricula)->first();

        if (empty($socio)) {
            return response()->json("Dados não conferem com nenhuma matricula válida!", 500);
        }

        if ($socio->ativo == "N") {
            return response()->json(false, 200);
        }

        if ($socio->ativo == "S") {
            return response()->json(true, 200);
            //Gravar na tabela de CheckinController
            //Campos: id, id_partida, id_socio, data, hora_entrada, hora_saida
        }

        //return response()->json($socio, 200);
    }
}
