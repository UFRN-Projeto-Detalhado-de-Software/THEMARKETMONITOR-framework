<?php

namespace App\Http\Controllers;

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

    public function formEdit(Periodo $periodo)
    {
        $tipos = PeriodoTipo::all();
        return view('periodo.edit', ['periodo' => $periodo, 'tipos' => $tipos]);
    }

    public function store(Request $request)
    {
        $this->periodoService->create_by_Request($request);

        return redirect()->route('periodo.home')->with('msg', 'Período criado com sucesso!');
    }

    public function edit(Request $request, Periodo $periodo)
    {
        $this->periodoService->edit_by_Request($periodo, $request);

        return redirect()->route('periodo.home')
            ->with('msg', 'Período editado com sucesso!');
    }

    public function destroy(Periodo $periodo)
    {
        $this->periodoService->delete($periodo);

        return redirect()->route('periodo.home')
            ->with('msg', 'Período destruido com sucesso!');
    }
}
