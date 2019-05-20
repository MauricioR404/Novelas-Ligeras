@extends('admin.layouts.app')

@section('page', 'Permisos')

@section('content')

	<div class="container">
		<div class="row">
				<div class="col-sm-12">
					<a href="{{route('permission.create')}}" class="btn btn-outline-success mb-4">
						<i class="fas fa-plus-circle"></i>Agrear Nuevo permiso</a>
				</div>

				<div class="col-sm-12 table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Nombre</th>
								<th scope="col">Editar</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@forelse($permissions as $permission)
								<tr>
									<th scope="row">{{ $permission->id }}</th>
									<th scope="row">{{ $permission->description }}</th>
									<th scope="row">
										<a href="{{route('permission.edit', $permission->id )}}" class="btn btn-outline-primary"><i class="far fa-edit"></i>Editar</a>
									</th>
									<th class="row">
										<button class="btn btn-outline-danger" type="submit" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i>Eliminar</button>
										<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        ¿Estas seguro que deseas elimar este elemento?, No podras recuperarlo.
										      </div>
										      <div class="modal-footer">
										        <form action="{{ route('permission.destroy', $permission->id )}}" method="POST">
													@csrf
													<input type="hidden" name="_method" value="PATCH">
													<button class="btn btn-danger pull-right" type="submit"><i class="fas fa-trash"></i>Eliminar</button>
												</form>
										      </div>
										    </div>
										  </div>
										</div>
									</th>
								</tr>

							@empty
								<div class="container">
							        <div class="alert alert-warning mb-5" role="alert">
							            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
							            <strong>¡Antencion!</strong> No tienes roles
							        </div>
							    </div>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="col-md-8 ">
	            <div class="clearfix d-flex justify-content-end">
	                {{$permissions->links()}}
	            </div>
        </div>
		</div>
	</div>

@endsection