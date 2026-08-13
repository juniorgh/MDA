<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServicoCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:80'],

            'slug' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('servico_categorias', 'slug')
                    ->ignore($categoria),
            ],

            'descricao' => ['nullable', 'string', 'max:160'],
            'icone' => ['nullable', 'string', 'max:50'],
            'ordem' => ['required', 'integer', 'min:0', 'max:65535'],
            'ativo' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome da categoria.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome pode ter no máximo 80 caracteres.',

            'slug.required' => 'Informe o slug.',
            'slug.string' => 'O slug deve ser um texto.',
            'slug.max' => 'O slug pode ter no máximo 100 caracteres.',
            'slug.regex' => 'Use apenas letras minúsculas, números e hífens.',
            'slug.unique' => 'Este slug já está sendo utilizado.',

            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max' => 'A descrição pode ter no máximo 160 caracteres.',

            'icone.string' => 'O ícone informado é inválido.',
            'icone.max' => 'O ícone pode ter no máximo 50 caracteres.',

            'ordem.required' => 'Informe a ordem de exibição.',
            'ordem.integer' => 'A ordem deve ser um número inteiro.',
            'ordem.min' => 'A ordem não pode ser negativa.',
            'ordem.max' => 'A ordem informada é muito alta.',

            'ativo.required' => 'Informe a situação da categoria.',
            'ativo.boolean' => 'A situação informada é inválida.',
        ];
    }
}
