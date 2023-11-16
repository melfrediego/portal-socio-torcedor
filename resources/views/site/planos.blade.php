@extends('layouts.site')


@section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page)


@section('content')

    <!-- Planos --------------------------------------------- -->
    <section class="sections container-planos">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 center white-text container-header-planos">
                    <!-- <img src="../../../assets/images/logo/logo_socio_torcedor.png" width="200" alt=""> -->
                    <h2 class=""><strong>Escolha um Plano</strong></h2>
                    <hr>
                    <p>Faça parte da familia Riverina e assine agora um de nossos planos.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m4 l4">
                    <div class="container-card-plano" >
                        <div class="container-card-plano-branco">
                            <div class="row">
                                <div class="col s12 m12" >
                                    <div class="img-cartao-overley">
                                        <img src="" height="200" width="100%" alt="">
                                    </div>
                                    <div class="conteudo-card-plano center">
                                        <h4 class="center">Titulo plano</h4>
                                        <p class="center">Descricao Plano</p>
                                        <ul>
                                            <!-- Vantagens Plano -->
                                            <li>
                                                <i class="material-icons">check</i>
                                                &nbsp;Descricao Vantagem
                                            </li>
                                        </ul>
                                        <h5>
                                            <span class="cifrao_plano">R$</span>
                                            Valor Plano
                                            <span class="text_mes">Por mês</span>
                                        </h5>
                                        <!-- Validade Plano -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <footer class="center footer-card-plano">
                                        <a class="btn-primary btn-large orange darken-4 hoverable">Cadastre e Assine</a>
                                        <br>
                                        <br>
                                        <a href="" class="mais_detalhes_plano">+ Destalhes</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



<!-- SCRIPTS JS ------------------------------------------------- -->
@section('scripts')

@endsection