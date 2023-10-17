<?php

namespace App\Repositories;

use App\DTOS\VendaDTO;
use App\Models\Vendas;
use App\Repositories\VendasRepositoryInterface;

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
            // Valide e sanitize os dados do DTO conforme necessário
            $venda = Vendas::create((array) $dto);

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


}
