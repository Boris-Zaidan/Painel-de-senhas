<?php

namespace App\Services\Senha;

use App\Models\Senha;

class ListarSenhaDoDiaService
{

    public function listarSenhaDoDia()
    {
        return Senha::whereDate('created_at', today())
            ->oldest()->get();
    }

}
