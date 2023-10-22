<?php

namespace App\DTOS;

use App\Models\Periodo;

class MetaDTO
{

    use ArrayableDTO;

    public function __construct(
//        public ? PeriodoDTO $periodoDTO,
        public ? int $id,
//        public ? metable,
        public ? Periodo $periodo,
        public ? int $valor_meta,
        public ? int $valor_atual,
        public ? FuncionarioDTO $responsavel //todo: arrumar aqui a tipagem para ter polimorfismo
    ){}

    // todo: arrumar o período quando tiver o dto



}
