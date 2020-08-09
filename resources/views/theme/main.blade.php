<!DOCTYPE html>
<html lang="es">
   
    <head>
        @include('theme.estilos')
        @if ($tabla)
        @include('theme.estilos-tablas')
        @endif
        @yield('estilos')
        <title>
            @yield('titulo')
        </title>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            @include('theme.topbar')
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            @include('theme.sidebar')
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title" align="right" >Sistema de Gestión del PAE</h4>                             
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="page-content-wrapper">
                            
                            @yield('content')
                            

                        </div>
                        <!-- end page content-->
                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                @include('theme.footer')
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->            
        @include('theme.scripts')
        @if ($tabla)
          @include('theme.scripts-tablas')
        @endif
        <script src="{{ asset('js/init.js') }}"></script>
        <script src="{{ asset('js/Salir.js') }}"></script>
        @yield('scripts')
    </body>
</html>