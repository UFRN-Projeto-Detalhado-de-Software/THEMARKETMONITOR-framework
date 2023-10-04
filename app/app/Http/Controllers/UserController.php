<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return redirect()->route('perfil.home');
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

}
