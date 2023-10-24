<?php

namespace App\DTOS;

class CargosDTO
{
    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? string $nome
    ){}

}
