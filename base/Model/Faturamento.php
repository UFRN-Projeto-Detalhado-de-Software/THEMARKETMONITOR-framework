<?php

namespace Model;

class Faturamento
{
    private $valorTotal;
    private $tempo;         //Periodo
    public function getValorTotal()
    {
        return $this->valorTotal;
    }
    public function getTempo()
    {
        return $this->tempo;
    }
    public function setTempo($tempo): void
    {
        $this->tempo = $tempo;
    }
    public function setValorTotal($valorTotal): void
    {
        $this->valorTotal = $valorTotal;
    }
}