@extends('master')

@section('content')

    <a href="{{route('cliente.create')}}">Create</a>

    <h2> Clientes </h2>

    <ul>
        @foreach( $cliente as $client)
            <li>{{$client->id}} |{{$client->nome_completo}} | <a href="{{route('cliente.edit', ['cliente'=>$client->id])}}">Edit</a>  | <a href="{{route ('cliente.show',['cliente'=>$client->id])}}">Mostrar</a></li>
        @endforeach
    </ul>



@endsection
