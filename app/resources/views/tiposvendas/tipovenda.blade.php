@extends('master')

@section('content')

    <a href="{{route('tipovenda.create')}}">Create</a>

    <h2> Tipos de Venda</h2>

    <ul>
        @foreach( $tipo_venda as $tipo)
            <li>{{$tipo->Tipo_de_Venda}} | <a href="{{route('tipovenda.edit', ['tipovenda' =>$tipo->id ])}}">Edit</a>  | <a href="{{route('tipovenda.show', ['tipovenda'=>$tipo->id ])}}">Mostrar</a></li>
        @endforeach
    </ul>



@endsection
