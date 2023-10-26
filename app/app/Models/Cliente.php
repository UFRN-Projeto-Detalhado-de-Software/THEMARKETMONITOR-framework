<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model

{
    use HasFactory;
    protected $table = 'cliente';




    protected $fillable = [
        'id',
        'nome_completo',
        'data_de_nascimento',
        'email',
        'cpf',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'genero',
        'area_de_formacao',


    ];
}
