@extends('adminlte::page')

@section('title', 'Expediente - Abogados')

@section('content_header')

@stop

@section('content')
<br>
@if(session('status'))
    <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
@endif
<div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{route('expedientes.show',$expediente)}}">Detalles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Abogados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('expedientes.procuradors',$expediente)}}">Procuradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Documentos</a>
        </li>
      </ul>
    </div>
    <br>

    <form method="post" class="form-wrapper" action="{{route('expedientesAbogados.store',$expediente)}}" novalidate>
        @csrf
        <div class="row row justify-content-center">
            <div class="col-4"> 
                <select name = "id_abogado" id="id_abogado" class="form-control" onchange="habilitar()" >
                    <option value="null">Seleccione el abogado</option>
                        @foreach ($abogadoos as $abogadoos)
                            <option value="{{$abogadoos->id}}">
                                {{$abogadoos->nombre}}
                            </option>
                        @endforeach
                </select>
                @error('id_abogado')
                    <p>DEBE SELECCIONAR UN ABOGADO</p>
                @enderror
            </div>
            {{-- BUTTON AñADIR --}}
            <div class="col-3 align-items-center">
                <button  class="btn btn-primary btn-sm" type="submit">Agregar</button>
            </div>
        </div>
    </form>

    <div class="card-body">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="abogados" >
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col" width="20%">Acciones</th>
              </tr>
            </thead>
            
            <tbody>
    
              @foreach ($abogados as $abogado)
                <tr>
                  <td>{{$abogado->id}}</td>
                  <td>{{$abogado->nombre}}</td>
                  <td>{{$abogado->telefono}}</td>
                  <td>{{$abogado->email}}</td>
                  <td >
                    <form  action="{{route('expedientes.destroyabogado',$expediente)}}" method="post">
                      @csrf
                      @method('delete')
                        <a  class="btn btn-primary btn-sm" href="{{route('abogados.show',$abogado->id)}}">Ver</a>                  
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                        value="{{$abogado->id}}" name="abogado">Quitar</button>
                    </form>
                  </td>    
                </tr>
              @endforeach
            </tbody> 
          </table>
        </div>
      </div>
    </div>
</div>
@stop