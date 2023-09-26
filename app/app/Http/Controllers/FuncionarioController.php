<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function create(){
        return view('funcionario.create');
    }

    public function store(Request $request){
        $funcionario_novo = new Funcionario();

        $funcionario_novo->nome = $request->nome;
        $funcionario_novo->dataDeNascimento = $request->data;
        $funcionario_novo->email = $request->email;
        $funcionario_novo->telefone = $request->telefone;
        $funcionario_novo->cpf = $request->cpf;

        $funcionario_novo->save();

        return view('funcionario/recebido');
    }

    public function home(){
        $funcionarios = Funcionario::all();

        return view('funcionario/home', ['funcionarios' => $funcionarios]);
    }

    public function edit($id){
        $funcionario = Funcionario::find($id);
        return view('funcionario/edit', ['funcionario' => $funcionario, 'id' => $id]);
    }

    public function edited(Request $request, $id){
        $funcionario = Funcionario::find($id);

        $funcionario->nome = $request->nome;
        $funcionario->dataDeNascimento = $request->data;
        $funcionario->email = $request->email;
        $funcionario->telefone = $request->telefone;
        $funcionario->cpf = $request->cpf;

        $funcionario->save();

        return view('funcionario/edited');
    }

    public function deleted($id){
        $funcionario = Funcionario::find($id);
        $funcionario->delete();

        return view('funcionario/deleted');
    }

}
