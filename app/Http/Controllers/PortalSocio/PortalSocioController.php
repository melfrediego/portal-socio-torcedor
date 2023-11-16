<?php

namespace App\Http\Controllers\PortalSocio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Plano;
use App\Models\Mensalidade;
use App\Models\Socio;
use App\Models\Pedido;
use App\User;



class PortalSocioController extends Controller
{
    public function index(){

        $usuario = auth()->user()->name;

        $socio_id = auth()->user()->socio_id;

        //dd(auth()->user());

        $socio = Socio::with(['user','pedido'])->where('id', $socio_id)->get()->first();

        //dd($socio);

        $plano_socio = Plano::where('id', $socio->plano_id)->get()->first();

        $mensalidades = Mensalidade::with(['transacao'])->where('pedido_id', $socio->pedido->id)->orderBy('numero_mensalidade','ASC')->get();




        //$mensalidades = $socio['pedido']['mensalidades'] = $mensalidades = Pedido::with('mensalidades')->where('id', $socio->pedido->id)->get();
        //$socio['Plano'] = $planos = Socio::with('planos')->where('id', $socio->id)->get();

        // dd($mensalidades);

        return view('portal.home', compact('usuario', 'socio', 'plano_socio', 'mensalidades'));
        // return view('site.home', compact(['title_browser', 'patrocinadores', 'planos']));
    }

    public function perfil(){
        return view('portal.perfil');
    }

    public function financeiro(){
        return view('portal.financeiro');
    }

    public function indique(){
        return view('portal.indique');
    }

    public function termo(){
        return view('portal.termo');
    }
}
