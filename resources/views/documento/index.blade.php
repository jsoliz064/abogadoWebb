@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
  <h1>LISTA DE DOCUMENTOS</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
          <a class="btn btn-primary btb-sm" href="{{route('home')}}">Atras</a>    
    </div>
  </div>

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
          </tr>
        </thead>
        
        <tbody>

          @foreach ($documentos as $documento)
            <tr>
              <td>{{$documento->id}}</td>
              <td>{{DB::table('expedientes')->where('id',$documento->id_expediente)->value('codigo')}}</td>
              <td>{{DB::table('users')->where('id',$documento->id_usuario)->value('name')}}</td>
              <td>{{$documento->ruta}}</td>
              <td>{{$documento->created_at}}</td>
              <td>
                <form  action="{{route('documentos.destroy',$documento->id)}}" method="post">
                  @csrf
                  @method('delete')
                    <a  class="btn btn-primary btn-sm" href="{{route('documentos.show',$documento->id)}}">Ver</a>  
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
     $('#documentos').DataTable();
    } );
</script>
@stop
