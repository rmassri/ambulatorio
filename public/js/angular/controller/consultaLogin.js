(function () {
    'user strict',
    angular
        .module('PortalGescolar')
        .controller('Consultas', Consultas);

    Consultas.$inject = ['$scope', '$http'];

    function Consultas($scope, $http) {

//$scope.response_captcha=null;
//$scope.widgetId=null;
//$scope.key_captcha = '6LcVGSETAAAAANpezdNiI8Ll70uLkQnU-E3xwrtA';
$scope.form_data={};
var btn_consulta=angula.elemnt('#btn-consultar');
var validar_login=function(_values_user,_value_calve){
if(typeof _values_user=='undefine'){
angular.element('#contenedor_mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo usuario no puede quedar en blanco" + '</div>' +
                                '</div>');
                return false;
}
if(typeof _value_calve=='undefine'){
	angular.element('#contenedor_mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo clave no puede quedar en blanco" + '</div>' +
                                '</div>');
                return false;
}
if(_values_user=='' || _values_user==null){
	angular.element('#contenedor_mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo usuario no puede ser vacio" + '</div>' +
                                '</div>');
                return false;

}
if(_value_calve=='' || _value_calve==null){
angular.element('#contenedor_mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + "El campo clave no puede ser vacio" + '</div>' +
                                '</div>');
                return false;
}
return true;
};
$scope.Consultar = function(){
if(validar_login($scope.form_data.usuario,$scope.form_data.clave)){
                btn_consultar
                    .html('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i> Consultado...')
                    .prop('disabled', true);
                    $http({
                    	method:'post',
                    	url:'login/principal',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data:$.param({
                        	'usuario':$scope.form_data.usuario,
                        	'clave':$scope.form_data.clave,
                        })

                    }).then(
                    function(data){
                 var response=data.data;
                 if(response.statusCode=="errorParm"){
                 	angular.element('#conteedor-mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');

                 }else{
                 	  	angular.element('#conteedor-mensaje').html('<div class="alert alert-warning">' +
                                '<div class="alert-link">' +
                                '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>' + response.mensaje + '</div>' +
                                '</div>');
                 }
                                         btn_consultar
                            .html('<i class="fa fa-search"></i> Consultar')
                            .prop('disabled', false);
                    },
                               function (data_error) {

                        angular.element('#contenedor-mensajes').html('<div class="alert alert-danger">' +
                            '<div class="alert-link">' +
                            '<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>Ha ocurrido un error indesperado - Estado[' + data_error.status + ']</div>' +
                            '</div>');

                        //Se desactiva el spin de cargando
                        btn_consultar
                            .html('<i class="fa fa-search"></i> Consultar')
                            .prop('disabled', false);

                        //Recargamos el recaptcha
                        //$scope.reaload_widget($scope.widgetId);
                    });
	}
}
}

})();