<?php

namespace App\Http\Controllers;

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
        // Todo: fazer mensagem de erro
        if($this->userService->check_login()){
            return view('user.home');
        }
        return redirect()->route('perfil.login')->with('msg', 'Você precisa estar logado para acessar seu perfil!');
    }

    public function getLogin(Request $request)
    {
        $this->userService->attempt_login_by_request($request);
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


}
