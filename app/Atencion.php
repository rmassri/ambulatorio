<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $fillable = [
        'observacion', 'fecha','paciente_id'
        ,'medico_id','enfermedad_id'
    ];
}
