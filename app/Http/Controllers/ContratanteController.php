<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContratanteRequest;
use App\Http\Requests\UpdateContratanteRequest;
use App\Models\Contratante;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ContratanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $contratante = User::with('endereco','contratante')->where('id',$userId)->first();

        $user = User::find($userId);

        return view('contratante.index-contratante',
            [
                'contratante' => $contratante,
                'user' => $user
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->id == null) 
        {
            return view('contratante.create');    
        } else {
            $contratante = Contratante::find($request->id);

            return view('contratante.create',['contratante' => $contratante]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contratante = new Contratante();
        $user = new User(); 
        $userId = Auth::id();

        // revisar validate
        // $request->validate($contratante->rules($contratante),$contratante->feedback());

        $contratante->cpf = $request->cpf;
        $contratante->telefone = $request->telefone;
        $contratante->user_id = $userId;

        $contratante->save();

        return redirect()->route('contratante.index')->with('contratante_create_success,contratante cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contratante $contratante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $contratante = Contratante::find($id);

        $log = true;

        return view(
            'contratante.edit',
            [
                'contratante' => $contratante,
                'log' => $log
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratanteRequest $request, Contratante $contratante)
    {
        $userId = Auth::id();

        $user = User::find($userId);

        $user->update([
            'name' => $request->name,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'password' => $request->password,
            'user_group_id' => User::returnUserType()
        ]);

        $contratante->update([
            'user_id' => $userId,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'foto' => $request->foto,
            'ativo' => 1
        ]);

        return redirect()->route('contratante.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contratante $contratante)
    {
        //
    }
}
