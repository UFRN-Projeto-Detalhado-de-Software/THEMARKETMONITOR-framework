<?php

namespace Tests\Feature;

use App\Models\Vendas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

class VendaTest extends TestCase
{
    use RefreshDatabase,CreatesApplication;

    public function testAutenticacao()
    {
        $user = User::factory()->create([
            'nome' => 'teste',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Redirecionamento após o login bem-sucedido
        $this->assertAuthenticatedAs($user); // Verifica se o usuário está autenticado
    }


    public function testCriarVenda()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $vendaData = [
            'cliente' => '12345678900',
            'produto' => '35',
            'tipo' => 1,
            'origem' => 3,

        ];

        $response = $this->post('/venda/vendas', $vendaData);

        //$response->assertRedirect()->back()->with('message', 'Criado com Sucesso');


        $this->assertDatabaseHas('vendas', $vendaData);
    }

    public function testAtualizarVenda()
    {
        $venda = factory(Vendas::class)->create();
        $novosDados = [
            'cliente' => 'Novo Cliente',
            'produto' => 'Novo Produto',
            'quantidade' => 5,
            'total' => 250.00,
        ];

        $response = $this->put("/vendas/{$venda->id}", $novosDados);
        $response->assertStatus(200);

        $this->assertDatabaseHas('vendas', array_merge(['id' => $venda->id], $novosDados));
    }

    public function testExcluirVenda()
    {
        $venda = factory(Vendas::class)->create();

        $response = $this->delete("/vendas/{$venda->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('vendas', ['id' => $venda->id]);
    }

    public function testListarVendas()
    {
        factory(Vendas::class, 5)->create();

        $response = $this->get('/vendas');
        $response->assertStatus(200);

        $vendas = Vendas::all();
        $response->assertJson($vendas->toArray());
    }
}
