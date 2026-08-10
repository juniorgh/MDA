<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ColaboradorController; 
use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\User;
use App\Models\Profissao;
use App\Models\Utilidade;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoreColaboradorRequest;
    
use App\View\Components\Colaborador\ColaboradorCreateEditComponent;


class ColaboradorController extends Controller
{
    public function index()
    {

        $users = User::with('qualificacoes','endereco')->get();
        $colaboradores = Colaborador::with('profissao')->get();

        $colaboradoresAux = array();


        foreach ($users as $colaborador)
        {
            $utilidade = new Utilidade();
            $colaborador['cpf'] = $utilidade->mascaraCPF($colaborador['cpf']);
            $colaborador['telefone'] = $utilidade->mascaraTELEFONE($colaborador['telefone']);

            $colaboradoresAux[] = $colaborador;
        }

        $user = $colaboradoresAux; 

        $userId = Auth::id();

        $user = User::with('colaborador','qualificacoes','endereco')->find($userId);
        $colaborador = Colaborador::with('profissao')->where('user_id',$userId)->first();

        $pix_bool = false;

        if(!empty($colaborador->chave_pix)) {
            $pix_bool = true;
        }

        return match (User::returnUserType())
        {
            1 => view('colaborador.index',['users' => $users, 'pix_bool' => $pix_bool]),
            2 => view('colaborador.index-colaborador',[
                'user' => $user, 
                'pix_bool' => $pix_bool,
                'colaborador' => $colaborador
            ]),

            default => abort(403),
        };
    }

    public function create()
    {
        $profissoes = Profissao::all();

        $user_id = Auth::id();

        return view('colaborador.create', [
            'profissoes' => $profissoes,
            'user_id' => $user_id
        ]);    
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        
        $colaborador = new Colaborador();
        $user = User::find($userId);

        $user->update([
            $user->user_group_id => 2
        ]);

        $request->validate($colaborador->rules(''),$colaborador->feedback());

        $colaborador->cpf = $request->cpf;
        $colaborador->telefone = $request->telefone;
        $colaborador->chave_pix = $request->chave_pix;
        $colaborador->user_id = $user->id;
        $colaborador->profissao_id = $request->profissao_id;


        $test = $colaborador->save();

        return redirect()->route('colaborador.index')->with('colaborador_create_success, colaborador cadastrado com sucesso.');
    }

    public function show(ShowColaboradorRequest $colaborador){

        return match (User::userType()) {
            1 => view('colaborador.index', compact('colaborador')),
            2 => view('colaborador.show', compact('colaborador')),
            // 3 => view('colaborador.show.contratante', compact('colaborador')),
            default => abort(403),
        };

    }

    public function edit(EditColaboradorRequest $colaborador)
    {
        $profissoes = Profissao::all();
        // new ColaboradorCreateEditComponent($colaborador,$profissoes);

        return view(
            'colaborador.edit',
            [
                'colaborador' => $colaborador,
                'profissoes' => $profissoes
            ]
        );

    }

    public function update(UpdateColaboradorRequest $request, Colaborador $colaborador) {
        $colaborador = Colaborador::with('user')->find($request->id);
        $user = User::find($request->user_id);

        $colaborador->cpf = $request->cpf;
        $colaborador->cpf = $request->cpf;
        $colaborador->telefone = $request->telefone;
        $colaborador->chave_pix = $request->chave_pix;

        $user->name = $request->name;
        $user->sobrenome = $request->sobrenome;
        $user->email = $request->email;

        if(!empty($request->password))
        {
            if($request->password !== $request->password_confirmation)
            {

                return back()->with('error', 'As senhas não conferem.');
            }

            $user->password = bcrypt($request->password);
        }

        $request->validate($colaborador->rules($colaborador),$colaborador->feedback());
        $this->authorize('update',$colaborador);

        $colaborador->save();
        $user->save();

        return redirect()
            ->route('colaborador.index');
    }

    public function destroy($id)
    {
        $colaborador = Colaborador::find($id); 

        $colaborador->delete();

        return redirect()->route('colaborador.index');
    }
}




































