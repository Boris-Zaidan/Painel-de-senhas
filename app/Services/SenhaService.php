<?php

namespace App\Services;

use App\Models\Senha;
use Illuminate\Support\Facades\DB;

class SenhaService
{
    public function gerarSenha(array $dados): Senha
    {

        return DB::transaction(function () use ($dados) {

            $dados['codigo'] = $this->gerarCodigo($dados['tipo']);
            $dados['status'] = 'Aguardando';
            return Senha::query()->create($dados);

        });

    }

    private function gerarCodigo(string $tipo): string
    {
        $ultimaSenha = $this->buscarUltimaSenha($tipo);
        $numero = $ultimaSenha
            ? $this->extrairNumero($ultimaSenha->codigo) + 1
            : 1;
        return $this->formatarCodigo($tipo, $numero);
    }

    private function buscarUltimaSenha(string $tipo): ?Senha
    {
        return Senha::where('tipo', $tipo)
            ->whereDate('created_at', today())
            ->lockForUpdate()
            ->latest('id')
            ->first();

    }

    private function extrairNumero(string $codigo): int
    {
        return (int) preg_replace('/\D/', '', $codigo);


    }

    private function formatarCodigo(string $tipo, int $numero): string
    {
        $prefixo = strtoupper(substr($tipo, 0, 3));
        return $prefixo . str_pad($numero, 4, '0', STR_PAD_LEFT);

    }

}
