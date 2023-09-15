<?php

namespace Model\Funcionarios;

class Closer extends Funcionario
{
    private $numeroDeVendas;
    private $objetivoCloser;        //MetaCloser

    public function getNumeroDeVendas()
    {
        return $this->numeroDeVendas;
    }
    public function getObjetivoCloser()
    {
        return $this->objetivoCloser;
    }
    public function setNumeroDeVendas($numeroDeVendas): void
    {
        $this->numeroDeVendas = $numeroDeVendas;
    }
    public function setObjetivoCloser($objetivoCloser): void
    {
        $this->objetivoCloser = $objetivoCloser;
    }
}