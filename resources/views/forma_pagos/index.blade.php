@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Formas de Pago
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO FORMAS DE PAGO</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Agregar 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-forma_pagos')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('forma_pagos.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-forma_pago')
@include('modals.edit-forma_pago')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/FormaPago.js') }}"></script>
@endsection