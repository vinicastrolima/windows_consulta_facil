<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['nome', 'especialidade', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'medico_paciente', 'medico_id', 'paciente_id');
    }
}