<?php

namespace App\DTOS;

use App\Models\Periodo;

class MetaDTO
{

    use ArrayableDTO;

    public function __construct(
        public ? int $id,
//        public ? metable,
        public ? PeriodoDTO $periodo,
        public ? int $vendas_meta,
        public ? int $vendas_atual,
        public ? FuncionarioDTO $responsavel //todo: arrumar aqui a tipagem para ter polimorfismo
    ){}
}
