<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Models\PeriodoTipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class UserService
{
    protected $nomes_reservados = [
        'nenhum'
    ];

    public function all()
    {
        return User::all();
    }

    public function available_funcionarios()
    {
        return Funcionario::where('usuario', 0)->get();
    }

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
        foreach ($this->nomes_reservados as $nome_reservado){
            if($nome == $nome_reservado){
                return 'O nome "'.$nome.'" é um nome reservado, escolha outro!';
            }
        }
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

    public function isAdm()
    {
        if(!$this->check_login()){
            return false;
        }
        $user = Auth::user();
        return $user->isAdm;
    }

    public function destroy(User $user)
    {
        if($user->funcionario != 0){
            $funcionario = Funcionario::where('usuario', $user->id)->get()->first();
            $funcionario->usuario = 0;
        }
        $user->delete();
    }

    public function editFuncionario_by_request(Request $request)
    {
        $user = User::find($request->usuario);
        $this->editFuncionario($user, $request->funcionario);
    }

    public function editFuncionario(User $user, int $funcionario_id)
    {
        if($user->funcionario != 0){
            $oldfuncionario = Funcionario::where('usuario', $user->id)->get()->first();
            $oldfuncionario->usuario = 0;
            $oldfuncionario->save();
        }
        $user->funcionario = $funcionario_id;
        $user->save();

        if($funcionario_id != 0){
            $newfuncionario = Funcionario::find($funcionario_id);
            $newfuncionario->usuario = $user->id;
            $newfuncionario->save();
        }
    }

    public function getFuncionariosAcesso()
    {
        $user = Auth::user();
        if($user->funcionario == 0){
            return collect();
        }
        $funcionario = Funcionario::find($user->funcionario);
        return $funcionario->acessado()->get();
    }

    public function tipos_periodo()
    {
        return PeriodoTipo::all();
    }


}
