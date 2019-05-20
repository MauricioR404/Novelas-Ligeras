@extends('admin.layouts.app')

@section('page', 'Crear nuevo rol')

@section('content')

	<form class="was-validated" action="{{ route('role.store') }}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-row">
			<div class="col-sm-6 mb-3">
				<label>Nombre del rol</label>
				<input type="text" name="name" class="form-control is-valid" id="RoleName" placeholder="Nombre del rol" required>
				<div class="invalid-feedback">¡Debes agregar un nombre!</div>
			</div>
			<div class="col-sm-6 mb-3">
				<label class="ml-3">¡Ten cuidado con los permisos que otorgas!</label>
				<div class="form-group">
					<ul>
						<div class="col-auto my-1">
							<div class="custom-control custom-checkbox mr-sm-2">
								@foreach($permissions as $permission)
									<li>
										<input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $permission->id }}" value="{{ $permission->id}}">
										<label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->description }}</label>
									</li>
								@endforeach
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>

		<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i>Agregar</button>
	</form>

@endsection