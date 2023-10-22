<?php

namespace App\Repositories;

use App\DTOS\PeriodoTipoDTO;

interface PeriodoTipoRepositoryInterface
{
    public function all();

    public function find($id);

    public function store(PeriodoTipoDTO $dto);

    public function update(PeriodoTipoDTO $dto);

    public function destroy(PeriodoTipoDTO $dto);
}
