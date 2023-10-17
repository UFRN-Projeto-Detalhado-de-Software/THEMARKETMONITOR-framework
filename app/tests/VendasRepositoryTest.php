<?php

namespace Tests\Unit;

use App\Repositories\VendasRepository;
use App\Models\Vendas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VendasRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private $vendasRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->vendasRepository = new VendasRepository();
    }

    /** @test */
    public function it_can_create_a_venda()
    {
        $data = [
            // Defina seus dados de teste aqui
        ];

        $result = $this->vendasRepository->store($data);
        $this->assertTrue($result['success']);

        $this->assertDatabaseHas('vendas', $data);
    }

    /** @test */
    public function it_can_update_a_venda()
    {
        $venda = factory(Vendas::class)->create();
        $data = [
            // Defina seus dados de teste atualizados aqui
        ];

        $result = $this->vendasRepository->update($data, $venda->id);
        $this->assertTrue($result['success']);

        $this->assertDatabaseHas('vendas', $data);
    }

    /** @test */
    public function it_can_delete_a_venda()
    {
        $venda = factory(Vendas::class)->create();

        $result = $this->vendasRepository->destroy($venda->id);
        $this->assertTrue($result['success']);

        $this->assertDatabaseMissing('vendas', ['id' => $venda->id]);
    }

    // Você pode adicionar mais testes para outros métodos da classe VendasRepository conforme necessário
}
