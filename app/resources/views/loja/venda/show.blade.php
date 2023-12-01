@extends('layouts.mainloja')

@section('title', 'Vendas')

@section('content')

    <div class="content">
        <h2> VENDA - {{$venda}} </h2>
        <h2> O ID da Venda é : {{$venda}} </h2>


        <form action="{{ route('loja.destroy', ['loja' => $venda]) }}" method="POST">
            @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
    </div>




@endsection
