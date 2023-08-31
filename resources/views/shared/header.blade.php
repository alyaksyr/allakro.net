<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __("Allakro.net - ") }} {{ config('app.name', "Le portail de la communauté") }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="/images/icone.ico">
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('tom-select/css/tom-select.css') }}" rel="stylesheet"> 

    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('popper/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('tom-select/js/tom-select.js')}}"></script>
 
    
</head>
<body class="layout-fixed">
    <div id="wrapper" class="wrapper">