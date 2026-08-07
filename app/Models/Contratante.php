<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratante extends Model
{
    /** @use HasFactory<\Database\Factories\ContratanteFactory> */
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'cpf',
        'telefone',
        'data_nascimento',
        'foto',
        'ativo'
    ];

    public function rules($contratante) {
        return [
            'user_id' => 'required|exists:users,id',
            'cpf' => 'required|regex:/^[0-9]/|string|min:11|max:11|unique:contratantes,cpf,' . $this->contratante?->id,
            'telefone' => 'required|string|max:20|min:11|regex:/^[0-9]/',
            'data_nascimento' => 'required|date',
            'foto' => 'nullable|string|max:255',
            'ativo' => 'required|boolean',
        ];

    }

    //relacionamentos
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco() {

        return $this->hasOne(Endereco::class);
    }
    
    public function feedback() {
        return [
            'user_id.required' => 'O usuário é obrigatório.',
            'user_id.exists' => 'Usuário inválido.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'cpf.min' => 'O CPF deve possuir no mínimo 11 caracteres.',
            'cpf.max' => 'O CPF deve possuir no máximo 11 caracteres.',
            'cpf.regex' => 'O CPF deve conter apenas números.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.max' => 'O telefone deve possuir no máximo 20 caracteres.',
            'telefone.regex' => 'O telefone deve conter apenas números.',

            'data_nascimento.required' => 'A data de nascimento é obrigatório.',
            'data_nascimento.date' => 'Data de nascimento inválida.',

            'foto.max' => 'O caminho da foto deve possuir no máximo 255 caracteres.',

            'ativo.required' => 'O status é obrigatório.',
            'ativo.boolean' => 'O status deve ser verdadeiro ou falso.',
            'telefone.min' => 'O telefone deve conter no mínimo 11 caracteres'


        ];

    }
}
