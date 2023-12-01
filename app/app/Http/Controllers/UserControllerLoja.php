<?php

namespace App\Http\Controllers;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Http\Controllers\UserController;
use App\Models\Funcionario;
use App\Repositories\MetasRepository;
use App\Repositories\strategy\MetaRepositoryStrategyLoja;
use App\Repositories\strategy\MetaRepositoryStrategyOriginal;
use App\Services\MetaService;
use App\Services\strategy\MetaServiceStrategyLoja;
use App\Services\strategy\MetaServiceStrategyOriginal;
use Illuminate\Http\Request;

class UserControllerLoja extends UserController
{
    public function create_meta(Funcionario $funcionario)
    {
        if(!$this->userService->isAdm()){
            return redirect()->route('perfil.home')->with('msg', 'Você não é administrador!');
        }
        $tipos_periodo = $this->userService->tipos_periodo();
        return view('user.loja.create_meta', ['tipos_periodo' => $tipos_periodo, 'funcionario' => $funcionario]);
    }

    public function store_meta(Request $request, Funcionario $funcionario)
    {
        $metarepositoryStrategy = new MetaRepositoryStrategyLoja(); //todo: arrumar aqui
        $metaServiceStrategy = new MetaServiceStrategyLoja(); //todo: arrumar aqui
        $metaService = new MetaService(new  MetasRepository($metarepositoryStrategy), $metaServiceStrategy);

        $metaService->create(new MetaDTO(
            null,
            new PeriodoDTO(
                null,
                new PeriodoTipoDTO(
                    $request->tipo_periodo,
                    null,
                    null
                ),
                $request->data_inicio,
                $request->data_fim
            ),
            $request->vendas_meta,
            $request->vendas_atual,
            new FuncionarioDTO(
                $funcionario->id,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            )
        ));
        return redirect()->route('perfil.adm')->with('msg', 'Meta criada com sucesso!'); //todo
    }
}
