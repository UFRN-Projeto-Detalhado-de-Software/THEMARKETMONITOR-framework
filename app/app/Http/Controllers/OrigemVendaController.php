<?php

namespace App\Http\Controllers;

use App\Models\OrigemVenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrigemVendaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $origensvendas = OrigemVenda::all();

        return view('origensvendas/origemvenda',['origemdavenda'=>$origensvendas] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('origensvendas/origemvenda_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $origemvenda_nova = new OrigemVenda();

        $origemvenda_nova->id = $request->id;
        $origemvenda_nova->nome_origem = $request->nome_origem;


        $origemvenda_nova->save();

         return redirect()->back()->with('message', 'Criado com Sucesso');


    }

    /**
     * Display the specified resource.
     */
    public function show(OrigemVenda $origemvenda)
    {
        print($origemvenda);
        var_dump($origemvenda);

        return view('origensvendas/origemvenda_show', ['origemvenda' => $origemvenda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $origemVenda = OrigemVenda::find($id);

        return view('origensvendas/origemvenda_edit', ['origemdavenda' => $origemVenda, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $origemvenda = OrigemVenda::find($id);

        $origemvenda->nome_origem = $request->nome_origem;
        $origemvenda->id = $request->id;


        $origemvenda->save();



        return redirect()->back()->with('message', 'Atualizado com Sucesso');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $origemvenda = OrigemVenda::find($id);
        $origemvenda->delete();

        return redirect()->route('origemvenda.index');
    }
}
