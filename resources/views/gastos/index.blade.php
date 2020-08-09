@extends('theme.main', ['tabla'=>true])
@section('estilos')
<link href="{{ asset('theme/agroxa/assets/css/evidencia.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('titulo')
    Gastos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE GASTOS</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Agregar
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-gastos')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

<form id="form_hidden" style="display:none" action="{{route('gastos.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-gasto')
@include('modals.edit-gasto')

@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Evidencia.js') }}"></script>
<script src="{{ asset('js/Gasto.js') }}"></script>
@endsection