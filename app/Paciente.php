<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // Definindo os atributos iniciais
    protected $fillable = ['nome','genero'];

    // Criar uma função para estabelcer a associação ou relacionamento entre a classe paciente e a classe consulta
    public function consulta() {
        // Especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }
}
