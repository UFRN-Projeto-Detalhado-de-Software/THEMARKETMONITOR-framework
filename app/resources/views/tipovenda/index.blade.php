@extends('master')

@section('content')

    <a href="{{route('tipovenda.create')}}">Create</a>

    <h2> Tipos das Vendas</h2>

    <ul>
        @foreach( $tipovenda as $tipo)
            <li>{{$tipo->id}} |{{$tipo->nome_tipo}} | <a href="{{route('tipovenda.edit', ['tipovenda'=>$tipo->id])}}">Edit</a>  | <a href="{{route ('tipovenda.show',['tipovenda'=>$tipo->id])}}">Mostrar</a></li>
        @endforeach
    </ul>



@endsection
