
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>INICIO DE SESIÓN</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="PARQUESOFT" name="author" />
        <link rel="shortcut icon" href="assets/images/LOGOSOFTPAE.png">
        <link href="{{ asset('theme/agroxa/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/agroxa/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/agroxa/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/agroxa/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="{{ asset('theme/agroxa/assets/images/LOGOSOFTPAE.png')}}" height="130px" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <p class="text-muted text-center">Ingrese sus datos para iniciar sesión.</p>

                        <form class="form-horizontal m-t-30" action="{{ route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username"><i class="fa fa-user" style="color:#35a989"></i> Usuario</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="userpassword"><i class="fa fa-lock" style="color:#35a989"></i> Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                       

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Recordarmé') }}
                                    </label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="btn btn-primary w-md waves-effect waves-light">
                                        {{ __('Ingresar') }} <i class="fa fa-arrow-alt-circle-right"></i>
                                    </button>
                                   
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        {{ __('Olvide mi contraseña') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
               
                <p style="color: #fff">© Sistema PAE desarrollado por ParqueSoft Sucre</p>
            </div>

        </div>

        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="{{ asset('theme/agroxaassets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/agroxaassets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('theme/agroxaassets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('theme/agroxaassets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('theme/agroxaassets/js/waves.min.js') }}"></script>

        <script src="{{ asset('theme/agroxa/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('theme/agroxa/assets/js/app.js') }}"></script>

    </body>
</html>
