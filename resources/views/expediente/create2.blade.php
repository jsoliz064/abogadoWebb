@extends('adminlte::page')

@section('title', 'Registrar Expedientes')

@section('content_header')
    <h1>Registrar Expediente</h1>
@stop

@section('content')

<body>
    <div class="container">
        <div class="wrapper">
          <ul class="steps">
            <li class="is-active">Paso 1</li>
            <li >Paso 2</li>
            <li >Paso 3</li>
          </ul>
          <form method="post" class="form-wrapper" action="{{route('expedientes.store')}}" novalidate>
            
            <fieldset class="section is-active">
                @csrf
              <h3>Your Details</h3>
              <input type="text" name="codigo" id="name" placeholder="Codigo">
              <input type="text" name="nombre" id="email" placeholder="Nombre del Procedimiento">
              <input type="text" name="materia" id="email" placeholder="Materia">
              <input class="submit button" type="submit" value="Siguiente">
            </fieldset>

           {{--   <fieldset class="section">
              <h3>Account Type</h3>
              <h5>Materia:</h5>
            <select name = "id_materia" id="id_materia" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione la materia </option>
                    @foreach ($abogados as $abogado)
                        <option value="{{$abogado->id}}">
                            {{$abogado->nombre}}
                        </option>
                    @endforeach
            </select>
           
            @error('id_materia')
                <p>DEBE INGRESAR BIEN LA MATERIA</p>
            @enderror

              <div class="button">Next</div>
            </fieldset>  --}}
            
          </form>
        </div>
      </div>      
</body>

@stop

@section('css')
    <link rel="stylesheet" href="../css/reg.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/reg.js"></script>
@stop