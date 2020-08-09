@extends('theme.main', ['tabla'=>true])
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
                
               

                <div id="id_table">
                    @include('tablas.tb-prestamos')
                   </div>

               
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('clientes.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.detalles')

@endsection


@section('scripts')
<script src="{{ asset('js/Prestamo_Index.js') }}"></script>

@endsection