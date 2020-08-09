<div id="BuscarCalculo" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title mt-0" id="myLargeModalLabel"><img src="{{ asset('theme/agroxa/assets/images/editar.png')}}" height="64px" /> Consulta de Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('theme/agroxa/assets/images/cerar2.png')}}" /></button>
            </div>
            <div class="modal-body">
                <form id="form_buscar" action="{{ route('buscar.calculos') }}" method="get">
                    @csrf
                   
                    <div class="form-group">
                        <label>Jornada <label class="text-danger">(*)</label></label>
                        <div>
                            <select name="jornada_id" id="jornada_id" class="form-control">
                                @foreach ($jornadas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fecha <label class="text-danger">(*)</label></label>
                        <div>
                            <input type="text" name="daterange"  class="form-control" />
                            <input type="hidden" name="inicio" id="inicio">
                            <input type="hidden" name="final" id="final">
                        </div>
                    </div>
                    
                 
            </div>
            <div class="modal-footer">
                <button type="button" id="buscar" class="btn btn-outline-info waves-effect waves-light">
                    <i class="fa fa-search"></i> Buscar
                </button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cerrar</button>
            </form> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->