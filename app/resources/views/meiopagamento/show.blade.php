@extends('master')

@section('content')

    <h2> Meio de Pagamento - {{$meiopagamento->nome_meiopagamento}} </h2>

    <form action="{{route('meiopagamento.destroy',['meiopagamento' => $meiopagamento->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR O MEIO DE PAGAMENTO </button>
    </form>


@endsection
