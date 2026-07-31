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
        Schema::table('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('colaborador_id')->nullable();
            $table->foreign('colaborador_id')->references('id')->on('enderecos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enderecos', function (Blueprint $table)
        {
            $table->dropForeign(['colaborador_id']);
            $table->dropColumn('colaborador_id');
        });
    }
};
