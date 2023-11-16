<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ParceiroPatrocinador;
use App\Models\Plano;
use App\Models\Faq;
use App\Models\PlanoVantagem;

class SiteController extends Controller
{
    public function index(ParceiroPatrocinador $patrocinador, Plano $plano, Faq $faq){
        $title_page = '';
        $subtitle_page = '';
        $title_browser = 'Socio Eterno Campeao';

        $patrocinadores = ParceiroPatrocinador::all();

        $planos = Plano::with(['plano_vantagens'])->get();

        //dd($planos);

        $faqs = Faq::all();

        //dd($plano);

        return view('site.home', compact(['title_browser', 'patrocinadores', 'planos', 'faqs']));
    }

    public function programa(){
        $title_browser = 'Sócio Eterno Campeao | O Programa';
        $title_page = 'O Programa';
        $subtitle_page = 'Conheça as principais caracteristicas do nosso programa de sócio torcedor';
        return view('site.o-programa', compact(['title_browser', 'title_page', 'subtitle_page']));
    }

    public function planos(){
        $title_page = 'Planos';
        $subtitle_page = 'Conheça aqui todos os planos disponiveis e associe agora.';
        $title_browser = 'Socio Eterno Campeao | Nossos Planos';
        return view('site.planos', compact(['title_browser', 'title_page', 'subtitle_page']));
    }

    public function faqs(){
        $title_page = 'FAQS';
        $subtitle_page = 'Veja aqui os principais assuntos e tire todas suas duvidas';
        $title_browser = 'Socio Eterno Campeao | FAQS Perguntas e Respostas';
        return view('site.faqs', compact(['title_browser', 'title_page', 'subtitle_page']));
    }

    public function contatos(){
        $title_page = 'Contatos';
        $subtitle_page = 'Entre em contato conosco e veja também onde nos encontrar.';
        $title_browser = 'Socio Eterno Campeao | Contatos';
        return view('site.contatos', compact(['title_browser', 'title_page', 'subtitle_page']));
    }
}
