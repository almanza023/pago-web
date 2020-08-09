<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Descripcón</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($bodegas as $bodega)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bodega->nombre }}</td>
                <td>{{ $bodega->descripcion }}</td>
                <td>{{ $bodega->direccion }}</td>
                <td>{{ $bodega->contacto }}</td>
                <td>{{ $bodega->municipio->nombre }}</td>
                <td>
                    @if($bodega->estado)
                    <button class="btn badge bg-primary sm" style="color: #fff" onclick="changeEstado('{{ route('bodegas.status', $bodega->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('bodegas.status', $bodega->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$bodega->id}}" data-nombre="{{$bodega->nombre}}" data-descripcion="{{$bodega->descripcion}}" data-direccion="{{$bodega->direccion}}"  data-contacto="{{$bodega->contacto}}" data-municipio_id="{{$bodega->municipio_id}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>