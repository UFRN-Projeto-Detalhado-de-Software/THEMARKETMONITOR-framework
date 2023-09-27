@extends('master')
@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

<html>
<head></head>
<body>
<h1>Crie uma origem de Venda</h1>

<form action="{{route('origemvenda.store')}}" method="POST">
    @csrf
    <p>
        <label>
           ID
            <input type="number" name="id"  placeholder="id da origem da venda">
        </label>
    </p>
    <p>
        <label>
            Nome da Origem da Venda
            <input type="text" name="nome_origem"  placeholder="Nome da Origem da Venda">
        </label>
    </p>

    <input type="submit" value="Enviar">
</form>


</body>
</html>
