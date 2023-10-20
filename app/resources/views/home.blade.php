@extends('layouts.main')

@section('title', 'HOME')

@section('content')

    <div class="content">
        <h2>SEJA BEM-VINDO AO THE MARKET MONITOR!</h2>

        <a>Selecione a funcionalidade desejada: </a>

        <a class="btn btn-primary" href="{{route('cliente.index')}}"> Clientes</a>
        <a class="btn btn-primary" href="{{route('vendas.index')}}"> Vendas</a>
        <a class="btn btn-primary" href="{{route('funcionario.home')}}"> Funcionarios</a>
        <a class="btn btn-primary" href="{{route('produto.index')}}"> Produtos</a>
        <a href="{{route('perfil.logout')}}"> Logout</a>

    </div>








@endsection
