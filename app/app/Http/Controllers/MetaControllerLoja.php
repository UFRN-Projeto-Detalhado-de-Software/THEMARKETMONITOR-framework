<?php

namespace App\Http\Controllers;

use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Http\Controllers\MetaController;
use Illuminate\Http\Request;

class MetaControllerLoja extends MetaController
{

    public function home()
    {
        $metas = $this->metaService->all();
        return view('meta.loja.home', ['metas' => $metas]
        );
    }

    public function create()
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        return view('meta.loja.create', ['tipos_periodo' => $tipos_periodo]);
    }

    public function formEdit($id)
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        $meta = $this->metaService->find($id);
        return view('meta.loja.edit', ['meta' => $meta, 'tipos_periodo' => $tipos_periodo]);
    }

    public function store(Request $request)
    {
        $this->metaService->create(new MetaDTO(
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
            null
        ));
        return redirect()->route('meta.home')->with('msg', 'Meta criada com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        $meta = $this->metaService->find($id);
        $meta->vendas_meta = $request->vendas_meta;
        $meta->periodo->data_inicio = $request->data_inicio;

        $this->metaService->edit($meta);
        return redirect()->route('meta.home')
            ->with('msg', 'Meta editada com sucesso!');
    }

}
