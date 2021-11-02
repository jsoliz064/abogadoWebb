<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
        @foreach ($expedientes as $expediente)
        <section class="section_seme">  
            <div class="pack_container container grid">
                <div class="pack_content">
                    <div class="card-header">
                        <h3>Codigo: {{$expediente->codigo}}</h3>
                    </div>

                    <div class="card-header">
                        <p>Nombre del proceso: {{$expediente->nombre}}</p>
                        <p>Materia: {{$expediente->materia}}</p>

                        <span class="button button--flex button--small button--link semestres_button">
                            <a href="{{route('expedientes.docs',$expediente->id)}}" class="button--link">Ver documentos</a>             
                            <i class="uil uil-arrow-from-right button_icon"></i>  
                        </span>
                    </div>
 
                </div>
            </div>
        </section>
        @endforeach
</body>
