<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilaMedicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'atendimento_id' => $this->id,
            'paciente' => $this->paciente?->nome,
            'codigo_senha' => $this->senha?->codigo,
            'status' => $this->senha?->status,
            'especialidade' => $this->especialidade?->nome,
            'medico' => $this->medico?->nome,
            'sala' => $this->medico?->sala?->nome,
            'chamado_em' => $this->chamado_em,
            'criado_em' => $this->created_at,
        ];
    }
}
