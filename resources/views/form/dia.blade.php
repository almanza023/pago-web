@if($crear)

<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>

</div>  

<div class="form-group">
   <label>Usuarios (*)</label>
   <select name="user_id" id="user_id" class="form-control">
       @foreach ($users as $item)
         <option value="{{ $item->id }}">{{ $item->nombres.' '.$item->apellidos }}</option>  
       @endforeach
   </select>
</div> 

<div class="form-group">
    <label>Valor (*)</label>
    <div>
       <input type="number" class="form-control" required name="base" id="base">
    </div>
</div>     

@endif

@if($editar)
<input type="hidden" id="id" name="id">


<div class="form-group">
    <label>Fecha (*)</label>
    <input type="date" required class="form-control" id="fecha_e" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>

</div>  

<div class="form-group">
    <label>Usuarios (*)</label>
    <select name="user_id" id="user_id_e" class="form-control">
        @foreach ($users as $item)
          <option value="{{ $item->id }}">{{ $item->nombres.' '.$item->apellidos }}</option>  
        @endforeach
    </select>
 </div> 

<div class="form-group">
    <label>Valor (*)</label>
    <div>
       <input type="number" class="form-control" required name="base" id="base_e">
    </div>
</div>  
@endif