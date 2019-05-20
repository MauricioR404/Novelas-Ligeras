@extends('admin.layouts.app')

@section('page', 'Editar Capitulo')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form class="row" method="POST" action="{{ route('capitulo.actualizar', $capitulo->id) }}" >
					@csrf
				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Nombre</label>
				    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="formGroupExampleInput" placeholder="El despertar de la bestia" name="nombre" value="{{ $capitulo->nombre }}">
				    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Traductor</label>
				    <input type="text" class="form-control @error('traductor') is-invalid @enderror" id="formGroupExampleInput" placeholder="Dong" name="traductor" value="{{ $capitulo->traductor }}">
				    @error('traductor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				   <div class="form-group col-12">
				    <label for="formGroupExampleInput">Novela</label>
				    <select class="form-control @error('novela_id') is-invalid @enderror" id="exampleFormControlSelect2" name="novela_id">
				    	@foreach($novelas as $key => $novela)
				    		@if($key === $capitulo->novela_id)
								<option selected value="{{$key}}">{{ $novela }}</option>
							@else
								<option value="{{$key}}">{{ $novela }}</option>
							@endif
						@endforeach

				    </select>
				    @error('novela_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>


				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Numero del capitulo</label>
				    <input type="text" class="form-control @error('numCapitulo') is-invalid @enderror" id="formGroupExampleInput" placeholder="123" name="numCapitulo" value="{{ $capitulo->numCapitulo }}">
				    @error('numCapitulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Precio</label>
				    <input type="text" class="form-control @error('precio') is-invalid @enderror" id="formGroupExampleInput" placeholder="15" name="precio" value="{{ $capitulo->precio }}">
				    @error('precio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-12">
				    <label for="formGroupExampleInput2">Contenido</label>
				    <textarea type="text" class="form-control @error('contenido') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Era un dia muy caluroso..." name="contenido"  rows="10">{{ $capitulo->contenido }}</textarea>
				    @error('contenido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-12">
				  	<button class="btn btn-info" type="submit">Crear</button>
				  </div>
				</form>
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