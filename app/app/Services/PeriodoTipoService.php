<?php

namespace App\Services;

use App\Models\Periodo;
use App\Models\PeriodoTipo;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PeriodoTipoService
{
    public function all(): Collection
    {
        return PeriodoTipo::all();
    }

    public function create(Request $request): PeriodoTipo
    {
        $periodoTipo = new PeriodoTipo();

        $periodoTipo->nome = $request->nome;
        $periodoTipo->duracao = $request->duracao;

        $periodoTipo->save();

        return $periodoTipo;
    }

    public function edit(PeriodoTipo $periodoTipo, Request $request): PeriodoTipo
    {
        $periodoTipo->nome = $request->nome;
        $periodoTipo->duracao = $request->duracao;

        $periodoTipo->save();

        return $periodoTipo;
    }

    public function delete(PeriodoTipo $periodoTipo)
    {
        $periodoTipo->delete();
    }
}
