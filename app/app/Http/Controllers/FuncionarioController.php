<?php

namespace App\Http\Controllers;

use App\DTOS\FuncionarioDTO;
use App\Http\Controllers\Controller;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Repositories\FuncionariosRepositoryInterface;

class FuncionarioController extends Controller
{
    public function __construct(private readonly FuncionarioService $funcionarioService)
    {}

    public function create(){
        return view('funcionario.create');
    }

    public function store(Request $request){
        $message = $this->funcionarioService->create(new FuncionarioDTO(
            null,
            [],
            $request->nome,
            $request->dataDeNascimento,
            $request->email,
            $request->telefone,
            $request->cpf
        ));
        if($message != 'ok'){
           return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário criado com sucesso!');
    }

    public function home(){
        $funcionarios = $this->funcionarioService->all();

        return view('funcionario/home', ['funcionarios' => $funcionarios]);
    }

    public function edit($id){
        $funcionario = $this->funcionarioService->find($id);
        return view('funcionario/edit', ['funcionario' => $funcionario, 'id' => $id]);
    }

    public function edited($id, Request $request){
        $message = $this->funcionarioService->edit($id, new FuncionarioDTO(
            null,
            [],
            $request->nome,
            $request->dataDeNascimento,
            $request->email,
            $request->telefone,
            $request->cpf
        ));
        if($message != 'ok'){
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário modificado com sucesso!');
    }

    public function deleted($id){
        $message = $this->funcionarioService->destroy($id);

        if($message != 'ok'){
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário removido com sucesso!');
    }

    public function verMetas($id)
    {
        $metas = $this->funcionarioService->minhas_metas($id);
        return view('funcionario.ver_metas', ['metas' => $metas]);
    }

}
