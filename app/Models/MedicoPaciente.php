<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicoPaciente extends Model
{
    protected $fillable = ['medico_id', 'paciente_id'];
}