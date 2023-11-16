<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title_browser')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    {{-- <script type="text/javascript" src="{{ asset('js/script-cartao-boleto.js') }}"></script>
    <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/50fc83996294191ee2ae233057f29a2b/'+v;s.async=false;s.id='50fc83996294191ee2ae233057f29a2b';if(!document.getElementById('50fc83996294191ee2ae233057f29a2b')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script> --}}

    @section('style')
        <!-- Materialize -->
        <link href="{{ asset('css/materialize/css/materialize.css') }}" rel="stylesheet"/>
        <!-- Style -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    @show




    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <header>
        @if( (Request::segment(1)) == 'home' || (Request::segment(1)) == '' )
            @include('includes.header-site')
        @else
            @include('includes.header-internas-site')
        @endif
    </header>


        @yield('content')


    <footer>
        @include('includes.footer-site')
    </footer>

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Materialize JS-->
    <script type="text/javascript" src="{{ asset('css/materialize/js/materialize.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn_acessar_conta').click(function(){
                //alert('acessar conta');
                window.location.href="/portal-socio";
                return false;
            });

            $('.sidenav').sidenav();
        });
    </script>

    @yield('scripts')
</body>
</html>
