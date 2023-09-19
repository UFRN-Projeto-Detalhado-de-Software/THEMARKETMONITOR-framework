<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vendas;
use Illuminate\Http\Request;


class VendasController extends Controller
{
    public readonly Vendas $venda;
    public function __construct()
    {
        $this->venda = new Vendas();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = $this->venda->all();

        return view('vendas',['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venda_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->venda->create([
            'id' => $request->input('id'),
            'data' => $request->input('data'),
            'valor' => $request->input('valor'),
            'meioDePagamento' => $request->input('meioDePagamento'),
            'cliente' => $request->input('cliente'),
            'produto' => $request->input('produto'),
            'closer' => $request->input('closer'),
            'sdr' => $request->input('sdr'),
            'tipo' => $request->input('tipo'),
            'origem' => $request->input('origem'),
            'deTerceiro' => $request->input('deTerceiro'),
            'obs' => $request->input('obs'),


        ]);

        if($created){
            return redirect()->back()->with('message', 'Criado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro de Criação');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendas $venda)
    {
        var_dump($venda);

        return view('venda_show', ['venda' => $venda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendas $venda)
    {
        return view('venda_edit', ['venda' => $venda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $updated = $this->venda->where('id', $id)->update($request->except('_token', '_method'));


        if($updated){
            return redirect()->back()->with('message', 'Atualizado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro família');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->venda->where('id', $id)->delete();

        return redirect()->route('vendas.index');
    }
}
