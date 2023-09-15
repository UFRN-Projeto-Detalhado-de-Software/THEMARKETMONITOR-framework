<?php

namespace Model\Funcionarios;

class Funcionario
{
    private $nome;
    private $dataDeNascimento;
    private $email;
    private $telefone;
    private $cpf;
    private $vendasPassadas;        //HistoricoDesempenho

    public function getNome()
    {
        return $this->nome;
    }
    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getVendasPassadas()
    {
        return $this->vendasPassadas;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function setDataDeNascimento($dataDeNascimento): void
    {
        $this->dataDeNascimento = $dataDeNascimento;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }
    public function setVendasPassadas($vendasPassadas): void
    {
        $this->vendasPassadas = $vendasPassadas;
    }
}
