<?php

namespace App\Services;

use App\Models\Meta;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PeriodoService
{
    public function all(): Collection
    {
        return Periodo::all();
    }
    public function tipos()
    {
        return PeriodoTipo::all();
    }

    public function create_by_Request(Request $request): Periodo
    {
//        todo: arrumap periodable
        return $this->create($request->tipo, $request->data_inicio);
    }

    public function create($tipo_id, string $data_inicio): Periodo
    {
        $periodo = new Periodo();
        $tipo = PeriodoTipo::find($tipo_id);

//        $periodo->data_inicio = $data_inicio;
        $periodo->data_inicio = Carbon::parse($data_inicio);
        $periodo->tipo = $tipo_id;
        $periodo->data_fim = Carbon::parse($periodo->data_inicio)->addDay($tipo->duracao);


        $periodo->periodable_id = 0;
        $periodo->periodable_type = "-";

        $periodo->save();

        return $periodo;
    }

    public function edit_by_Request(Periodo $periodo, Request $request): Periodo
    {
        return $this->edit($periodo, $request->tipo, $request->data_inicio);
    }

    public function edit(Periodo $periodo, $tipo_id, string $data_inicio): Periodo
    {
        $tipo = PeriodoTipo::find($tipo_id);

        $periodo->data_inicio = $data_inicio;
        $periodo->tipo = $tipo_id;
        $periodo->data_fim = Carbon::parse($periodo->data_inicio)->addDay($tipo->duracao);

        $periodo->save();

        return $periodo;
    }

    public function set_periodable(Periodo $periodo ,int $perdiodable_id, string $periodable_type)
    {
        $periodo->periodable_id = $perdiodable_id;
        $periodo->periodable_type = $periodable_type;

        $periodo->save();
    }

    public function delete(Periodo $periodo)
    {
        $periodo->delete();
    }
}
