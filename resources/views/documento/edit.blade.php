@extends('adminlte::page')

@section('title', 'Editar Expediente')

@section('content_header')
    <h1>Editar Expediente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('expedientes.update',$expediente)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Codigo:</h5>
            <input type="text"  name="codigo" value="{{$expediente->codigo}}" class="focus border-primary  form-control" >
            @error('codigo')
            <p>DEBE INGRESAR BIEN EL codigo</p>
            @enderror

            <h5>Nombre del proceso:</h5>
            <input type="text"  name="nombre" value="{{$expediente->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN EL NOMBRE</p>
            @enderror

            <h5>Materia:</h5>
            <input type="text" name="materia" value="{{$expediente->materia}}"  class="focus border-primary  form-control" >


            @error('materia')
                <p>DEBE INGRESAR BIEN LA MATERIA</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('expedientes.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop