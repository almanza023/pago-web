<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>N° Cuotas</th>
            <th>Valor Cuota</th>
            <th>Abonos</th>            
            <th>Restante</th>            
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($prestamos as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->cliente->nombres.' '. $item->cliente->apellidos}}</td>
                <td>{{ $item->fecha }}</td>               
                <td>$ {{ $item->total }}</td>            
                <td>{{ $item->numero_cuotas }}</td>
                <td>$ {{ $item->valor_cuotas }}</td>
                @php
                    $abonos=0;
                    $restante=0;
                @endphp
               @foreach ($item->pagos as $pago)
               @php
               $abonos+=$pago->valor;
               @endphp               
               @endforeach
               @php              
               $restante=$item->total - $abonos;
               @endphp
               <td>$ {{ $abonos }}</td>
               <td>$ {{ $restante }}</td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-prestamo_id="{{$item->id}}"  
                                data-target="#modalCreate"><i class="fa fa-edit"></i> Pagar</a>
                            
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>