@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Descripción</label>
    <div>
        <textarea id="descripcion" required class="form-control" rows="2" name="descripcion"></textarea>
    </div>
</div>  

<div class="form-group">
    <label>Dirección</label>
    <div>
        <textarea id="direccion" required class="form-control" rows="2" name="direccion"></textarea>
    </div>
</div>   

<div class="form-group">
    <label>Contacto</label>
    <div>
        <textarea id="contacto" required class="form-control" rows="2" name="contacto"></textarea>
    </div>
</div>       

<div class="form-group">
    <label>Municipio</label>
    <div>
        <select name="municipio_id" id="municipio_id" class="form-control">
            @foreach ($municipios as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  
@endif

@if($editar)
<input type="hidden" id="id" name="id">

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Descripción</label>
    <div>
        <textarea id="descripcion_e" required class="form-control" rows="2" name="descripcion"></textarea>
    </div>
</div>  

<div class="form-group">
    <label>Dirección</label>
    <div>
        <textarea id="direccion_e" required class="form-control" rows="2" name="direccion"></textarea>
    </div>
</div>   

<div class="form-group">
    <label>Contacto</label>
    <div>
        <textarea id="contacto_e" required class="form-control" rows="2" name="contacto"></textarea>
    </div>
</div>       

<div class="form-group">
    <label>Municipio</label>
    <div>
        <select name="municipio_id" id="municipio_id" class="form-control">
            @foreach ($municipios as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div> 
@endif