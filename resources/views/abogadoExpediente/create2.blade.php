@extends('adminlte::page')

@section('title', 'Registrar Expedientes')

@section('content_header')
    <h1>Abogados Implicados</h1>
@stop

@section('content')

<body>
    <div class="container">
        <div class="wrapper">
          <ul class="steps">
            <li >Paso 1</li>
            <li class="is-active">Paso 2</li>
            <li >Paso 3</li>
          </ul>
          {{--  <form class="form-wrapper" action="{{route('expedientes.create2',$expediente)}}" novalidate>  --}}
            <fieldset class="section is-active">
                
                <div class="col-4">
                    <h5>Agregar:</h5>
                </div>
                    <form method="post" class="form-wrapper" action="{{route('abogadoexpedientes.store')}}" novalidate>
                        @csrf
                        <div class="row row justify-content-center">
                         
                            <div class="col-1">
                                <input type="hidden"  name="id_expediente" value=" {{$expediente}}" class="focus border-primary  form-control" >
                            </div>  
                            <div class="col-4"> 
                                <select name = "id_abogado" id="id_abogado" class="form-control" onchange="habilitar()" >
                                    <option value="nulo">Seleccione el abogado</option>
                                        @foreach ($abogados as $abogado)
                                            <option value="{{$abogado->id}}">
                                                {{$abogado->nombre}}
                                            </option>
                                        @endforeach
                                </select>
                                @error('id_abogado')
                                    <p>DEBE SELECCIONAR UN ABOGADO</p>
                                @enderror
                            </div>
                            {{-- BUTTON AñADIR --}}
                            <div class="col-3 align-items-center">
                                <button  class="btn btn-primary btn-sm" type="submit">Añadir</button>
                            </div>
                        </div>
                    </form> 

                <div class="row row justify-content-center m-2">
                    <h3>Abogados</h3>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($abogadosexpedientes as $abogadosexpediente)
                                <tr>
                                    <td>{{$abogadosexpediente->id}}</td>
                                    <td>{{$abogadosexpediente->nombre}}</td>
                                    <td>
                                        <form action="{{route('abogadoexpedientes.destroy',$abogadosexpediente->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                            value="Borrar"><i class="fas fa-times"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table> 
                </div>
            {{--    <div class="row justify-content-end">
                    <form action="{{route('expedientes.destroy', $expediente)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" 
                        value="Borrar">Eliminar Expediente</button> 
                    </form>
                </div>   --}}
                <input class="submit button" type="submit" value="Siguiente">
            </fieldset>
        {{--  </form>  --}}

        </div>
      </div>      
</body>

@stop

@section('css')
    <link rel="stylesheet" href="../../css/reg.css">
@stop

@section('js')

@stop