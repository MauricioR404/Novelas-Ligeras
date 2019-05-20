@extends('admin.layouts.app')

@section('page', 'Panel Administrativo')

@section('content')

	<div class="panel panel-container container shadow-sm">
	      <div class="row">
		        <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
		          <div class="panel  panel-widget border-right">
		            <div class="row no-padding"><i class="fas fa-eye"></i>
		              <div class="large">120</div>
		              <div class="dashboard-small">Visitantes</div>
		            </div>
		          </div>
		        </div>
		        <div class="col-sm-6 col-md-3 col-lg-3 no-padding ">
		          <div class="panel panel-widget border-right">
		            <div class="row no-padding"><i class="fas fa-file-upload"></i></em>
		              <div class="large">96</div>
		              <div class="dashboard-small">Archivos</div>
		            </div>
		          </div>
		        </div>
		        <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
		          <div class="panel  panel-widget border-right">
		            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
		              <div class="large">13</div>
		              <div class="dashboard-small">Usuarios</div>
		            </div>
		          </div>
		        </div>
		        <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
		          <div class="panel  panel-widget ">
		            <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
		              <div class="large">25.2k</div>
		              <div class="dashboard-small">Páginas vistas</div>
		            </div>
		          </div>
		        </div>
	      </div><!--/.row-->
	    </div>

	    <div class="mt-5 row">
	      <div class="col-md-6 mt-5">
	        <canvas id="line-chart" width="100%" height="100%"></canvas>
	      </div>
	      <div class="col-md-6 mt-5">
	        <canvas id="pie-chart" width="100%"></canvas>
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