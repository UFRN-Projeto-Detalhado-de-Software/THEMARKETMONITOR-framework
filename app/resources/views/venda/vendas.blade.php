@extends('master')

@section('content')

   <a href="{{route('vendas.create')}}">Create</a>

<h2> Vendas</h2>

<ul>
    @foreach( $vendas as $venda)
        <li>{{$venda->id}} |{{$venda->obs}} | <a href="{{route('vendas.edit', ['venda' =>$venda->id ])}}">Edit</a>  | <a href="{{route('vendas.show', ['venda'=>$venda->id ])}}">Mostrar</a></li>
    @endforeach
</ul>



@endsection

