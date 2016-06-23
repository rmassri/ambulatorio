(function () {
    angular
        .module('consultaUsuario',[])
        .controller('ConsultasController', ConsultasController);

    ConsultasController.$inject = ['$scope', '$http', '$filter','$window', '$timeout'];

    function ConsultasController($scope, $http, $filter,$window,$timeout) {
        //Variable que almacena el response del recaptcha
        $scope.response_captcha = null;

        //Variable que mantiene el id del widget que crea google recaptcha
        $scope.widgetId = null;

        //Variable que mantiene el key para conectarse con google recaptcha
        $scope.key_captcha = '6LcVGSETAAAAANpezdNiI8Ll70uLkQnU-E3xwrtA';

        //Variable que almacenas los datos enviados desde el FRONT
        $scope.form_data = {};

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


        // Funcion para consultar datos introducidos en el formulario
        $scope.consultar = function () {
            if (validar_usuario($scope.form_data.usuario, $scope.form_data.clave)) {
                //Se activa el spin de cargando
                angular.element('#btn-consultar')
                    .html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Consultado...')
                    .prop('disabled', true);
                //Se le agrego un headers al $http porque se necesita enviar el response del recaptcha y es muy grande
                //Por defecto el $http envia sus datos por aplication/json

                $http({
                    method: 'POST',
                    url: '/login/principal',
                    //headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data:{
                        'usuario': $scope.form_data.usuario,
                        'clave': $scope.form_data.clave}
                }).then(
                    function (data) {
                        var response = data.data;
                        if (response.statusCode == "ERROR_CAMPOS_VACIOS") {
                            angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                        } else if (response.statusCode == "USUARIO_CLAVE_INCORRECTA") {
                            angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-check fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                        } else if(response.statusCode=="USUARIO_INCORRECTO"){
                              angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-check fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                        }else if(response.statusCode=="CLAVE_INCORRECTA"){
                            angular.element('#contenedor-mensajes').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-check fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                        }else{
                            angular.element('#contenedor-mensajes').html('<div class="alert alert-success">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-check fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                                $timeout(function(){
                            $window.location.href = '/admin/usuario/create';
                        },1000);
                        }

                        //Se desactiva el spin de cargando
                        angular.element('#btn-consultar')
                            .html('<i class="fa fa-search"></i> Consultar')
                            .prop('disabled', false);

                        //Recargamos el recaptcha
                        //$scope.reaload_widget($scope.widgetId);

                    },
                    function (data_error) {

                        angular.element('#contenedor-mensajes').html('<div class="alert alert-danger">' +
                            '<div class="alert-link">' +
                            '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>Ha ocurrido un error indesperado - Estado[' + data_error.status + ']</div>' +
                            '</div>');
                        //Se desactiva el spin de cargando
                        angular.element('#btn-consultar')
                            .html('<i class="fa fa-search"></i> Consultar')
                            .prop('disabled', false);
                        //Recargamos el recaptcha
                       // $scope.reaload_widget($scope.widgetId);
                    }
                );
            }
        };

        //Funcion para almacenar el response que retorna el widget
        $scope.setResponse = function (_response) {
            $scope.response_captcha = _response;

        };

        //Funcion para almacenar el id del widget que se creo en la vista
        /*$scope.setWidgetId = function (widgetId) {
            $scope.widgetId = widgetId;
        };*/

        /*$scope.cbExpiration = function () {
            vcRecaptchaService.reload($scope.widgetId);

            $scope.response_captcha = null;
        };*/

        /*$scope.reaload_widget = function (_widgetID) {
            $scope.setResponse(null);
            vcRecaptchaService.reload(_widgetID);
        };*/

        $scope.validar_captcha = function (_response_captcha) {

        };


        /*******
         * Funciones para controlar las vistas de los distintos formularios de consultas
         */

            // Inicializamos la variable de vista estudiante en true para que se muestre el formulario de estudiante
        $scope.mostrar_vista_estudiante = true;

        // Inicializamos la variable de vista universidad en ffalse para que no se muestre
        $scope.mostrar_vista_universidad = false;

        /*
         Funcion que se encarga de cambiar las vistas para los distintos formularios
         */
        $scope.cambiar_vista = function (_vista) {

            if (_vista === 'vista_universidad') {

                $scope.mostrar_vista_estudiante = false;
                $scope.mostrar_vista_universidad = true;


            }
            else if (_vista == 'vista_estudiante') {

                $scope.mostrar_vista_estudiante = true;
                $scope.mostrar_vista_universidad = false;


            }
        };


        $scope.inicio_sesion = function(){

            //Se activa el spin de cargando
            angular.element('#btn-inicio-sesion')
                .html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Iniciando Sesion...')
                .prop('disabled', true);

            $http({
                method: 'POST',
                url: '/autenticacion/login',
                data: {
                    usuario : $scope.form_data.usuario,
                    password : $scope.form_data.password
                }
            }).then(
                function (data) {
                    var response = data.data;


                    //Se desactiva el spin de cargando
                    angular.element('#btn-inicio-sesion')
                        .html('<i class="fa fa-search"></i> Iniciar Sesion')
                        .prop('disabled', false);


                },
                function (data_error) {

                    angular.element('#contenedor-mensajes').html('<div class="alert alert-danger">' +
                        '<div class="alert-link">' +
                        '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>Ha ocurrido un error indesperado - Estado[' + data_error.status + ']</div>' +
                        '</div>');

                    //Se desactiva el spin de cargando
                    angular.element('#btn-inicio-sesion')
                        .html('<i class="fa fa-search"></i> Iniciar Sesion')
                        .prop('disabled', false);
                }
            );
        }

    }

})();
