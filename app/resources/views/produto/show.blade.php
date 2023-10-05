@extends('master')

@section('content')

    <h2> PRODUTO - {{$produto->name}} </h2>

    <form action="{{route('produto.destroy',['produto' => $produto->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR O PRODUTO </button>
    </form>


@endsection

