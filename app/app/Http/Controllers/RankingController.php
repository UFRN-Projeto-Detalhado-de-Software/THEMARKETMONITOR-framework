<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Vendas;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    private function comparison($a, $b){
        return $a['cpf'] - $b['cpf'];
    }
    public function show(){
        $funcionarios = $this->rank();
        return view('ranking/show', ['funcionarios' => $funcionarios]);
    }

    private function rank(){
        $funcionarios = Funcionario::all()->toArray();
        $vendas = DB::table('sales')->get()->toArray();

        $vendasAcumuladas = [];

        foreach ($vendas as $venda){
            $idCloser = $venda->closer;
            $idSDR = $venda->sdr;

            if (!isset($vendasAcumuladas[$idCloser])) {
                $vendasAcumuladas[$idCloser] = 0;
            }

            if (!isset($vendasAcumuladas[$idSDR])) {
                $vendasAcumuladas[$idSDR] = 0;
            }

            $vendasAcumuladas[$idCloser] += $venda->valor;

        }
        usort($funcionarios, function ($a, $b) use ($vendasAcumuladas) {
            $ganhosA = $vendasAcumuladas[$a['id']] ?? 0;
            $ganhosB = $vendasAcumuladas[$b['id']] ?? 0;
            return $ganhosB - $ganhosA;
        });



        return $funcionarios;
    }



}
