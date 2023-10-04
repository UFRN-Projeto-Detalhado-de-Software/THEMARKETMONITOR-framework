<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Services\ServiceHistoricoFuncionario;
use Illuminate\Http\Request;

class HistoricoFuncionarioController extends Controller
{
    public function __construct(private readonly ServiceHistoricoFuncionario $serviceHistoricoFuncionario)
    {

    }

    public function show(Funcionario $funcionario)
    {
        $metas = $this->serviceHistoricoFuncionario->getMetas($funcionario);
        return view('historicoFuncionario.show', ['funcionario' => $funcionario, 'metas' => $metas]);
    }





}
