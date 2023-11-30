<?php

namespace App\Http\Controllers;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Models\Funcionario;
use App\Models\User;
use App\Repositories\MetasRepository;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;
use App\Services\MetaService;
use App\Services\strategy\MetaServiceStrategyOriginal;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(private readonly UserService $userService)
    {

    }

    public function showLogin()
    {
        return view('user.login');
    }

    public function showRegister()
    {
        return view('user.register');
    }

    public function home()
    {
        if(!$this->userService->check_login()){
            return redirect()->route('perfil.login')->with('msg', 'Você precisa estar logado para acessar seu perfil!');
        }
        $isAdm = $this->userService->isAdm();
        return view('user.home', ['isAdm' => $isAdm]);
    }

    public function getLogin(Request $request)
    {
        $this->userService->attempt_login_by_request($request);
        if(!$this->userService->check_login()){
            return redirect()->back()->with('msg', 'Dados inválidos!');
        }
        return redirect()->route('home');
    }

    public function getRegister(Request $request)
    {
        $message = $this->userService->attempt_register_by_request($request);
        if($message !== "ok"){
            // Todo: fazer mensagem de erro
            return redirect()->back()->with('msg', $message);
        }

        return redirect()->route('perfil.home');
    }

    public function logout()
    {
        $this->userService->logout();
        return redirect()->route('perfil.login');
    }

    public function showAdm()
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $users = $this->userService->all();
        return view('user.adm', ['usuarios' => $users]);
    }

    public function showEdit_funcionario(User $user)
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $funcionarios = $this->userService->available_funcionarios();
        return view('user.edit_funcionario', ['user' => $user, 'funcionarios' => $funcionarios]);
    }

    public function destroy(User $user)
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $this->userService->destroy($user);

        return redirect()->route('perfil.home');
    }

    public function getEdit_funcionario(Request $request)
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $this->userService->editFuncionario_by_request($request);

        return redirect()->route('perfil.adm');
    }

    public function acesso()
    {
        if(!$this->userService->check_login()){
            return redirect()->route('perfil.login')->with('msg', 'Você precisa estar logado para acessar seu perfil!');
        }
        $funcionarios = $this->userService->getFuncionariosAcesso();

        return view('user.acesso', ['funcionarios' => $funcionarios]);
    }


    public function create_meta(Funcionario $funcionario)
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $tipos_periodo = $this->userService->tipos_periodo();
        return view('user.create_meta', ['tipos_periodo' => $tipos_periodo, 'funcionario' => $funcionario]);
    }

    public function store_meta(Request $request, Funcionario $funcionario)
    {
        $metarepositoryStrategy = new MetaRepositoryStrategyOriginal(); //todo: arrumar aqui
        $metaServiceStrategy = new MetaServiceStrategyOriginal(); //todo: arrumar aqui
        $metaService = new MetaService(new  MetasRepository($metarepositoryStrategy), $metaServiceStrategy);

        $metaService->create(new MetaDTO(
            null,
            new PeriodoDTO(
                null,
                new PeriodoTipoDTO(
                    $request->tipo_periodo,
                    null,
                    null
                ),
                $request->data_inicio,
                $request->data_fim
            ),
            $request->valor_meta,
            $request->valor_atual,
            new FuncionarioDTO(
                $funcionario->id,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            )
        ));
        return redirect()->route('perfil.adm')->with('msg', 'Meta criada com sucesso!'); //todo
    }


}
