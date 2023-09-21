@extends('master')
@section('content')

    <h2>Edit</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{route('tipovenda.update', ['tipovenda' => $tipo_venda->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="number" name="id" value="{{$tipo_venda->id}}">
        <input type="text" name="Tipo_de_Venda" value="{{$tipo_venda->Tipo_de_Venda}}">
        <button type="submit">Update</button>
    </form>


@endsection
