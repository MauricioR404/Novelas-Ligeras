@extends('admin.layouts.app')

@section('page', 'Crear nuevo rol')

@section('content')

	<form class="was-validated" action="{{ route('permission.store') }}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-row">
			<div class="col-sm-6 mb-3">
				<label>Nombre del permiso (Ej:role.create)</label>
				<input type="text" name="name" class="form-control is-valid" id="RoleName" placeholder="role.create" required>
				<div class="invalid-feedback">¡Debes agregar un nombre!</div>
			</div>
			<div class="col-sm-6 mb-3">
				<label>Descripcion del permiso</label>
				<input type="text" name="description" class="form-control is-valid" id="RoleName" placeholder="Un permiso para crear archivos..." required>
				<div class="invalid-feedback">¡Debes agregar un descripcion!</div>
			</div>
		</div>

		<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i>Agregar</button>
	</form>

@endsection