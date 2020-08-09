<div id="modalEdit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header" style="background-image: url('{{ asset('theme/agroxa/assets/images/modaleditar.png')}}'); background-repeat: no-repeat;" >
                <h5 class="modal-title mt-0" id="myLargeModalLabel"><img src="{{ asset('theme/agroxa/assets/images/editar.png')}}" height="64px" /> Actualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('theme/agroxa/assets/images/cerar2.png')}}" /></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" action="{{ route('productobodegas.update', 'productobodega') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @include('form.productobodega', ['crear'=>false, 'editar'=>true])                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info waves-effect waves-light">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cerrar</button>
            </form> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->