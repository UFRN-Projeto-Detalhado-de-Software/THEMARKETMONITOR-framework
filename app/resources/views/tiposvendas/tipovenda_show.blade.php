@extends('master')

@section('content')

    <h2> TIPO DE VENDA - {{$tipo_venda->Tipo_de_Venda}} </h2>

    <form action="{{route('tiposvendas.destroy',['tipovenda' => $tipo_venda->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">DELETAR O TIPO VENDA </button>
    </form>


@endsection
