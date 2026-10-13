<?php

namespace App\Services\Paciente;

use App\Exceptions\PacienteNaoEncontradoException;
use App\Models\Paciente;

class PacienteService
{
    public function buscarPorCpf(string $cpf): Paciente
    {
        $paciente = Paciente::where('cpf', $cpf)->first();
        if (!$paciente) {
            throw new PacienteNaoEncontradoException('Paciente não encontrado!');
        }
        return $paciente;
    }

    public function criar(array $data): Paciente
    {

        return Paciente::create($data);
    }

    public function atualizar(Paciente $paciente, array $data): Paciente
    {
        $paciente->update($data);
        return $paciente->refresh();
    }

}
