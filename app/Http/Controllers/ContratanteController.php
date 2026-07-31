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

        $contratantes = Contratante::all();
        return view('contratante.index',['contratantes' => $contratantes]);
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

        $request->validate($user->rules(),$user->feedback());
        
        $request->validate($contratante->rules($contratante),$contratante->feedback());
        
        $user->name = $request->name;
        $user->sobrenome = $request->sobrenome;
        $user->password = bcrypt($request->password);

        
        if($request->email_validador === $request->email)
        {
            $user->email = $request->email;            
        } else {
            echo 'verifique o email';
            exit;
        }

        $user->save();

        $contratante->cpf = $request->cpf;
        $contratante->telefone = $request->telefone;
        $contratante->chave_pix = $request->chave_pix;
        $contratante->user_id = $user->id;

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
    public function edit(Contratante $contratante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratanteRequest $request, Contratante $contratante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contratante $contratante)
    {
        //
    }
}
