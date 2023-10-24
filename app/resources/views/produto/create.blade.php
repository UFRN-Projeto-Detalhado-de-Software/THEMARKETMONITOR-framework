@extends('layouts.main')

@section('title', 'Produto')

@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <div class="content">
        <h1>Crie um Produto</h1>

        <form action="{{route('produto.store')}}" method="POST">
            @csrf
            <p>
                <label>
                    ID
                    <input type="number" name="id"  placeholder="id do produto">
                </label>
            </p>
            <p>
                <label>
                    Nome do Produto
                    <input type="text" name="name"  placeholder="Nome do Produto">
                </label>
            </p>

            <p>
                <label>
                    Tags
                    <input type="text" name="tags"  placeholder="Tags do Produto">
                </label>
            </p>

            <p>
                <label>
                    Valor
                    <input type="number" name="valor"  placeholder="Valor do Produto">
                </label>
            </p>

            <p>
                <label>
                    Tipo
                    <input type="number" name="tipo"  placeholder="Tipo do Produto">
                </label>
            </p>

            <p>
                <label>
                    Sigla
                    <input type="text" name="sigla"  placeholder="Sigla do Produto">
                </label>
            </p>

            <input type="submit" value="Enviar">
        </form>
    </div>

@endsection

