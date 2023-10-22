<?php

namespace App\Services;

use App\DTOS\PeriodoDTO;
use App\Models\Meta;
use App\Models\Periodo;
use App\Models\PeriodoTipo;
use App\Repositories\PeriodoRepository;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use function Symfony\Component\Translation\t;

class PeriodoService
{
    private $periodosRepository;

    public function __construct(PeriodoRepository $periodosRepository)
    {
        $this->periodosRepository = $periodosRepository;
    }

    public function all()
    {
        return $this->periodosRepository->all();
    }

    public function find($id)
    {
        return $this->periodosRepository->find($id);
    }

//    public function find_tipo($id)
//    {
//        return $this->periodosRepository->find_tipo($id);
//    }

    public function tipos()
    {
        return $this->periodosRepository->tipos();
    }

    public function validate(PeriodoDTO $periodoDTO)
    {
        $periodoDTO->tipo = $this->periodosRepository->find_tipo($periodoDTO->tipo->id);

        $periodoDTO->data_inicio = Carbon::parse($periodoDTO->data_inicio);
        $periodoDTO->data_fim = Carbon::parse($periodoDTO->data_inicio)->addDay($periodoDTO->tipo->duracao);
    }

    public function create(PeriodoDTO $periodoDTO)
    {
        $this->validate($periodoDTO);
        $this->periodosRepository->store($periodoDTO);
    }

    public function edit(PeriodoDTO $periodoDTO)
    {
        $this->validate($periodoDTO);
        $this->periodosRepository->update($periodoDTO);
    }

    public function delete(PeriodoDTO $periodoDTO)
    {
        $this->periodosRepository->destroy($periodoDTO);
    }
}
