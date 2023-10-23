@extends('master')

@section('content')

    <h2> Produtos</h2>

    <ul>
        @foreach( $produto as $prod)
            <li>{{$prod->id}} | {{$prod->name}} | <a href="{{route ('/analise',['produto'=>$prod->id])}}">Mostrar Análise</a></li>
        @endforeach
    </ul>



@endsection

