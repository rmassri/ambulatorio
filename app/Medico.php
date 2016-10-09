<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
     protected $table = 'medicos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'cedula','correo','telefono', 'direccion', 'usuario_ini_id','usuario_act_id'
        ,'usuario_eli_id', 'estado_id', 'municipio_id','parroquia_id','estatus'
    ];
}
