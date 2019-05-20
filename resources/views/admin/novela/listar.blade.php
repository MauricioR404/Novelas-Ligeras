@extends('admin.layouts.app')

@section('page', 'Novelas')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<a href="{{route('novela.crear')}}" class="btn btn-outline-success mb-4">
						<i class="fas fa-plus-circle"></i>Agrear Nuevo rol</a>
				</div>
				<div class="col-sm-12 table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Nombre</th>
								<th scope="col">Traductor</th>
								<th scope="col">editor</th>
								<th scope="col">Editar</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@forelse($novelas as $novela)
								<tr>
									<th scope="row">
										{{-- <img src="{{ asset('img/novelas') }}/{{ $novela->imagen }}" style="width: 50px;">--}}
										<img src="{{ route('novela.imagen', ['filename' => $novela->imagen]) }}" class="img-fluid" style="width: 50px;">
									</th>
									<th scope="row">{{ $novela->nombre }}</th>
									<th scope="row">{{ $novela->traductor}}</th>
									<th scope="row">{{  $novela->editor }}</th>
									<th scope="row">
										<a class="btn btn-primary pull-right" href="{{ route('novela.editar', $novela->id) }}">
											<i class="far fa-edit"></i>Editar
										</a>
									</th>
									<th class="row">
										<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#deletemodal-{{$novela->id}}"><i class="fas fa-trash"></i>Eliminar</button>

										<div class="modal fade" id="deletemodal-{{$novela->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
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
										        <form action="{{ route('novela.eliminar', $novela->id )}}" method="POST">
													@csrf
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
							            <strong>¡Antencion!</strong> No tienes novelaos
							        </div>
							    </div>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="col-md-12 ">
		            <div class="clearfix d-flex justify-content-end">
		                {{$novelas->links()}}
		            </div>
		        </div>
		</div>
	</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript">
	  new Chart(document.getElementById("line-chart"), {
	    type: 'line',
	    data: {
	      labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
	      datasets: [{
	          data: [86,114,106,106,107,111,133,221,783,2478],
	          label: "África",
	          borderColor: "#3e95cd",
	          fill: false
	        }, {
	          data: [282,350,411,502,635,809,947,1402,3700,5267],
	          label: "Asia",
	          borderColor: "#8e5ea2",
	          fill: false
	        }, {
	          data: [168,170,178,190,203,276,408,547,675,734],
	          label: "Europa",
	          borderColor: "#3cba9f",
	          fill: false
	        }, {
	          data: [40,20,10,16,24,38,74,167,508,784],
	          label: "Latino América",
	          borderColor: "#e8c3b9",
	          fill: false
	        }, {
	          data: [6,3,2,2,7,26,82,172,312,433],
	          label: "Norte América",
	          borderColor: "#c45850",
	          fill: false
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: true,
	        text: 'Tráfico obtenido en el sitio web'
	      }
	    }
	  });
	</script>

	<script type="text/javascript">
	        new Chart(document.getElementById("pie-chart"), {
	      type: 'pie',
	      data: {
	        labels: ["Chrome", "Firefox", "Ópera", "Safari", "Otros"],
	        datasets: [{
	          label: "Navegadores utilizados por los usuarios",
	          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
	          data: [3478,2267,1234,1984,433]
	        }]
	      },
	      options: {
	        title: {
	          display: true,
	          text: 'Navegadores utilizados por los usuarios'
	        }
	      }
	  });
	</script>
@endsection