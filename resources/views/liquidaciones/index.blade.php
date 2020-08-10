@extends('theme.main', ['tabla'=>true])
@section('titulo')
    APERTURA DE DÍA
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE LIQUIDACIONES</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Abrir Día
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-liquidaciones')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('liquidacion-dias.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-dia')
@include('modals.edit-dia')
@include('modals.detalles')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Liquidacion.js') }}"></script>
@endsection