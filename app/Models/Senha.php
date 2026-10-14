<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }

    public function guiche(): BelongsTo
    {
        return $this->belongsTo(Guiche::class);
    }

    public function atendente(): BelongsTo
    {
        return $this->belongsTo(Atendente::class);

    }
}
