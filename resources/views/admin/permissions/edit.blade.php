@extends('admin.layouts.app')

@section('page', 'Editar el rol')

@section('content')

	<form class="was-validated" action="{{ route('permission.update', $permission->id) }}" method="POST">
		@csrf
		@method('PATCH')

		<div class="form-row">
			<div class="col-sm-6 mb-3">
				<label>Nombre del permiso (Ej:role.create)</label>
				<input type="text" name="name" class="form-control is-valid" id="RoleName" value="{{$permission->name}}" required>
				<div class="invalid-feedback">¡Debes agregar un nombre!</div>
			</div>
			<div class="col-sm-6 mb-3">
				<label>Descripcion del permiso</label>
				<input type="text" name="description" class="form-control is-valid" id="RoleName" value="{{ $permission->description }}" required>
				<div class="invalid-feedback">¡Debes agregar un descripcion!</div>
			</div>
		</div>

		<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i>Actualizar</button>
	</form>

@endsection