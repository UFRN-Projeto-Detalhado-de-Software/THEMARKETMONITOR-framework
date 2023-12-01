<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FuncionarioController;

class FuncionarioControllerLoja extends FuncionarioController
{
    public function verMetas($id)
    {
        $metas = $this->funcionarioService->minhas_metas($id);
        return view('funcionario.loja.ver_metas', ['metas' => $metas, 'funcionario'=>$id]);
    }
}
