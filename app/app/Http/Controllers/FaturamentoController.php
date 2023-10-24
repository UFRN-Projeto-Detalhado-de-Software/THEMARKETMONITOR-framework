<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FaturamentoService;
use Illuminate\Http\Request;

class FaturamentoController extends Controller
{
    public function __construct(private readonly FaturamentoService $faturamentoService)
    {
    }

    //

    public function get_faturamento(Request $request)
    {
        $faturamento = $this->faturamentoService->gerar_faturamento($request->data_inicio, $request->data_fim);
        return view("faturamento", ['faturamento' => $faturamento]);
    }

    public function show_faturamento(){

        return view('faturamentocalculado', );
    }


}
