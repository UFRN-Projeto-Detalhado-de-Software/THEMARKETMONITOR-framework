@extends('master')

@section('content')

    <h2> TIPO DA VENDA - {{$tipovenda->nome_tipo}} </h2>

    <form action="{{route('tipovenda.destroy',['tipovenda' => $tipovenda->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR A ORIGEM DA VENDA </button>
    </form>


@endsection
