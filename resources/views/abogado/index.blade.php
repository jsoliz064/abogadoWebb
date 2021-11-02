@extends('adminlte::page')

@section('title', 'Abogados')

@section('content_header')
  <h1>LISTA DE ABOGADOS</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      @can('abogados.create')
          <a class="btn btn-primary btb-sm" href="{{route('abogados.create')}}">Registrar Abogado</a>  
      @endcan  
    </div>
  </div>

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
                <form  action="{{route('abogados.destroy',$abogado)}}" method="post">
                  @csrf
                  @method('delete')
                    <a  class="btn btn-primary btn-sm" href="{{route('abogados.show',$abogado)}}">Ver</a>  
                    @can('abpgados.show') 
                      <a class="btn btn-info btn-sm" href="{{route('abogados.edit',$abogado)}}">Editar</a>    
                    @endcan   
                    @can('abpgados.destroy')          
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                    value="Borrar">Eliminar</button>
                    @endcan 
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
     $('#abogados').DataTable();
    } );
</script>
@stop
