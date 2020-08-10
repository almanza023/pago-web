<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Valor</th>            
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($liquidaciones as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->nombres.' '.$item->user->apellidos }}</td>
                <td>{{ $item->fecha }}</td>
                <td>$ {{ number_format($item->base, 0) }}</td>             
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-primary sm" style="color: #fff" ><i class="fa fa-check"></i> ABIERTO</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" ><i class="fa fa-ban"></i> CERRADO</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu"> 
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}
                                data-toggle="modal" data-href="{{route('liquidacion-dias.show', $item->id)}}""  
                               data-target="#modalDetalles"><i class="fa fa-eye"></i> Ver Detalles</a>
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-base="{{$item->base}}" data-user="{{$item->user_id}}"
                                
                                data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>