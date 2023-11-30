<?php

namespace App\Repositories\strategy;

use App\DTOS\MetaDTO;
use App\Models\Funcionario;
use App\Models\Meta;
use App\Models\Periodo;
use App\Repositories\FuncionariosRepository;
use App\Repositories\PeriodoRepository;
use App\Repositories\strategy\MetaRepositoryStrategy;

class MetaRepositoryStrategyOriginal implements MetaRepositoryStrategy
{

    public function convert_model_to_dto(Meta $model)
    {

        $periodo_repository = new PeriodoRepository();
        $repositoryFuncionario = new FuncionariosRepository();

        $dto = new MetaDTO(
            $model->id,
            $periodo_repository->find($model->periodo),
            $model->valor_meta,
            $model->valor_atual,
            $repositoryFuncionario->find($model->metable_id)
        );

        return $dto;
    }

    public function convert_dto_to_model(MetaDTO $dto)
    {
        $periodo_repository = new PeriodoRepository();
        $periodo = Periodo::find($periodo_repository->store($dto->periodo));
        // todo: tratar exceção aqui


        $model = Meta::find($dto->id);
        if($model === null){
            $model = new Meta();
        }


        $model->valor_meta = $dto->valor_meta;
        $model->valor_atual = $dto->valor_atual;
        $model->periodo = $periodo->id;

        if($dto->responsavel){
            $model->metable_id = $dto->responsavel->id;
            $model->metable_type = Funcionario::class;
        }

        return $model;
    }
}
