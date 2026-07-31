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
        Schema::create('senhas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->enum('tipo', [
                'normal',
                'expedicao',
                'atendimento',
                'prioritario',
            ])->default('normal');

            $table->enum('status', [
                'aguardando',
                'chamando',
                'finalizada',
            ])->default('aguardando');

            $table->timestamp('chamado_em')->nullable();
            $table->timestamp('finalizado_em')->nullable();

            $table->timestamps();
            //depois adiciono relacionamento

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senhas');
    }
};
