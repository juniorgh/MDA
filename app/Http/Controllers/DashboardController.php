<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Endereco;
use App\Models\Profissao;
use App\Models\Colaborador;

class DashboardController extends Controller
{
    public function index() {

        $user = new User();

        $verificaCadastros = $user->verificadorDeCadastrosContratanteColaborador();

        $cadastrosFaltantes = $verificaCadastros[0];
        $userLogado = $verificaCadastros[1];

        return view('dashboard.index', [
                'user' => $userLogado,
                'cadastrosFaltantes' => $cadastrosFaltantes

            ]);

        // return match ($userType)
        // {
        //     1 => view('dashboard.administrador', [
        //         'user' => $user
        //     ]),
        //     2 => view('dashboard.colaborador', [
        //         'user' => $user,
        //         'cadastrosFaltantes' => $cadastrosFaltantes
        //     ]),
        //     3 => view('dashboard.contratante', [
        //         'user' => $user,
        //         'cadastrosFaltantes' => $cadastrosFaltantes
        //     ]),
        //     default => abort(403),
        // };

    }
}
