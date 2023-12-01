@extends('layouts.mainloja')

@section('title', 'Vendas')

@section('content')

    <div class="content">
        <a> BEM-VINDO A LOJA!</a>

        <ul>
            @foreach( $vendas as $venda)

                <li>
                    {{$venda->id}} |
                    {{$venda->valor}} {{$venda->cliente}}|
                    {{$venda->obs}} |
                    <a href="{{ route('loja.show', ['loja' => $venda->id]) }}">Mostrar</a>|
                    <a href="{{route('loja.edit', ['loja' =>$venda->id ])}}">Edit</a>
                </li>

            @endforeach
        </ul>
    </div>





@endsection
