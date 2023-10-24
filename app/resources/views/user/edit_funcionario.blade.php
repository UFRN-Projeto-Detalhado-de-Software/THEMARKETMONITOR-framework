@extends('layouts.main')

@section('title', 'HOME')

@section('content')


    <div class="content">
        <h1>Editar funcionário do usuário: {{$user->nome}}</h1>

        <form action="{{route('perfil.edit_funcionario.do')}}" method="POST">
            @csrf
            @method('PUT')
            <p>
                Selecione um funcionário válido:
                <select class="form-select" aria-label="Default select example" name="funcionario">
                    <option selected>Escolha o funcinário</option>
                    <option value="0"> nenhum </option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{$funcionario->id}}"> {{$funcionario->nome}} </option>
                    @endforeach
                </select>
            </p>
            <input type="hidden" value="{{$user->id}}" name="usuario">
            <input type="submit" value="Enviar">
        </form>

        <br>
    </div>
