//alert("aquii");
(function(){
	angular.module('guardarUsario',[]).
	customInterpolationApp.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
	.controller('GuardarUsuarioController', GuardarUsuarioController);
		
	GuardarUsuarioController.$inject=['$scope','$http'];
	function GuardarUsuarioController($scope,$http){
       $scope.response_captcha = null;
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



           $scope.guardar = function () {
                angular.element('#btn-consultar')
                    .html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Consultado...')
                    .prop('disabled', true);

                $http({
                    method: 'POST',
                    url: '/admin/usuario/store',
                    //headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data:{
                        $scope.dataForm}
                }).then(
                    function (data) {
                        //var response = data.data;
                                $timeout(function(){
                            $window.location.href = '/admin/usuario/store';
                        },1000);
                        


                    },
                );
            
        };



	}
})();