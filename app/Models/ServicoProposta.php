<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoProposta extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoPropostaFactory> */
    use HasFactory;

    protected $fillable = [
        'servico_id',
        'colaborador_id',
        'valor',
        'mensagem',
        'prazo_estimado_dias',
        'status',
        'aceita_em',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'prazo_estimado_dias' => 'integer',
        'aceita_em' => 'datetime',
    ];

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }

}
