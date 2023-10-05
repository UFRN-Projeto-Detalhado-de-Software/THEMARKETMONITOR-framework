@extends('layouts.main')

@section('title', 'Ranking')

@section('content')

    <p>Melhores funcionários:</p>
    <br>
    @foreach($funcionarios as $funcionario)

        <p>Nome: {{$funcionario['nome']}}</p>

        <br>
    @endforeach

@endsection
