<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = [
        'user_id',
        'telefone',
        'foto',
        'necessidades_acessibilidade',
        'preferencias',
        'informacoes_acompanhamento',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contratacoes(): HasMany
    {
        return $this->hasMany(Contratacao::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }
}