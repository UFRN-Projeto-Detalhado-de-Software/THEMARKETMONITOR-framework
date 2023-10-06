<?php

namespace App\Services;

use App\Models\Meta;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class

MetaService
{
    public function all(): Collection
    {
        return Meta::all();
    }
    public function tipos_periodo(): Collection
    {
        return PeriodoTipo::all();
    }

    public function create_by_request(Request $request): Meta
    {
        return $this->create($request->tipo_periodo, $request->data_inicio, $request->valor_meta);
    }

    public function create($periodo_tipo, string $data_inicio, int $valor_meta): Meta
    {
        $servicePeriodo = new PeriodoService();
        $meta = new Meta();
        $periodo = $servicePeriodo->create($periodo_tipo, $data_inicio);


        $meta->valor_meta = $valor_meta;
        $meta->valor_atual = 0;
        $meta->periodo = $periodo->id;

        $meta->save();

        $servicePeriodo->set_periodable($periodo ,$meta->id, Meta::class);

        return $meta;
    }

    public function edit_by_request(Meta $meta, Request $request): Meta
    {
        return $this->edit($meta, $request->tipo_periodo, $request->data_inicio, $request->valor_meta);
    }

    public function edit(Meta $meta, $periodo_tipo, string $data_inicio, int $valor_meta): Meta
    {
        $servicePeriodo = new PeriodoService();
        $periodo = Periodo::find($meta->periodo);
        $servicePeriodo->edit($periodo ,$periodo->tipo, $data_inicio);

        $meta->valor_meta = $valor_meta;

        $meta->save();

        return $meta;
    }

    public function delete(Meta $meta)
    {
        $meta->delete();
    }
}
