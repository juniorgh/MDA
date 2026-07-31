<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Qualidade;

class Colaborador extends Model
{
    protected $table = 'colaboradores';

    protected $fillable = [
        'cpf',
        'telefone',
        'chave_pix',
        'pontuacao_total',
        'quantidade_estrelas'
    ];

    public function endereco() {

        return $this->hasOne(Endereco::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profissao()
    {
        return $this->belongsTo(Profissao::class);
    }

    public function qualificacoes()
    {
        return $this->hasMany(Qualidade::class);
    }


    public function rules($colaborador) {
        return [
            'cpf' => 'required|regex:/^[0-9]/|string|min:11|max:14|unique:contratantes,cpf,' . $this->contratante?->id,
            'telefone' => 'required|string|max:20|min:11|regex:/^[0-9]/',
            'chave_pix' => 'required',
        ];

    }
    public function feedback() {
        return [
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'cpf.min' => 'O CPF deve possuir no mínimo 11 caracteres.',
            'cpf.max' => 'O CPF deve possuir no máximo 14 caracteres.',
            'cpf.regex' => 'O CPF deve conter apenas números.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.max' => 'O telefone deve possuir no máximo 20 caracteres.',
            'telefone.regex' => 'O telefone deve conter apenas números.',
            'chave_pix.required' => 'O PIX deve ser obrigatório.'
        ];

    }
}
