<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Endereco;
use App\Models\Profissao;

class DashboardController extends Controller
{
    public function index() {

        $cadastrosFaltantes = [];

        $userType = User::returnUserType();
        $user_id = Auth::id();

        if($userType == 2) {
            $user = User::with('endereco','qualificacoes','colaborador','profissao')->find($user_id)->first();

            if($user->endereco->count() == 0) {
                $msg = 
                    [
                        'slug' => 'Endereço',
                        'mensagem' => 'Favor cadastrar seu endereçamento',
                        'classe' => 'endereco.create'
                    ];

                array_push($cadastrosFaltantes, $msg);
            }

            if($user->qualificacoes->count() == 0) {
                $msg = 
                    [
                        'slug' => 'Qualificação',
                        'mensagem' => 'Favor cadastrar suas qualificacoes',
                        'classe' => 'qualidade.create'
                    ];

                array_push($cadastrosFaltantes, $msg);
            }

            if($user->colaborador->count() == 0) {
                $msg = 
                    [
                        'slug' => 'Colaborador',
                        'mensagem' => 'Ainda precisamos de algumas inforamções complementares, cadastre-se',
                        'classe' => 'colaborador.create'
                    ];
                array_push($cadastrosFaltantes, $msg);
            }

            if($user->profissao->count() == 0) {
                $msg = 
                    [
                        'slug' => 'Profissao',
                        'mensagem' => 'Favor cadastrar sua profissão',
                        'classe' => 'profissao.create'
                    ];

                array_push($cadastrosFaltantes, $msg);
            }

        }


        return match ($userType)
        {
            1 => view('dashboard.administrador'),
            2 => view('dashboard.colaborador', [
                'cadastrosFaltantes' => $cadastrosFaltantes
            ]),
            3 => view('dashboard.contratante'),
            default => abort(403),
        };

    }
}
