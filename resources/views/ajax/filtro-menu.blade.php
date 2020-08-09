<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> DETALLES DE MENÚ</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered" style="width:100%">
                         <tr>
                             <th style="width: 5%;">N°</th>
                             <th>PRODUCTO</th>                          
                            @foreach ($menus_id as $item)
                                <th style="width: 10%;">M-{{ $item->codigo}}</th>
                            @endforeach                       
                         </tr>                                               
                         @foreach ($productos as $item)
                            <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->nombre  }}</td>
                                          
                            
                            @foreach ($menus as $m)
                             @if ($item->id==$m->producto_id)
                                 <td style="width:15px">{{ $m->cantidad }}</td>
                             @endif
                            @endforeach 
                                 
                            </tr>                
                         @endforeach
                     </table>
                    </div>

                    
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>