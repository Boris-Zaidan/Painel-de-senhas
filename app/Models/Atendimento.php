<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atendimento extends Model
{
    protected $fillable = [
        'senha_id',
        'medico_id',
        'atendente_id',
        'especialidade_id',
        'iniciado_em',
        'finalizado_em',
        'observacoes',
    ];

    public function senha(): BelongsTo
    {
        return $this->belongsTo(Senha::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function atendente(): BelongsTo
    {
        return $this->belongsTo(Atendente::class);
    }

    public function especialidade(): BelongsTo
    {
        return $this->belongsTo(Especialidade::class);
    }
}
