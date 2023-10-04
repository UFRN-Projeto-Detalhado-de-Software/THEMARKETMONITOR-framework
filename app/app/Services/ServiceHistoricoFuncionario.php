<?php

namespace App\Services;


use App\Models\Funcionario;

class ServiceHistoricoFuncionario
{
    public function getMetas(Funcionario $funcionario)
    {
        return $funcionario->metas()->get();
    }
}
