@if($crear)

<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" id="nombres" class="form-control" required placeholder="Nombres"/>
</div>   

<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos"/>
</div>  

<div class="form-group">
    <label>Documento</label>
    <input type="number" name="identificacion" id="identificacion" class="form-control" required />
</div> 

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="direccion" id="apellidos" class="form-control"  placeholder="Direccion"/>
</div> 

<div class="form-group">
    <label>Teléfono</label>
    <input type="number" name="telefono" id="telefono" class="form-control" required />
</div>

<div class="form-group">
    <label>Contraseña</label>
    <input type="password" name="password" id="password" min="5"  class="form-control" required />
</div>

@endif

@if($editar)
<input type="hidden" name="id" id="id" class="form-control" >
<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" id="nombres_e" class="form-control" required placeholder="Nombres"/>
</div>   

<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="apellidos" id="apellidos_e" class="form-control" required placeholder="Apellidos"/>
</div>  

<div class="form-group">
    <label>Documento</label>
    <input type="number" name="identificacion" id="identificacion_e" class="form-control" required />
</div> 

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="direccion" id="direccion_e" class="form-control"  placeholder="Direccion"/>
</div> 

<div class="form-group">
    <label>Teléfono</label>
    <input type="number" name="telefono" id="telefono_e" class="form-control" required />
</div>
@endif