<?php

namespace App\Http\Controllers;

use App\Http\Requests\SenhaStoreRequest;
use App\Http\Resources\SenhaResource;


use App\Services\SenhaService;
use Illuminate\Http\Request;

class SenhaController extends Controller
{
    public function store(SenhaStoreRequest $request, SenhaService $service)
    {
        $senha = $service->gerarSenha($request->validated());
        return (new SenhaResource($senha))->response()->setStatusCode(201);

    }

    public function index(SenhaService $service)
    {
        $senhaDoDia = $service->listarSenhaDoDia();
        return SenhaResource::collection($senhaDoDia)->response()->setStatusCode(200);

    }

}

