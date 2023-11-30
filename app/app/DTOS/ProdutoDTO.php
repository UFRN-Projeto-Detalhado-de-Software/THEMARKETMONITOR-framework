<?php

namespace App\DTOS;

class ProdutoDTO
{
    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? int $valor,
    ){} //todo: verificar se faltam atributos
}
