<?php

namespace App\DTOS;

class VendaDTO
{
    use ArrayableDTO;


    public function __construct(
            public ? string $cliente,
            public ? string $sdr = null,
            public ? string $closer,
            public ? string $produto,
            public ? string $data,
            public ? string $valor,
            public ? string $tipo,
            public ? string $origem,
            public ? string $meioDePagamento,
            public ? bool   $deTerceiro,
            public ?string $obs = null

    ){
        $this->sdr = $sdr;
    }





}
