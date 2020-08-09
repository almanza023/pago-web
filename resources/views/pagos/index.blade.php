@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Pagos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE PAGOS</h3>              
                

               <div id="id_table">
                @include('tablas.tb-prestamos-activos')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('pagos.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

@include('modals.create-pago')
@include('modals.detalles')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Pago.js') }}"></script>
@endsection