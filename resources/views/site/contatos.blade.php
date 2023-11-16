@extends('layouts.site')

@section('style')
    @parent
    <link href="{{ asset('css/novo_socio.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/reset_materialize.css') }}" rel="stylesheet"/>

    {{-- <!-- Fonts to support Material Design -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!-- Icons to support Material Design -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" /> --}}

@endsection

@section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page)


@section('content')

    <!-- Contatos --------------------------------------------- -->
    <section class="section-cadastro-socio grey lighten-4">

        <div class="container">
            <div class="row">

                <div class="col s12 m8 offset-m2">
                    <div class="instrucao-form box-shadom-generico">
                        <blockquote class="blockquote">
                            <p class="caption-instrucoes">Dúvidas e Sugestões.</p>
                            <footer class="blockquote-footer">Antes de enviar sua pergunta verifique em <a href="/faqs">FAQ'S</a> se a mesma ja foi respondida.
                            </footer>
                        </blockquote>
                    </div>

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="container-form box-shadom-generico">
                        <form method="post" action="" id="form">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="input-field col s12">
                                    {{-- <input id="cemail" type="email" name="cemail" data-error=".errorTxt2" aria-required="true" class="error" aria-describedby="cemail-error"> --}}
                                    <input id="nome" type="text" name="nome" placeholder="Informe seu nome">
                                    {{-- <input id="nome_completo" type="text" name="email" placeholder="informe seu melhor email" class="{{ $errors->has('email') ? 'validate invalid' : 'validate' }}"> --}}
                                    <label for="nome_completo" class="{{ $errors->has('email') ? '' : 'validate' }}">Nome:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    {{-- <input id="cemail" type="email" name="cemail" data-error=".errorTxt2" aria-required="true" class="error" aria-describedby="cemail-error"> --}}
                                    <input id="email" type="text" name="email" placeholder="informe seu melhor email">
                                    {{-- <input id="nome_completo" type="text" name="email" placeholder="informe seu melhor email" class="{{ $errors->has('email') ? 'validate invalid' : 'validate' }}"> --}}
                                    <label for="nome_completo" class="{{ $errors->has('email') ? '' : 'validate' }}">Email:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <input id="assunto" type="text" name="assunto" placeholder="informe o assunto">

                                    <label for="assunto" class="{{ $errors->has('senha') ? '' : 'validate' }}">Assunto:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('senha') ? 'campo Senha obrigatorio' : '' }}" data-success=""></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="mensagem" class="materialize-textarea" placeholder="Deixe aqui sua mensagem" name="mensagem" row="15"></textarea>
                                    {{-- <input id="nome_completo" type="text" name="nome" placeholder="informe seu nome completo" class="{{ $errors->has('nome') ? 'validate invalid' : 'validate' }}"> --}}
                                    <label for="mensagem" class="{{ $errors->has('nome') ? '' : 'validate' }}">Mensagem:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('nome') ? 'campo Nome obrigatorio' : '' }}" data-success=""></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <div class="col-md-12 text-left">
                                        <button class="btn btn-success btn-large block grey darken-4 btn-cadastrar" type="submit" id="submit"><i class="material-icons right">near_me</i>ENVIAR MENSAGEM</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

                {{-- <h2>Utilize o formulário para nos enviar <br> duvidas e sugestões</h2>
                <p>Antes de enviar uma pergunta, verifique no link abaixo se a mesma já possue resposta em nossa <strong>FAQ</strong></p> --}}
                <div class="col s8 offset-s2">
                </div>

            </div>
        </div>
    </section>

    <section class="sections section-contatos-map grey lighten-5">
        <div class="section-contatos-map-overlay"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.4318138015487!2d-42.737756884615315!3d-5.194610753839734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x78e32f0be391a49%3A0x52b80d0bf71a8f9!2sRiver+Atl%C3%A9tico+Clube!5e0!3m2!1spt-BR!2sbr!4v1552121015144" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

    @include('includes.modals')

@endsection



<!-- SCRIPTS JS  -->
@section('scripts')


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#form").validate({
            rules: {
                nome: {required: true},
                email: {required: true, email:true},
                assunto: {required: true},
                mensagem: {required: true}
            },
            messages: {
                nome:{required: "Campo Nome deve ser preechido",},
                email:{
                    required: "Campo Email deve ser preechido",
                    email: "Informe um email valido"
                },
                assunto:{required: "Campo Assunto deve ser preechido"},
                mensagem:{required: "Campo Mensagem deve ser preenchido"}
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    // startPreloader('error');
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                startPreloader('load');
                var data = $(form).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{route('inserir.ticket')}}",
                    data: data,
                    success:function(response) {
                        stopPreloader();
                        if($.isEmptyObject(response.error)){
                            $(".text-sucesso").append("<p>"+ response.sucesso +"</p>");
                            startPreloader('sucesso');
                            setTimeout(function(){
                                window.location.href="/contatos";
                            },4000);
                            //window.location.href="nome_da_pagina.php";
                        }else{
                            startPreloader('error');
                            $(".text-error").append("<p>"+ response.error +"</p>");
                            setTimeout(function(){
                                window.location.href="/contatos";
                            },4000);
                            //printErrorMsg(response.error);
                        }
                        limpaForm();
                    },
                    error: function(response) {
                        stopPreloader();
                        $(".text-error").append("<p>Erro, contacte o administrador do sistema</p>");
                    }
                });

                return false;
            }
        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

        function startPreloader(type){
            $('.modal').modal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                // onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                //   alert("Ready");
                //   console.log(modal, trigger);
                // },
                onCloseEnd: function() { // Callback for Modal close
                    //alert('Closed');
                }
            });

            if (type == 'load') {
                $('#modalLoad').modal('open'); //atribui uma ação open/close...
            }

            if (type == 'sucesso') {
                $('#modalSucesso').modal('open');
            }

            if (type == 'error') {
                $('#modalError').modal('open');
            }
        }

        function stopPreloader(){
            $('.modal').modal('close'); //atribui uma ação open/close...
        }

        function limpaForm(){
            $('#nome').reset();
            $('#email').reset();
            $('#assunto').reset();
            $('#mensagem').reset();
            // $("#myForm').trigger("reset");
        }

    });



    </script>

@endsection
