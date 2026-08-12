<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Servico extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (Servico $servico) {
            $servico->uuid ??= (string) Str::uuid();
        });
    }

}
