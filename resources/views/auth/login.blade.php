{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


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

{{-- @section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page) --}}


@section('content')

    <!-- Contatos --------------------------------------------- -->
    <section class="section-cadastro-socio grey lighten-4">

        <div class="container">
            <div class="row">

                <div class="col s12 m6 offset-m3">
                    <div class="instrucao-form box-shadom-generico">
                        <blockquote class="blockquote">
                            <p class="caption-instrucoes">Acesse sua conta.</p>
                            <footer class="blockquote-footer">Utilize o formulário abaixo para acessar o portal do sócio.
                            </footer>
                        </blockquote>
                    </div>

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="container-form box-shadom-generico">
                        {{-- <form method="post" action="" id="form"> --}}
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="informe seu email">
                                    <label for="email" class="{{ $errors->has('email') ? '' : 'validate' }}">Email:</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    {{-- <input id="email" type="email" name="email" placeholder="Informe seu email">
                                    <label for="email" class="{{ $errors->has('email') ? '' : 'validate' }}">Email:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    {{-- <input id="password" type="password" name="password" placeholder="informe sua senha">
                                    <label for="password" class="{{ $errors->has('email') ? '' : 'validate' }}">Senha:</label>
                                    <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span> --}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="informe sua senha">
                                    <label for="password" class="{{ $errors->has('email') ? '' : 'validate' }}">Senha:</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <div class="col-md-12 text-left">
                                        <button type="submit" class="btn btn-success btn-large block grey darken-4 btn-cadastrar">
                                            {{ __('ACESSAR') }}
                                        </button>
                                        {{-- <button class="btn btn-success btn-large block grey darken-4 btn-cadastrar" type="submit" id="submit">
                                            ACESSAR
                                        </button> --}}
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col s12 center">
                                    <p>Esqueceu sua senha? <a href="#">Recupere-a</a></p>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col s12 center">
                                    <p>Ainda nao é sócio? <a href="#">Escolha plano</a></p>
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

    {{-- <section class="sections section-contatos-map grey lighten-5">
        <div class="section-contatos-map-overlay"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.4318138015487!2d-42.737756884615315!3d-5.194610753839734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x78e32f0be391a49%3A0x52b80d0bf71a8f9!2sRiver+Atl%C3%A9tico+Clube!5e0!3m2!1spt-BR!2sbr!4v1552121015144" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section> --}}

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
                email: {required: true, email:true},
                password: {required: true}
            },
            messages: {
                password:{required: "Campo Senha deve ser preechido",},
                email:{
                    required: "Campo Email deve ser preechido",
                    email: "Informe um email valido"
                }
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
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });
                // startPreloader('load');
                // var data = $(form).serialize();
                // $.ajax({
                //     type: "POST",
                //     url: "{{route('login')}}",
                //     data: data,
                //     success:function(response) {
                //         stopPreloader();
                //         if($.isEmptyObject(response.error)){
                //             $(".text-sucesso").append("<p>"+ response.sucesso +"</p>");
                //             startPreloader('sucesso');
                //             setTimeout(function(){
                //                 window.location.href="/contatos";
                //             },4000);
                //             //window.location.href="nome_da_pagina.php";
                //         }else{
                //             startPreloader('error');
                //             $(".text-error").append("<p>"+ response.error +"</p>");
                //             setTimeout(function(){
                //                 window.location.href="/contatos";
                //             },4000);
                //             //printErrorMsg(response.error);
                //         }
                //         limpaForm();
                //     },
                //     error: function(response) {
                //         stopPreloader();
                //         $(".text-error").append("<p>Erro, contacte o administrador do sistema</p>");
                //     }
                // });
                //
                // return false;
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
