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
        Schema::create('avaliacaos', function (Blueprint $table)
        {
            $table->id();

            $table->unsignedBigInteger('colaborador_id');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');

            $table->tinyInteger('nota');

            $table->text('comentario',500)
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacaos', function(Blueprint $table)
        {
            $table->dropForeign(['colaborador_id']);
            $table->dropColumn('colaborador_id');
        });
        
        Schema::dropIfExists('avaliacaos');
    }
};
