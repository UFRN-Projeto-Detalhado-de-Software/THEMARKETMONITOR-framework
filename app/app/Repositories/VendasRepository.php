<?php

namespace App\Repositories;

use App\DTOS\VendaDTO;
use App\Models\Vendas;
use App\Repositories\VendasRepositoryInterface;
use Illuminate\Support\Facades\DB;

class VendasRepository implements VendasRepositoryInterface
{
    public function all(){

        return Vendas::all();
    }

    public function find($id){

        return Vendas::find($id);
    }

    public function store(VendaDTO $dto){

        try {
            // Converta o DTO para um array associativo
            $dadosVenda = (array) $dto;

            if (!array_key_exists('obs', $dadosVenda)) {
                $dadosVenda['obs'] = null;
            }

            // Valide e sanitize os dados do DTO conforme necessário
            $venda = Vendas::create($dadosVenda);

            return ['success' => true, 'data' => $venda];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function update(VendaDTO $dto, $id){

        try {
            // Valide e sanitize os dados do DTO conforme necessário
            $venda = Vendas::find($id);
            $venda->update($dto->toArray());

            return ['success' => true, 'data' => $venda];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function destroy($id){

        try {
            $venda = Vendas::find($id);
            $venda->delete();
            return ['success' => true];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    public function get_sdr()
    {
        // TODO: Implement get_sdr() method.

        $query =  DB::table('funcionarios')
            ->select('nome', 'id')
            ->where('cargo', "=", 1)
            ->get();

        $sdr = [];

        foreach ($query as $funcionario) {
            $sdr[$funcionario->id] = $funcionario->nome;
        }

        return $sdr;
    }

    public function get_closer()
    {
        // TODO: Implement get_closer() method.
        $query =  DB::table('funcionarios')
            ->select('nome', 'id')
            ->where('cargo', "=", 2)
            ->get();

        $closers = [];

        foreach ($query as $funcionario) {
            $closers[$funcionario->id] = $funcionario->nome;
        }


        return $closers;

    }
}
