<?php

namespace App\Http\Controllers;

use App\Models\TipoVenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipovenda = TipoVenda::all();

        return view('tipovenda/index',['tipovenda'=>$tipovenda] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipovenda/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipovenda_nova = new TipoVenda();

        $tipovenda_nova->id = $request->id;
        $tipovenda_nova->nome_tipo = $request->nome_tipo;


        $tipovenda_nova->save();

        return redirect()->back()->with('message', 'Criado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoVenda $tipovenda)
    {
        print($tipovenda);
        var_dump($tipovenda);

        return view('tipovenda/show', ['tipovenda' => $tipovenda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $tipoVenda = TipoVenda::find($id);

        return view('tipovenda/edit', ['tipovenda' => $tipoVenda, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $tipovenda = TipoVenda::find($id);

        $tipovenda->nome_tipo = $request->nome_tipo;
        $tipovenda->id = $request->id;


        $tipovenda->save();



        return redirect()->back()->with('message', 'Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipovenda = TipoVenda::find($id);
        $tipovenda->delete();

        return redirect()->route('tipovenda.index');
    }
}
