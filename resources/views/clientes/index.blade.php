@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Clientes
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE CLIENTES</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Agregar
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-clientes')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('clientes.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-cliente')
@include('modals.edit-cliente')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Cliente.js') }}"></script>
@endsection