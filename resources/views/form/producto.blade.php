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
    <label>Categoria</label>
    <div>
        <select name="categoria_id" id="categoria_id" class="form-control">
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  

<div class="form-group">
    <label>Unidad de Medidad</label>
    <div>
        <select name="unidad_id" id="unidad_id" class="form-control">
            @foreach ($unidades as $item)
                <option value="{{ $item->id }}">{{ $item->descripcion }} - {{ $item->prefijo }} </option>$
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
    <label>Categoria</label>
    <div>
        <select name="categoria_id" id="categoria_id" class="form-control">
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  

<div class="form-group">
    <label>Unidad de Medidad</label>
    <div>
        <select name="unidad_id" id="unidad_id" class="form-control">
            @foreach ($unidades as $item)
                <option value="{{ $item->id }}">{{ $item->descripcion }} - {{ $item->prefijo }} </option>$
            @endforeach
        </select>
    </div>
</div> 
@endif