@extends('master')

@section('content')

    <h2> ORIGEM DA VENDA - {{$origemvenda->nome_origem}} </h2>

    <form action="{{route('origemvenda.destroy',['origemvenda' => $origemvenda->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR A ORIGEM DA VENDA </button>
    </form>


@endsection

