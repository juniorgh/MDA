<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Utilidade extends Model
{
    public function mascaraCPF($cpf)
    {
        $a = substr($cpf, 0,3);
        $b = substr($cpf, 3,3);
        $c = substr($cpf, 6,3);
        $d = substr($cpf, 9,2);

        $cpfMascarado = $a . '.' . $b . '.' . $c . '-' . $d;

        return $cpfMascarado;   
    }

    public function mascaraTELEFONE($telefone)
    {
        $a = substr($telefone, 0,2);
        $b = substr($telefone, 2,5);
        $c = substr($telefone, 6,4);

        $telefoneMascarado = '(' . $a . ')' . $b . '-' . $c;

        return $telefoneMascarado;        
    }

    // public function retornaArrLinha($arquivo,$local_disco) 
    // {
    //     $urn_file = $arquivo->store($local_disco,'public');
    //     $asset = asset('storage/' . $urn_file);
    //     $arquivo = fopen($asset,'r');
    //     $arrLine = array();
        

    //     while (!feof($arquivo)) 
    //     {   
    //         array_push($arrLine,fgets($arquivo));
    //     }

    //     return $arrLine;
    // }

    public function insereDiploma($arquivo,$local_disco)
    {
        return $arquivo->store($local_disco,'public');
    }


    public function gerarTexto($request)
    {
        $apiKey = config('services.gemini.key') ?? env('GEMINI_API_KEY');

        $prompt = "Crie uma descrição profissional curta, não gere dialogos, titulos, quebras de linha, somente a descrição formatada para a profissão: { $request->nome }.";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
            [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ]
        );

        if ($response->successful()) {
            $resultado = $response->json('candidates.0.content.parts.0.text');

            return response()->json([
                'resultado' => $resultado
            ]);
        }

        return response()->json([
            'error' => $response->json('error.message') ?? 'Falha ao conectar com a API'
        ], $response->status());
    }

}

