<?php

namespace App\Repositories;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
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

        $funcionario_repository = new FuncionariosRepository();

        foreach ($all_model as $model){
            $responsavel = null;
            if($model->metable_id != 0){
                $responsavel = $model->metable()->get()->first();
            }
            array_push($all_dto, new MetaDTO(
                $model->id,
                Periodo::find($model->periodo),
                $model->valor_meta,
                $model->valor_atual,
                $responsavel
            ));
        }

        return $all_dto;
    }

    public function find($id)
    {
        $model = Meta::find($id);
        // todo: tratar exceção aqui

        $responsavel = null;
        if($model->metable_id != 0){
            $responsavel = $model->metable()->get()->first();
        }
        return new MetaDTO(
            $model->id,
            Periodo::find($model->periodo),
            $model->valor_meta,
            $model->valor_atual,
            $responsavel
        );
    }

    public function store(MetaDTO $dto, Periodo $periodo)
    {
        $periodo->periodable_id = 0;
        $periodo->periodable_type = Meta::class;
        $periodo->save();
        // todo: arrumar quando tiver o DTO de Periodo


        $meta = new Meta();

        $meta->valor_meta = $dto->valor_meta;
        $meta->valor_atual = $dto->valor_atual;
        $meta->periodo = $periodo->id;

        $meta->save();

        $periodo->periodable_id = $meta->id;
        $periodo->save();
    }

    public function update(MetaDTO $dto, $id)
    {
        $meta = Meta::find($id);
        // todo: tratar exceção aqui

        $meta->valor_meta = $dto->valor_meta;
        $meta->valor_atual = $dto->valor_atual;

        $meta->save();
    }

    public function destroy($id)
    {
        $meta = Meta::find($id);
        // todo: tratar exceção aqui
        $meta->delete();
    }
}
