@extends('master')
@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <html>
    <head></head>
    <body>
    <h1>Crie um Tipo de Venda</h1>

    <form action="{{route('tipovenda.store')}}" method="POST">
        @csrf
        <p>
            <label>
                ID
                <input type="number" name="id"  placeholder="id do tipo de venda">
            </label>
        </p>
        <p>
            <label>
                Nome do Tipo da Venda
                <input type="text" name="nome_tipo"  placeholder="Nome do Tipo da Venda">
            </label>
        </p>

        <input type="submit" value="Enviar">
    </form>


    </body>
    </html>
