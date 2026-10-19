<?php

namespace App\Http\Controllers;

use App\Http\Resources\AtendimentoResource;
use App\Services\Atendimento\ListarAtendimentosService;
use Illuminate\Http\Request;

class ListarAtendimentosController extends Controller
{
    public function index(ListarAtendimentosService $service)
    {
        $atendimentos = $service->listarAtendimentos();
        return AtendimentoResource::collection($atendimentos);

    }
}
