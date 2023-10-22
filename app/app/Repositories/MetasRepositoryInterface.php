<?php

namespace App\Repositories;

use App\DTOS\MetaDTO;
use App\Models\Periodo;

interface MetasRepositoryInterface
{

    public function all();

    public function find($id);

    public function store(MetaDTO $dto, Periodo $periodo);
    //todo: arrumar aqui quando o DTO de Periodo estiver pronto

    public function update(MetaDTO $dto, $id);

    public function destroy($id);


}
