@extends('master')

@section('content')

<h2> Vendas</h2>


    <ul>
        @foreach( $vendas as $venda)
            <li>{{$venda->id}}</li>
        @endforeach
    </ul>


@endsection

