<?php

namespace App\DTOS;

class FuncionarioDTO
{
    use ArrayableDTO;

    public function __construct(
//    public ? UsuarioDTO $usuarioDTO,
    public ? int $id,
    public ? CargosDTO $cargo,
    public ? array $funcionarios_acessaveis,
    public ? string $nome,
    public ? string $dataDeNascimento,
    public ? string $email,
    public ? string $telefone,
    public ? string $cpf
    ){}


}
