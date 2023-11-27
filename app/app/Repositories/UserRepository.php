<?php

namespace App\Repositories;

use App\DTOS\UserDTO;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        $all_model = User::all();

        $all_dto = [];

        $funcionario_repository = new FuncionariosRepository();

        foreach ($all_model as $model){

            array_push($all_dto, new UserDTO(
                $model->id,
                $funcionario_repository->find($model->funcionario),
                $model->nome,
                null,
                null,
                $model->email,
                $model->isAdm
            ));
        }

        return $all_dto;
    }

    private function find($id)
    {
        return User::find($id);
    }

    public function availbleFuncionarios()
    {
        $funcionario_repository = new FuncionariosRepository();
        return $funcionario_repository->get_funcionarios_unlinked();
    }

    public function register(UserDTO $dto)
    {
        $user = new User();
        $user->nome = $dto->nome;
        $user->email = $dto->email;
        $user->funcionario = 0;
        $user->password = Hash::make($dto->password);

        $user->save();

        event(new Registered($user));

        Auth::login($user);
    }

    public function destroy(UserDTO $dto)
    {
        $funcionario_repository = new FuncionariosRepository();
        $funcionario_repository->desvincular_usuario($dto->id);

        $user = $this->find($dto->id);
        $user->delete();
    }

    public function editFuncionario(UserDTO $dto)
    {
        $funcionario_repository = new FuncionariosRepository();
        $funcionario_repository->vincular_usuario($dto->id, $dto->funcionario->id);
    }

    public function getFuncionariosAcesso()
    {
        $current_user = Auth::user();

        $funcionario_repository = new FuncionariosRepository();
        return $funcionario_repository->get_acessos($current_user->funcionario);
    }

    public function isAdm()
    {
        if(!Auth::check()){
            return false;
        }
        $user = Auth::user();
        return $user->isAdm;
    }

    public function getTiposPeriodo()
    {
        $periodoTipoRepository = new PeriodoTipoRepository();
        return $periodoTipoRepository->all();
    }

    public function atemptLogin(UserDTO $dto)
    {
        $credentials = [
            'email' => $dto->email,
            'password' => $dto->password
        ];
        return Auth::attempt($credentials);
    }

}
