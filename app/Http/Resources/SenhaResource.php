<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SenhaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'codigo' => $this->codigo,
                'tipo' => $this->tipo,
                'status' => $this->status,

                'paciente_id' => $this->paciente_id,
                'sala_id' => $this->sala_id,
                'medico_id' => $this->medico_id,
                'guiche_id' => $this->guiche_id,

                'chamado_em' => $this->chamado_em,
                'finalizado_em' => $this->finalizado_em,




            ];
    }
}
