<?php

namespace App\Http\Controllers;

use App\DTOS\VendaDTO;
use App\Http\Controllers\Abstract\VendaControllerAbs;
use App\Models\MeioPagamento;
use App\Models\OrigemVenda;
use App\Models\Produto;
use App\Models\TipoVenda;
use App\Models\Vendas;
use App\Repositories\VendaRepositoryLoja;
use App\Repositories\VendaRepositoryStrategy;
use App\Repositories\VendasRepositoryInterface;
use App\Services\VendaServiceLoja;
use App\Services\VendaServiceStrategy;
use App\Services\VendasService;
use Illuminate\Http\Request;

class VendaControllerLoja extends VendaControllerAbs
{

   private VendasService $serviceLoja;

    public function __construct(VendasService $serviceLoja) {

        $this->serviceLoja = $serviceLoja;
    }

    public function index()
    {
        $vendas = $this->serviceLoja->all();

        return view('loja/index', ["vendas"=>$vendas]);

    }

    public function create()
    {
        $origensvendas = OrigemVenda::all();
        $produto = Produto::all();
        $meiopagamento = MeioPagamento::all();
        $tipovenda = TipoVenda::all();
        $closer = $this->serviceLoja->get_closer();
        $sdr = $this->serviceLoja->get_sdr();

        return view('loja/venda/create', [
            'origemdavenda' => $origensvendas,
            'produto'       => $produto,
            'meiopagamento' => $meiopagamento,
            'tipovenda'     => $tipovenda,
            'closer'        => $closer,
            'sdr'           => null
        ]);

    }

    public function store(Request $request)
    {
        info($request->all());

        $validationRules = [
            'cliente' => 'required',
            'produto' => 'required',
            'tipo' => 'required',
            'origem' => 'required',
            'closer' => 'required',
            'data' => 'required',
            'meioDePagamento' => 'required',
            'deTerceiro' => 'required',
            'valor' => 'required',
            'obs' => 'nullable|string',
        ];

        $request->validate($validationRules);

        $missingFields = [];

        foreach ($validationRules as $field => $rule) {
            if (!$request->has($field)) {
                $missingFields[] = $field;
            }
        }


        if (!empty($missingFields)) {
            return redirect()->back()->withErrors(['message' => 'Por favor, preencha todos os campos obrigatórios. Campos em falta: ' . implode(', ', $missingFields)]);
        }


        $dto = new VendaDTO(
            $request->input('cliente'),
            $request->input('closer'),
            $request->input('produto'),
            $request->input('data'),
            $request->input('valor'),
            $request->input('tipo'),
            $request->input('origem'),
            $request->input('meioDePagamento'),
            $request->input('deTerceiro'),
            $request->input('obs') ?? null
        );

        $venda = $this->serviceLoja->create($dto);

        if($venda){
            return redirect()->back()->with('message', 'Criado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro de Criação');
    }

    public function show($venda)
    {
        return view('loja/venda/show', ['venda' => $venda]);
    }

    public function edit($venda)
    {
        return view('loja/venda/edit', ['venda' => $venda]);
    }

    public function update(Request $request, string $id)
    {
        $dto = new VendaDTO(
            $request->input('cliente'),
            $request->input('sdr'),
            $request->input('closer'),
            $request->input('produto'),
            $request->input('data'),
            $request->input('valor'),
            $request->input('tipo'),
            $request->input('origem'),
            $request->input('meioDePagamento'),
            $request->input('deTerceiro'),
            $request->input('obs'),
        );

        $updated = $this->serviceLoja->update($dto, $id);


        if($updated){
            return redirect()->back()->with('message', 'Atualizado com Sucesso');
        }

        return redirect()->back()->with('message', 'Erro família');
    }

    public function destroy($id)
    {
        $this->serviceLoja->delete($id);

        return redirect()->route('loja.index');
    }


}
