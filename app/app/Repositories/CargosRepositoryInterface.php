<?php

namespace App\Repositories;

use App\DTOS\CargosDTO;

interface CargosRepositoryInterface
{

    public function all();

    public function find($id);

    public function store(CargosDTO $dto);

    public function update(CargosDTO $dto);

    public function destroy(CargosDTO $dto);

}
