<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }

    public function voluntario(): HasOne
    {
        return $this->hasOne(Voluntario::class);
    }

    public function isCliente(): bool
    {
        return $this->role === 'cliente';
    }

    public function isVoluntario(): bool
    {
        return $this->role === 'voluntario';
    }

    public function isAdministrador(): bool
    {
        return $this->role === 'administrador';
    }
}
