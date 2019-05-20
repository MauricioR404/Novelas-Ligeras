@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div>


<section class="hero">

    </section>

<section class="favoritos">
    <div class="container-fluid">
        <div class="row centrar">
            <div class="col-10 elemento-uno">
                @auth
                    <h2 class="pt-4">Seguir Leyendo</h2>
                @endauth

                @guest
                    <h2 class="text-center">Al iniciar sesion puedes seguir a tus novelas favoritas</h2>
                @endguest
                <div class="row">
                    @foreach($favoritas as $favorita)
                        <div class="col-6 col-md-2">
                            <a href="{{ route('novela.show', ['id' => $favorita->id, 'nombre' => Str::slug($favorita->nombre, '-')]) }}">
                                <img src="{{ asset('img/novelas') }}/{{ $favorita->imagen }}" class="img-fluid">
                                <strong>{{ $favorita->nombre }}</strong>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="recomendaciones">
        <div class="container-fluid">
            <div class="row centrar">

                <div class="col-10 ">
                    <div class="row">
                        <div class="col-3 elemento-uno esconder">
                            <a href="{{ route('novela.show', ['id' => 10, 'nombre' => Str::slug('Perfect Secret Love', '-')]) }}">
                                <img src="img/novelas/Perfect-Secret-Love.jpg" class="img-fluid">
                                <strong>Perfect Secret Love</strong>

                                <span>Genero: Romance</span>

                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae nisi consectetur
                                    quos ut, rem molestiae! Nostrum minima dolorum, optio rerum labore mollitia sed officiis
                                    quas cum iusto omnis reprehenderit animi.</p>
                            </a>
                        </div>

                        <div class="col-md-9 col-12 elemento-dos">
                            <div class="row">
                                @foreach($novelas as $novela)
                                    <div class="col-6 col-md-3">
                                        <a href="{{ route('novela.show', ['id' => $novela->id, 'nombre' => Str::slug($novela->nombre, '-')]) }}">
                                            <img src="img/novelas/{{ $novela->imagen }}" class="img-fluid">
                                            <strong>{{ $novela->nombre }}</strong><br>
                                            <p>Ciencia Ficcion</p>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!--row secundario-->
                </div>

            </div>
            <!--row primario-->
        </div>
    </section>


    <section class="reciente">
        <div class="container-fluid">
            <div class="row centrar">
                <div class="col-10 elemento-uno table-responsive mt-2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Generos</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Lanzamiento</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Traductor</th>
                                <th scope="col">Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($capitulos as $capitulo)
                                <tr>
                                    <th scope="row" class="font-weight-normal">
                                        {{ Str::limit($capitulo->generos, 10) }}
                                    </th>
                                    <th scope="row" class="font-weight-normal">
                                        <a href="{{ route('capitulo.show', ['novel' => $capitulo->novela_id, 'name' => Str::slug($capitulo->NovNombre,'-'), 'id' => 'capitulo-'.$capitulo->id]) }}">
                                            {{ $capitulo->capNombre }}
                                        </a>
                                    </th>
                                    <th scope="row" class="font-weight-normal">
                                        <a href="{{ route('capitulo.show', ['novel' => $capitulo->novela_id, 'name' => Str::slug($capitulo->NovNombre,'-'), 'id' => 'capitulo-'.$capitulo->id]) }}">
                                            {{ $capitulo->numCapitulo }}
                                        </a>
                                    </th>
                                    <th scope="row" class="font-weight-normal">
                                        {{ $capitulo->autor }}
                                    </th>
                                    <th scope="row" class="font-weight-normal">
                                        {{ $capitulo->traductor }}
                                    </th>
                                    <th scope="col" class="font-weight-normal">
                                        {{ $capitulo->created_at->DiffForHumans() }}
                                    </th>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!--row-->
        </div>
    </section>

@endsection
