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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('colaborador_id');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('imagem')->nullable();
            $table->enum('tipo_preco',['fixo', 'orcamento'])->default('orcamento');
            $table->decimal(
                'valor_base',10,2
            )->nullable();

            $table->boolean('atende_domicilio')->default(true);

            $table->boolean('ativo')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('servicos', function(Blueprint $table)
        {
            $table->dropForeign(['colaborador_id']);
            $table->dropColumn('colaborador_id');
        });

        Schema::dropIfExists('servicos');
    }
};
