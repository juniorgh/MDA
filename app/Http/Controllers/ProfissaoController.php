<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfissaoRequest;
use App\Http\Requests\UpdateProfissaoRequest;
use App\Models\Profissao;
use App\Models\Utilidade;
use App\Models\User;
use App\View\Components\Profissao\ProfissaoCreateEditComponent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ProfissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profissoes = Profissao::with('colaborador')->get();

        return match (User::returnUserType())
        {
            1 => view('profissao.index',['profissoes' => $profissoes]),
            2 => view('profissao.index-colaborador',['profissao' => User::colaboradorUserId()]),

            default => abort(403),
        };
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profissao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $utility = new Utilidade();
        

        // $resposta = $utility->gerarTexto($request);

        // $geminiProfiDesc = $resposta->getData()->resultado;

        // DD($geminiProfiDesc);

        $profissao = new Profissao();

        $request->validate($profissao->rules(null),$profissao->feedback());

        $profissao->nome = $request->nome;
        $profissao->slug = $request->nome;
        // $profissao->descricao = $geminiProfiDesc;
        $profissao->descricao = $request->descricao;
        $profissao->icone = $request->icone;
        $profissao->ativo = $request->ativo;
        $profissao->ordem = 0;

        $profissao->save();

        return redirect()->route('colaborador.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profissao $profissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profissao $profissao)
    {
        new ProfissaoCreateEditComponent($profissao);

        return view('profissao.edit', [$profissao => 'profissao']);
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, Profissao $profissao)
    {
        $profissao = Profissao::find($profissao->id);
        $user = User::find($profissao->user_id);

        $profissao->nome = $request->nome;
        $profissao->cpf = $request->cpf;
        $profissao->slug = $request->slug;
        $profissao->descricao = $request->descricao;

        $profissao->icone = $request->icone;
        $profissao->ativo = $request->ativo;
        $profissao->ordem = $request->ordem;

        $request->validate($profissao->rules($profissao),$profissao->feedback());

        $this->authorize('update',$profissao);

        $profissao->save();

        return redirect()
            ->route('profissao.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profissao $profissao)
    {
        $profissao = Profissao::find($id); 

        $profissao->delete();

        return redirect()->route('profissao.index');
    }
}
