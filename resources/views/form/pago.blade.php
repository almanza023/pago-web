@if($crear)

<input type="hidden" id="prestamo_id" name="prestamo_id">

<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>

</div> 

<div class="form-group">
    <label>Liquidar Cartulina (*)</label>
    <select name="liquidar" id="liquidar" class="form-control">
        <option value="0">NO</option>
        <option value="1">SI</option>
    </select>
</div> 
<div class="form-group">
    <label>Valor (*)</label>
    <input type="number" name="valor" id="valor" min="0" class="form-control" required />
</div>    



@endif

@if($editar)
<input type="hidden" id="id" name="id">

<input type="hidden" id="prestamo_id_e" name="prestamo_id">

<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha_e" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>

</div> 
<div class="form-group">
    <label>Valor (*)</label>
    <input type="number" name="valor" id="valor_e" min="0" class="form-control" required />
</div>   
@endif