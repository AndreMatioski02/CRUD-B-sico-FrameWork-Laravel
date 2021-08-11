<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //Definindo os atributos iniciais
    protected $fillable = ['nome','genero'];
}
