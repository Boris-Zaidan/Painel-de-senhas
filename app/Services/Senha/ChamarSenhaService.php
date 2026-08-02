<?php

namespace App\Services\Senha;

use App\Events\SenhaFoiChamada;
use App\Exceptions\SenhaNaoPodeSerChamadaException;
use App\Models\Senha;
use Illuminate\Support\Facades\Redis;

class ChamarSenhaService
{
    public function executar(Senha $senha): Senha
    {

        $this->validar($senha);
        $this->alterarStatus($senha);
        $this->dispararEvento($senha);


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

    private function dispararEvento(Senha $senha): void
    {
        // dump('Evento disparado');
        // event(new SenhaFoiChamada($senha));
        Redis::publish('senhas', json_encode([
            'id' => $senha->id,
            'codigo' => $senha->codigo,
            'tipo' => $senha->tipo,
            'status' => $senha->status,
        ]));


    }


}
