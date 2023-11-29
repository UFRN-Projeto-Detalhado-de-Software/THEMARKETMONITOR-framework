<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'data',
        'valor',
        'cliente',
        'produto',
        'closer',
        'sdr',
        'tipo',
        'origem',
        'obs',
        'meioDePagamento',
        'deTerceiro',
    ];

    public static function fromDTO($vendaDTO)
    {
        return new self([
            'id' => $vendaDTO->id,
            'data' => $vendaDTO->data,
            'valor' => $vendaDTO->valor,
            'cliente' => $vendaDTO->cliente,
            'produto' => $vendaDTO->produto,
            'closer' => $vendaDTO->closer,
            'sdr' => $vendaDTO->sdr,
            'tipo' => $vendaDTO->tipo,
            'origem' => $vendaDTO->origem,
            'obs' => $vendaDTO->obs,
            'meioDePagamento' => $vendaDTO->meioDePagamento,
            'deTerceiro' => $vendaDTO->deTerceiro,
        ]);
    }
}
