<?php

namespace App\Services;

use App\DTOS\MetaDTO;
use App\Models\Meta;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Repositories\MetasRepositoryInterface;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class

MetaService
{

    private $metasRepository;

    public function __construct(MetasRepositoryInterface $metasRepository)
    {
        $this->metasRepository = $metasRepository;
    }

    public function all()
    {
        return $this->metasRepository->all();
    }

    public function find($id){
        return $this->metasRepository->find($id);
    }

    public function tipos_periodo(): Collection
    {
        return PeriodoTipo::all();
        // todo: arrumar qui quando fizer o dto de PeriodoTipo
    }


    public function create(MetaDTO $metaDTO, $periodo_tipo, $data_inicio)
    {
        $servicePeriodo = new PeriodoService();
        $periodo = $servicePeriodo->create($periodo_tipo, $data_inicio);
        // todo: arrumar aqui quando tiver o DTO de Periodo

        $metaDTO->valor_atual = 0;

        $this->metasRepository->store($metaDTO, $periodo);
    }

    public function edit($id, MetaDTO $metaDTO, $periodo_tipo, $data_inicio)
    {
        $servicePeriodo = new PeriodoService();
        $servicePeriodo->edit($metaDTO->periodo, $periodo_tipo, $data_inicio);
        // todo: arrumar aqui quando tiver o DTO de Periodo

        $this->metasRepository->update($metaDTO, $id);
    }

    public function delete($id)
    {
        $this->metasRepository->destroy($id);
    }
}
