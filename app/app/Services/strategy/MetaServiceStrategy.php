<?php

namespace App\Services\strategy;

use App\DTOS\MetaDTO;

interface MetaServiceStrategy
{
    public function validate_create(MetaDTO $dto);

    public function validate_update(MetaDTO $dto);

    public function validate_delete(MetaDTO $dto);
}
