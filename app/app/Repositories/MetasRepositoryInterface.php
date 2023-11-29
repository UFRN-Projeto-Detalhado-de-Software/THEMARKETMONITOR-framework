<?php

namespace App\Repositories;

use App\DTOS\MetaDTO;
use App\Models\Periodo;

interface MetasRepositoryInterface
{
    public function all();

    public function metas_funcionario($id_funcionario);

    public function all_periodo_tipo();

    public function find($id);

    public function find_periodo($id);

    public function store(MetaDTO $dto);

    public function update(MetaDTO $dto);

    public function destroy(MetaDTO $dto);
}
