<?php

namespace App\Http\Controllers;

use App\Models\MeioPagamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeioPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meiopagamento = MeioPagamento::all();

        return view('meiopagamento/index',['meiopagamento'=>$meiopagamento] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meiopagamento/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meiopagamento_novo = new MeioPagamento();

        $meiopagamento_novo->id = $request->id;
        $meiopagamento_novo->nome_meiopagamento = $request->nome_meiopagamento;


        $meiopagamento_novo->save();

        return redirect()->back()->with('message', 'Criado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(MeioPagamento $meiopagamento)
    {
        print($meiopagamento);
        //var_dump($meiopagamento);

        return view('meiopagamento/show', ['meiopagamento' => $meiopagamento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $meiopagamento = MeioPagamento::find($id);

        return view('meiopagamento/edit', ['meiopagamento' => $meiopagamento, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meiopagamento = MeioPagamento::find($id);

        $meiopagamento->nome_meiopagamento = $request->nome_meiopagamento;
        $meiopagamento->id = $request->id;


        $meiopagamento->save();



        return redirect()->route('meiopagamento.index')->with('message', 'Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meiopagamento = MeioPagamento::find($id);
        $meiopagamento->delete();

        return redirect()->route('meiopagamento.index');
    }
}
