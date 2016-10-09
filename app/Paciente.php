<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'cedula','correo','telefono', 'direccion', 'usuario_ini_id','usuario_act_id'
        ,'usuario_eli_id', 'estado_id', 'municipio_id','parroquia_id','estatus'
    ];
}
