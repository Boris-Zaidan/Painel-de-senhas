<?php

namespace App\Services\Atendimento;

use App\Exceptions\TriagemNaoPermitidaException;
use App\Models\Atendimento;
use App\Models\Senha;
use Illuminate\Support\Facades\DB;

class RegistrarTriagemService
{
    public function executar(Senha $senha, array $data): Atendimento
    {
        return DB::transaction(function () use ($senha, $data) {

            $senha = Senha::query()
                ->lockForUpdate()
                ->findOrFail($senha->id);

            if ($senha->status !== 'chamando_guiche') {
                throw new TriagemNaoPermitidaException(
                    'Somente senhas chamadas podem entrar em triagem.'
                );
            }

            if (!$senha->atendente_id) {
                throw new TriagemNaoPermitidaException(
                    'A senha não possui atendente responsável.'
                );
            }

            $existe = Atendimento::query()
                ->where('senha_id', $senha->id)
                ->exists();

            if ($existe) {
                throw new TriagemNaoPermitidaException(
                    'Já existe um atendimento registrado para esta senha.'
                );
            }

            $atendimento = Atendimento::create([
                'senha_id' => $senha->id,
                'paciente_id' => $data['paciente_id'],
                'atendente_id' => $senha->atendente_id,
                'medico_id' => $data['medico_id'],
                'especialidade_id' => $data['especialidade_id'],
                'observacoes' => $data['observacoes'] ?? null,
            ]);

            $senha->status = 'aguardando_medico';
            $senha->save();

            return $atendimento->load([
                'senha',
                'paciente',
                'atendente',
                'medico',
                'especialidade',
            ]);
        });
    }
}
