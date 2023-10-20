@extends('master')

@section('content')

    <a href="{{route('home')}}">
        <button>HOME</button>
    </a>

    <h2> Clientes </h2>

    <a href="{{route('cliente.create')}}">
        <button>Crie um Cliente!</button>
    </a>

    <ul>
        @foreach( $cliente as $client)
            <li>{{$client->id}} |{{$client->nome_completo}} |
                <a href="{{route('cliente.edit', ['cliente'=>$client->id])}}">Edit</a>  |
                <a href="{{route ('cliente.show',['cliente'=>$client->id])}}">Mostrar</a>
            </li>
        @endforeach
    </ul>



@endsection
