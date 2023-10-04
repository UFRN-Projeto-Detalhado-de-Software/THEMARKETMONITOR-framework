@extends('master')

@section('content')

    <h2> Cliente - {{$cliente->nome_completo}} </h2>

    <form action="{{route('cliente.destroy',['cliente' => $cliente->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR O CLIENTE </button>
    </form>


@endsection
