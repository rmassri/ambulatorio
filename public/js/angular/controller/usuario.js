//alert("aquii");
(function(){
	angular.module('modulosAplicacion',['ngMask','ngRoute','ui.bootstrap']).config(function($interpolateProvider,$routeProvider,$locationProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
    
    //$locationProvider.html5Mode(true);
    $routeProvider.
    when('/route', {
        templateUrl: '/template/route.html',
        controller: 'GuardarUsuarioController'
    }).when('/create_user', {
        templateUrl: '/template/create_user.html',
        controller: 'miController'
    }).when('/listado_user', {
        templateUrl: '/template/listado_user.html',
        controller: 'listadoUsuario'
    }).otherwise({
        redirectTo: '/'
    })
    }).controller('miController',function($scope){

    }).controller('listadoUsuario',function($scope){
   
        $scope.listado=[
        {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
      {
        nombre:"Richard",
        apellido:"Massri",
        cedula:20413974,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Los Vecinos"
    },
    {
        nombre:"Pedro",
        apellido:"Garcias",
        cedula:20413975,
        telefono_celular:04142829420,
        telefono_fijo:02123833551,
        direccion:"Macarena"
    }];
    //console.log(listado);
       $scope.viewby = 3;
  $scope.totalItems = $scope.listado.length;
  $scope.currentPage = 4;
  $scope.itemsPerPage = $scope.viewby;
  $scope.maxSize = 5;
  $scope.setPage = function (pageNo) {
    $scope.currentPage = pageNo;
  };

  $scope.pageChanged = function() {
    console.log('Page changed to: ' + $scope.currentPage);
  };

$scope.setItemsPerPage = function(num) {
  $scope.itemsPerPage = num;
  $scope.currentPage = 1; //reset to first paghe
}

}).controller('GuardarUsuarioController',function($scope,$http,$window){
    $scope.nombre="holaaa";
        console.log($scope.nombre);
        $scope.$watch('dataForm.correo',function(nuevo,anterior){
            if(!nuevo) return;
            if(!/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(nuevo)){
                $scope.mostrarCorreo="El correo es invalido";
            }else{
                $scope.mostrarCorreo=false;
            }
        });

        $scope.$watch('dataForm.apellido',function(nuevo,anterio){
            if(!nuevo) return;
            if(!/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(nuevo)){
                $scope.mostrarApellido="El apellido no debe contener numeros ni caracteres especiales";
            }else if(nuevo.length<=3){
            $scope.mostrarApellido="El apellido debe contener al menos 4 letras";
            }else{
                $scope.mostrarApellido=false;
            }
        });

        $scope.$watchGroup(['dataForm.clave','dataForm.repetir_clave'],function(nuevo,anterio){
            if(!nuevo[0] || !nuevo[1]) return;
            if(nuevo[0]!==nuevo[1]){
                $scope.mostrarRepetirClave="Las Claves no coinciden";
            }else{
                $scope.mostrarRepetirClave=false;
            }
        });

        $scope.$watch('dataForm.nombre',function(nuevo,anterio){
            if(!nuevo) return;
            if(!/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(nuevo)){
                $scope.mostrarNombre="El nombre no debe contener numeros ni caracteres especiales";
            }else if(nuevo.length<=3){
            $scope.mostrarNombre="El nombre debe contener al menos 4 letras";
            }else{
                $scope.mostrarNombre=false;
            }
        });

        $scope.$watch('dataForm.cedula',function(nuevo,anterior){
            if(!nuevo) return;
            if(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(nuevo)){
                $scope.mostrarCedula="La cedula debe ser solo numerica";
            }else{
                $scope.mostrarCedula=false;
            }
        });
       $scope.response_captcha = null;
       $scope.mensaje="hola";
        //Variable que mantiene el id del widget que crea google recaptcha
        $scope.widgetId = null;
        //Variable que mantiene el key para conectarse con google recaptcha
        $scope.key_captcha = '6LcVGSETAAAAANpezdNiI8Ll70uLkQnU-E3xwrtA';
        //Variable que almacenas los datos enviados desde el FRONT
        $scope.dataForm = {};
        //Funcion para validar la cedula introducida por el usuario
        var validar_usuario = function (_value_usuario, _value_clave) {
            //Verificamos que la varibale haya sido declarada en el scope
            if (typeof _value_usuario === 'undefined') {
                angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                    '<div class="alert-link">' +
                    '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo usuario no puede quedar en blanco" + '</div>' +
                    '</div>');
                return false;
            }
            if (typeof _value_clave === 'undefined') {
                angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                    '<div class="alert-link">' +
                    '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo clave no puede quedar en blanco" + '</div>' +
                    '</div>');
                return false;
            }

            return true;
        };



           $scope.guardarUsuario = function () {
                angular.element('#btn-consultar')
                    .html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Consultado...')
                    .prop('disabled', true);
                $http({
                    method: 'POST',
                    url: '/admin/usuario',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data:{
                        'form': $scope.dataForm
                    }
                }).success(function(data){
                        console.log(data['error']);
                        if(data.statusCode.mensaje!=false){
                            $scope.mostrarMensajeExito=data.statusCode.mensaje;
                            console.log($scope.mostrarMensajeExito);
                        }else{
                            $scope.mostrarNombre=data.error.name;
                            $scope.mostrarCorreo=data.error.correo;
                            $scope.mostrarApellido=data.error.apellido;
                            $scope.mostrarCedula=data.error.cedula;
                            $scope.mostrarEstado=data.error.estado;
                            $scope.mostrarUsuario=data.error.usuario;
                            $scope.mostrarEstado=data.error.estado;
                            $scope.mostrarTelefonoCelular=data.error.telefono_celular;
                            $scope.mostrarTelefonoFijo=data.error.telefono_fijo;
                            $scope.mostrarGrupo=data.error.grupo;
                            $scope.mostrarEstatus=data.error.estatus;
                            $scope.mostrarClave=data.error.clave;
                            $scope.mostrarRepetirClave=data.error.repetir_clave;

                        }
                            //$window.location.href = '/admin/usuario/create';
                        }).error(function(){
                 angular.element('#btn-consultar')
                            .html('<i class="fa fa-search"></i> Consultar')
                            .prop('disabled', false);

                        //Recargamos el recaptcha
                        //$scope.reaload_widget($scope.widgetId);
                });
                }

                });

                })();