@extends('adminlte::page')

@section('title', 'Procuradores')

@section('content_header')
  <h1>LISTA DE PROCURADORES</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
          <a class="btn btn-primary btb-sm" href="{{route('procuradors.create')}}">Registrar Procurador</a>    
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="procuradors" >
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

          @foreach ($procuradors as $procurador)
            <tr>
              <td>{{$procurador->id}}</td>
              <td>{{$procurador->nombre}}</td>
              <td>{{$procurador->telefono}}</td>
              <td>{{$procurador->email}}</td>
              <td >
                <form  action="{{route('procuradors.destroy',$procurador)}}" method="post">
                  @csrf
                  @method('delete')
                    <a  class="btn btn-primary btn-sm" href="{{route('procuradors.show',$procurador)}}">Ver</a>  
                    <a class="btn btn-info btn-sm" href="{{route('procuradors.edit',$procurador)}}">Editar</a>                 
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
     $('#procuradors').DataTable();
    } );
</script>
@stop
