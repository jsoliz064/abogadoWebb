@extends('adminlte::page')

@section('title', 'Documento - Show')

@section('content_header')
@stop

@section('content')

  {{--  <a href="{{route('documentos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>  --}}
<div class="card-body">
    <div align="center">
        <div class="container">
            <div class="col">
                <div class="row">
                    <h5 class="font-weight-bold px-2">Codigo de expediente: </h5>
                    <h5>{{$codigoExpediente}}</h5>
                </div>
                <div class="row">
                    <h5 class="font-weight-bold px-2">Fecha: </h5>
                    <h5>{{$documento->created_at}}</h5>
                </div>
            </div>
            <img src="{{asset('../' . $documento->ruta)}}" alt="" width="25%">
        </div>
    </div>
    
</div>
<br>
<br>
@stop