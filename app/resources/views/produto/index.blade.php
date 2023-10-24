@extends('layouts.main')

@section('title', 'Produto')

@section('content')

    <div class="content">
        <a href="{{route('produto.create')}}">Create</a>

        <h2> Produtos</h2>

        <ul>
            @foreach( $produto as $prod)
                <li>{{$prod->id}} |{{$prod->name}} | <a href="{{route('produto.edit', ['produto'=>$prod->id])}}">Edit</a>  | <a href="{{route ('produto.show',['produto'=>$prod->id])}}">Mostrar</a></li>
            @endforeach
        </ul>
    </div>




@endsection

