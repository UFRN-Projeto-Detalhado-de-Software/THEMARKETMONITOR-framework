<?php

namespace Model\Funcionarios;

class SDR extends Funcionario
{
    private $numeroDeAssistencias;
    private $objetivoSDR;

    public function getNumeroDeAssistencias()
    {
        return $this->numeroDeAssistencias;
    }
    public function getObjetivoSDR()
    {
        return $this->objetivoSDR;
    }
    public function setNumeroDeAssistencias($numeroDeAssistencias): void
    {
        $this->numeroDeAssistencias = $numeroDeAssistencias;
    }
    public function setObjetivoSDR($objetivoSDR): void
    {
        $this->objetivoSDR = $objetivoSDR;
    }
}