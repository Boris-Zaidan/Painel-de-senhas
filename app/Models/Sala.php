<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];


    public function senha()
    {
        return $this->hasMany(Senha::class);

    }

    public function medicos(): HasMany
    {
        return $this->hasMany(Medico::class);
    }
}
