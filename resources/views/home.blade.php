@extends('theme.main', ['tabla'=>false])
@section('titulo')
    PLATAFORMA DE PAGOS WEB
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-shopping-bag"></i> CLIENTES</h6>
                        <h3 class="mb-3 mt-0">{{ $clientes }}</h3>
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
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-university"></i> PRESTAMOS</h6>
                        <h3 class="mb-3 mt-0">{{ $prestamos }}</h3>
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
    {{-- 
         --}}
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

    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-clipboard"></i> Total Cobros del Día</h6>
                        <h3 class="mb-3 mt-0">$ {{ number_format($pagosDia, 0) }}</h3>
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
</div>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <div class="text-white">
                        <h6 class="text-uppercase mt-0 text-white-50"><i class="fa fa-clipboard"></i> Meta del Día</h6>
                        <h3 class="mb-3 mt-0">$ {{ number_format($meta, 0) }}</h3>
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
</div>

@endsection
@section('scripts')

@endsection
