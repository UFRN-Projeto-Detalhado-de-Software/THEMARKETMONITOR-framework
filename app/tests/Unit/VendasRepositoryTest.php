<?php

namespace Tests\Unit;

use App\Repositories\VendasRepository;
use App\Models\Vendas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VendasRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_convert_model_to_dto()
    {
        // Crie uma venda de exemplo
        $venda = Vendas::create([
            'id' => 1,
            'data' => "2023-11-27",
            'valor' => 100.00,
            'cliente' => "34411455854",
            'produto' => 10,
            'closer'=> 1,
            'sdr'=>2,
            'tipo'=>1,
            'origem'=>1,
            'obs' =>"vaxio",
            'meioDePagamento'=>1,
            'deTerceiro'=>0


        ]);

        // Crie uma instância do VendaRepository
        $repository = new VendasRepository();

        // Chame o método convertModelToDTO
        $vendaDTO = $repository->convertModelToDTO($venda->id);

        // Faça as verificações
        $this->assertInstanceOf(VendaDTO::class, $vendaDTO);
        $this->assertEquals($venda->id, $vendaDTO->id);
        $this->assertEquals($venda->valor, $vendaDTO->valor);
        // Adicione outras verificações conforme necessário
    }
}

