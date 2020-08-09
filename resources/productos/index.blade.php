@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Productos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE PRODUCTOS</h3>     
                <button type="button" class="btn btn-primary waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-newspaper"></i> CREAR 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-productos')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('productos.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-producto')
@include('modals.edit-producto')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Producto.js') }}"></script>
@endsection