<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use Illuminate\Support\Str;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        Funcionario::create([
            "nome"=> Str::random(16),
            "dataDeNascimento" => "1996-07-23",
            "email"=> Str::random(12)."@gmail.com",
            "telefone"=> random_int(900000000, 999999999),
            "cpf" => random_int(00000000000,999999999999 )

        ]);
    }
}
