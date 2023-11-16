<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function inserirTicket(Request $request){

        $validatedData = Validator::make($request->all(), [
             'nome' => 'required',
             'email' => 'required|email',
             'assunto' => 'required',
             'mensagem' => 'required',
         ]);

         if ($validatedData->passes()){

             $data_form = $request->all();
             $ticket = Ticket::create($data_form);
             return response()->json(['sucesso'=>'Mensagem enviada com sucesso, em breve voce recebera um retorno!']);

        }

        // $data_form = $request->all();
        // $ticket = Ticket::create($data_form);
        //
        // dd($ticket);
        //
        // if ($ticket) {
        //
        // }
        return response()->json(['error'=>'Ocorreu um erro no envio da sua mensagem, tente mais tarde!']);
        //Orirginal
        //return response()->json(['error'=>$validatedData->errors()->all()]);




    }

}
