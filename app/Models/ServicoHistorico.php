<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoHistorico extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoHistoricoFactory> */
    use HasFactory;

    public const UPDATED_AT = null;

    protected $fillable = [
        'servico_id',
        'user_id',
        'situacao_anterior',
        'situacao_nova',
        'observacao',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
