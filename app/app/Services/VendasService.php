<?php

namespace App\Services;

use App\DTOS\VendaDTO;
use App\Repositories\VendasRepositoryInterface;

class VendasService
{
    private $vendasRepository;

    public function __construct(VendasRepositoryInterface $vendasRepository)
    {
        $this->vendasRepository = $vendasRepository;
    }


    public function all()
    {
        return $this->vendasRepository->all();
    }

    public function create(VendaDTO $dados)
    {
        // Lógica de validação e processamento de dados, se necessário
        return $this->vendasRepository->store($dados);
    }

    public function update(VendaDTO $vendaDTO, $id)
    {
        // Lógica de validação e processamento de dados, se necessário
        return $this->vendasRepository->update($vendaDTO, $id);
    }

    public function find($id)
    {
        // Lógica para obter uma venda por ID, se necessário
        return $this->vendasRepository->find($id);
    }

    public function delete($id)
    {
        // Lógica para excluir uma venda por ID, se necessário
        return $this->vendasRepository->destroy($id);
    }


}
