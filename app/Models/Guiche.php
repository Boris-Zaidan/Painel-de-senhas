<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiche extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',

    ];

    public function senhas()
    {
        return $this->hasMany(Senha::class);
    }
}


