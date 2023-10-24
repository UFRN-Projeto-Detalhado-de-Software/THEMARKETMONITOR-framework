@extends('layouts.main')

@section('title', 'Vendas')

@section('content')

    <div class="content">
        <h2> VENDA - {{$venda->produto}} </h2>
        <h2> O ID da Venda é : {{$venda->id}} </h2>
        <h2> O Closer da Venda é : {{$venda->closer}}</h2>
        <h2> O SDR da Venda é : {{$venda->sdr}}</h2>
        <h2> O Tipo da Venda é : {{$venda->}}</h2>



        <form action="{{route('vendas.destroy',['venda' => $venda->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">DELETAR VENDA </button>
        </form>
    </div>




@endsection
