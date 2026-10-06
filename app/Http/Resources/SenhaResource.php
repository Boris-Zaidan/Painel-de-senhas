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

        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'status' => $this->status,
            'chamado_em' => $this->chamado_em,

            'guiche' => $this->whenLoaded('guiche', function () {
                return [
                    'id' => $this->guiche->id,
                    'nome' => $this->guiche->nome,
                ];
            }),

            'atendente' => $this->whenLoaded('atendente', function () {
                return [
                    'id' => $this->atendente->id,
                    'nome' => $this->atendente->nome,
                ];
            }),
        ];


    }
}
