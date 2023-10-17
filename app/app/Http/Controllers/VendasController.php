<?php

namespace App\Http\Controllers;

use App\DTOS\VendaDTO;
use App\Http\Controllers\Controller;
use App\Models\Vendas;
use App\Services\VendasService;
use Illuminate\Http\Request;
use App\Repositories\VendasRepositoryInterface;


class VendasController extends Controller
{
    public function __construct(private readonly VendasService $vendaService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = $this->vendaService->all();


        return view('venda/vendas',['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venda/venda_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dto = new VendaDTO(
            $request->input('cliente'),
            $request->input('sdr'),
            $request->input('closer'),
            $request->input('produto'),
            $request->input('data'),
            $request->input('valor'),
            $request->input('tipo'),
            $request->input('origem'),
            $request->input('meioDePagamento'),
            $request->input('deTerceiro'),
            $request->input('obs'),
            );

        $venda = $this->vendaService->create($dto);

        if($venda){
            return redirect()->back()->with('message', 'Criado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro de Criação');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendas $venda)
    {

        return view('venda/venda_show', ['venda' => $venda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendas $venda)
    {
        return view('venda/venda_edit', ['venda' => $venda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dto = new VendaDTO(
            $request->input('cliente'),
            $request->input('sdr'),
            $request->input('closer'),
            $request->input('produto'),
            $request->input('data'),
            $request->input('valor'),
            $request->input('tipo'),
            $request->input('origem'),
            $request->input('meioDePagamento'),
            $request->input('deTerceiro'),
            $request->input('obs'),
        );

        $updated = $this->vendaService->update($dto, $id);


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
        $this->vendaService->delete($id);

        return redirect()->route('vendas.index');
    }
}
