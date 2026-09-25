<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    protected $fillable = [
        'nome',
        'imagem',
        'descricao',
        'data',
        'horario',
        'local',
        'endereco',
        'informacoes_acessibilidade',
        'vagas',
        'status',
        'informacoes_adicionais',
    ];

    protected $casts = [
        'data' => 'date',
        'horario' => 'datetime:H:i',
    ];

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidade::class);
    }

    public function contratacoes(): HasMany
    {
        return $this->hasMany(Contratacao::class);
    }
}