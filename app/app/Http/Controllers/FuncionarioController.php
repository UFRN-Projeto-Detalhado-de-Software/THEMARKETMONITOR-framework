<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function __construct(private readonly FuncionarioService $funcionarioService)
    {

    }

    public function create(){
        return view('funcionario.create');
    }

    public function store(Request $request){
        $message = $this->funcionarioService->create_by_request($request);
        if($message != 'ok'){
           return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário criado com sucesso!');
    }

    public function home(){
        $funcionarios = $this->funcionarioService->all();

        return view('funcionario/home', ['funcionarios' => $funcionarios]);
    }

    public function edit(Funcionario $funcionario){
        return view('funcionario/edit', ['funcionario' => $funcionario, 'id' => $funcionario->id]);
    }

    public function edited(Funcionario $funcionario, Request $request){
        $message = $this->funcionarioService->edit_by_request($funcionario, $request);
        if($message != 'ok'){
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário modificado com sucesso!');
    }

    public function deleted(Funcionario $funcionario){
        $message = $this->funcionarioService->destroy($funcionario);

        if($message != 'ok'){
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário removido com sucesso!');
    }

}
