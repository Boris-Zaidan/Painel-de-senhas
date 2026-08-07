<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone'
    ];

    public function senhas()
    {
        return $this->hasMany(Senha::class);
    }
}
