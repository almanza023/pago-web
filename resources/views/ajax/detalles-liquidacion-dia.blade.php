<div class="table-responsive">
<table class="table table-hover">
   
        <tr>
            <th>Base</th>
            <td> $ {{ number_format($liquidacion->base) }}</td>
            <th>Pagos</th>
            <td> $ {{ number_format($liquidacion->pagos) }}</td>
            <th> <td> $ {{ number_format($liquidacion->ingresos) }}</td></th>
        </tr>
        <tr>
            <th>Préstamos</th>
            <td> $ {{ number_format($liquidacion->prestamos) }}</td>
            <th>Gastos</th>
            <td> $ {{ number_format($liquidacion->gastos) }}</td>
            <th></th>
            <td> $ {{ number_format($liquidacion->egresos) }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td> $ {{ number_format($liquidacion->total) }}</td>
        </tr>
    
    
</table>
</div>