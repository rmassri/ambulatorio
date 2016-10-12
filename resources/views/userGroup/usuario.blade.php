
@extends('layaut.main')
@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<html>
<head>
</head>
<ol class="breadcrumb" style="width: 89%; margin-left: 12px">
    <li> <i class="fa fa-dashboard"></i>  <a href="index.html">Inicioooo</a>
    </li>
    <li class="active">Formulario de Usuario</li>
</ol>

<div class="col-lg-10">
<div class="portlet portlet-red">
    <div class="portlet-heading">
        <div class="portlet-title">
        <h4>Registrar Usuario</h4>
        </div>
        <div class="portlet-widgets">
        <a href="#formControls" data-parent="#accordion" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
<div class="panel-collapse in" id="formControls" style="height: auto;">
<div class="portlet-body" style="height:auto;">

<div ng-controller="GuardarUsuarioController">

<div class="col-md-12">
<label ng-show="mostrarMensajeExito" class="text-success">//mostrarMensajeExito// </label>
</div>
<div class="row">
<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Cédula</label>
    <input type="text" name="cedula" class="form-control" ng-model="dataForm.cedula" placeholder="Cédula">
     <label ng-show="mostrarCedula" class="text-danger">//mostrarCedula// </label>
</div>

<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" ng-model="dataForm.nombre" placeholder="nombre">
    <label ng-show="mostrarNombre" class="text-danger">//mostrarNombre// </label>
</div>

<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Apellido</label>
    <input type="text" name="apelido" class="form-control" ng-model="dataForm.apellido" placeholder="Apellido">
     <label ng-show="mostrarApellido" class="text-danger">//mostrarApellido// </label>
</div>
 </div>

<div class="row">
<div class="col-md-4">
    <label class="col-md-12 control-label">Telefono Fijo</label>
    <input type="text" name="telefono_fijo" class="form-control" ng-model="dataForm.telefono_fijo" placeholder="telefono_fijo" mask='9999-999-99-99'>
     <label ng-show="mostrarTelefonoFijo" class="text-danger">//mostrarTelefonoFijo// </label>
</div>


<div class="form-group col-md-4">
    <label class="control-label col-md-12">Telefono Celular</label>
    <input type="text" name="telefono_celular" class="form-control" ng-model="dataForm.telefono_celular" placeholder="telefono_celular" mask='9999-999-99-99'>
     <label ng-show="mostrarTelefonoCelular" class="text-danger">//mostrarTelefonoCelular// </label>
</div>

<div class="col-md-4 form-group">
    <label class="col-md-12 control-label">Correo</label>
    <input type="text" name="correo" class="form-control" ng-model="dataForm.correo" placeholder="correo">
     <label ng-show="mostrarCorreo" class="text-danger">//mostrarCorreo// </label>
 </div>
 </div>

<div class="row"> 

<div class="col-md-4 form-group">
    <label class="col-md-12 control-label">Estado</label>
    <input type="text" name="estado" class="form-control" ng-model="dataForm.estado" placeholder="Estado">
     <label ng-show="mostrarEstado" class="text-danger">//mostrarEstado// </label>
</div>

<div class="col-md-4 form-group">
    <label class="col-md-12 control-label">Grupo de Usuario</label>
    <input type="text" name="grupo" class="form-control" ng-model="dataForm.grupo" placeholder="Grupo">
     <label ng-show="mostrarGrupo" class="text-danger">//mostrarGrupo// </label>
</div>


<div class="col-md-4 form-group">
    <label class="col-md-12 control-label">Usuario</label>
    <input type="text" name="usuario" class="form-control" ng-model="dataForm.usuario" placeholder="Usuario">
     <label ng-show="mostrarUsuario" class="text-danger">//mostrarGrupo// </label>
</div>

</div>
<div class="row"> 

<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Clave</label>
    <input type="text" name="clave" class="form-control" ng-model="dataForm.clave" placeholder="Clave">
     <label ng-show="mostrarClave" class="text-danger">//mostrarClave// </label>
</div>

<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Repetir Clave</label>
    <input type="text" name="repetir_clave" class="form-control" ng-model="dataForm.repetir_clave" placeholder="Rpetir Clave">
     <label ng-show="mostrarRepetirClave" class="text-danger">//mostrarRepetirClave// </label>
</div>

<div class="form-group col-md-4">
    <label class="col-md-12 control-label">Estatus</label>
    <select name="estatus" class="form-control" ng-model="dataForm.estatus">
        <option value="">Seleccione</option>
        <option value="1">Activo</option>
        <option value="2">Inactivo</option>
        <option value="3">En Espera de Activar</option>
    </select>
     <label ng-show="mostrarEstatus" class="text-danger">//mostrarEstatus// </label>
</div>
</div>

<div class="row"> 
<div class="col-md-6 text-left">
    <a href="#listado_user">
         <span class="btn btn-danger"> volver </span>
    </a>
</div>

 <div class="col-md-6 text-right">
 <button ng-click="guardarUsuario()" class="btn btn-success">Registrar</button>
</div>
<br> <br>
</div>

</div>
</div>
</div>
</div>
</div>
</html>

@endsection