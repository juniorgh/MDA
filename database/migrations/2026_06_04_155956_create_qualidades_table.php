<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qualidades', function (Blueprint $table) {
    
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
                    $table->foreign('colaborador_id')->references('id')->on('colaboradores');

            $table->string('titulo');
            $table->string('instituicao')->nullable();

            $table->year('ano_inicio')->nullable();
            $table->year('ano_fim')->nullable();

            $table->text('descricao')->nullable();

            $table->string('arquivo')->nullable();

            $table->unsignedTinyInteger('pontos')->default(0);

            $table->timestamps();
        });

        Schema::create('qualidade_validacoes', function (Blueprint $table){
            $table->unsignedBigInteger('qualidade_id'); 
            $table->foreign('qualidade_id')->references('id')->on('qualidades');
            
            $table->string('codigo')->nullable();
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qualidade_validacoes', function(Blueprint $table)
        {
            $table->dropForeign(['qualidade_id']);
            $table->dropColumn('qualidade_id');
        });

        Schema::dropIfExists('qualidade_validacoes');

        Schema::table('qualidades', function(Blueprint $table)
        {
            $table->dropForeign(['colaborador_id']);
            $table->dropColumn('colaborador_id');
        });

        Schema::dropIfExists('qualidades');
    }
};
