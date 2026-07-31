<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Auth;

class Profissao extends Model
{
    /** @use HasFactory<\Database\Factories\ProfissaoFactory> */
    use HasFactory;

    protected $table = 'profissoes';

    protected $fillable = [ 
        'nome',
        'descricao',
        'icone',
        'ativo'
    ];


    public function rules($profissao) {
        return [

            'nome' => 'required|unique:profissoes,nome,' . ($profissao->id ?? ''),
            // 'slug' => 'required|string|max:255|unique:profissoes,slug',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|string|max:255',
            'ativo' => 'required|boolean',

        ];
    }

    public function feedback()
    {
        return [

            'nome.required' => 'O nome é obrigatório.',
            'nome.string'   => 'O nome deve ser um texto.',
            'nome.max'      => 'O nome deve ter no máximo 255 caracteres.',
            'nome.unique'   => 'Esta profissão já está cadastrada.',

            'descricao.string' => 'A descrição deve ser um texto.',

            'icone.string' => 'O ícone deve ser um texto.',
            'icone.max'    => 'O ícone deve ter no máximo 255 caracteres.',

            'ativo.required' => 'O campo ativo é obrigatório.',
            'ativo.boolean'  => 'O campo ativo deve ser verdadeiro ou falso.',

        ];
    }

    public function colaborador() {

        return $this->hasMany(Colaborador::class);
    }
}
