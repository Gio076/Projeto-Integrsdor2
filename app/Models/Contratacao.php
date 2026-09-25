<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contratacao extends Model
{
    protected $fillable = [
        'cliente_id',
        'voluntario_id',
        'evento_id',
        'data',
        'horario',
        'status',
        'observacoes',
    ];

    protected $casts = [
        'data' => 'date',
        'horario' => 'datetime:H:i',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function voluntario(): BelongsTo
    {
        return $this->belongsTo(Voluntario::class);
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    public function avaliacao(): HasOne
    {
        return $this->hasOne(Avaliacao::class);
    }

    public function cancelamento(): HasOne
    {
        return $this->hasOne(Cancelamento::class);
    }
}