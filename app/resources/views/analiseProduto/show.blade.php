@extends('master')

@section('content')

    <h2> ANÁLISE </h2>

    <p>Média de idades: {{$analise['mediaIdade']}}</p>
    <p>Estado que mais comprou: {{$analise['estado']}}</p>
    <p>Gênero que mais comprou: {{$analise['genero']}}</p>


@endsection

