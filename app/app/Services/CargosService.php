<?php

namespace App\Services;

use App\DTOS\CargosDTO;
use App\Repositories\CargosRepositoryInterface;

class CargosService
{
    private $cargoRepository;

    public function __construct(CargosRepositoryInterface $cargoRepository)
    {
        $this->cargoRepository = $cargoRepository;
    }

    public function all()
    {
        return $this->cargoRepository->all();
    }

    public function find($id)
    {
        return $this->cargoRepository->find($id);
    }

    public function create(CargosDTO $periodoTipoDTO)
    {
        $this->cargoRepository->store($periodoTipoDTO);
    }

    public function edit(CargosDTO $periodoTipoDTO)
    {
        $this->cargoRepository->update($periodoTipoDTO);
    }

    public function delete(CargosDTO $periodoTipoDTO)
    {
        $this->cargoRepository->destroy($periodoTipoDTO);
    }

}
