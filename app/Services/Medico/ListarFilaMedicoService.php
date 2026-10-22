<?php

namespace App\Services\Medico;

use App\Models\Atendimento;
use App\Models\Medico;
use Illuminate\Support\Collection;


class ListarFilaMedicoService
{

    public function executar(Medico $medico): Collection
    {
        return Atendimento::query()
            ->with([
                'paciente',
                'senha',
                'especialidade',
                'medico.sala',
            ])->where('medico_id', $medico->id)
            ->whereHas('senha', function ($query) {
                $query->where('status', 'aguardando_medico');
            })->orderBy('created_at')->get();
    }

}
