<?php

namespace App\Repositories;

use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Models\PeriodoTipo;
use App\Repositories\PeriodoTipoRepositoryInterface;

class PeriodoTipoRepository implements PeriodoTipoRepositoryInterface
{

    public function all()
    {
        $all_model = PeriodoTipo::all();
        $all_dto = [];


        foreach ($all_model as $model){
            array_push($all_dto, new PeriodoTipoDTO(
                $model->id,
                $model->duracao,
                $model->nome
            ));
        }

        return $all_dto;
    }

    public function find($id)
    {
        $model = PeriodoTipo::find($id);
        // todo: tratar exceção aqui

        return new PeriodoTipoDTO(
            $model->id,
            $model->duracao,
            $model->nome
        );
    }

    public function store(PeriodoTipoDTO $dto)
    {
        $model = new PeriodoTipo();

        $model->duracao = $dto->duracao;
        $model->nome = $dto->nome;

        $model->save();
    }

    public function update(PeriodoTipoDTO $dto)
    {
        $model = PeriodoTipo::find($dto->id);

        $model->duracao = $dto->duracao;
        $model->nome = $dto->nome;

        $model->save();
    }

    public function destroy(PeriodoTipoDTO $dto)
    {
        $model = PeriodoTipo::find($dto->id);
        $model->delete();
    }
}
