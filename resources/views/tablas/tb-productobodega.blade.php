<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Producto</th>
            <th>Bodega</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($productobodegas as $pbodega)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pbodega->producto->nombre }}</td>
                <td>{{ $pbodega->bodega->nombre }}</td>
                <td>{{ $pbodega->stock }}</td>
                <td>
                    @if($pbodega->estado)
                    <button class="btn badge bg-primary sm" style="color: #fff" onclick="changeEstado('{{ route('productobodegas.status', $pbodega->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('productobodegas.status', $pbodega->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$pbodega->id}}" data-producto_id="{{$pbodega->producto_id}}" data-bodega_id="{{$pbodega->bodega_id}}" data-stock="{{$pbodega->stock}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>