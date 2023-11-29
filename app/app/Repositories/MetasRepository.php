<?php

namespace App\Repositories;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Models\Funcionario;
use App\Models\Meta;
use App\Models\Periodo;
use App\Repositories\MetasRepositoryInterface;
use App\Repositories\strategy\MetaRepositoryStrategy;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class MetasRepository implements MetasRepositoryInterface
{

    private $strategy;

    public function __construct(MetaRepositoryStrategy $metaRepositoryStrategy)
    {
        $this->strategy = $metaRepositoryStrategy;
    }

    public function all()
    {
        $all_model = Meta::all();

        $all_dto = [];


        foreach ($all_model as $model){

            array_push($all_dto, $this->strategy->convert_model_to_dto($model));
        }
        return $all_dto;
    }

    public function metas_funcionario($id_funcionario)
    {
        $all_model = Meta::where('metable_id', $id_funcionario)->get();


        $all_dto = [];


        foreach ($all_model as $model){

            array_push($all_dto, $this->strategy->convert_model_to_dto($model));
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


        return $this->strategy->convert_model_to_dto($model);
    }

    public function find_periodo($id)
    {
        $repository_periodo= new PeriodoRepository();
        return $repository_periodo->find($id);
    }

    public function store(MetaDTO $dto)
    {
        $meta = $this->strategy->convert_dto_to_model($dto);

        $meta->save();
    }

    public function update(MetaDTO $dto)
    {
        $meta = $this->strategy->convert_dto_to_model($dto);

        $meta->save();
    }

    public function destroy(MetaDTO $dto)
    {
        $meta = $this->strategy->convert_dto_to_model($dto);
        $meta->delete();
    }
}
