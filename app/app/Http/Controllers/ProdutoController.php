<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produto = Produto::all();

        return view('produto/index',['produto'=>$produto] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto_novo = new Produto();

        $produto_novo->id = $request->id;
        $produto_novo->name = $request->name;
        $produto_novo->tipo = $request->tipo;
        $produto_novo->tags = $request->tags;
        $produto_novo->valor = $request->valor;
        $produto_novo->sigla = $request->sigla;


        $produto_novo->save();

        return redirect()->back()->with('message', 'Criado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        print($produto);
        //var_dump($meiopagamento);

        return view('produto/show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $produto = Produto::find($id);

        return view('produto/edit', ['produto' => $produto, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $produto = Produto::find($id);

        $produto->name = $request->name;
        $produto->id = $request->id;
        $produto->tipo = $request->tipo;
        $produto->tags = $request->tags;
        $produto->valor = $request->valor;
        $produto->sigla = $request->sigla;

        $produto->save();



        return redirect()->route('produto.index')->with('message', 'Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
