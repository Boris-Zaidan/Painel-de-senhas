<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendente extends Model
{
    /** @use HasFactory<\Database\Factories\AtendenteFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'guiche_id'

    ];

    public function atendentes()
    {
        return $this->hasMany(Atendente::class);
    }

}
