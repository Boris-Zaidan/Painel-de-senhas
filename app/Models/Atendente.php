<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendente extends Model
{
    /** @use HasFactory<\Database\Factories\AtendenteFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'Nome'

    ];

    public function senhas()
    {
        return $this->hasMany(Senha::class);
    }

    public function atendentes()
    {
        return $this->hasMany(Atendente::class);
    }

}
