<?php

namespace App\Repositories;

use App\DTOS\PeriodoDTO;

interface PeriodoRepositoryInterface
{
    public function all();

    public function find($id);

    public function find_tipo($id);

    public function store(PeriodoDTO $dto);

    public function update(PeriodoDTO $dto);

    public function destroy(PeriodoDTO $dto);

    public function tipos();
}
