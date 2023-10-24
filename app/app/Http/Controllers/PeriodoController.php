<?php

namespace App\Http\Controllers;

use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Http\Controllers\Controller;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Services\PeriodoService;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    //

    public function __construct(private readonly PeriodoService $periodoService)
    {

    }


    public function home()
    {
        $periodos = $this->periodoService->all();
        return view('periodo.home', ['periodos' => $periodos]);
    }

    public function create()
    {
        $tipos = $this->periodoService->tipos();
        return view('periodo.create', ['tipos' => $tipos]);
    }

    public function formEdit($id)
    {
        $periodo = $this->periodoService->find($id);
        $tipos = $this->periodoService->tipos();
        return view('periodo.edit', ['periodo' => $periodo, 'tipos' => $tipos]);
    }

    public function store(Request $request)
    {
        $this->periodoService->create(new PeriodoDTO(
            null,
            new PeriodoTipoDTO(
                $request->tipo,
                null,
                null
            ),
            $request->data_inicio,
            $request->data_fim
        ));

        return redirect()->route('periodo.home')->with('msg', 'Período criado com sucesso!');
    }

    public function edit($id, Request $request)
    {
        $periodo = $this->periodoService->find($id);
        $periodo->tipo->id = $request->tipo;
        $periodo->data_inicio = $request->data_inicio;

        $this->periodoService->edit($periodo);

        return redirect()->route('periodo.home')
            ->with('msg', 'Período editado com sucesso!');
    }

    public function destroy($id)
    {
        $periodo = $this->periodoService->find($id);
        $this->periodoService->delete($periodo);

        return redirect()->route('periodo.home')
            ->with('msg', 'Período destruido com sucesso!');
    }
}
