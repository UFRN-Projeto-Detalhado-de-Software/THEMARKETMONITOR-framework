@extends('layouts.main')

@section('title', 'HOME')

@section('content')

    <div class="content">
        <h2> Produtos</h2>

        <ul>
            @foreach( $produto as $prod)
                <li>{{$prod->id}} | {{$prod->name}} | <a href="{{route ('/analise',['produto'=>$prod->id])}}">Mostrar Análise</a></li>
            @endforeach
        </ul>
    </div>




@endsection

