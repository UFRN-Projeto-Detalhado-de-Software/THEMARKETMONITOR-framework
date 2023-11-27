<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vendas extends Model
{
    use HasFactory;

    public $id;
    public $data;
    public $valor;
    public $cliente;
    public $produto;
    public $closer;
    public $sdr;
    public $tipo;
    public $origem;
    public $obs;
    public $meioDePagamento;
    public $deTerceiro;

public function __construct($id,
                            $data,
                            $valor,
                            $cliente,
                            $produto,
                            $closer,
                            $sdr,
                            $tipo,
                            $origem,
                            $obs,
                            $meioDePagamento,
                            $deTerceiro){

    $this->id  = $id;
    $this->data = $data;
    $this->valor = $valor;
    $this->cliente= $cliente;
    $this->produto = $produto;
    $this->closer = $closer;
    $this->sdr= $sdr;
    $this->tipo = $tipo;
    $this->origem = $origem;
    $this->obs = $obs;
    $this->meioDePagamento = $meioDePagamento;
    $this->deTerceiro = $deTerceiro;
}



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
        return new self(
            $vendaDTO->id,
            $vendaDTO->data,
            $vendaDTO->valor,
            $vendaDTO->cliente,
            $vendaDTO->produto,
            $vendaDTO->closer,
            $vendaDTO->sdr,
            $vendaDTO->tipo,
            $vendaDTO->origem,
            $vendaDTO->obs,
            $vendaDTO->meioDePagamento,
            $vendaDTO->deTerceiro
        );
    }





}
