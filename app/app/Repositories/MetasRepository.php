<?php

namespace App\Repositories;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Models\Meta;
use App\Models\Periodo;
use App\Repositories\MetasRepositoryInterface;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class MetasRepository implements MetasRepositoryInterface
{

    public function all()
    {
        $all_model = Meta::all();

        $all_dto = [];

        $periodo_repository = new PeriodoRepository();
//        $repositoryFuncionario = new FuncionariosRepository();

        foreach ($all_model as $model){

            array_push($all_dto, new MetaDTO(
                $model->id,
                $periodo_repository->find($model->periodo),
                $model->valor_meta,
                $model->valor_atual,
                null //$repositoryFuncionario->find($model->metable_id)
            ));
        }

        return $all_dto;
    }

    public function all_periodo_tipo()
    {
        $repository_periodo_tipo = new PeriodoTipoRepository();
        return $repository_periodo_tipo->all();
    }

    public function find($id)
    {
        $model = Meta::find($id);
        // todo: tratar exceção aqui

        $periodo_repository = new PeriodoRepository();
//        $repositoryFuncionario = new FuncionariosRepository();

        return new MetaDTO(
            $model->id,
            $periodo_repository->find($model->periodo),
            $model->valor_meta,
            $model->valor_atual,
            null //$repositoryFuncionario->find($model->metable_id)
        );
    }

    public function store(MetaDTO $dto)
    {
        $periodo_repository = new PeriodoRepository();
        $periodo = Periodo::find($periodo_repository->store($dto->periodo));
        // todo: tratar exceção aqui


        $meta = new Meta();
        $meta->valor_meta = $dto->valor_meta;
        $meta->valor_atual = $dto->valor_atual;
        $meta->periodo = $periodo->id;

        $meta->save();
    }

    public function update(MetaDTO $dto)
    {
        $periodo_repository = new PeriodoRepository();
        $periodo_repository->update($dto->periodo);
        // todo: tratar exceção aqui

        $meta = Meta::find($dto->id);
        // todo: tratar exceção aqui

        $meta->valor_meta = $dto->valor_meta;
        $meta->valor_atual = $dto->valor_atual;

        $meta->save();
    }

    public function destroy(MetaDTO $dto)
    {
        $meta = Meta::find($dto->id);
        // todo: tratar exceção aqui
        $meta->delete();
    }
}
