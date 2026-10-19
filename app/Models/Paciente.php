<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone'
    ];

    public function senha()
    {
        return $this->hasMany(Senha::class);
    }

    public function atendimento(): HasMany
    {
        return $this->hasMany(Atendimento::class);
    }
}
