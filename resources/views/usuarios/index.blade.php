@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Usuarios
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE USUARIOS</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-plus-circle"></i> Agregar
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-usuarios')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('usuarios.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-empleado')
@include('modals.edit-empleado')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Empleado.js') }}"></script>
@endsection