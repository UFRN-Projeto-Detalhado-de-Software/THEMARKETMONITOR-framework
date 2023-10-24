@extends('layouts.main')

@section('title', 'HOME')

@section('content')
    <style>
        .button {
            border: none;
            border-radius: 20px;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button1 {background-color: #181616;} /* Green */
        .button2 {background-color: #d58751;} /* Blue */
    </style>
    <div class="content">
        <h2>SEJA BEM-VINDO AO THE MARKET MONITOR!</h2>

        <a>Selecione a funcionalidade desejada: </a>

        <ul class="items">

            <li>

                <a class="btn btn-primary" href="{{route('cliente.index')}}">
                    <button type="button" class="button button1">CLIENTES</button>
                </a>
            </li>

            <li>
                <a class="btn btn-primary" href="{{route('vendas.index')}}">
                    <button type="button" class="button button1">VENDAS</button>
                </a>
            </li>

            <li>
                <a class="btn btn-primary" href="{{route('funcionario.home')}}">
                    <button type="button" class="button button1"> Funcionarios</button>
                </a>
            </li>

            <li>
                <a class="btn btn-primary" href="{{route('produto.index')}}">
                    <button type="button" class="button button1"> Produtos</button>
                </a>
            </li>

            <li>
                <a class="btn btn-primary" href="{{route('perfil.adm')}}">
                    <button type="button" class="button button1"> Página do Usuário</button>
                </a>
            </li>

            <li>

                <a class="btn btn-primary" href="{{route('/analiseanalise.list')}}">
                    <button type="button" class="button button1">ANALISES</button>
                </a>
            </li>

            <li>

                <a class="btn btn-primary" href="{{route('meta.home')}}">
                    <button type="button" class="button button1">METAS</button>
                </a>
            </li>

            <li>

                <a class="btn btn-primary" href="{{route('cargo.home')}}">
                    <button type="button" class="button button1">CARGOS</button>
                </a>
            </li>
        </ul>


        <button type="button" class="button button2">
            <a href="{{route('perfil.logout')}}"> SAIR</a>
        </button>



    </div>








@endsection
