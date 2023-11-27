<?php

namespace App\Services;

use App\DTOS\UserDTO;
use App\Models\Funcionario;
use App\Models\PeriodoTipo;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
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

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function available_funcionarios()
    {
        return $this->userRepository->availbleFuncionarios();
    }

//    public function attempt_login_by_request(Request $request)
//    {
//        $credentials = [
//            'email' => $request->email,
//            'password' => $request->senha
//        ];
//        return $this->attempt_login($credentials);
//    }
//
//    public function attempt_login($credentials)
//    {
//        return Auth::attempt($credentials);
//    }

    public function attempt_login(UserDTO $dto)
    {
        return $this->userRepository->atemptLogin($dto);
    }

//    public function attempt_register_by_request(Request $request)
//    {
//        return $this->attempt_register($request->nome, $request->email,
//            $request->senha, $request->confirmar_senha);
//    }
//
//    public function attempt_register(string $nome, string $email,string $senha, string $confirmar_senha)
//    {
//        foreach ($this->nomes_reservados as $nome_reservado){
//            if($nome == $nome_reservado){
//                return 'O nome "'.$nome.'" é um nome reservado, escolha outro!';
//            }
//        }
//        $users_same_email = User::where('email', $email)->get();
//        if(!$users_same_email->isEmpty()){
//            return 'Email já cadastrado!';
//        }
//        $users_same_name = User::where('nome', $nome)->get();
//        if(!$users_same_name->isEmpty()){
//            return 'Nome já utilizado, escolha outro!';
//        }
//        if(!$this->senha_ok($senha)){
//            return 'A senha não atende aos padrões!';
//        }
//        if($senha !== $confirmar_senha){
//            return 'Senhas diferentes!';
//        }
//        $user = new User();
//        $user->nome = $nome;
//        $user->email = $email;
//        $user->password = Hash::make($senha);
//
//        $user->save();
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return  'ok';
//    }
    public function attempt_register(UserDTO $userDTO)
    {
        foreach ($this->nomes_reservados as $nome_reservado){
            if($userDTO->nome == $nome_reservado){
                return 'O nome "'.$userDTO->nome.'" é um nome reservado, escolha outro!';
            }
        }
        $users_same_email = User::where('email', $userDTO->email)->get();
        if(!$users_same_email->isEmpty()){
            return 'Email já cadastrado!';
        }
        $users_same_name = User::where('nome', $userDTO->nome)->get();
        if(!$users_same_name->isEmpty()){
            return 'Nome já utilizado, escolha outro!';
        }
        if(!$this->senha_ok($userDTO->password)){
            return 'A senha não atende aos padrões!';
        }
        if($userDTO->password !== $userDTO->confirmPassword){
            return 'Senhas diferentes!';
        }
        $this->userRepository->register($userDTO);

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
        return $this->userRepository->isAdm();
    }

    public function destroy(UserDTO $userDTO)
    {
        $this->userRepository->destroy($userDTO);
    }

//    public function editFuncionario_by_request(Request $request)
//    {
//        $user = User::find($request->usuario);
//        $this->editFuncionario($user, $request->funcionario);
//    }

    public function editFuncionario(UserDTO $userDTO)
    {
        $this->userRepository->editFuncionario($userDTO);
    }

    public function getFuncionariosAcesso()
    {
        return $this->userRepository->getFuncionariosAcesso();
    }

    public function tipos_periodo()
    {
        return $this->userRepository->getTiposPeriodo();
    }


}
