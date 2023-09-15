<?php

class FaturamentoController
{
    private $servicosFaturamento;

    public function mostrarFaturamento(){
        //receber tela
        $ganhos = $this->servicosFaturamento->mostrarFaturamento();
        //echo aqui
        //TODO
    }
}