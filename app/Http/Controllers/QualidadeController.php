<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualidade;
use App\Models\Utilidade;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\View\Components\Qualidade\QualidadeCreateEditComponent;

class QualidadeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        $qualidades = Qualidade::all();

        return view('qualidade.index',[
            'qualidades' => $qualidades
        ]);
    }

    public function create()
    {
        $colaborador = Colaborador::where('user_id',Auth::id())->first();

        // new QualidadeCreateEditComponent(null,$colaborador->id);
        // return view('qualidade.create', ['id' => $colaborador->id]);

        return view('qualidade.create');
    }


    public function store(Request $request)
    {
        $utilidades = new Utilidade();
        
        $arquivo = $request->file('arquivo');
        $local_disco = 'Qualidades/arquivos/certificados';
        
        $qualidade = new Qualidade();        

        $request->validate($qualidade->rules(),$qualidade->feedback());

        $userId = Auth::id();

        $colaborador = Colaborador::where('user_id',$userId)->first();

        $qualidade->colaborador_id = $colaborador->id;
        $qualidade->titulo = $request->titulo;
        $qualidade->instituicao = $request->instituicao;
        $qualidade->ano_inicio = $request->ano_inicio;
        $qualidade->ano_fim = $request->ano_fim;
        $qualidade->descricao = $request->descricao;

        $qualidade->pontos = 0.5;

        $urn_file = $utilidades->insereDiploma($arquivo,$local_disco);
        $qualidade->arquivo = $urn_file;

        $qualidade->save();

        return redirect()->route('qualidade.index');
    }

    public function edit(Qualidade $qualidade)
    {
        new QualidadeCreateEditComponent($qualidade);

        return view(
            'qualidade.edit',
            compact('qualidade')
        );

    }


}