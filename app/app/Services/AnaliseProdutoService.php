<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class AnaliseProdutoService
{
    public function padraoCliente(Produto $produto): array{


        $query =  DB::table('venda')
            ->select(DB::raw('cliente'))
            ->where('produto', $produto->nome);

        $padrao = array(
            'mediaIdade' => $this->media($query, 'data_de_nascimento'),
            'genero' => $this->moda($query, 'genero'),
            'estado' => $this->moda($query, 'estado')
        );
        return $padrao;
    }

    private function media($query, $parameter){
        $somaDeIdades = 0.0;
        $numeroDeVendas = 0;

        foreach ($query as $cliente){
            $somaDeIdades += $cliente[$parameter];
            $numeroDeVendas += 1;
        }
        return $somaDeIdades / $numeroDeVendas;
    }

    private function moda($query, $parameter){
        //sort by parameter
        sort($query[$parameter], SORT_STRING);

        $maisFrequente = $query[0][$parameter];
        $emAnalise = $query[0][$parameter];
        $maiorFrequencia = 0;
        $frequenciaAtual = 0;
        foreach ($query as $resultado){
            if($resultado[$parameter] == $emAnalise){
                $frequenciaAtual += 1;
            } else {
                if($frequenciaAtual > $maiorFrequencia) {
                    $maiorFrequencia = $frequenciaAtual;
                    $maisFrequente = $emAnalise;
                }
                $emAnalise = $resultado[$parameter];
                $frequenciaAtual = 1;
            }
        }
        return $maisFrequente;
    }
}
