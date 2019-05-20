@extends('layouts.app')

@section('content')

<div class="container mt-4 biblioteca">
	<h2>Biblioteca</h2>
	<div class="row">
		 @forelse($favoritas as $favorita)
	    	<div class="col-6 col-md-2">
	    		<a href="{{ route('novela.show', ['id' => $favorita->novela->id, 'nombre' => Str::slug($favorita->novela->nombre, '-')]) }}">
		            <img src="{{ asset('img/novelas') }}/{{ $favorita->novela->imagen }}" class="img-fluid">
		            <strong>{{ $favorita->novela->nombre }}</strong>
	        	</a>
	        </div>
	     @empty
	     <div class="col-10 elemento-dos">
	     	<h2>No tienes ninguna novela agregada.</h2>
	     </div>
		@endforelse
	</div>
</div>
@endsection