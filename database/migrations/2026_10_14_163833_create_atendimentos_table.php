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

            $table->foreignId('medico_id')
                ->constrained('medicos')
                ->cascadeOnDelete();

            $table->foreignId('atendente_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('especialidade_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamp('iniciado_em')->nullable();
            $table->timestamp('finalizado_em')->nullable();

            $table->text('observacoes')->nullable();

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
