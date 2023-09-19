@extends('master')

@section('content')

    <h2> VENDA - {{$venda->obs}} </h2>

    <form action="{{route('vendas.destroy',['venda' => $venda->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR VENDA </button>
    </form>


@endsection
