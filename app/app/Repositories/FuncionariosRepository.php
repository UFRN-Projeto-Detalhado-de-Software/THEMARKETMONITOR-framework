<?php

namespace App\Repositories;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\Models\Funcionario;
use App\Models\Periodo;
use App\Models\User;
use App\Repositories\FuncionariosRepositoryInterface;
use App\Repositories\strategy\MetaRepositoryStrategy;
use App\Repositories\strategy\MetaRepositoryStrategyLoja;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;

class FuncionariosRepository implements FuncionariosRepositoryInterface
{

    public function all()
    {
        $all_model = Funcionario::all();
        $all_dto = [];

        $repositoryCargo = new CargosRepository();

        foreach ($all_model as $model){
            array_push($all_dto, new FuncionarioDTO(
                $model->id,
                $repositoryCargo->find($model->cargo),
                null,
                $model->nome,
                $model->dataDeNascimento,
                $model->email,
                $model->telefone,
                $model->cpf
            ));
        }
        return $all_dto;
    }

    public function find($id)
    {
        $model = Funcionario::find($id);
//        dd($model);
        // todo: tratar exceção aqui

        $repositoryCargo = new CargosRepository();

        return new FuncionarioDTO(
            $model->id,
            $repositoryCargo->find($model->cargo),
            $model->funcionarios_acessaveis,
            $model->nome,
            $model->dataDeNascimento,
            $model->email,
            $model->telefone,
            $model->cpf
        );
    }

    public function store(FuncionarioDTO $dto)
    {
        $funcionario = new Funcionario();

        $funcionario->nome = $dto->nome;
        $funcionario->dataDeNascimento = $dto->dataDeNascimento;
        $funcionario->email = $dto->email;
        $funcionario->telefone = $dto->telefone;
        $funcionario->cpf = $dto->cpf;
        $funcionario->cargo = $dto->cargo->id;

        $funcionario->save();

        return $funcionario->id;
        // todo: tratar exceção aqui
    }

    public function update(FuncionarioDTO $dto, $id)
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui

        $funcionario->nome = $dto->nome;
        $funcionario->dataDeNascimento = $dto->dataDeNascimento;
        $funcionario->email = $dto->email;
        $funcionario->telefone = $dto->telefone;
        $funcionario->cpf = $dto->cpf;
        $funcionario->cargo = $dto->cargo->id;

        $funcionario->save();

        // todo: tratar exceção aqui
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui
        $funcionario->delete();
    }

    public function permitir_acesso($id_acessante, $id_acessado)
    {
        $funcionario_acessante = Funcionario::find($id_acessante);
        // todo: tratar exceção aqui
        $funcionario_acessante->acessado()->attach($id_acessado);
        // todo: tratar exceção aqui
    }

    public function remover_acesso($id_acessante, $id_acessado)
    {
        $funcionario_acessante = Funcionario::find($id_acessante);
        // todo: tratar exceção aqui
        $funcionario_acessante->acessado()->detach($id_acessado);
        // todo: tratar exceção aqui
    }

    public function get_acessos($id_acessante)
    {
        if($id_acessante = 0) return;

        $funcionario_acessante = Funcionario::find($id_acessante);
        return $funcionario_acessante->acessado()->get();
    }

    public function desvincular_usuario($id)
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui
        if($funcionario->usuario != 0){
            $usario = User::find($funcionario->usuario);
            // todo: tratar exceção aqui
            $usario->funcionario = 0;
            $usario->save();
            $funcionario->usuario = 0;
            $funcionario->save();
        }
    }

    public function vincular_usuario($id_usuario, $id_funcionario)
    {
        $this->desvincular_usuario($id_usuario);

        $usuario = User::find($id_usuario);
        $usuario->funcionario = $id_funcionario;
        $usuario->save();
        if($id_funcionario != 0){
            $funcionario = Funcionario::find($id_funcionario);
            $funcionario->usuario = $id_usuario;
            $funcionario->save();
        }
    }

    public function get_metas($id)
    {
        $metaStrategy = new MetaRepositoryStrategyLoja(); //todo: arrumar aqui
        $metasRepository = new MetasRepository($metaStrategy);
        return $metasRepository->metas_funcionario($id);
    }

    public function email_ja_cadastrado(string $email): bool
    {
        return !Funcionario::where('email', $email)->get()->isEmpty();
    }

    public function nome_ja_cadastrado(string $nome): bool
    {
        return !Funcionario::where('nome', $nome)->get()->isEmpty();
    }

    public function cpf_ja_cadastrado(string $cpf): bool
    {
        return !Funcionario::where('cpf', $cpf)->get()->isEmpty();
    }

    public function email_eh($id, string $email): bool
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui

        return $funcionario->email = $email;
    }

    public function nome_eh($id, string $nome): bool
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui

        return $funcionario->nome = $nome;
    }

    public function cpf_eh($id, string $cpf): bool
    {
        $funcionario = Funcionario::find($id);
        // todo: tratar exceção aqui

        return $funcionario->cpf = $cpf;
    }

    public function get_cargos()
    {
        $repositoryCargo = new CargosRepository();
        return $repositoryCargo->all();
    }

    public function get_funcionarios_unlinked()
    {
        return Funcionario::where('usuario', 0)->get();
    }


}
