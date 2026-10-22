<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('senha_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('paciente_id')
                ->constrained('pacientes');

            $table->foreignId('medico_id')
                ->constrained('medicos')
                ->restrictOnDelete();

            $table->foreignId('atendente_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('especialidade_id')
                ->constrained()
                ->restrictOnDelete();

            $table->timestamp('iniciado_em')->nullable();
            $table->timestamp('finalizado_em')->nullable();
            $table->timestamp('chamado_em')->nullable();

            $table->text('observacoes')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
