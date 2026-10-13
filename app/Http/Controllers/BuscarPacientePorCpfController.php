<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteCpfResource;
use App\Services\Paciente\PacienteService;
use Illuminate\Http\Request;

class BuscarPacientePorCpfController extends Controller
{
    public function show(string $cpf, PacienteService $service)
    {

        $paciente = $service->buscarPorCpf($cpf);
        return new PacienteCpfResource($paciente);


    }
}
