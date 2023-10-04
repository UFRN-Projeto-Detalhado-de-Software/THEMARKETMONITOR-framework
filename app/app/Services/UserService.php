<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function attempt_login_by_request(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->senha
        ];
        return $this->attempt_login($credentials);
    }

    public function attempt_login($credentials)
    {
        return Auth::attempt($credentials);
    }

    public function attempt_register_by_request(Request $request)
    {
        return $this->attempt_register($request->nome, $request->email,
            $request->senha, $request->confirmar_senha);
    }

    public function attempt_register(string $nome, string $email,string $senha, string $confirmar_senha)
    {
        $users_same_email = User::where('email', $email)->get();
        if(!$users_same_email->isEmpty()){
            return 'Email já cadastrado!';
        }
        $users_same_name = User::where('nome', $nome)->get();
        if(!$users_same_name->isEmpty()){
            return 'Nome já utilizado, escolha outro!';
        }
        if(!$this->senha_ok($senha)){
            return 'A senha não atende aos padrões!';
        }
        if($senha !== $confirmar_senha){
            return 'Senhas diferentes!';
        }
        $user = new User();
        $user->nome = $nome;
        $user->email = $email;
        $user->password = Hash::make($senha);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return  'ok';
    }

    public function senha_ok(string $senha)
    {
        return true;
    }


    public function check_login()
    {
        return Auth::check() === true;
    }

    public function logout()
    {
        Auth::logout();
    }


}
