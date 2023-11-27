<?php

namespace App\Transformers;

use App\DTOS\VendaDTO;
use League\Fractal\TransformerAbstract;

class VendaTransformer extends TransformerAbstract{
    public function transform($venda)
    {
        return new VendaDTO(
            $venda->cliente,
            $venda->sdr,
            $venda->closer,
            $venda->produto,
            $venda->data,
            $venda->valor,
            $venda->tipo,
            $venda->origem,
            $venda->meioDePagamento,
            $venda-> deTerceiro,
            $venda->obs
        );
    }


}
