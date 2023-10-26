<?php

namespace App\Http\Controllers;

use App\DTOS\CargosDTO;
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
        $cargos = $this->funcionarioService->cargos();
        return view('funcionario.create', ['cargos' => $cargos]);
    }

    public function store(Request $request){
        $message = $this->funcionarioService->create(new FuncionarioDTO(
            null,
            new CargosDTO(
                $request->cargo,
                null
            ),
            null,
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
        $cargos = $this->funcionarioService->cargos();
        $funcionario = $this->funcionarioService->find($id);
        return view('funcionario/edit', ['funcionario' => $funcionario, 'id' => $id, 'cargos' => $cargos]);
    }

    public function edited($id, Request $request){

        $cargoId = is_numeric($request->cargo) ? (int)$request->cargo : 0;

        $message = $this->funcionarioService->edit($id, new FuncionarioDTO(
            null,
            new CargosDTO(
                $cargoId,
                null
            ),
            null,
            $request->nome,
            $request->dataDeNascimento,
            $request->email,
            $request->telefone,
            $request->cpf,
            null
        ));
        if($message != 'ok'){
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário modificado com sucesso!');
    }

    public function deleted($id){
        $this->funcionarioService->destroy($id);

        return redirect()->route('funcionario.home')->with('msg', 'Funcionário removido com sucesso!');
    }

    public function verMetas($id)
    {
        $metas = $this->funcionarioService->minhas_metas($id);
        return view('funcionario.ver_metas', ['metas' => $metas, 'funcionario'=>$id]);
    }

}
