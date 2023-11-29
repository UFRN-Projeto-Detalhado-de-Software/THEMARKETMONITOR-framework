<?php

namespace App\Repositories;

use App\Transformers\VendaTransformer;
use League\Fractal\Manager;
use \League\Fractal\Scope;
use App\Models\Vendas;



class VendaRepositoryLoja extends VendasRepository implements VendaRepositoryStrategy
{

    public function convert_model_to_dto($vendaId){

        $venda = Vendas::find($vendaId);

        if (!$venda) {
            return null;
        }

        $fractal = new Manager();
        $transformer = new VendaTransformer();

        $vendaDTO= $fractal->item($venda, $transformer)->getData();

        return $vendaDTO;


    }

    public function convert_dto_to_model($vendaDTO)
    {
        $vendaModel =  Vendas::fromDTO($vendaDTO);

        return $vendaModel;
    }
}
