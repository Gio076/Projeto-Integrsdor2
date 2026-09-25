<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voluntario extends Model
{
    protected $fillable = [
        'user_id',
        'telefone',
        'foto',
        'descricao',
        'habilidades',
        'experiencias',
        'capacitacoes',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidade::class);
    }

    public function contratacoes(): HasMany
    {
        return $this->hasMany(Contratacao::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function cancelamentos(): HasMany
    {
        return $this->hasMany(Cancelamento::class);
    }
}
