<?php

namespace App\DTOS;

class PeriodoTipoDTO
{

    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? int $duracao,
        public ? string $nome
    ){}

}
