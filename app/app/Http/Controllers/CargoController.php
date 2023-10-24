<?php

namespace App\Http\Controllers;

use App\DTOS\CargosDTO;
use App\Services\CargosService;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    public function __construct(private readonly CargosService $cargosService)
    {}

    public function home()
    {
        $cargos = $this->cargosService->all();
        return view('cargo.home', ['cargos' => $cargos]);
    }

    public function create()
    {
        return view('cargo.create');
    }

    public function formEdit($id)
    {
        $cargo = $this->cargosService->find($id);
        return view('cargo.edit', ['cargo' => $cargo]);
    }


    public function store(Request $request)
    {
        $this->cargosService->create(new CargosDTO(
            null,
            $request->nome
        ));

        return redirect()->route('cargo.home')
            ->with('msg', 'Cargo criado com sucesso!');
    }

    public function edit($id, Request $request)
    {
        $cargo = $this->cargosService->find($id);
        $cargo->nome = $request->nome;
        $this->cargosService->edit($cargo);

        return redirect()->route('cargo.home')
            ->with('msg', 'Tipo de período editado com sucesso!');
    }

    public function destroy($id)
    {
        $cargo = $this->cargosService->find($id);
        $this->cargosService->delete($cargo);

        return redirect()->route('cargo.home')
            ->with('msg', 'Tipo de período destruido com sucesso!');
    }

}
