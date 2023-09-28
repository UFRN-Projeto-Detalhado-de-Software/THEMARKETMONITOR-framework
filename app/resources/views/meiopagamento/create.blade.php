@extends('master')
@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <html>
    <head>

    </head>
    <body>
    <h1>Crie um Meio de Pagamento</h1>

    <form action="{{route('meiopagamento.store')}}" method="POST">
        @csrf
        <p>
            <label>
                ID
                <input type="number" name="id"  placeholder="id do meio de pagamento">
            </label>
        </p>
        <p>
            <label>
                Nome do Meio de Pagamento
                <input type="text" name="nome_meiopagamento"  placeholder="Nome do Meio de Pagamento">
            </label>
        </p>

        <input type="submit" value="Enviar">
    </form>

    <a class="btn btn-primary" href="{{route('meiopagamento.index')}}"> Voltar</a>
    </body>
    </html>
