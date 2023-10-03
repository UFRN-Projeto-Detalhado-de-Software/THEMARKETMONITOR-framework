<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Services\PeriodoService;
use Illuminate\Http\Request;
use App\Services\MetaService;

class MetaController extends Controller
{
    //

    public function __construct(private readonly MetaService $metaService)
    {

    }

    public function home()
    {
        $metas = $this->metaService->all();
        return view('meta.home', ['metas' => $metas]);
    }

    public function create()
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        return view('meta.create', ['tipos_periodo' => $tipos_periodo]);
    }

    public function formEdit(Meta $meta)
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        return view('meta.edit', ['meta' => $meta, 'tipos_periodo' => $tipos_periodo]);
    }

    public function store(Request $request)
    {
        $this->metaService->create_by_request($request);
        return redirect()->route('meta.home')->with('msg', 'Meta criada com sucesso!');
    }

    public function edit(Request $request, Meta $meta)
    {
        $this->metaService->edit_by_request($meta, $request);
        return redirect()->route('meta.home')
            ->with('msg', 'Meta editada com sucesso!');
    }

    public function destroy(Meta $meta)
    {
        $this->metaService->delete($meta);

        return redirect()->route('meta.home')
            ->with('msg', 'Meta destruida com sucesso!');
    }
}
