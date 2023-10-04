<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioService
{
    protected $nomes_reservados = [
        'nenhum'
    ];

    public function all()
    {
        return Funcionario::all();
    }
    public function create_by_request(Request $request)
    {
        return $this->create($request->nome, $request->data, $request->email, $request->telefone, $request->cpf);
    }
    public function create(string $nome, string $data, string $email, int $telefone, int $cpf)
    {
        foreach ($this->nomes_reservados as $nome_reservado){
            if($nome == $nome_reservado){
                return 'O nome "'.$nome.'" é um nome reservado, escolha outro!';
            }
        }
        $funcionarios_same_email = Funcionario::where('email', $email)->get();
        if(!$funcionarios_same_email->isEmpty()){
            return 'Email já cadastrado!';
        }
        $funcionarios_same_name = Funcionario::where('nome', $nome)->get();
        if(!$funcionarios_same_name->isEmpty()){
            return 'Nome já utilizado, escolha outro!';
        }
        $funcionarios_same_cpf = Funcionario::where('cpf', $cpf)->get();
        if(!$funcionarios_same_cpf->isEmpty()){
            return 'Cpf já utilizado! O CPF é um número de identificação único!';
        }
        $funcionario_novo = new Funcionario();

        $funcionario_novo->nome = $nome;
        $funcionario_novo->dataDeNascimento = $data;
        $funcionario_novo->email = $email;
        $funcionario_novo->telefone = $telefone;
        $funcionario_novo->cpf = $cpf;

        $funcionario_novo->save();

        $funcionario_novo->acessado()->attach($funcionario_novo->id);

        return 'ok';
    }
    public function edit_by_request(Funcionario $funcionario, Request $request)
    {
        return $this->edit($funcionario, $request->nome, $request->data, $request->email, $request->telefone, $request->cpf);
    }
    public function edit(Funcionario $funcionario, string $nome, string $data, string $email, int $telefone, int $cpf)
    {
        foreach ($this->nomes_reservados as $nome_reservado){
            if($nome == $nome_reservado){
                return 'O nome "'.$nome.'" é um nome reservado, escolha outro!';
            }
        }

        if($email != $funcionario->email){
            $funcionarios_same_email = Funcionario::where('email', $email)->get();
            if(!$funcionarios_same_email->isEmpty()){
                return 'Email já cadastrado!';
            }
        }

        if($nome != $funcionario->nome){
            $funcionarios_same_name = Funcionario::where('nome', $nome)->get();
            if(!$funcionarios_same_name->isEmpty()){
                return 'Nome já utilizado, escolha outro!';
            }
        }

        if($cpf != $funcionario->cpf){
            $funcionarios_same_cpf = Funcionario::where('cpf', $cpf)->get();
            if(!$funcionarios_same_cpf->isEmpty()){
                return 'Cpf já utilizado! O CPF é um número de identificação único!';
            }
        }

        $funcionario->nome = $nome;
        $funcionario->dataDeNascimento = $data;
        $funcionario->email = $email;
        $funcionario->telefone = $telefone;
        $funcionario->cpf = $cpf;

        $funcionario->save();

        return 'ok';
    }

    public function destroy(Funcionario $funcionario)
    {
        if($funcionario->usuario != 0){
            $usario = User::find($funcionario->usuario);
            $usario->funcionario = 0;
            $usario->save();
        }
        $funcionario->delete();
    }

    public function minhas_metas(Funcionario $funcionario)
    {
        return $funcionario->metable()->get();
    }
}
