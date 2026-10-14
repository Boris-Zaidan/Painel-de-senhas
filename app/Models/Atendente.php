<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atendente extends Model
{
    /** @use HasFactory<\Database\Factories\AtendenteFactory> */
    use HasFactory;

    protected $fillable = [
        'Nome',

    ];

    public function senhas()
    {
        return $this->hasMany(Senha::class);
    }

    public function atendentes()
    {
        return $this->hasMany(Atendente::class);
    }
    public function atendimentos(): HasMany
    {
        return $this->hasMany(Atendimento::class);
    }

}
