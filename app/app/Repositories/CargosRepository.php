<?php

namespace App\Repositories;

use App\DTOS\CargosDTO;
use App\Models\Cargo;
use App\Repositories\CargosRepositoryInterface;

class CargosRepository implements CargosRepositoryInterface
{

    public function all()
    {
        $all_model = Cargo::all();
        $all_dto = [];


        foreach ($all_model as $model){
            array_push($all_dto, new CargosDTO(
                $model->id,
                $model->nome
            ));
        }

        return $all_dto;
    }

    public function find($id)
    {
        $model = Cargo::find($id);

        if ($model !== null) {
            return new CargosDTO(
                $model->id,
                $model->nome
            );
        } else {

            // ou
             return new CargosDTO(0, 'Nome Padrão');
            // ou qualquer outra lógica apropriada
        }

    }

    public function store(CargosDTO $dto)
    {
        $model = new Cargo();

        $model->nome = $dto->nome;

        $model->save();
    }

    public function update(CargosDTO $dto)
    {
        $model = Cargo::find($dto->id);

        $model->nome = $dto->nome;

        $model->save();
    }

    public function destroy(CargosDTO $dto)
    {
        $model = Cargo::find($dto->id);
        $model->delete();
    }
}
