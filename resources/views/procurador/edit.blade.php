@extends('adminlte::page')

@section('title', 'Procurador - Edit')

@section('content_header')
    <h1>Editar Abogado</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('procuradors.update',$procurador)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Carnet de Identidad:</h5>
            <input type="text"  name="ci" value="{{$procurador->ci}}" class="focus border-primary  form-control" >
            @error('ci')
            <p>DEBE INGRESAR BIEN EL CI</p>
            @enderror

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$procurador->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$procurador->telefono}}"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Email:</h5>
            <input type="text" name="email" value="{{$procurador->email}}" class="focus border-primary  form-control" >


            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('procuradors.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop