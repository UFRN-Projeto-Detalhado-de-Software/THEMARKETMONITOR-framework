<?php

namespace App\Http\Controllers;

use App\DTOS\PeriodoTipoDTO;
use App\Http\Controllers\Controller;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Services\PeriodoService;
use App\Services\PeriodoTipoService;
use Illuminate\Http\Request;

class PeriodoTipoController extends Controller
{
    public function __construct(private readonly PeriodoTipoService $periodoTipoService)
    {}

    public function home()
    {
        $periodoTipos = $this->periodoTipoService->all();
        return view('periodoTipo.home', ['periodoTipos' => $periodoTipos]);
    }

    public function create()
    {
        return view('periodoTipo.create');
    }

    public function formEdit($id)
    {
        $periodoTipo = $this->periodoTipoService->find($id);
        return view('periodoTipo.edit', ['periodoTipo' => $periodoTipo]);
    }


    public function store(Request $request)
    {
        $this->periodoTipoService->create(new PeriodoTipoDTO(
            null,
            $request->duracao,
            $request->nome
        ));

        return redirect()->route('periodo.tipo.home')
            ->with('msg', 'Tipo de período criado com sucesso!');
    }

    public function edit($id, Request $request)
    {
        $periodoTipo = $this->periodoTipoService->find($id);
        $periodoTipo->duracao = $request->duracao;
        $periodoTipo->nome = $request->nome;
        $this->periodoTipoService->edit($periodoTipo);

        return redirect()->route('periodo.tipo.home')
            ->with('msg', 'Tipo de período editado com sucesso!');
    }

    public function destroy($id)
    {
        $periodoTipo = $this->periodoTipoService->find($id);
        $this->periodoTipoService->delete($periodoTipo);

        return redirect()->route('periodo.tipo.home')
            ->with('msg', 'Tipo de período destruido com sucesso!');
    }
}
