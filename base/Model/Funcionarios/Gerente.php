<?php

namespace Model\Funcionarios;

class Gerente extends Funcionario
{
    private $setor;
    public function getSetor()
    {
        return $this->setor;
    }
    public function setSetor($setor): void
    {
        $this->setor = $setor;
    }
}