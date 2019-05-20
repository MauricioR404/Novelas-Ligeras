@extends('layouts.app')

@section('content')

  <div class="novel">
        <div class="container-fluid">
            <div class="row centrar">
                <div class="col-10">
                    <img src="{{ asset('img/novelas')}}/{{ $novela->imagen }}" class="img-fluid d-md-none d-block">
                </div>
                <div class="col-10 elemento-uno">
                    <img src="{{ asset('img/novelas')}}/{{ $novela->imagen }}" class="img-fluid d-none d-md-block">
                    <div class="conten">
                        <h1>{{ $novela->nombre }}</h1>
                        <ul class="contenido">
                            <li>
                                {{ $capUltimo[0]->numCapitulo }} Capitulos
                            </li>
                            <li>
                                6M Views
                            </li>
                        </ul>
                        <p>
                            {{ $novela->autor }}
                        </p>
                        <p>Generos: {{ $novela->generos }}</p>
                        <p>Titulos {{ $novela->nombre }}</p>
                        <p>Ultimo Capitulo: {{ $capUltimo[0]->numCapitulo }} hace {{ \Carbon\Carbon::parse($capUltimo[0]->created_at)->DiffForHumans() }}</p>

                        <ul class="opciones">
                            <li>
                                <a href="{{ route('capitulo.show', ['novel' => $novela->id, 'name' => Str::slug($novela->nombre,'-'), 'id' => 'capitulo-'. 1]) }}" class="leer">Leer</a>
                            </li>
                            <li>
                                @if($favorita)
                                    <a href="{{ route('favoritas.eliminar', $novela->id) }}" class="agregar">Eliminar</a>
                                @else
                                    <a href="{{ route('favoritas.agregar', $novela->id) }}" class="agregar">Agregar</a>
                                @endif
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="informacion">
        <div class="container-fluid">
            <div class="row centrar">

                <div class="col-10 elemento-uno">
                    <p class="titulo">Descripcion</p>
                    <p>
                        {{ $novela->descripcion }}
                    </p>
                </div>
                <!--elemento-uno-->

                <?php $variable = 0 ?>
                <div class="col-10 elemento-dos">
                    <p class="titulo">Capitulos</p>
                    	@foreach($capitulos as $capitulo)
                            @if($contador === 1)
                                <?php $variable++; ?>
                            <div class="accordion" id="accordionExample-{{ $variable }}">
                                <div class="card">
                                    <div class="card-header " id="headingTwo-{{ $variable }}">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo-{{ $variable }}" aria-expanded="false" aria-controls="collapseTwo-{{ $variable }}">
                                          Libro {{ $variable }}
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseTwo-{{ $variable }}" class="collapse" aria-labelledby="headingTwo-{{ $variable }}" data-parent="#accordionExample-{{ $variable }}">
                                      <div class="card-body">
                            @endif
                             @if($contador <= 10)
    	                        <li>
    	                            <a href="{{ route('capitulo.show', ['novel' => $novela->id, 'name' => Str::slug($novela->nombre,'-'), 'id' => 'capitulo-'.$capitulo->id]) }}">Capitulo {{ $capitulo->numCapitulo }}: {{ $capitulo->nombre }}</a>
    	                        </li>
                                <?php $contador++ ?>
                             @endif
                             @if($contador === 10)
                             <br>
                                <?php $contador = 1;?>
                             @endif
                             @if($contador === 1)
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            @endif
                        @endforeach
                </div> <!-- elemento-dos-->
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 elemento-tres my-3 mb-5">
                    <div class="container-fluid">
                        <div class="row centrar">
                            <div class="col-11 col-sm-12 px-sm-0">
                                <h2 class="py-2">Recomendaciones</h2>
                                <div class="row">
                                    @foreach($novelas as $novela)
                                        <div class="col-6 col-md-2">
                                            <a href="{{ route('novela.show', ['id' => $novela->id, 'nombre' => Str::slug($novela->nombre, '-')]) }}">
                                                <img src="{{ asset('img/novelas')}}/{{ $novela->imagen }}" class="img-fluid">
                                                <strong>{{$novela->nombre }}</strong>
                                            </a>
                                        </div><!-- col-2 -->
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


@endsection
