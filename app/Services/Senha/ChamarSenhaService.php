<?php

namespace App\Services\Senha;

use App\Exceptions\SenhaNaoPodeSerChamadaException;
use App\Models\Senha;

class ChamarSenhaService
{
    public function executar(Senha $senha): Senha
    {

        $this->validar($senha);
        $this->alterarStatus($senha);
        // $this->dispararEvento($senha);


        return $senha;


    }

    private function validar(Senha $senha): void
    {
        if ($senha->status !== 'aguardando') {
            throw new SenhaNaoPodeSerChamadaException(
                'Somente senha com status Aguardando podem ser chamada.'
            );

        }

    }

    private function alterarStatus(Senha $senha): void
    {
        $senha->status = "chamando";
        $senha->chamado_em = now();


        $senha->save();

    }

    // private function dispararEvento(Senha $senha): void
    // {
    //     dd('x');
    // }


}
