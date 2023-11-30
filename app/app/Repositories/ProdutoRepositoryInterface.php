<?php

namespace App\Repositories;

use App\DTOS\ProdutoDTO;

interface ProdutoRepositoryInterface
{
    public function all();

    public function find($id);

    public function store(ProdutoDTO $dto);

    public function update(ProdutoDTO $dto);

    public function destroy(ProdutoDTO $dto);

}
