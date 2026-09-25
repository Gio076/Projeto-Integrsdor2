<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disponibilidade extends Model
{
    protected $fillable = [
        'voluntario_id',
        'evento_id',
        'status',
    ];

    public function voluntario(): BelongsTo
    {
        return $this->belongsTo(Voluntario::class);
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}