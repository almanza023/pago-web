<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cuotas as $item)
       <tr>
        <td>{{ $item->numero }}</td>
        <td>{{ $item->fecha }}</td>
        <td>$ {{ $item->valor }}</td>
       </tr>

            
        @empty
            <tr>
                <td colspan="2"><center>No Existen Datos</center></td>
            </tr>
        @endforelse

        <tr>
            <th>TOTAL</th>
            <td>$ {{ number_format($estado[0]->total, 0) }}</td>
        </tr>

        <tr>
            <th>ABONOS</th>
            <td>$ {{ number_format($estado[0]->abonos, 0) }}</td>
        </tr>

        <tr>
            <th>RESTANTE</th>
            <td>$ {{ number_format($estado[0]->restante , 0)}}</td>
        </tr>
       
    </tbody>
</table>
</div>