<?php

namespace App\Repositories;

interface VendaRepositoryStrategy
{
    public function convert_model_to_dto();

    public function convert_dto_to_model();

}
