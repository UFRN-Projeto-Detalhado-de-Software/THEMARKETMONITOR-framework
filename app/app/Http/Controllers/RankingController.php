<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Vendas;
use App\Services\RankingService;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    private RankingService $rankingService;

    public function __construct()
    {
        $this->rankingService = new RankingService();
    }

    public function show(){
        return $this->rankingService->show();
    }





}
