<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
    protected $fillable = [
        'nome',
        'crm'
    ];

    // Criar uma função para estabelcer a associação ou relacionamento entre a classe médico e a classe consulta
    public function consulta() {
        // Especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }
}
