<?php

namespace App\Repositories;

use App\DTOS\UserDTO;

interface UserRepositoryInterface
{
    public function all();

    public function availbleFuncionarios();

    public function register(UserDTO $dto);

    public function destroy(UserDTO $dto);

    public function editFuncionario(UserDTO $dto);

    public function getFuncionariosAcesso();

    public function isAdm();

    public function getTiposPeriodo();

    public function atemptLogin(UserDTO $dto);
}
