<div id="ModalBodega" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"style="background-image: url('{{ asset('theme/agroxa/assets/images/fondomodal.png')}}'); background-repeat: no-repeat;" >
                <h5 class="modal-title mt-0" id="myLargeModalLabel"><img src="{{ asset('theme/agroxa/assets/images/registrar.png')}}" height="64px" /> Registro de Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('theme/agroxa/assets/images/cerrar1.png')}}" /></button>
            </div>
            <div class="modal-body">
            	<form id="form_create" action="{{ route('bodegas.store') }}" method="POST">
            		@csrf
            		@include('form.bodega', ['crear'=>true, 'editar'=>false])

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