<?php

namespace App\DTOS;

class PeriodoDTO
{
    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? PeriodoTipoDTO $tipo,
        public ? string $data_inicio,
        public ? string $data_fim
    ){}
}
