//alert("aquii");
(function(){
	angular.module('guardarUsario',[]).config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
})
	.controller('GuardarUsuarioController', GuardarUsuarioController);
	GuardarUsuarioController.$inject=['$scope','$http','$window'];
	function GuardarUsuarioController($scope,$http,$window){
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
                    //headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data:{
                        'form': $scope.dataForm
                    }
                }).then(
                    function (data) {
                        //var response = data.data;
                        //alert("aquiii");
                            //$window.location.href = '/admin/usuario/create';


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

})();