<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senha extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'status'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function guiche()
    {
        return $this->belongsTo(Guiche::class);
    }
}
