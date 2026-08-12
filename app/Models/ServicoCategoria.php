<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoCategoria extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoCategoriaFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'icone',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ordem' => 'integer',
        'ativo' => 'boolean',
    ];

    public function servicos(): HasMany
    {
        return $this->hasMany(
            Servico::class,
            'servico_categoria_id'
        );
    }

}
