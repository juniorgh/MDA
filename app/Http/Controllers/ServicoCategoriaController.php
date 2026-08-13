<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicoCategoriaRequest;
use App\Http\Requests\UpdateServicoCategoriaRequest;
use App\Models\ServicoCategoria;

class ServicoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('servico-categoria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servico-categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicoCategoriaRequest $request)
    {
        $servicoCategoria = new ServicoCategoria();

        $servicoCategoria->nome = $request->nome;
        $servicoCategoria->slug = $request->slug;
        $servicoCategoria->descricao = $request->descricao;
        $servicoCategoria->icone = $request->icone;
        $servicoCategoria->ordem = $request->ordem;
        $servicoCategoria->ativo = $request->ativo;

        $servicoCategoria->save();

        return redirect()->route('servico-categoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicoCategoriaRequest $request, ServicoCategoria $servicoCategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicoCategoria $servicoCategoria)
    {
        //
    }
}
