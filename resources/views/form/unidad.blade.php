@if($crear)
<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Prefijo</label>
    <input type="text" name="prefijo" id="prefijo" class="form-control" required placeholder="Nombre"/>
</div>                 
@endif

@if($editar)
<input type="hidden" id="id" name="id">

<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion_e" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Prefijo</label>
    <input type="text" name="prefijo" id="prefijo_e" class="form-control" required placeholder="Nombre"/>
</div>  
@endif