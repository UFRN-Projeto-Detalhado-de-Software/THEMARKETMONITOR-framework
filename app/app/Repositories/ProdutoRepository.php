<?php

namespace App\Repositories;

use App\DTOS\ProdutoDTO;
use App\Models\Produto;

class ProdutoRepository implements ProdutoRepositoryInterface
{

    public function all()
    {
        $all_model = Produto::all();

        $all_dto = [];

        foreach ($all_model as $model){

            array_push($all_dto, new ProdutoDTO(
                $model->id,
                $model->valor,
            ));
        }

        return $all_dto;
    }

    public function find($id)
    {
        $model = Produto::find($id);
        // todo: tratar exceção aqui

        return new ProdutoDTO(
            $model->id,
            $model->valor_atual
        );
    }

    public function store(ProdutoDTO $dto)
    {
        $produto = new Produto();
        $produto->valor = $dto->valor;


        $produto->save();
    }

    public function update(ProdutoDTO $dto)
    {
        $produto = Produto::find($dto->id);
        // todo: tratar exceção aqui

        $produto->valor = $dto->valor;

        $produto->save();
    }

    public function destroy(ProdutoDTO $dto)
    {
        $produto = Produto::find($dto->id);

        $produto->delete();
    }
}
