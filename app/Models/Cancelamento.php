<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cancelamento extends Model
{
    protected $fillable = [
        'contratacao_id',
        'voluntario_id',
        'motivo',
        'status',
        'penalidade',
    ];

    public function contratacao(): BelongsTo
    {
        return $this->belongsTo(Contratacao::class);
    }

    public function voluntario(): BelongsTo
    {
        return $this->belongsTo(Voluntario::class);
    }
}
