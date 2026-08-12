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

            $table->uuid('uuid')->unique();

            $table->foreignId('contratante_id')
                ->constrained('contratantes')
                ->restrictOnDelete();

            // Preenchido quando um prestador assumir o serviço.
            $table->foreignId('colaborador_id')
                ->nullable()
                ->constrained('colaboradores')
                ->restrictOnDelete();

            $table->foreignId('servico_categoria_id')
                ->constrained('servico_categorias')
                ->restrictOnDelete();

            $table->string('tipo', 30);

            $table->string('titulo', 80);
            $table->text('descricao');

            // endereco_salvo, outro ou remoto.
            $table->string('local_tipo', 20);

            $table->foreignId('endereco_id')
                ->nullable()
                ->constrained('enderecos')
                ->restrictOnDelete();

            $table->string('urgencia', 30);
            $table->date('data_preferida')->nullable();
            $table->string('periodo', 20);

            // faixa ou aberto.
            $table->string('orcamento_tipo', 20);

            $table->decimal('orcamento_minimo', 10, 2)
                ->nullable();

            $table->decimal('orcamento_maximo', 10, 2)
                ->nullable();

            $table->string('status', 30)
                ->default('rascunho');

            $table->timestamp('termos_aceitos_em')
                ->nullable();

            $table->timestamp('publicado_em')
                ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'contratante_id',
                'status',
            ]);

            $table->index([
                'colaborador_id',
                'status',
            ]);

            $table->index([
                'servico_categoria_id',
                'status',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }

};
