@extends('theme.main', ['tabla'=>false])
@section('titulo')
    Creación de Prestamos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DATOS DE CLIENTES</h3>   
                
            <form action="{{ route('prestamos.store') }}" method="POST" id="form_create">
                @csrf
                @include('form.cliente', ['crear'=>true, 'editar'=>false])              
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DATOS DE PRESTAMOS</h3>            
        
                <div >
                    <div class="panel-heading">Datos del Prestamo</div>
                    <div class="panel-body" >
                    
                        <div class="form_group row">
                          <label for="pnombre" class="col-lg-2">Fecha:</label>
                          <div class="col-lg-10">
                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php  echo date('Y-m-d'); ?>" required="" readonly="" style="color: red; background-color: white;"/>
                          </div>
                        </div><br> 

                        
                           
                        <br>
                      
                        <div class="table-responsive"> 
                        <div class="panel panel-info" id="tblvariable" style="border: 0">
                        <div class="panel-heading" id="tblvariable">Calculo Préstamo</div>
                        
                           <table class="table table-hover" id="tblvariable">
                               
                            <tr > 
                                <th> 
                                  Monto solicitado
                                </th>
                                <th> 
                                  Interés 
                                </th>
                              </tr>
                              <tr>
                                <td> 
                                    <div class="input-group">
                                        <span class="input-group-addon" style="color: white; background-color: orange">$</span>
                                        <input type="text" class="form-control" type="number" id="monto2" name="monto"  aria-label="Amount (to the nearest dollar)" style="color: blue; background-color: white;">
                                    </div>          
                                </td>
                                  <td> 
                                      <div class="form_group row">
                                          <div class="col-lg-10">
                                              <select name="interes" id="interes2" class="form-control">
                                                <option value="0">Seleccione</option>
                                                <option value="0.1">10%</option>
                                                <option value="0.2">20%</option>
                                              </select>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                <th> 
                                  Forma de pago 
                                </th>
                                 <th> 
                                  Valor de Cuotas
                                </th>
                            </tr>
                          <tr > 
                                
                                   <td> 
                                      <div class="form_group row">
                                          <div class="col-lg-10"> 
                                              <select name="forma_pago_id" required id="forma_pago2" class="form-control">
                                                <option value="0">Seleccione</option>
                                                @foreach ($formas as $item)
                                                  <option value="{{ $item->id }}">{{ $item->nombre }}</option>  
                                                @endforeach
                                                
                                              </select>
                                          </div>
                                      </div>
                                  </td>
                                  <td> 
                                  
                                  <div class="form_group row">
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" id="valor_c2" name="valor_cuotas" required=""  />
                                    </div>
                                  </div>
                                </td>
                              <tr >                                
                              <th>Descontar Cuotas</th>
                               <th>N° Cuotas a descontar</th>
                            </tr>
                            <tr>
                              <td>
                              <select id="descontar2" name="descontar" class="form-control" onchange = "cargar2()">
                                  <option value="0">Seleccione</option>
                                  <option value="1">SI</option>
                                  <option value="2">NO</option>                                   
                                </select>  
                              </td>
                              <td>
                                  <input type="number" name="c_descontar" id="numcd2" class="form-control">
                              </td>
                            </tr>
                            </tr>
                            <tr id="fila6">
                              <td colspan="4">
                                  <button type="button" id="calcular2" class="btn btn-info"><img src=" assets/img/png/calcular.png" > Calcular</button>
                                </td> 
                            </tr>

                            
                            <tr> 
                               
                                <th> 
                                  N° Cuotas
                                </th>
                                <th> 
                                  Valor por interés 
                                </th>
                              </tr>
                                <tr>
                                 <td> 
                                 <div class="form_group row">
                                    <div class="col-lg-10">
                                      <input type="text" readonly="" class="form-control" type="number" id="numero_ct2" name="numero_cuotas"   aria-label="Amount (to the nearest dollar)" >
                                      
                                    </div>
                                  </div>
       
                                </td> 
                                <td> 
                                  <div class="form_group row">
                                    <div class="col-lg-10">
                                      <input type="text" readonly="" class="form-control" id="v_interes2" name="v_interes" required=""  />
                                    </div>
                                  </div>          
                                </td> 
                                </tr>
                                <tr>
                                 <th> 
                                  Descuento de Cuotas
                                </th>
                                <th> 
                                  Total Entrega Cliente
                                </th>
                            </tr>
                            <tr>                                
                              
                                <td> 
                                  <div class="form_group row">
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" id="v_descuento2" name="v_descuento" required="" readonly="" />
                                    </div>
                                  </div>          
                                </td>
                                <td> 
                                  <div class="form_group row">
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" id="v_entrega2" name="v_entrega" required="" readonly="" />
                                    </div>
                                  </div>          
                                </td>
                            </tr>
                         </table>

                        <label for="pnombre" class="col-lg-2">Monto a pagar:</label>
                        <div class="input-group">
                          <span class="input-group-addon" style="color: white; background-color: orange">$</span>
                          <input class="form-control" type="number" id="monto_pago2" name="monto_total" readonly style="color: blue; background-color: white;" >
                          <span class="input-group-addon" style="color: white; background-color: orange">.00</span>       
                        </div><br>
                        </div></div>
                          <br> 
                        <table align="center"> 
                            <tr> 
                              <td> <button type="submit" class="btn btn-primary " id="guardar"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                              </td>
                              
                              <td> <a class="btn btn-danger" href="{{ route('prestamos.index') }}"><i class="fa fa-sign"></i>&nbsp;Atras</a> </td>
                            </tr>
                        </table>
                      </form>
                    </div>
                    </div>
                </div>

                
            </form>

               
            </div>
        </div>
    </div>
    
    
</div>


@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Operaciones.js') }}"></script>
<script src="{{ asset('js/Registro.js') }}"></script>
@endsection