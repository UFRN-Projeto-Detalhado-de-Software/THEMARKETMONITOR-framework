<?php

namespace App\Services\strategy;

use App\DTOS\MetaDTO;
use App\Services\strategy\MetaServiceStrategy;

class MetaServiceStrategyOriginal implements MetaServiceStrategy
{

    public function validate_create(MetaDTO $dto)
    {
        $dto->valor_atual = 0;
    }

    public function validate_update(MetaDTO $dto)
    {

    }

    public function validate_delete(MetaDTO $dto)
    {

    }
}
