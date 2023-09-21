@extends('master')
@section('content')

    <h2> Criar o Tipo de Venda </h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{route('tipovenda.store')}}" method="post">
        @csrf
        <input type="number" name="id" placeholder="id do tipo de venda">
        <input type="text" name="Tipo_de_Venda" placeholder="Insira aqui o nome do tipo de venda">
        <button type="submit">Criar o Tipo de Venda</button>
    </form>


@endsection
