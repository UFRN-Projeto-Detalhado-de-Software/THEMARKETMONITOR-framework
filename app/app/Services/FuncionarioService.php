<?php

namespace App\Services;

use App\DTOS\FuncionarioDTO;
use App\Models\Funcionario;
use App\Models\User;
use App\Repositories\FuncionariosRepositoryInterface;
use App\Repositories\VendasRepositoryInterface;
use Illuminate\Http\Request;

class FuncionarioService
{
    protected $nomes_reservados = [
        'nenhum'
    ];

    private $funcionariosRepository;

    public function __construct(FuncionariosRepositoryInterface $funcionariosRepository)
    {
        $this->funcionariosRepository = $funcionariosRepository;
    }

    public function all()
    {
        return $this->funcionariosRepository->all();
    }

    public function find($id)
    {
        return $this->funcionariosRepository->find($id);
    }

    public function create(FuncionarioDTO $funcionarioDTO)
    {
        foreach ($this->nomes_reservados as $nome_reservado){
            if($funcionarioDTO->nome == $nome_reservado){
                return 'O nome "'.$nome_reservado.'" é um nome reservado, escolha outro!';
                // todo: tratar exeçcão aqui
            }
        }
        if($this->funcionariosRepository->email_ja_cadastrado($funcionarioDTO->email)){
            return 'Email já cadastrado!';
            // todo: tratar exeçcão aqui
        }
        if($this->funcionariosRepository->nome_ja_cadastrado($funcionarioDTO->nome)){
            return 'Nome já utilizado, escolha outro!';
            // todo: tratar exeçcão aqui
        }
        if($this->funcionariosRepository->cpf_ja_cadastrado($funcionarioDTO->cpf)){
            return 'Cpf já utilizado! O CPF é um número de identificação único!';
            // todo: tratar exeçcão aqui
        }

        $id_novo = $this->funcionariosRepository->store($funcionarioDTO);

        $this->funcionariosRepository->permitir_acesso($id_novo, $id_novo);

        return 'ok';
    }

    public function edit($id, FuncionarioDTO $funcionarioDTO)
    {
        foreach ($this->nomes_reservados as $nome_reservado){
            if($funcionarioDTO->nome == $nome_reservado){
                return 'O nome "'.$nome_reservado.'" é um nome reservado, escolha outro!';
            }
        }

        if( !$this->funcionariosRepository->email_eh($id, $funcionarioDTO->email) &&
            $this->funcionariosRepository->email_ja_cadastrado($funcionarioDTO->email) )
        {
            return 'Email já cadastrado!';
        }

        if( !$this->funcionariosRepository->nome_eh($id, $funcionarioDTO->nome) &&
            $this->funcionariosRepository->nome_ja_cadastrado($funcionarioDTO->nome) )
        {
            return 'Nome já utilizado, escolha outro!';
        }

        if( !$this->funcionariosRepository->cpf_eh($id, $funcionarioDTO->cpf) &&
            $this->funcionariosRepository->cpf_ja_cadastrado($funcionarioDTO->cpf) )
        {
            return 'Cpf já utilizado! O CPF é um número de identificação único!';
        }

        $this->funcionariosRepository->update($funcionarioDTO, $id);

        return 'ok';
    }

    public function destroy($id)
    {
        $this->funcionariosRepository->desvincular_usuario($id);
        $this->funcionariosRepository->destroy($id);
    }

    public function minhas_metas($id)
    {
        return $this->funcionariosRepository->get_metas($id);
    }

    public function cargos()
    {
        return $this->funcionariosRepository->get_cargos();
    }
}
