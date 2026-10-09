<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use App\Services\Paciente\PacienteService;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function store(PacienteRequest $request, PacienteService $service)
    {
        $paciente = $service->criar($request->validated());
        return new PacienteResource($paciente);
    }

    public function update(PacienteRequest $request, Paciente $paciente, PacienteService $service)
    {
        $paciente = $service->atualizar(
            $paciente,
            $request->validated()
        );
        return new PacienteResource($paciente);
    }
}
