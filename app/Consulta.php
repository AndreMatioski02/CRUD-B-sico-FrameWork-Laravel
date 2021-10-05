<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data',
        'hora'
    ];

    // Criar uma função para estabelcer a associação ou relacionamento entre a classe consulta e a classe paciente
    public function paciente() {

        return $this->belongsTo(Paciente::class);
    }

    // Criar uma função para estabelcer a associação ou relacionamento entre a classe consulta e a classe medico
    public function medico() {

        return $this->belongsTo(Medico::class);
    }
}


