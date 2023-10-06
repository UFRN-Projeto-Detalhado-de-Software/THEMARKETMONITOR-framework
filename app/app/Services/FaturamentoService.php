<?php

namespace App\Services;

use App\Models\Vendas;
use Illuminate\Support\Facades\DB;

class FaturamentoService
{

    public function gerar_faturamento($data_inicio, $data_fim){

       $query =  DB::table('vendas')
            ->select(DB::raw('sum(valor)'))
            ->whereBetween('data', [$data_inicio, $data_fim])
            ->first();

       //dd($query);
        $faturamento = $query->{'sum(valor)'};

        if($faturamento == null){
            $faturamento = 0;
        }


        return $faturamento;

    }



}
