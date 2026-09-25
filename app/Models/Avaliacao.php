<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avaliacao extends Model
{
    protected $fillable = [
        'contratacao_id',
        'cliente_id',
        'voluntario_id',
        'nota',
        'comentario',
    ];

    public function contratacao(): BelongsTo
    {
        return $this->belongsTo(Contratacao::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function voluntario(): BelongsTo
    {
        return $this->belongsTo(Voluntario::class);
    }
}
