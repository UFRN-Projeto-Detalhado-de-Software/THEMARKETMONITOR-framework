<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoVenda;

class TipoVendaController extends Controller
{

    public readonly TipoVenda $tipo_venda;
    public function __construct()
    {
        $this->tipo_venda = new TipoVenda();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_venda = $this->tipo_venda->all();

        return view('tiposvendas/tipovenda', ['tipo_venda' => $tipo_venda]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposvendas/tipovenda_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->tipo_venda->create([
            'id' => $request->input('id'),
            'Tipo_de_Venda' => $request->input('Tipo_de_Venda'),


        ]);

        if($created){
            return redirect()->back()->with('message', 'Criado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro de Criação');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoVenda $tipo_venda)
    {
        var_dump($tipo_venda);

        return view('tiposvendas/tipovenda_show', ['tipo_venda' => $tipo_venda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
