@if($crear)

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
</div>   
<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Descripción"/>
</div>               

              
@endif

@if($editar)
<input type="hidden" id="id" name="id">

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>   
<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion_e" class="form-control" required placeholder="Descripción"/>
</div>     
@endif