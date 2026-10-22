<?php



use App\Http\Controllers\BuscarPacientePorCpfController;
use App\Http\Controllers\FilaMedicoController;
use App\Http\Controllers\ListarAtendimentosController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RegistrarTriagemController;
use App\Http\Controllers\SenhaController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('senhas', [SenhaController::class, 'store']);
    Route::get('senhas', [SenhaController::class, 'index']);
    Route::get('atendimentos', [ListarAtendimentosController::class, 'index']);
    Route::post('senhas/{senha}/chamar', [SenhaController::class, 'chamar']);
    Route::post('pacientes', [PacienteController::class, 'store']);
    Route::get('paciente/cpf/{cpf}', [BuscarPacientePorCpfController::class, 'show']);
    Route::patch('pacientes/{paciente}', [PacienteController::class, 'update']);
    Route::post('senhas/{senha}/triagem', [RegistrarTriagemController::class, 'store']);
    Route::get('medicos/{medico}/fila', [FilaMedicoController::class, 'index']);


});


Route::get('teste-reverb', function () {
    return view('welcome');
});
