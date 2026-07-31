<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('user_groups', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->timestamps();
    });

    DB::table('user_groups')->insert([
        [
            'id' => 1,
            'nome' => 'Administrador',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 2,
            'nome' => 'Colaborador',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 3,
            'nome' => 'Contratante',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);

    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('user_group_id')->nullable();
    });

    // Admin
    DB::table('users')
        ->where('id', 1)
        ->update(['user_group_id' => 1]);

    // Todos os demais
    DB::table('users')
        ->where('id', '<>', 1)
        ->update(['user_group_id' => 2]);

    Schema::table('users', function (Blueprint $table) {
        $table->foreign('user_group_id')
            ->references('id')
            ->on('user_groups');

        $table->unsignedBigInteger('user_group_id')->nullable(false)->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_group_id']);
            $table->dropColumn('user_group_id');
        });

        Schema::dropIfExists('user_groups');
    }
};
