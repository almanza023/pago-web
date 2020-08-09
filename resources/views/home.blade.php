@extends('theme.main', ['tabla'=>false])
@section('titulo')
    PLATAFORMA DE GESTIÓN
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-shopping-bag"></i> Productos</h6>
                        <h3 class="mb-3 mt-0">{{ $productos }}</h3>
                        <div class="">
                            <span class="badge badge-light text-info"> </span> <span class="ml-2"></span>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-university"></i> INSTITUCIONES</h6>
                        <h3 class="mb-3 mt-0">{{ $instituciones }}</h3>
                        <div class="">
                            <span class="badge badge-light text-danger">  </span> <span class="ml-2"></span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-clipboard"></i> Menús</h6>
                        <h3 class="mb-3 mt-0">{{ $menus }}</h3>
                        <div class="">
                            <span class="badge badge-light text-primary">  </span> <span class="ml-2"></span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-user"></i> Usuarios</h6>
                        <h3 class="mb-3 mt-0">{{ $usuarios }}</h3>
                        <div class="">
                            <span class="badge badge-light text-info">  </span> <span class="ml-2"></span>
                        </div>
                    </div>
                    <div class="mini-stat-icon">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">ESTADISTICAS</h4>
    <div id="contadores">
        <div  style="width: 400px; height: 200px;"></div>
       </div>
    </div>
        </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["CONCEPTO", "CANTIDAD", { role: "style" } ],
      ["PRODUCTOS", <?php echo $productos;?>, "##E74C3C"],
      ["INSTITUCIONES", <?php echo $instituciones;?>, "#b87333"]
     
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "ESTADISTICAS",
      width: 380,
      height: 200,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("contadores"));
    chart.draw(view, options);
}


</script>
@endsection
