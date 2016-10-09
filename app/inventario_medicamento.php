<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventario_medicamento extends Model
{
    protected $fillable = [
        'fecha','paciente_id'
        ,'medico_id','medicamento_id'
    ];}
