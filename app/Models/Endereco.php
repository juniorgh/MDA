<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    /** @use HasFactory<\Database\Factories\EnderecoFactory> */
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep'
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

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
}
