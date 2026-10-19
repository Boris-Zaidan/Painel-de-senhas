<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AtendimentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'senha' => $this->whenLoaded('senha', fn() => [
                'id' => $this->senha->id,
                'codigo' => $this->senha->codigo,
                'status' => $this->senha->status,
            ]),

            'guiche' => $this->when(
                $this->resource->relationLoaded('senha')
                && $this->senha->relationLoaded('guiche'),
                fn() => [
                    'id' => $this->senha->guiche->id,
                    'nome' => $this->senha->guiche->nome,
                ]
            ),

            'paciente' => $this->whenLoaded('paciente', fn() => [
                'id' => $this->paciente->id,
                'nome' => $this->paciente->nome,
                'cpf' => $this->paciente->cpf,
            ]),

            'atendente' => $this->whenLoaded('atendente', fn() => [
                'id' => $this->atendente->id,
                'nome' => $this->atendente->nome,
            ]),

            'medico' => $this->whenLoaded('medico', fn() => [
                'id' => $this->medico->id,
                'nome' => $this->medico->nome,
            ]),

            'especialidade' => $this->whenLoaded('especialidade', fn() => [
                'id' => $this->especialidade->id,
                'nome' => $this->especialidade->nome,
            ]),

            'observacoes' => $this->observacoes,
            'iniciado_em' => $this->iniciado_em,
            'finalizado_em' => $this->finalizado_em,
        ];


    }
}
