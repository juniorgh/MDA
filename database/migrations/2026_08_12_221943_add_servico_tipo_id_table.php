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
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropColumn('tipo');

            $table->foreignId('servico_tipo_id')
                ->after('servico_categoria_id')
                ->constrained('servico_tipos')
                ->restrictOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('servico_tipo_id');

            $table->string('tipo', 30)
                ->after('servico_categoria_id');
        });

    }
};
