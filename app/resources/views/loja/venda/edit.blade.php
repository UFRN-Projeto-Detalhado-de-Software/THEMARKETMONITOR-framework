@extends('layouts.mainloja')

@section('title', 'Vendas')

@section('content')


    <div class="content">
        <h2>Edit</h2>

        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif

        <form action="{{route('loja.update', ['loja' => $venda])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="number" name="id" value="{{$venda}}">
            <input type="number" name="tipo" value="{{$venda}}">
            <input type="number" name="origem" value="{{$venda}}">
            <input type="text" name="obs" value="{{$venda}}">
            <button type="submit">Update</button>
        </form>
    </div>


@endsection
