<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
               
                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="fa fa-home"></i><span> Inicio </span></a>
                </li>
                <li>
                    <a href="{{ route('clientes.index') }}" class="waves-effect"><i class="fa fa-people-carry"></i><span> Clientes </span></a>
                </li>
                <li>
                    <a href="{{ route('prestamos.index') }}" class="waves-effect"><i class="fa fa-money-bill"></i><span> Préstamos </span></a>
                </li>
                <li>
                    <a href="{{ route('pagos.index') }}" class="waves-effect"> <i class="fa fa-money-check"></i><span> Pagos </span></a>
                </li>
                <li>
                    <a href="{{ route('usuarios.index') }}" class="waves-effect"><i class="fa fa-user"></i><span> Usuarios </span></a>
                </li>
                <li>
                    <a href="{{ route('gastos.index') }}" class="waves-effect"><i class="fa fa-calculator"></i><span> Gastos </span></a>
                </li>
                <li>
                    <a href="{{ route('liquidacion-dias.index') }}" class="waves-effect"><i class="fa fa-calendar"></i><span> Control de Caja </span></a>

                    
                </li>
                <li>                   

                    <a href="{{ route('liquidacion-dias.index') }}" class="waves-effect"><i class="fa fa-paper-plane"></i><span> Reportes </span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-black-mesa"></i> <span> Configuraciones <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('forma_pagos.index') }}"><i class="fa fa-percent"></i><span>  Formas de Pagos </span></a></li>
                       
                    </ul>
                </li>
               
               

                
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>