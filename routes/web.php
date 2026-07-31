<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard','App\Http\Controllers\DashboardController');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('colaborador/{colaborador}/show-admin',[App\Http\Controllers\ColaboradorController::class, 'show'])->name('colaborador.show-admin');

    Route::prefix('colaborador')->group(function () {
        Route::resource('profissao','App\Http\Controllers\ProfissaoController');
        Route::resource('endereco','App\Http\Controllers\EnderecoController');
        Route::resource('qualidade','App\Http\Controllers\QualidadeController');
    });
    

    Route::resource('colaborador','App\Http\Controllers\ColaboradorController');
    Route::resource('contratante','App\Http\Controllers\ContratanteController');
    
});

require __DIR__.'/auth.php';
