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

        $colaboradores = User::with('qualificacoes','profissao','endereco')->get();

        $colaboradoresAux = array();



        foreach ($colaboradores as $colaborador)
        {
            $utilidade = new Utilidade();
            $colaborador['cpf'] = $utilidade->mascaraCPF($colaborador['cpf']);
            $colaborador['telefone'] = $utilidade->mascaraTELEFONE($colaborador['telefone']);

            $colaboradoresAux[] = $colaborador;
        }

        $colaboradores = $colaboradoresAux; 

        $userId = Auth::id();



        $colaborador = User::with('colaborador','qualificacoes','profissao','endereco')
        ->where('id',$userId)->first();

        $pix_bool = false;

        if(!empty($colaborador->chave_pix)) {
            $pix_bool = true;
        }


        return match (User::returnUserType())
        {
            1 => view('colaborador.index',['colaboradores' => $colaboradores, 'pix_bool' => $pix_bool]),
            2 => view('colaborador.index-colaborador',['colaborador' => $colaborador, 'pix_bool' => $pix_bool]),

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
        $colaborador = new Colaborador();
        $user = new User();

        $request->validate($colaborador->rules(''),$colaborador->feedback());
        $request->validate($user->rules(),$user->feedback());
    
        
        $user->name = $request->name;
        $user->sobrenome = $request->sobrenome;
        $user->password = bcrypt($request->password);
        $user->user_group_id = 2;

        if($request->email_validador === $request->email)
        {
            $user->email = $request->email;            
        } else {
            echo 'verifique o email';
            exit;
        }

        // $user->save();

        $colaborador->cpf = $request->cpf;
        $colaborador->telefone = $request->telefone;
        $colaborador->chave_pix = $request->chave_pix;
        $colaborador->user_id = $user->id;

        $colaborador->save();

        return redirect()->route('colaborador.index')->with('colaborador_create_success,Colaborador cadastrado com sucesso.');
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




































