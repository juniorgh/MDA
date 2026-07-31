<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualidade extends Model
{
    public function rules() {
        return [
            'titulo'            => 'required|min:3|max:255|regex:/^[\pL\s\-]+$/u',
            'instituicao'       => 'required|min:3|max:255|regex:/^[\pL\s\-]+$/u',
            'ano_inicio' => 'required|integer',
            'ano_fim'    => 'required|integer',
            'descricao'         => 'nullable|max:1000',
            'arquivo'           => 'required|file|mimes:pdf,jpg,jpeg,png',
            // 'codigo_validacao'  => 'nullable|max:255',
            // 'url_validacao'     => 'nullable|url|max:255',
            // 'status_validacao'  => 'required|integer|min:0|max:4',
            // 'pontos'            => 'required|integer|min:0|max:100',
        ];

    }
    public function feedback() {
        return [
            'titulo.required' => 'Informe o título da qualificação.',
            'titulo.min' => 'O título deve possuir no mínimo 3 caracteres.',
            'titulo.max' => 'O título deve possuir no máximo 255 caracteres.',
            'titulo.regex' => 'O titulo deve conter apenas letras, espaços e hífen.',

            'instituicao.min' => 'A instituição deve possuir no mínimo 3 caracteres.',
            'instituicao.max' => 'A instituição deve possuir no máximo 255 caracteres.',
            'instituicao.regex' => 'O titulo deve conter apenas letras, espaços e hífen.',

            'ano_inicio.integer' => 'Ano de início inválido.',

            'ano_fim.integer' => 'Ano de conclusão inválido.',

            'descricao.max' => 'A descrição deve possuir no máximo 1000 caracteres.',

            'arquivo.file' => 'Arquivo inválido.',
            'arquivo.mimes' => 'Envie apenas PDF, JPG, JPEG ou PNG.',

            'url_validacao.url' => 'Informe uma URL válida.',

            'status_validacao.required' => 'Informe o status da validação.',
            'status_validacao.min' => 'Status inválido.',
            'status_validacao.max' => 'Status inválido.',

            'pontos.required' => 'Informe a pontuação.',
            'pontos.min' => 'A pontuação não pode ser negativa.',
            'pontos.max' => 'A pontuação máxima é 100.',
        ];

    }

    public function retornaNomeArquivoQualificacao($nome_arquivo)
    {
        $nome_arquivo_atualizado = $nome_arquivo . date('y/m/dH:i:s');
        return $nome_arquivo_atualizado;
    }
}