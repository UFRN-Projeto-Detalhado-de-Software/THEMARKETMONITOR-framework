<?php

namespace App\Repositories;

use App\DTOS\PeriodoDTO;
use App\Models\Periodo;
use App\Repositories\PeriodoRepositoryInterface;

class PeriodoRepository implements PeriodoRepositoryInterface
{

    public function all()
    {
        $all_model = Periodo::all();

//        dd($all_model);

        $all_dto = [];

        $repositoryPeriodoTipo = new PeriodoTipoRepository();

        foreach ($all_model as $model){

            array_push($all_dto, new PeriodoDTO(
                $model->id,
                $repositoryPeriodoTipo->find($model->tipo),
                $model->data_inicio,
                $model->data_fim
            ));
        }

        return $all_dto;
    }

    public function find($id)
    {
        $model = Periodo::find($id);


        $repositoryPeriodoTipo = new PeriodoTipoRepository();

        return new PeriodoDTO(
            $model->id,
            $repositoryPeriodoTipo->find($model->tipo),
            $model->data_inicio,
            $model->data_fim
        );
    }

    public function find_tipo($id)
    {
        $repositoryTipo = new PeriodoTipoRepository();
        return $repositoryTipo->find($id);
    }

    public function store(PeriodoDTO $dto)
    {
        $model = new Periodo();

        $model->data_inicio = $dto->data_inicio;
        $model->data_fim = $dto->data_fim;
        $model->tipo = $dto->tipo->id;

        $model->save();

        return $model->id;
    }

    public function update(PeriodoDTO $dto)
    {
        $model = Periodo::find($dto->id);

        $model->data_inicio = $dto->data_inicio;
        $model->data_fim = $dto->data_fim;
        $model->tipo = $dto->tipo->id;

        $model->save();
    }

    public function destroy(PeriodoDTO $dto)
    {
        $model = Periodo::find($dto->id);
        $model->delete();
    }

    public function tipos()
    {
        $repositoryPeriodoTipo = new PeriodoTipoRepository();
        return $repositoryPeriodoTipo->all();
    }
}
