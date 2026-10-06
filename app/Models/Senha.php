<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senha extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'status',
        'paciente_id',
        'sala_id',
        'medico_id',
        'guiche_id',
        'atendente_id',
        'chamado_em',
        'finalizado_em',
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

    public function atendente()
    {
        return $this->belongsTo(Atendente::class);

    }
}
