<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'data' => "2023-10-05",
            'valor' => random_int(1000, 5000),
            'cliente' => random_int(1, 100),
            'produto' => random_int(1, 100),
            'closer' => random_int(1, 20),
            'sdr' => random_int(1, 20),
            'tipo' =>random_int(1, 10) ,
            'origem' => random_int(1, 10),
            'obs' => Str::random(20),
            'meioDePagamento' => random_int(1, 6),
            'deTerceiro' => random_int(0,1),
        ]);
    }
}
