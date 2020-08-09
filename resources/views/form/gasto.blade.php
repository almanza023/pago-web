@if($crear)
<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>

</div>               

<div class="form-group">
    <label>Concepto (*)</label>
    <div>
        <textarea id="concepto" required class="form-control" rows="2" name="concepto"></textarea>
    </div>
</div>      

<div class="form-group">
    <label>Valor(* )</label>
    <input type="number" name="valor" id="valor" class="form-control" min="0" required />
</div>

<div class="form-group"> 
    <h5><b>Suba su evidencia</b></h5>
    <div id="preview" class="thumbnail">
      <a href="#" id="file-select" class="btn btn-info">Elegir archivo</a>
      <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4="/>
    </div>
    <span class="alert alert-danger" id="file-info">No hay archivo aún</span>
    <input id="file" name="file" type="file"/>
</div>

@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha_e" name="fecha"  required="" readonly="" style="color: red; background-color: white;"/>

</div> 
<div class="form-group">
    <label>Concepto (*)</label>
    <div>
        <textarea id="concepto_e" required class="form-control" rows="2" name="concepto"></textarea>
    </div>
</div>      

<div class="form-group">
    <label>Valor(* )</label>
    <input type="number" name="valor" id="valor_e" class="form-control" min="0" required />
</div>
@endif

