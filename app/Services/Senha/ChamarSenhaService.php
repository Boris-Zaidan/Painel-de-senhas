<?php

namespace App\Services\Senha;

use App\Events\SenhaFoiChamada;
use App\Exceptions\SenhaNaoPodeSerChamadaException;
use App\Models\Atendente;
use App\Models\Guiche;
use App\Models\Senha;
use Illuminate\Support\Facades\Redis;

class ChamarSenhaService
{
    public function executar(Senha $senha, array $data): Senha
    {

        $this->validar($senha);
        $this->alterarStatus($senha, $data);
        $this->dispararEvento($senha);


        return $senha->load([
            'guiche',
            'atendente'
        ]);
    }

    private function validar(Senha $senha): void
    {
        if ($senha->status !== 'aguardando') {
            throw new SenhaNaoPodeSerChamadaException(
                'Somente senha com status Aguardando podem ser chamada.'
            );

        }

    }

    private function alterarStatus(Senha $senha, array $data): void
    {
        $senha->status = "chamando";
        $senha->guiche_id = $data['guiche_id'];
        $senha->atendente_id = $data['atendente_id'];
        $senha->chamado_em = now();
        $senha->save();

    }

    private function dispararEvento(Senha $senha): void
    {
        // dump('Evento disparado');
        event(new SenhaFoiChamada($senha));
        // Redis::publish('senhas', json_encode([
        //     'id' => $senha->id,
        //     'codigo' => $senha->codigo,
        //     'tipo' => $senha->tipo,
        //     'status' => $senha->status,
        // ]));


    }


}
