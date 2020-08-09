@if($crear)

<div class="form-group">
    <label>Producto</label>
    <div>
        <select name="producto_id" id="producto_id" class="form-control">
            @foreach ($productos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div> 
<div class="form-group">
    <label>Bodega</label>
    <div>
        <select name="bodega_id" id="bodega_id" class="form-control">
            @foreach ($bodegas as $bod)
                <option value="{{ $bod->id }}">{{ $bod->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>   
<div class="form-group">
    <label>Stock</label>
    <input type="number" name="stock" id="stock" class="form-control" />
</div>               

@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Producto</label>
    <div>
        <select name="producto_id" id="producto_id" class="form-control">
            @foreach ($productos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div> 
<div class="form-group">
    <label>Bodega</label>
    <div>
        <select name="bodega_id" id="bodega_id" class="form-control">
            @foreach ($bodegas as $bod)
                <option value="{{ $bod->id }}">{{ $bod->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>   
<div class="form-group">
    <label>Stock</label>
    <input type="number" name="stock" id="stock_e" class="form-control" />
</div> 
@endif