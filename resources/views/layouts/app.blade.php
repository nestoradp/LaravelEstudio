<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatable/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('izitoast/iziToast.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('select2/select2.min.css')}}">
</head>
<body>
       <header>
           @include('layouts.header')
       </header>


        <section>
        <div class="container-fluid">
        <h1>Pagina Principal</h1>
        @include('layouts.mensajes')
        @yield('content')

        </div>
        </section>



       {{-- Vinculos a los JavaScript --}}
       <script type="text/javascript" src="{{asset('bootstrap/js/jquery-3.5.1.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('bootstrap/js/popper.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('bootstrap/dist/holder.min.js')}}"></script>
       <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

       {{--  <script type="text/javascript" src="{{asset('notify.min.js')}}"></script> --}}
         {{--  <script type="text/javascript" src="{{asset('bootstrap/dist/util.js')}}"></script>]--}}
       {{-- <script type="text/javascript" src="{{asset('bootstrap/dist/carousel.js')}}"></script>]--}}
       {{--  <script type="text/javascript" src="{{asset('bootstrap/js/funcionesajax.js')}}"></script>--}}
       {{--  <script type="text/javascript" src="{{asset('bootstrap/js/funciones.js')}}"></script>--}}

       {{-- HTML5 shim, for IE6-8 support of HTML5 elements --}}
       {{--[if lt IE 9]--}}
       <script type="text/javascript" src="{{asset('bootstrap/js/html5shiv.js')}}"></script>
       {{--[endif]--}}

       @yield('scripts')
</body>
</html>
