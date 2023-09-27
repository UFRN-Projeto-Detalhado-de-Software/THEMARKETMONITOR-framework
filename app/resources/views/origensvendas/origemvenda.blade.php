
@extends('master')

@section('content')

    <a href="{{route('origemvenda.create')}}">Create</a>

    <h2> Origens das Vendas</h2>

    <ul>
        @foreach( $origemdavenda as $origem)
            <li>{{$origem->id}} |{{$origem->nome_origem}} | <a href="{{route('origemvenda.edit', ['origemvenda'=>$origem->id])}}">Edit</a>  | <a href="{{route ('origemvenda.show',['origemvenda'=>$origem->id])}}">Mostrar</a></li>
        @endforeach
    </ul>



@endsection
