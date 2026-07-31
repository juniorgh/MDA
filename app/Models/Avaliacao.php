<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    /** @use HasFactory<\Database\Factories\AvaliacaoFactory> */
    use HasFactory;

    protected $table = 'avaliacoes';
}
