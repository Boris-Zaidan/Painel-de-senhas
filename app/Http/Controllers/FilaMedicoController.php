<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilaMedicoResource;
use App\Models\Medico;
use App\Services\Medico\ListarFilaMedicoService;


class FilaMedicoController extends Controller
{
    public function index(Medico $medico, ListarFilaMedicoService $service)
    {
        $fila = $service->executar($medico);
        return FilaMedicoResource::collection($fila);


    }
}
