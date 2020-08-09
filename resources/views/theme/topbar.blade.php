<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left" >
        <a href="{{ route('home')}}" class="logo">
            <span align="center">
                <img src="{{ asset('theme/agroxa/assets/images/LOGOSOFTPAE.png') }}" alt="" height="70">
            </span>
            <i>
                <img src="{{ asset('theme/agroxa/assets/images/LOGOSOFTPAE.png') }}" alt="" height="30">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="navbar-right d-flex list-inline float-right mb-0">
            

           
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('theme/agroxa/assets/images/profile.png') }}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Perfil</a>
                        <a class="dropdown-item d-block" href="#"><i class="mdi mdi-settings m-r-5"></i> Cuenta</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                            <a id="btn-salir" class="dropdown-item text-danger"  >  <i class="mdi mdi-power text-danger"></i> </i> Cerrar Sesión</a>
                          </form>
                        
                    </div>                                                                    
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect waves-light">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>                        
            <li class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block">
                    <a class="btn btn-header waves-effect waves-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Accesos Directos
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('clientes.index')}}"><i class="fa fa-child"></i> Beneficiarios</a>
                        <a class="dropdown-item" href="{{ route('clientes.create')}}"><i class="fa fa-clipboard"></i> Crear Menú</a>
                        <a class="dropdown-item" href="{{ route('clientes.index')}}"><i class="fa fa-file"></i> Consultar Minuta</a>
                        <a class="dropdown-item" href="{{ route('clientes.create')}}"><i class="fa fa-calculator"></i> Crear Cálculos</a>
                      
                    </div>
                </div>
            </li>
        </ul>

    </nav>

</div>