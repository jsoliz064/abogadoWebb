@extends('adminlte::page')

@section('title', 'Expediente')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: rgb(145, 145, 145)">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS COMPLETOS</h3>
                    </div>
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
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop