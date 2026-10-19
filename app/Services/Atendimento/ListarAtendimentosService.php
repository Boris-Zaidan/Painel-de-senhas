<?php

namespace App\Services\Atendimento;

use App\Models\Atendimento;



class ListarAtendimentosService
{

    public function listarAtendimentos()
    {

        // //atendimento do dia
        //     Atendimento::whereDate('created_at', today())
        //         ->oldest()->get();
        return Atendimento::oldest()->get();
    }
}
