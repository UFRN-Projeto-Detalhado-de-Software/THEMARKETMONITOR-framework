<?php

namespace App\Services;

use App\Models\Cliente;
use http\Client;
use Illuminate\Support\Collection;

class ClienteService
{
    public  function  all(): Collection{
        return Cliente::all();
    }

    public function create($id, $nome_completo, $data_de_nascimento, $email, $cpf, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $cep, $telefone, $genero, $area_de_formacao) : Cliente{

        $cliente_novo = new Cliente();

        $cliente_novo->id = $id;
        $cliente_novo->nome_completo = $nome_completo;
        $cliente_novo->data_de_nascimento = $data_de_nascimento;
        $cliente_novo->email = $email;
        $cliente_novo->cpf = $cpf;
        $cliente_novo->endereco = $endereco;
        $cliente_novo->numero = $numero;
        $cliente_novo->complemento = $complemento;
        $cliente_novo->bairro = $bairro;
        $cliente_novo->cidade = $cidade;
        $cliente_novo->estado = $estado;
        $cliente_novo->cep= $cep;
        $cliente_novo->telefone= $telefone;
        $cliente_novo->genero= $genero;
        $cliente_novo->area_de_formacao= $area_de_formacao;

        $cliente_novo->save();

        return $cliente_novo;

    }

}
