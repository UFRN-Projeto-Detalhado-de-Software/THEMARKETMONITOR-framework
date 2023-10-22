<?php

namespace App\Services;

use App\DTOS\MetaDTO;
use App\Models\Meta;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Repositories\MetasRepositoryInterface;
use App\Repositories\PeriodoRepository;
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

    public function tipos_periodo()
    {
        return $this->metasRepository->all_periodo_tipo();
    }


    public function create(MetaDTO $metaDTO)
    {
        $metaDTO->valor_atual = 0;

        $servicePeriodo = new PeriodoService(new PeriodoRepository());
        $servicePeriodo->validate($metaDTO->periodo);

        $this->metasRepository->store($metaDTO);
    }

    public function edit(MetaDTO $metaDTO)
    {
        $servicePeriodo = new PeriodoService(new PeriodoRepository());
        $servicePeriodo->validate($metaDTO->periodo);

        $this->metasRepository->update($metaDTO);
    }

    public function delete(MetaDTO $metaDTO)
    {
        $this->metasRepository->destroy($metaDTO);
    }
}
