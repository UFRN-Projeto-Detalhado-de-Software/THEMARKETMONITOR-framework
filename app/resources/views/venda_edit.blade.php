@extends('master')
@section('content')

    <h2>Edit</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{route('vendas.update', ['venda' => $venda->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="number" name="id" value="{{$venda->id}}">
        <input type="number" name="tipo" value="{{$venda->tipo}}">
        <input type="number" name="origem" value="{{$venda->origem}}">
        <input type="text" name="obs" value="{{$venda->obs}}">
        <button type="submit">Update</button>
    </form>


@endsection
