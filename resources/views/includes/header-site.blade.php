@include('includes.menu')

<header class="header-fullscreen">
	<!-- PLANOS -->
	<!-- <app-plano></app-plano> -->

	<section class="sections container-planos">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 center white-text container-header-planos">
                    <!-- <img src="../../../assets/images/logo/logo_socio_torcedor.png" width="200" alt=""> -->
                    <h2 class=""><strong>Escolha um Plano</strong></h2>
                    <hr>
                    <p>Faça parte da familia Riverina, assine agora um de nossos planos.</p>
                </div>
            </div>

            <div class="row">

				@forelse ($planos as $key => $plano)
					<div class="col s12 m4 l4">
	                    <div class="container-card-plano" >
	                        <div class="container-card-plano-branco">
	                            <div class="row">
	                                <div class="col s12 m12" >
	                                    <div class="img-cartao-overley">
											{{-- Local --}}
											@if (env('APP_ENV') != "local")
												@switch($plano->nome)
													@case("Plano Ouro")
														<img src="{{ asset('./images/plano_ouro.png') }}" height="200" width="100%" alt="">
														@break
													@case("Plano Prata")
														<img src="{{ asset('./images/plano_prata.png') }}" height="200" width="100%" alt="">
														@break
													@case("Plano Bronze")
														<img src="{{ asset('./images/plano_bronze.png') }}" height="200" width="100%" alt="">
													@break
													@default
														<span></span>
												@endswitch
											@else
												<img src="https://etorcedor.socioeternocampeao.com.br/storage/{{$plano->imagem_carteira_frente}}" height="200" width="100%" alt="">
											@endif

											{{-- Remoto --}}
											{{-- <img src="http://etorcedor.socioeternocampeao.com.br/storage/{{$plano->imagem_carteira_frente}}" height="200" width="100%" alt=""> --}}
	                                    </div>
	                                    <div class="conteudo-card-plano center">
	                                        <h4 class="center">{{ $plano->titulo }}</h4>
	                                        <p class="center">{{ $plano->descricao }}</p>
	                                        <ul>
	                                            <!-- Vantagens Plano -->
												@foreach ($plano->plano_vantagens as $key => $vantagem)
													<li>
		                                                <i class="material-icons">check</i>
		                                                &nbsp;{{$vantagem->descricao_vantagem}}
		                                            </li>
												@endforeach


												{{-- @endforelse --}}
												{{-- <li>
	                                                <i class="material-icons">check</i>
	                                                &nbsp;Descontos em produtos e serviços no comercio local.
	                                            </li>
												<li>
	                                                <i class="material-icons">check</i>
	                                                &nbsp;Participação prioritária em ações promocionais do clube
	                                            </li> --}}
	                                        </ul>
	                                        <h5>
	                                            <span class="cifrao_plano">R$</span>
	                                            {{ $plano->valor }}
	                                            <span class="text_mes">Por mês</span>
	                                        </h5>
	                                        <!-- Validade Plano -->
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col s12">
	                                    <footer class="center footer-card-plano">
	                                        <a href="/novo-socio/plano/{{$plano->id}}" class="btn-primary btn-large orange darken-4 hoverable">Cadastre e Assine</a>
	                                        <br>
	                                        <br>
	                                        <a href="" class="mais_detalhes_plano">+ Detalhes</a>
	                                    </footer>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				@empty
					<h4>Nenhum Plano Cadastrado!</h4>
				@endforelse

            </div>
        </div>
    </section>


</header>
