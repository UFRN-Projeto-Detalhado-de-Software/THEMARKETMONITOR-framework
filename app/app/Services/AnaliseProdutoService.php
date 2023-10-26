<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnaliseProdutoService
{
    public function padraoCliente($produto): array{


        $clients =  DB::table('vendas')
            ->select(DB::raw('cliente'))
            ->where('produto', '=', $produto)
            ->pluck('cliente')
            ->toArray();



        $padrao = array(
            'mediaIdade' => $this->media($clients),
            'genero' => $this->moda($clients, 'genero'),
            'estado' => $this->moda($clients, 'estado')
        );
        return $padrao;
    }

    private function media($query){
        $somaDeIdades = 0;
        $numeroDeVendas = 0.0;

        foreach ($query as $cliente){
            $idade = DB::table('cliente')
                ->select(DB::raw('TIMESTAMPDIFF(YEAR, data_de_nascimento, CURDATE()) AS idade'))
                ->where('id', '=', $cliente)
                ->pluck('idade')
                ->first();
            $somaDeIdades += (integer)($idade);
            $numeroDeVendas += 1;
        }
        return $somaDeIdades / $numeroDeVendas;
    }


    private function moda($clientIds, $parameter) {
        return DB::table('cliente')
            ->whereIn('id', $clientIds)
            ->select($parameter, DB::raw('COUNT(*) as count'))
            ->groupBy($parameter)
            ->orderByDesc('count')
            ->limit(1)
            ->pluck($parameter)
            ->first();
}

}
