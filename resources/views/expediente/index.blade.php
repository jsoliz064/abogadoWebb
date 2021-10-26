@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
  <h1>LISTA DE EXPEDIENTES</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
          <a class="btn btn-primary btb-sm" href="{{url('/expedientes/create')}}">Registrar Expediente</a>    
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="expediente" >
        <thead>
          <tr>
            <th scope="col" width="10%">Codigo</th>
            <th scope="col">Nombre del proceso</th>
            <th scope="col">Materia</th>
            <th scope="col" width="20%">Fecha de recepcion</th>
            <th scope="col" width="30%">Acciones</th>
            {{-- <th colspan=""></th> --}}
          </tr>
        </thead>
        
        <tbody>

          @foreach ($expedientes as $expediente)
            <tr>
              <td>{{$expediente->codigo}}</td>
              <td>{{$expediente->nombre}}</td>
              <td>{{$expediente->materia}}</td>
              <td>{{$expediente->created_at}}</td>
              <td > 
                <form  action="{{route('expedientes.destroy',$expediente)}}" method="post">
                  @csrf
                  @method('delete')
                    <a  class="btn btn-primary btn-sm" href="{{route('expedientes.docs',$expediente)}}">Ver Documentos</a>  
                    <a class="btn btn-info btn-sm" href="{{route('expedientes.edit',$expediente)}}">Editar</a>                 
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                    value="Borrar">Eliminar</button>
                </form>
              </td>    
            </tr>
          @endforeach
        </tbody> 

      </table>
    </div>
  </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
     $('#expediente').DataTable();
    } );
</script>
@stop
