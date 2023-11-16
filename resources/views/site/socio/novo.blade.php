@extends('layouts.site')

@section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page)

@section('style')
    @parent
    <link href="{{ asset('css/novo_socio.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/reset_materialize.css') }}" rel="stylesheet"/>

   {{-- <!-- Fonts to support Material Design -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
   <!-- Icons to support Material Design -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" /> --}}

@endsection

@section('content')
    <section class="section-cadastro-socio grey lighten-4">
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2">
			{{-- <div class="col s8 m6 offset-m1"> --}}
				<div class="instrucao-form box-shadom-generico">
					
                                        <blockquote class="blockquote">
	<p class="caption-instrucoes">Instru&ccedil;&otilde;es importantes.</p>
	<footer class="blockquote-footer">Exceto (<strong> Complemento </strong>) todos campos  s&atilde;o de preenchimento obrigat&oacute;rios.
	</footer>
	<footer class="blockquote-footer">Informe seu melhor <strong>Email</strong>, para que voc&ecirc; possa acessar sua conta e receber seus dados financeiro.
	</footer>
</blockquote>

				</div>


				<div class="container-form box-shadom-generico">

                    {{-- Formulario Aqui --}}


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>Existem compos preenchidos de forma incorreta!</p>
                            {{-- <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul> --}}
                        </div><br />
                    @endif

                    {{-- Dados Acesso --}}
                    {{-- <form method="post" action="{{route('inserir.novo')}}" id="form"> --}}
                    <form id="form">

                        <input id="plano_id" type="hidden" name="plano_id" value="{{$plano->id}}">
                        <h4 class="diviser_form_socio">Dados de Acesso</h4>

                        <div class="row">
                            <div class="input-field col s12">
                                {{-- <input id="cemail" type="email" name="cemail" data-error=".errorTxt2" aria-required="true" class="error" aria-describedby="cemail-error"> --}}
                                <input id="email" type="text" name="email" placeholder="informe seu melhor email">
                                {{-- <input id="nome_completo" type="text" name="email" placeholder="informe seu melhor email" class="{{ $errors->has('email') ? 'validate invalid' : 'validate' }}"> --}}
                                <label for="email" class="{{ $errors->has('email') ? '' : 'validate' }}">Email:</label>
                                <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="senha" type="password" name="senha" placeholder="informe sua senha" class="{{ $errors->has('senha') ? 'validate invalid' : 'validate' }}">
                                <label for="senha" class="{{ $errors->has('senha') ? '' : 'validate' }}">Senha:</label>
                                <span class="helper-text" data-error="{{ $errors->has('senha') ? 'campo Senha obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="confirma_senha" type="password" placeholder="confirme sua senha">
                                <label for="confirma_senha" class="">Confirma Senha:</label>
                            </div>
                        </div>

                        <h4 class="diviser_form_socio">Dados Pessoais</h4>
                        <div class="row">
                            <div class="input-field col s12 m8">
                                <input id="nome_completo" type="text" name="nome" placeholder="informe seu nome completo" class="{{ $errors->has('nome') ? 'validate invalid' : 'validate' }}">
                                <label for="nome_completo" class="{{ $errors->has('nome') ? '' : 'validate' }}">Nome Completo:</label>
                                <span class="helper-text" data-error="{{ $errors->has('nome') ? 'campo Nome obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="cpf" type="text" name="cpf" placeholder="informe CPF valido">
                                <label for="cpf">CPF:</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="data_nascimento" type="text" name="data_nascimento" placeholder="informe data nascimento" class="{{ $errors->has('data_nascimento') ? 'validate invalid' : 'validate' }}">
                                <label for="data_nascimento" class="{{ $errors->has('data_nascimento') ? '' : 'validate' }}">Data Nascimento:</label>
                                <span class="helper-text" data-error="{{ $errors->has('data_nascimento') ? 'campo Data Nascimento obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="telefone" type="text" name="telefone" placeholder="informe telefone" class="{{ $errors->has('telefone') ? 'validate invalid' : 'validate' }}">
                                <label for="telefone" class="{{ $errors->has('telefone') ? '' : 'validate' }}">Telefone:</label>
                                <span class="helper-text" data-error="{{ $errors->has('telefone') ? 'campo Data Nascimento obrigatorio' : '' }}" data-success=""></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select placeholder="informe seu nome completo" name="sexo" class="{{ $errors->has('sexo') ? 'validate invalid' : 'validate' }}">
                                    <option value="" style="color:#ddd !important;"><span class="text-darken-2">informe Sexo</span></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                                <label class="{{ $errors->has('sexo') ? '' : 'validate' }}"><b>Sexo:</b></label>
                                <span class="helper-text" data-error="{{ $errors->has('sexo') ? 'campo Sexo obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m6">
                                <select placeholder="informe seu nome completo" name="estado_civil" class="{{ $errors->has('estado_civil') ? 'validate invalid' : 'validate' }}">
                                    <option value="" style="color:#ddd !important;">informe seu estado civil</option>
                                    <option value="Casado(a)">Casado</option>
                                    <option value="Solteiro(a)">Solteiro</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viuvo">Viuvo</option>
                                </select>
                                <label class="{{ $errors->has('estado_civil') ? '' : 'validate' }}"><b>Estado Civil:</b></label>
                                <span class="helper-text" data-error="{{ $errors->has('estado_civil') ? 'campo Estado Civil obrigatorio' : '' }}" data-success=""></span>
                            </div>
                        </div>

                        <h4 class="diviser_form_socio">Endereco</h4>
                        <div class="row">
                            <div class="input-field col s12 m3">
                                <input id="cep" type="text" name="cep" placeholder="informe um CEP" class="{{ $errors->has('cep') ? 'validate invalid' : 'validate' }}">
                                <label for="cep" class="">CEP:</label>
                                <span class="helper-text" data-error="{{ $errors->has('cep') ? 'campo CEP obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m9">
                                <input id="logradouro" type="text" name="logradouro" placeholder="informe seu endereco" class="{{ $errors->has('logradouro') ? 'validate invalid' : 'validate' }}">
                                <label for="logradouro" class="">Endereco:</label>
                                <span class="helper-text" data-error="{{ $errors->has('logradouro') ? 'campo Endereco obrigatorio' : '' }}" data-success=""></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="numero" type="text" name="numero" placeholder="informe um numero" class="{{ $errors->has('numero') ? 'validate invalid' : 'validate' }}">
                                <label for="numero" class="">Numero:</label>
                                <span class="helper-text" data-error="{{ $errors->has('numero') ? 'campo Numero obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="bairro" type="text" name="bairro" placeholder="informe bairro" class="{{ $errors->has('bairro') ? 'validate invalid' : 'validate' }}">
                                <label for="bairro" class="">Bairro:</label>
                                <span class="helper-text" data-error="{{ $errors->has('bairro') ? 'campo Bairro obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="complemento" type="text" name="complemento" placeholder="informe seu endereco">
                                <label for="complemento" class="">Complemento:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select placeholder="informe seu nome completo" name="estado" id="estado" class="{{ $errors->has('estado') ? 'validate invalid' : 'validate' }}">
                                    <option value="" style="color:#ddd !important;">informe um estado</option>
                                    @forelse ($estados as $key => $estado)
                                        <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                    @empty
                                        <option value="" style="color:#ddd !important;">nenhum estado cadastrado</option>
                                    @endforelse
                                </select>
                                <label><b>Estado:</b></label>
                                <span class="helper-text" data-error="{{ $errors->has('estado') ? 'campo Estado obrigatorio' : '' }}" data-success=""></span>
                            </div>

                            <div class="input-field col s12 m6">
                                <select placeholder="informe seu nome completo" name="cidade" id="cidade" class="{{ $errors->has('cidade') ? 'validate invalid' : 'validate' }}">
                                    <option value="" style="color:#ddd !important;">informe uma cidade</option>
                                </select>
                                <label><b>Cidade:</b></label>
                                <span class="helper-text" data-error="{{ $errors->has('cidade') ? 'campo cidade obrigatorio' : '' }}" data-success=""></span>

                            </div>
                        </div>

                        <h4 class="diviser_form_socio">Outras Informações (Recebimento do Kit Socio Torcedor)</h4>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <select placeholder="Gostaria de receber meu kit:" name="local_retirada_kit" class="{{ $errors->has('local_retirada_kit') ? 'validate invalid' : 'validate' }}">
                                    <option value="" style="color:#ddd !important;">Selecione o local de retirada do kit.</option>
                                    <option value="S">Na sede do clube</option>
                                    <option value="E">No meu endereco</option>
                                </select>
                                <label>Gostaria de receber meu kit:</label>
                                <span class="helper-text" data-error="{{ $errors->has('local_retirada_kit') ? 'campo Local Retirada Kit obrigatorio' : '' }}" data-success=""></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                {{-- <hr class="hr-form-cadstro"> --}}
                                <div class="col-md-12 text-left">
                                    <button class="btn btn-success btn-large block grey darken-4 btn-cadastrar" type="submit" id="submit">Cadastrar e Continuar</button>
                                    {{-- <button class="btn btn-success btn-large block grey darken-4 btn-cadastrar" type="button" id="sucesso-cadastro-2">Teste</button> --}}
                                    {{-- <br>
                                    <a href="/pagamento-plano">Forma de Pagamento</a> --}}
                                </div>
                            </div>
                        </div>
                    </form>


				</div>
			</div>

		{{-- <div class="col s12 m4 box-shadom-generico">
				<div class="detalhe-plano">

					<span><strong>Detalhes do seu plano</strong></span>

					<hr class="hr-detalhe-pedido">

					<img *ngIf="plano" src="data:image/;base64," class="responsive-img" alt="">
					<p></p>

					<button class="btn btn-sm">Selecionar outro plano</button>

					<ul *ngIf="plano" class="list-detalhe-plano">
						<li>Nome <span class="orange-text text-darken-2">{{$plano->nome}}</span></li>
						<li>Titulo <span class="orange-text text-darken-2">{{$plano->titulo}}</span></li>
						<li>Validade <span class="orange-text text-darken-2">{{$plano->validade}}</span></li>
						<li>Valor Adessão <span class="orange-text text-darken-2">R$ {{$plano->Valor}},00</span></li>
						<li>Valor mensal <span class="orange-text text-darken-2">R$ {{$plano->valor}}</span></li>
					</ul>
					<br>
					<span><strong>Outras Informações</strong></span>

					<ul>
						<li *ngFor="let vantagens of plano.Vantagens">
							<i class="material-icons">check</i>
							&nbsp;{{vantagens}}
						</li>
					</ul>
				</div>

				<div class="forma-pagamento">
					<span><strong>Forma de Pagamento</strong></span>

					<hr class="hr-detalhe-pedido">
				</div>
			</div> --}}

		</div>

		<div class="row">
			<div class="col s12">
				<!-- Finalizar -->
			</div>
		</div>

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

    <script type="text/javascript">
        $(document).ready(function(){

            //Mascaras
            // $('#cpf').focus(function(){
            //     $('#cpf').mask('000.000.000-00');
            // });
            $('#cpf').mask('000.000.000-00');
            $('#cep').mask('00000-000');
            $('#telefone').mask('(00)00000-0000');
            // $("#telefone").mask("(99) 9999-9999?9").on("focusout", function () {
            //     var len = this.value.replace(/\D/g, '').length;
            //     $(this).mask(len > 10 ? "(99) 99999-999?9" : "(99) 9999-9999?9");
            // });
            $('#data_nascimento').mask('00/00/0000');

            //Povoando Cidades
            $("#estado").change(function(){
                var idEstado = $("#estado").val();
                $.get("/get-cidade/" + idEstado, function (cidades) {
                    var Options = "";
                    $.each(cidades, function (key, value) {
                        Options = Options + '<option value=' + value.id + '>' + value.nome + '</option>';
                    });
                    $('#cidade').empty();
                    $('#cidade').append(Options);
                    $("#cidade").formSelect()
                });
            });

            $("#form").validate({
               rules: {
                   email: {required: true,email:true},
                   senha: {required: true,minlength: 5},
                   cpassword: {required: true,minlength: 5,equalTo: "#senha"},
                   nome: {required: true,minlength: 10},
                   cpf: {required: true},
                   telefone: {required: true},
                   data_nascimento: {required: true},
                   sexo: {required: true},
                   estado_civil: {required: true},
                   cep: {required: true},
                   logradouro: {required: true},
                   numero: {required: true},
                   bairro: {required: true},
                   cidade: {required: true},
                   estado: {required: true},
                   local_retirada_kit: {required: true},
               },
               //For custom messages
               messages: {
                   //nome:{required: "Campo Nome deve ser preechido",},
                   email:{
                       required: "Campo Email deve ser preechido",
                       email: 'Informe um Email valido'
                   },
                   senha:{required: "Campo Senha deve ser preechido",},
                   //senha:{required: "Campo Senha deve ser preechido",},
                   nome:{required: "Campo Nome deve ser preechido",},
                   cpf:{required: "Campo CPF deve ser preechido",},
                   telefone:{required: "Campo Telefone deve ser preechido",},
                   data_nascimento:{required: "Campo Data Nascimento deve ser preechido",},
                   sexo:{required: "Campo Sexo deve ser preechido",},
                   estado_civil:{required: "Campo Estado Civil deve ser preechido",},
                   cep:{required: "Campo CEP deve ser preechido",},
                   logradouro:{required: "Campo Endereco deve ser preechido",},
                   numero:{required: "Campo Numero deve ser preechido",},
                   bairro:{required: "Campo Bairro deve ser preechido",},
                   cidade:{required: "Campo Cidade deve ser preechido",},
                   estado:{required: "Campo Estado deve ser preechido",},
                   local_retirada_kit:{required: "Campo Local Retirada Kit deve ser preechido",},
               },
               errorElement : 'div',
               errorPlacement: function(error, element) {
                   var placement = $(element).data('error');
                   if (placement) {
                       //alert('Aqui');
                       $(placement).append(error)
                   } else {
                       //alert('Aqui2');
                       error.insertAfter(element);
                   }
               },
               submitHandler: function (form) {
                   $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                    startModal('load');
                    var data = $(form).serialize();

                    $.ajax({
                        type: "POST",
                        url: "{{route('inserir.novo')}}",
                        data: data,
                        success:function(response) {
                            $("#senha").val("");
                            $("#cpassword").val("");
                            $("#nome").val("");
                            $("#cpf").val("");
                            $("#telefone").val("");
                            $("#data_nascimento").val("");
                            $("#sexo").val("");
                            $("#estado_civil").val("");
                            $("#cep").val("");
                            $("#logradouro").val("");
                            $("#numero").val("");
                            $("#bairro").val("");
                            $("#cidade").val("");
                            $("#estado").val("");
                            $("#local_retirada_kit").val("");

                            stopModal();
                            $(".text-sucesso").html("");
                            $(".text-sucesso").html("<p>Cadastro concluido com sucesso!</p><p>Acesse o painel e efetue pagamento da sua mensalidade!</p><p>Em <b>5</b> segundos voc&ecirc; ser&aacute; redirecionado para acessar seu painel!</p><p>Ou clique no bot&atilde;o abaixo!</p>");
                            $(".btn-cadastrar").attr("disabled", false);
                            startModal('sucesso');

                            setTimeout(function(){
                                window.location.href="/portal-socio";
                            }, 5000)
                        },
                        error: function(response) {
                            stopModal();
                            $(".text-error").html("");
                            $(".text-error").html("<p>Erro, contacte o administrador do sistema</p>");
                            startModal('error');
                            $(".btn-cadastrar").attr("disabled", false);
                            //alert('Erros vindo do servidor');
                        }
                    });

                    return false;
                }
           });

            $('select').formSelect();

        });

        $("#sucesso-cadastro").click(function(){
            window.location.href="/portal-socio";
        });



        // function startPreloader(type){
        //     $('.modal').modal();  //chama a função
        //     if (type == 'load') {$('#modalLoad').modal('open');}
        //     if (type == 'sucesso') {$('#modalSucesso').modal('open');}
        //     if (type == 'error') {$('#modalSucesso').modal('open');}
        // }
        //
        // function stopPreloader(){
        //     $('.modal').modal('close'); //atribui uma ação open/close...
        // }



        // $('#submit').click(function(e){
        //     //e.preventDefault();
        //     //$('.modal').openModal();
        //
        //
        //
        //     //validaForm();
        //
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //
        //     $.ajax({
        //         url: "{{route('inserir.novo')}}",
        //         method: "POST",
        //         data: {_token: $('input[name=csrf-token]').val()},
        //         beforeSend: startPreloader()
        //     }).done(function(data){
        //
        //         //alert('CODE PAGSEGURO ' + data.code);
        //         //confirmaPedido(data.code);
        //         alert('Sucesso');
        //
        //     }).fail(function(data){
        //         console.log(data);
        //         // $.each(data.responseJSON.errors, function(key, value){
        //         //             console.log(key+ '=>' +value);
        //         //             // var placement = $(key).data('error');
        //         //             // if (placement) {
        //         //             //     $(placement).append(error)
        //         //             // } else {
        //         //             //     error.insertAfter(element);
        //         //             // }
        //         //             // $('.helper-text').show();
        //         //             // $('.validate').show();
        //         //             // $('.invalid').show();
        //         //             // $('.helper-text').append('<p>'+value+'</p>');
        //         //         });
        //         //$(".modal").closeModal()
        //
        //         //alert("Erro inesperado, tente novamente Lightbox!");
        //         stopPreloader();
        //
        //     }).always(function(){
        //         stopPreloader();
        //         //stopPreloader();
        //
        //     });
        //
        //     return false;
        //
        //
        // });
    </script>







@endsection
			