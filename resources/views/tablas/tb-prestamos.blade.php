<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Forma Pago</th>
            <th>Monto</th>
            <th>Interes</th>
            <th>N° Cuotas</th>
            <th>Valor Cuota</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($prestamos as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->cliente->nombres.' '. $item->cliente->apellidos}}</td>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->forma_pago->nombre }}</td>
                <td>$ {{ $item->monto }}</td>
                <td>{{ $item->interes }}</td>
                <td>{{ $item->numero_cuotas }}</td>
                <td>$ {{ $item->valor_cuotas }}</td>
                <td>$ {{ $item->total }}</td>
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-primary sm" style="color: #fff" onclick="changeEstado('{{ route('clientes.status', $item->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @endif
                    @if($item->estado==0)
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('clientes.status', $item->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                    @if($item->estado==2)
                    <button class="btn badge bg-warning sm" style="color: #fff" onclick=" "><i class="fa fa-ban"></i> Liquidado</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-prestamo_id="{{$item->id}} data-toggle="modal" data-href="{{route('prestamos.show', $item->id)}}""  
                                data-target="#modalDetalles"><i class="fa fa-calendar"></i> Calendario de Pagos</a>
                            <form class="delete-prestamo" action="{{ route('prestamos.destroy', $item->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item show-details"  >  <i class="fa fa-close"></i> </i> Eliminar </a>
                              </form> 
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>