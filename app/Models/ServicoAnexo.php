<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoAnexo extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoAnexoFactory> */
    use HasFactory;

    protected $fillable = [
        'servico_id',
        'nome_original',
        'caminho',
        'mime_type',
        'tamanho',
    ];

    protected $casts = [
        'tamanho' => 'integer',
    ];

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }

}
