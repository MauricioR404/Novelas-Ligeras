@extends('admin.layouts.app')

@section('page', 'Editar usuario')

@section('content')

	<form class="was-validated" action="{{ route('user.update', $user->id) }}" method="POST">
		@csrf
		@method('PATCH')

		<div class="form-row">
			<div class="col-sm-8 mb-3">
				<img src="{{ asset('img/novelas') }}">
			</div>

			<div class="col-sm-6 mb-3">
				<label>Nombre del rol</label>
				<input type="text" name="name" class="form-control is-valid" id="UserName" value="{{$user->name}}" required>
				<div class="invalid-feedback">¡No puedes dejar el espacio en blanco!</div>
			</div>

			<div class="col-sm-6 mb-3">
				<label>Nombre del rol</label>
				<input type="text" name="email" class="form-control is-valid" id="UserName" value="{{$user->email}}" required>
				<div class="invalid-feedback">¡No puedes dejar el espacio en blanco!</div>
			</div>

			<div class="col-sm-6 mb-3">
				<label class="ml-3">¡Ten cuidado con los permisos que otorgas!</label>
				<div class="form-group">
					<ul>
						<div class="col-auto my-1">
							<div class="custom-control custom-checkbox mr-sm-2">
								@foreach($roles as $role)
									<li>
										<input type="checkbox" name="roles[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id}}"
										@if($user->roles->contains($role)) checked
										@endif>

										<label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
									</li>
								@endforeach
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>

		<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i>Actualizar</button>
	</form>

@endsection