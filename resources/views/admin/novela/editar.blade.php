@extends('admin.layouts.app')

@section('page', 'Crear Novela')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form class="row" method="POST" action="{{ route('novela.actualizar', $novela->id) }}" enctype="multipart/form-data">
					@csrf
				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Nombre</label>
				    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="formGroupExampleInput" placeholder="Kingom's blooline" name="nombre" value="{{ $novela->nombre }}">
				    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Autor</label>
				    <input type="text" class="form-control @error('autor') is-invalid @enderror" id="formGroupExampleInput" placeholder="Ling Dong" name="autor" value="{{ $novela->autor }}">
				    @error('autor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-12">
				    <label for="formGroupExampleInput2">Generos</label>
				    <input type="text" class="form-control @error('generos') is-invalid @enderror" id="formGroupExampleInput2" placeholder="accion, romance, ficcion..." name="generos" value="{{ $novela->generos  }}">
				    @error('generos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Traductor</label>
				    <input type="text" class="form-control @error('traductor') is-invalid @enderror" id="formGroupExampleInput" placeholder="Ling Dong" name="traductor" value="{{ $novela->traductor  }}">
				    @error('traductor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				  <div class="form-group col-6">
				    <label for="formGroupExampleInput">Editor</label>
				    <input type="text" class="form-control @error('editor') is-invalid @enderror" id="formGroupExampleInput" placeholder="Ling Dong" name="editor" value="{{ $novela->editor }}">
				    @error('editor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>



				  <div class="form-group col-12">
				    <label for="formGroupExampleInput2">Descripcion</label>
				    <textarea type="text" class="form-control @error('descripcion') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Nuestra novela empieza con la historia de..." name="descripcion"  rows="4" value="{{ old('descripcion') }}">{{$novela->descripcion}}</textarea>
				    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>

				   <div class="form-group col-12">
				    <label for="exampleFormControlFile1">Imagen</label>
				    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
				    <img src="{{ route('novela.imagen', ['id' => $novela->imagen]) }}" style="width: 80px;" class="pt-2">
				    @error('imagen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				  </div>
				  <div class="form-group col-12">
				  	<button class="btn btn-info" type="submit">Actualizar</button>
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