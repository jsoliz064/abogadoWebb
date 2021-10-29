@extends('adminlte::page')

@section('title', 'Expediente - Detalles')

@section('content_header')

@stop

@section('content')
<br>
<div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Detalles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('expedientes.abogados',$expediente)}}">Abogados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('expedientes.procuradors',$expediente)}}">Procuradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Documentos</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <h5 class="font-weight-bold px-2">DATOS COMPLETOS</h5>
      <div class="col">
          <div class="row">
              <h5 class="font-weight-bold px-2">Codigo: </h5>
              <h5>{{$expediente->codigo}}</h5>
          </div>
          <div class="row">
              <h5 class="font-weight-bold px-2">Nombre del proceso: </h5>
              <h5>{{$expediente->nombre}}</h5>
          </div>

          <div class="row">
              <h5 class="font-weight-bold px-2">Materia: </h5>
              <h5>{{$expediente->materia}}</h5>
          </div>
          <div class="row">
              <a href="{{route('expedientes.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
          </div>
      </div>
   {{--     
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>  --}}
    </div>
  </div>


@stop