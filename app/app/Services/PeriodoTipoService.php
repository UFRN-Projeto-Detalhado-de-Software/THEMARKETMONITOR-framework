<?php

namespace App\Services;

use App\DTOS\PeriodoTipoDTO;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Repositories\PeriodoTipoRepositoryInterface;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PeriodoTipoService
{

    private $periodoTiposRepository;

    public function __construct(PeriodoTipoRepositoryInterface $periodoTiposRepository)
    {
        $this->periodoTiposRepository = $periodoTiposRepository;
    }

    public function all()
    {
        return $this->periodoTiposRepository->all();
    }

    public function find($id)
    {
        return $this->periodoTiposRepository->find($id);
    }

    public function create(PeriodoTipoDTO $periodoTipoDTO)
    {
        $this->periodoTiposRepository->store($periodoTipoDTO);
    }

    public function edit(PeriodoTipoDTO $periodoTipoDTO)
    {
        $this->periodoTiposRepository->update($periodoTipoDTO);
    }

    public function delete(PeriodoTipoDTO $periodoTipoDTO)
    {
        $this->periodoTiposRepository->destroy($periodoTipoDTO);
    }
}
