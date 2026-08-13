<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Servico extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'contratante_id',
        'colaborador_id',
        'servico_categoria_id',
        'servico_tipo_id',
        'titulo',
        'descricao',
        'local_tipo',
        'endereco_id',
        'urgencia',
        'data_preferida',
        'periodo',
        'orcamento_tipo',
        'orcamento_minimo',
        'orcamento_maximo',
        'status',
        'termos_aceitos_em',
        'publicado_em',
    ];

    protected $casts = [
        'data_preferida' => 'date',
        'orcamento_minimo' => 'decimal:2',
        'orcamento_maximo' => 'decimal:2',
        'termos_aceitos_em' => 'datetime',
        'publicado_em' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Servico $servico) {
            $servico->uuid ??= (string) Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function contratante(): BelongsTo
    {
        return $this->belongsTo(Contratante::class);
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(
            ServicoCategoria::class,
            'servico_categoria_id'
        );
    }

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }

    public function anexos(): HasMany
    {
        return $this->hasMany(ServicoAnexo::class);
    }

    public function propostas(): HasMany
    {
        return $this->hasMany(ServicoProposta::class);
    }

    public function historicos(): HasMany
    {
        return $this->hasMany(ServicoStatusHistorico::class);
    }
}
