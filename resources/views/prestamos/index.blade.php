@extends('theme.main', ['tabla'=>false])
@section('titulo')
    Prestamos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE PRESTAMOS</h3>   
                
                <a href="{{ route('prestamos.create') }}" class="btn btn-outline-primary waves-effect waves-light">
                    <i class="fa fa-plus-circle"></i> Crear Nuevo</a>
                
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Agregar
                </button>

                <a href="{{ route('empleados.create') }}" class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fa fa-search-plus"></i> Filtrar</a>
                </p>

               
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>


@endsection


@section('scripts')
<script>
    
</script>

@endsection