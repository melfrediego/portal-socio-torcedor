@extends('layouts.portal-socio')

{{-- @section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page) --}}

@section('style')
    @parent
    <link href="{{ asset('css/novo_socio.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/reset_materialize.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <section class="section-cadastro-socio grey lighten-4">
	<div class="container">

        <div class="row">
            <div class="col s12 m12">
			{{-- <div class="col s8 m6 offset-m1"> --}}
				<div class="instrucao-form box-shadom-generico">
					<blockquote class="blockquote">
						<p class="caption-instrucoes">Bem Vindo!</p>
						<footer class="blockquote-footer">
                            Olá  <b> {{ $usuario }} </b>, seja bem vindo a familia Riverina.
                            <br>
                            {{-- Matricula: <b>129000</b> --}}
						</footer>
					</blockquote>
				</div>
                {{-- <a href="/email-teste">ENVIAR EMAIL</a> --}}
			</div>

            {{-- <div class="col s12 m6">
			<div class="col s8 m6 offset-m1">
				<div class="instrucao-form box-shadom-generico">
				    <p>Carteira Provisoria</p>
				</div>
			</div> --}}
        </div>

		<div class="row row-margin-bottom">
			<div class="col s12 m12">
				<div class="box-shadom-generico-portal">
                    <div class="container-header-sections">
                        <h1 class="title-sections">DETALHE DO PLANO</h1>
                        <p class="sub-title-sections"></p>
                    </div>

                    <div class="conteiner-body-sections">
                        <table class="responsive-table striped highlight">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Titulo</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($mensalidades as $key => $mensalidade) --}}
                                    <tr>
                                        {{-- Configurar caminho no arquivo ENV. pegar a url do Admin --}}
                                        <td width="180">

                                            &nbsp;
                                            @if (env('APP_ENV') != "local")
												<img src="{{ asset('./images/plano_prata.png') }}" height="100" width="100%" alt="">
												<!-- <img src="http://localhost:8100/storage/{{$plano_socio->imagem_carteira_frente}}" height="100" width="100%" alt=""> -->
											@else
												<img src="https://etorcedor.socioeternocampeao.com.br/storage/{{$plano_socio->imagem_carteira_frente}}" height="100" width="100%" alt="">
											@endif
                                            {{-- <img src="{{env('URL_STORAGE_DEV').$plano_socio->imagem_carteira_frente}}" alt="" style="max-width: 120px;"> --}}
                                            {{-- {{ $plano_socio->imagem_carteira_frente }} --}}
                                        </td>
                                        <td><strong>{{ $plano_socio->nome }}</strong></td>
                                        <td>{{ $plano_socio->titulo }}</td>
                                        {{-- <td>{{ date('d/m/Y', strtotime($mensalidade->data_vencimento)) }}</td>
                                        <td>R$ {{ number_format($mensalidade->valor_cobrado, 2, ',', '.') }}</td>
                                        <td>{{ $mensalidade->status }}</td>
                                        <td width="60">
                                            <button type="button" class="btn btn-primary" name="button">Pagar</button>
                                        </td> --}}
                                    </tr>
                                {{-- @empty
                                    <h4>Sem mensalidades para esse socio</h4>
                                @endforelse --}}

                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>

		<div class="row row-margin-bottom">
			<div class="col s12 m12">
                <div class="box-shadom-generico-portal">
                    <div class="container-header-sections">
                        <h1 class="title-sections">RESUMO FINANCEIRO</h1>
                        {{-- <p class="sub-title-sections">Veja qui todas suas mensalidades pagas e em aberto</p> --}}
                    </div>

                    <div class="conteiner-body-sections">
                        <table class="responsive-table striped highlight">
                            <thead>
                                <tr style="border-bottom: 2px solid #000;">
                                    <th>#</th>
                                    <th>Plano</th>
                                    <th>Parcela</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Forma</th>
                                    <th>Pagar com:</th>
                                </tr>
                            </thead>
                            <p>Se sua mensalidade foi emitida atraves de boleto e a mesma esta vencidade, clique no botao 2 via sera impresso um novo boleto!</p>
                            <tbody>
                                @forelse ($mensalidades as $key => $mensalidade)

                                    @if ($mensalidade->status == 'paid')
                                        @php
                                            $style_pago = 'style="border-left:3px solid #26a69a"';
                                        @endphp
                                    @endif

                                    <tr>
                                        <td>{{ $mensalidade->id }}</td>
                                        <td><strong>{{ $plano_socio->titulo }}</strong></td>
                                        <td>{{ $mensalidade->numero_mensalidade }}/12</td>
                                        <td>{{ date('d/m/Y', strtotime($mensalidade->data_vencimento)) }}</td>
                                        <td>R$ {{ number_format($mensalidade->valor_cobrado, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($mensalidade->status == 'new')
                                                <span class="new badge blue" data-badge-caption="Nova"></span>
                                            @elseif ($mensalidade->status == 'waiting')
                                                <span class="new badge blue text-amber" data-badge-caption="Aguardando"></span>
                                            @elseif ($mensalidade->status == 'paid')
                                                <span class="new badge" data-badge-caption="Pago"></span>
                                            @elseif ($mensalidade->status == 'unpaid')
                                                <span class="new badge red" data-badge-caption="Não Pago"></span>
                                            @else
                                                <span class="new badge grey" data-badge-caption="Pendente"></span>
                                            {{-- {{ $mensalidade->status }} --}}
                                            @endif
                                        </td>

                                        {{-- {{ $mensalidade->transacao }} --}}

                                        @if (isset($mensalidade->transacao) && $mensalidade->transacao->count() > 0)
                                            <td>
                                            @foreach ($mensalidade->transacao as $key => $transacao)
                                                @switch($transacao->payment_method)
                                                    @case('banking_billet')
                                                        <span>
                                                            Boleto
                                                            {{-- <button type="button" name="button">{{ $transacao->charge_id }} Boleto</button> --}}
                                                        </span>
                                                        @break
                                                    @case('credit_card')
                                                        <span>Cartão</span>
                                                        @break
                                                @endswitch
                                            @endforeach
                                            </td>
                                        @else
                                            <td>Indefinido</td>
                                        @endif
                                        <td width="200">
                                            @if ($mensalidade->status == 'paid' || $mensalidade->status == 'waiting')

                                                @foreach ($mensalidade->transacao as $key => $transacao)
                                                    @if (empty($transacao))
                                                        <a href="#" data-id="{{ $mensalidade->id }}" class="btn-pagamento-detalhe-transacao btn-small red darken-1" id="btn-detalhe-transacao" disabled="disabled">Ver</a>
                                                    @else
                                                        {{-- <a href="#" data-id="{{ $mensalidade->id }}" data-transacao="{{ $transacao->charge_id }}" class="btn-detalhe-transacao btn-small red darken-1" id="btn-detalhe-transacao"><i class="material-icons">visibility</i> {{ $transacao->charge_id }}</a> --}}

                                                        {{-- Verificar se boleto e esta vencido --}}

                                                        @if ($transacao->payment_method == 'banking_billet' && $transacao->banking_billet_expire_at < now())
                                                            <button target="_blank" data-transacao="{{ $transacao->charge_id }}" class="btn-small red darken-1 tooltipped btn-alterar-vencimento-segunda-via" data-position="top" data-tooltip="2&ordf; via boleto" style="width:180px">
                                                                2&ordf; via boleto
                                                            </button>
                                                        @elseif($transacao->payment_method == 'banking_billet')
                                                            <a href="{{ $transacao->banking_billet_link  }}" target="_blank" class="btn-small red darken-1 tooltipped" data-position="top" data-tooltip="Visualizar boleto" id="btn-detalhe-transacao" style="width:180px">
                                                                <i class="material-icons">visibility</i> Ver Boleto
                                                            </a>
                                                        @else
                                                            <a href="{{ $transacao->banking_billet_link  }}" target="_blank" class="btn-small red darken-1 tooltipped" data-position="top" data-tooltip="Detalhe cobranca" id="btn-detalhe-transacao" disabled="disabled" style="width:180px">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                        @endif



                                                    @endif
                                                @endforeach

                                            @else
                                                <a href="#" data-id="{{ $mensalidade->id }}" class="btn-small red darken-1 btn-pagamento-cartao" id="btn-pagamento-cartao">Cartão</a>
                                                <a href="#" data-id="{{ $mensalidade->id }}" data-vencimento="{{ $mensalidade->data_vencimento }}" class="btn-pagamento-boleto btn-small red darken-1" id="btn-pagamento-boleto">Boleto</a>
                                            @endif
                                            {{-- <a href="#" data-id="{{ $mensalidade->id }}" class="btn-pagamento btn-small red darken-1" id="btn-pagamento-cartao">Pagar</a> --}}
                                            {{-- <a href="#" data-id="{{ $mensalidade->id }}" class="btn-pagamento-boleto btn-small red darken-1">Boleto</a> --}}
                                            {{-- <a href="#" class="btn btn-primary dropdown-pagamento" data-target='dropdownPagamento' name="button"><i class="large material-icons right">keyboard_arrow_down</i>Pagar com:</a>
                                            <ul id='dropdownPagamento' class='dropdown-content'>
                                                <li><a href="/transaction-billet/{{$mensalidade->id}}">Boleto</a></li>
                                                <li><a href="#" data-id="{{ $mensalidade->id }}" class="btn-pagamento-cartao">Cartão de Crédito</a></li>
                                              </ul> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <h4>Sem mensalidades para esse socio</h4>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>

        {{-- <div class="row row-margin-bottom">
			<div class="col s12 m12">
                <div class="box-shadom-generico-portal">
                    <div class="container-header-sections">
                        <h1 class="title-sections">IDA AOS PARCEIROS</h1>
                        <p class="sub-title-sections"></p>
                    </div>

                    <div class="conteiner-body-sections">
                        <table class="responsive-table striped highlight">
                            <thead>
                                <tr>
                                    <th>Parceiro</th>
                                    <th>Data Ida</th>
                                    <th>Valor Compra</th>
                                    <th>Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Academia Afrenti Ltda</td>
                                    <td>12/01/2019</td>
                                    <td>90,00</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div> --}}

	</div>
</section>


{{-- Includes Modals --}}
@include('includes.modals')

@endsection

<!-- SCRIPTS JS  -->
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/alerts-modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script-cartao.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script-boleto.js') }}"></script>
    {{-- Desenvolvimento --}}
    <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/50fc83996294191ee2ae233057f29a2b/'+v;s.async=false;s.id='50fc83996294191ee2ae233057f29a2b';if(!document.getElementById('50fc83996294191ee2ae233057f29a2b')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>
    {{-- Produção --}}
    {{-- <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://api.gerencianet.com.br/v1/cdn/50fc83996294191ee2ae233057f29a2b/'+v;s.async=false;s.id='50fc83996294191ee2ae233057f29a2b';if(!document.getElementById('50fc83996294191ee2ae233057f29a2b')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script> --}}

    <script type="text/javascript">
    $(document).ready(function(){

        $('.tooltipped').tooltip();

        $('.tabs').tabs();

        $('select').formSelect();

        $(".btn-pagamento-cartao").on('click', function(){
            //alert('Abrir modal cartao');
            var id = $(this).data('id');
            $("#mensalidade_id").val(id);
            startModal('pagamento');
        });

        $(".btn-pagamento-boleto").on('click', function(){
            var data_atual_formatada = new Date().toISOString().slice(0,10);
            var data_atual = new Date();
            var vencimento = $(this).data('vencimento');
            var aviso_boleto_vencido = '';

            if (vencimento < data_atual_formatada) {
                aviso_boleto_vencido = 'A mensalidade informada está vencida, o sistema irá emitir um boleto com uma nova data valída!';
            }
            var id = $(this).data('id');
            $("#mensalidade_id").val(id);
            $("#texto_aviso_vencida").html('<b>' + aviso_boleto_vencido + '</b>');
            startModal('pagamento_boleto');
        });

        //Detalhe da transação
        $(".btn-detalhe-transacao").on('click', function(){
            startModal('load');
            var mensalidade_id = $(this).data('id');
            var charge_id = $(this).data('transacao');
            //alert('Buscar detalhes da mensalidade:' + charge_id + 'e transação');

            // Testar Depois
            $.ajax({
                url: '/detalhe-transacao/'+charge_id,
                dataType: 'json',
                type: 'get',
                beforeSend: function() {
                    //$('#insere_aqui').html(iconCarregando);
                },
                complete: function() {
                    //$(iconCarregando).remove();
                    stopModal();
                },
                success: function(data, textStatus) {
                    console.log(data);
                    stopModal();
                    // $('#insere_aqui').html('<p>' + data + '</p>');
                },
                error: function(resp) {
                    alert();
                    stopModal();
                }
            });

        });


        //Alterar vencimento e gerar 2 via
        $(".btn-alterar-vencimento-segunda-via").on('click', function(){
            startModal('load');
            //var mensalidade_id = $(this).data('id');
            var charge_id = $(this).data('transacao');
            // Testar Depois
            $.ajax({
                url: '/alterar-vencimento/'+charge_id,
                dataType: 'json',
                type: 'get',
                beforeSend: function() {
                    //$('#insere_aqui').html(iconCarregando);
                },
                complete: function() {
                    //$(iconCarregando).remove();
                    stopModal('load');
                },
                success: function(data, textStatus) {
                    stopModal('load');
                    var mensagem = "<p>Vencimento do boleto e mensalidade alterado com sucesso!</p>";
                    startModal('sucesso');
                    $(".text-sucesso").html("");
                    $(".text-sucesso").html(mensagem);
                    // $('#insere_aqui').html('<p>' + data + '</p>');
                },
                error: function(resp) {
                    stopModal('load');
                }
            });

        });



        // $(".btn-pagamento-boleto").on('click', function(){
        //         var id = $(this).data('id');
        //         $("#mensalidade_id").val(id);
        //         //alert(id);
        //         startModal('load');
        // });

        // function startModal(type){
        //     $('.modal').modal({
        //         dismissible: true, // Modal can be dismissed by clicking outside of the modal
        //         // onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        //         //   alert("Ready");
        //         //   console.log(modal, trigger);
        //         // },
        //         onCloseEnd: function() { // Callback for Modal close
        //             $("#mensalidade_id").val("");
        //         }
        //     });
        //
        //     if (type == 'load') {
        //         $('#modalLoad').modal('open'); //atribui uma ação open/close...
        //     }
        //
        //     if (type == 'pagamento') {
        //         $('#modalPagamento').modal('open');
        //     }
        // }
        //
        // function stopModal(){
        //     $('.modal').modal('close'); //atribui uma ação open/close...
        // }

        $('.dropdown-pagamento').dropdown();


        // $("#btn_submit_cartao").click(function(e){
        //     e.preventDefault();
        //     //alert('iniciar Modal Load e submeter dados CRF Tokan' + $('meta[name="csrf-token"]').attr('content'));
        //     var data = $('#form-cartao').serialize();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //      //startModal('load');
        //      var data = $("#form-cartao").serialize();
        //
        //      $.ajax({
        //          type: "POST",
        //          url: "{{route('criar.transacao.cartao')}}",
        //          data: data,
        //          success:function(response) {
        //
        //              //stopPreloader();
        //             //alert('Sucesso foi no servidor');
        //          },
        //          error: function(response) {
        //              stopModal();
        //              $(".text-error").html("");
        //              $(".text-error").html("<p>Erro, contacte o administrador do sistema</p>");
        //              startPreloader('error');
        //              //alert('Erros vindo do servidor');
        //          }
        //      });
        //
        //      return false;
        // });

    });

    // Testar Depois
    // $.ajax({
    //         url: 'exemplo-serialize.php',
    //         dataType: 'html',
    //         type: 'POST',
    //         data: serializeDados,
    //         beforeSend: function() {
    //             $('#insere_aqui').html(iconCarregando);
    //         },
    //         complete: function() {
    //             $(iconCarregando).remove();
    //         },
    //         success: function(data, textStatus) {
    //             $('#insere_aqui').html('<p>' + data + '</p>');
    //         },
    //         error: function(xhr,er) {
    //             $('#mensagem_erro').html('<p class="destaque">Error ' + xhr.status + ' - ' + xhr.statusText + '<br />Tipo de erro: ' + er + '</p>')
    //         }
    //     });



    </script>







@endsection
