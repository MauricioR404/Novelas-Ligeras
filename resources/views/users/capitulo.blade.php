@extends('layouts.app')

@section('content')

<div class="capitulo">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8 elemento-uno px-5" id="capituloNext">
	            <h1 class="py-4">Chapter {{ $capitulo->numCapitulo }}: {{ $capitulo->nombre }}</h1>

	            <pre>
	            	{{ $capitulo->contenido }}
	            </pre>
	        </div>
	        <div class="col-md-8 px-5 py-3 elemento-cuatro d-flex justify-content-between">
	        	@if($previous)
	        		<a href="{{ route('capitulo.show', ['novel' => $novel, 'name' => $name, 'id' => 'capitulo-'.$previous]) }}"class="botones">Capitulo Anterior</a>
	        	@else
	        		<div class="col-8 col-12 py-3 elemento-cuatro d-flex justify-content-end">
	        	@endif

				@if($next)
	        		<a href="{{ route('capitulo.show', ['novel' => $novel, 'name' => $name, 'id' => 'capitulo-'.$next]) }}" class="botones">Capitulo Siguiente</a>
	        	@endif
	        </div>
	    </div>
	</div>
</div>

@endsection