@extends('adminlte::page')

@section('title', 'Expediente - Documentos')

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
          <a class="nav-link" href="{{route('expedientes.abogados',$expediente)}}">Abogados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('expedientes.procuradors',$expediente)}}">Procuradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Documentos</a>
        </li>
      </ul>
    </div>

    <br>

    <h5 class="font-weight-bold px-2">IMAGENES</h5>
    <div class="card">
        <div class="card-body">
        <table class="table table-striped" id="documentos" >
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Codigo Expediente</th>
                <th scope="col">Procurador</th>
                <th scope="col">Nombre de archivo</th>
                <th scope="col">Fecha de subida</th>
                <th scope="col" width="20%">Acciones</th>
                {{-- <th colspan=""></th> --}}
            </tr>
            </thead>
            
            <tbody>
                @foreach ($documentos as $documento)
                <tr>
                <td>{{$documento->id}}</td>
                <td>{{$expediente->codigo}}</td>
                <td>{{DB::table('users')->where('id',$documento->id_usuario)->value('name')}}</td>
                <td>{{$documento->ruta}}</td>
                <td>{{$documento->created_at}}</td>
                <td> 
                    <form  action="{{route('expedientes.destroydocumento',$expediente)}}" method="post">
                      @csrf
                      @method('delete')
                        <a  class="btn btn-primary btn-sm" href="{{route('documentos.show',$documento->id)}}">Ver</a>                  
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                        value="{{$documento->id}}" name="documento">Quitar</button>
                    </form>
                </td>    
                </tr>
              @endforeach
            </tbody> 
          </table>
        </div>
      </div>
</div>
@stop