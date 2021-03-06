<html ng-app="consultaUsuario">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flex Admin - Responsive Admin Theme</title>

    <!-- GLOBAL STYLES -->
    <link href="{{ asset('css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ asset('css/plugins/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet">

    <!-- THEME STYLES -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">

    <!-- THEME DEMO STYLES -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">



<div class="container-fluid container-consultas center-block" ng-controller="ConsultasController">
  <div class="login">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="login-banner text-center">
            <h1><i class="fa fa-gears"></i> Pantalla de Login</h1>
          </div>
          <div class="center-block" id="contenedor-mensajes"></div>
<div class="container-fluid container-consultas center-block" >
          <div class="portlet portlet-green">
            <div class="portlet-heading login-heading">
              <div class="portlet-title">
                <h4><strong>Iniciar session</strong></h4>
              </div>
              <div class="portlet-widgets">
                <button class="btn btn-white btn-xs">Registrate</button>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="portlet-body">
              <form accept-charset="UTF-8" role="form">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Usuario" name="email" type="text" ng-model="form_data.usuario"> 
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Clave" name="password" type="password" ng-model="form_data.clave">
                  </div>

                  <button id="btn-consultar" type="submit" class="btn btn-primary btn-md pull-right" ng-click="consultar()">
        <i class="fa fa-search fa-fw"></i> Ingresar
    </button>
                  <div class="checkbox">
                    <label>
                      <input name="remember" type="checkbox" value="Remember Me"> Recuérdame
                    </label>
                  </div>
                  <br>
                </fieldset>
                <br>
                <p class="small">
                  <a href="#">Olvidaste tu Contraseña?</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </html>
<script src="{{asset('js/angular/jquery.min.js')}}"> </script>
<script src="{{asset('js/angular/bootstrap.min.js')}}"> </script>
<script src="{{asset('js/angular/angular.min.js')}}"> </script>
<script src="{{asset('js/angular/moment.min.js')}}"> </script>
<script src="{{asset('js/angular/pikaday.js')}}"> </script>
<script src="{{asset('js/angular/pikaday-angular.js')}}"> </script>
<script src="{{asset('js/angular/angular-recaptcha.min.js')}}"></script>
    <!-- GLOBAL SCRIPTS -->

                    <script src="{{ asset('js/angular/controller/consultaLogin.js') }}"></script> 
      <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- HISRC Retina Images -->


    <script src="{{ asset('js/plugins/hisrc/hisrc.js') }}"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->

    <!-- THEME SCRIPTS -->

