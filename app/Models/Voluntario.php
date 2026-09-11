<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'cpf',
        'email',
        'instagram',
        'nascimento',
        'linkedin',
        'curriculo',
        'antepassados_criminais'
    ];

}
