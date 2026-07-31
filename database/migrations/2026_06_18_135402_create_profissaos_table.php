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
        Schema::create('profissoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nome')->unique();
            $table->string('slug')->unique();
            $table->text('descricao')->nullable();
            $table->string('icone')->nullable();
            $table->boolean('ativo')->default(true);
            $table->unsignedInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('profissoes', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
         
        Schema::dropIfExists('profissaos');
    }
};
