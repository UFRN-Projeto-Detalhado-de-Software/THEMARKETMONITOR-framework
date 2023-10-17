<?php

namespace App\Repositories;

use App\DTOS\VendaDTO;

interface VendasRepositoryInterface
{
    public function all();

    public function find($id);

    public function store(VendaDTO $dto);

    public function update(VendaDTO $dto, $id);

    public function destroy($id);


}
