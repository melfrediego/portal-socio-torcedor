<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title_browser')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
        @include('includes.header-portal-socio')
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
            $('.dropdown-trigger').dropdown();
            $('.sidenav').sidenav();
            //
            // function startModal(type){
            //     $('.modal').modal({
            //         dismissible: true, // Modal can be dismissed by clicking outside of the modal
            //         // onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            //         //   alert("Ready");
            //         //   console.log(modal, trigger);
            //         // },
            //         onCloseEnd: function() { // Callback for Modal close
            //             //alert('Closed');
            //         }
            //     });
            //
            //     if (type == 'load') {
            //         $('#modalLoad').modal('open'); //atribui uma ação open/close...
            //     }
            //
            //     if (type == 'sucesso') {
            //         $('#modalSucesso').modal('open');
            //     }
            //
            //     if (type == 'error') {
            //         $('#modalError').modal('open');
            //     }
            // }
            //
            // function stopModal(){
            //     $('.modal').modal('close'); //atribui uma ação open/close...
            // }

        });
    </script>

    @yield('scripts')
</body>
</html>
