@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@if(session('status'))
    <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
@endif
<div class="section">
    <h2 class="section_title">BUSCAR EXPEDIENTES</h2>
</div>
@stop

@section('content')

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <form method="GET" action="{{route('index')}}" class="form-inline form">
        <div class="form-group mx-sm-3">
            <label for="id_expediente" class="sr-only">Codigo</label>
            <input type="text" class="form-control" name="id_expediente" id="id_expediente" placeholder="Codigo de Expediente">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
     </form>
</head>

<body>

    <main class="main">
        @include('expediente.data')
    </main>

    <a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup_icon"></i>
    </a>
</body>
@stop

@section('css')
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/styles.css">

@stop

@section('js')
<!--  Typewriter CSS Effect -->
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
@stop