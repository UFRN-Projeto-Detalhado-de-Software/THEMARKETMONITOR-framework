<?php

namespace App\Http\Controllers\Abstract;

use App\Models\Vendas;
use Illuminate\Http\Request;

abstract class VendaControllerAbs
{
    public abstract function index();
    public abstract function create();
    public abstract function store(Request $request);
    public abstract function show(Vendas $venda);

    public abstract function edit(Vendas $venda);
    public abstract function update(Request $request, string $id);
    public abstract function destroy(string $id);
}
