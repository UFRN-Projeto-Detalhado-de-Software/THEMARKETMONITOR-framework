<?php

namespace App\Services;

use App\Models\Periodo;
use App\Models\PeriodoTipo;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PeriodoService
{
    public function all(): Collection
    {
        return Periodo::all();
    }

    public function create(Request $request): Periodo
    {
        $periodo = new Periodo();
        $tipo = PeriodoTipo::find($request->tipo);

        $periodo->data_inicio = $request->data_inicio;
        $periodo->tipo = $request->tipo;
        $periodo->data_fim = Carbon::parse($periodo->data_inicio)->addDay($tipo->duracao);

        $periodo->save();

        return $periodo;
    }

    public function edit(Periodo $periodo, Request $request): Periodo
    {
        $tipo = PeriodoTipo::find($request->tipo);

        $periodo->data_inicio = $request->data_inicio;
        $periodo->tipo = $request->tipo;
        $periodo->data_fim = Carbon::parse($periodo->data_inicio)->addDay($tipo->duracao);

        $periodo->save();

        return $periodo;
    }

    public function delete(Periodo $periodo)
    {
        $periodo->delete();
    }

    public function tipos()
    {
        return PeriodoTipo::all();
    }
}
