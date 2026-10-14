<?php

namespace App\Http\Requests;

use App\Rules\Cpf;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $paciente = $this->route('pacientes');

        return [
            'nome' => ['required', 'string',],
            'email' => ['required', 'email', Rule::unique('pacientes', 'email')->ignore($paciente?->id)],
            'cpf' => ['required', 'string', new Cpf(), Rule::unique('pacientes', 'cpf')->ignore($paciente?->id)],
            'telefone' => ['required', 'string',],
        ];
    }
}
