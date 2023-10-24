<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Services\AnaliseProdutoService;

class AnaliseProdutoController
{
    public function __construct(private readonly AnaliseProdutoService $analiseProdutoService)
    {

    }

    public function padraoCliente($produto){
        return $this->analiseProdutoService->padraoCliente($produto);
    }

    public function list()
    {
        $produtos = Produto::all();
        return view('analiseProduto/list', ['produto' => $produtos]);
    }

    public function show($produto)
    {
        $analise = $this->padraoCliente($produto);
        return view('analiseProduto/show', ['analise' => $analise]);
    }
}
