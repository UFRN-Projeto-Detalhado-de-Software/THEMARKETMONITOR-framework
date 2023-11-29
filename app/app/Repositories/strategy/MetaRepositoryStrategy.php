<?php

namespace App\Repositories\strategy;

use App\DTOS\MetaDTO;
use App\Models\Meta;

interface MetaRepositoryStrategy
{
    public function convert_model_to_dto(Meta $model);

    public function convert_dto_to_model(MetaDTO $dto);
}
