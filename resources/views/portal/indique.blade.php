@extends('layouts.portal-socio')

{{-- @section('title_browser', $title_browser)
@section('title_page', $title_page)
@section('subtitle_page', $subtitle_page) --}}

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
    <h1>Indique para um amigo</h1>

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


});
</script>
@endsection
