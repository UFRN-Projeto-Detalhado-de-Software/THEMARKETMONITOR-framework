@extends('master')
@section('content')

    <h2> Criar a Venda </h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{route('vendas.store')}}" method="post">
        @csrf
        <input type="number" name="id" placeholder="id da venda">
        <input type="date" name="data" placeholder="data da venda">
        <input type="number" name="valor" placeholder="valor da venda">
        <input type="number" name="meioDePagamento" placeholder="método de pagamento">
        <input type="number" name="cliente" placeholder="id cliente">
        <input type="number" name="produto" placeholder="id produto">
        <input type="number" name="closer" placeholder="id vendedor">
        <input type="number" name="sdr" placeholder="id assistente de venda">
        <input type="number" name="tipo" placeholder="tipo da venda">
        <input type="number" name="origem" placeholder="origem da venda">
        <input type="number" name="deTerceiro" placeholder="É de terceiro?">
        <input type="text" name="obs" placeholder="observação">
        <button type="submit">Criar a Venda</button>
    </form>


@endsection
