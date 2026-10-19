<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrarTriagemRequest;
use App\Http\Resources\AtendimentoResource;
use App\Models\Senha;
use App\Services\Atendimento\RegistrarTriagemService;


class RegistrarTriagemController extends Controller
{
    public function store(
        RegistrarTriagemRequest $request,
        Senha $senha,
        RegistrarTriagemService $service
    ) {
        $atendimento = $service->executar(
            $senha,
            $request->validated()
        );

        return new AtendimentoResource($atendimento);
    }
}
