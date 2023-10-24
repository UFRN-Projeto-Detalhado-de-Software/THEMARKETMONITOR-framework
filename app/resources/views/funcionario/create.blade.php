@extends('layouts.main')

@section('title', 'Criar Funcionário')

@section('content')



@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif


<h1>Crie um funcionário</h1>

<form action="{{route('funcionario.store')}}" method="POST">
    @csrf
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="Nome do funcionário">
        </label>
    </p>
    <p>
        <label>
            Data de nascimento:
            <input type="date" id="dataDeNascimento" name="dataDeNascimento" placeholder="Data de nascimento do funcionário">
        </label>
    </p>
    <p>
        <label>
            Email:
            <input type="email" id="email" name="email" placeholder="Email do funcionário">
        </label>
    </p>
    <p>
        <label>
            Telefone:
            <input type="number" id="telefone" name="telefone" placeholder="Telefone do funcionário">
        </label>
    </p>
    <p>
        <label>
            Cpf:
            <input type="number" id="cpf" name="cpf" placeholder="CPF do funcionário">
        </label>
    </p>

    Selecione um cargo:
    <select class="form-select" aria-label="Default select example" name="cargo">
        <option selected>Escolha o cargo</option>
        @foreach($cargos as $cargo)
            <option value="{{$cargo->id}}"> {{$cargo->nome}} </option>
        @endforeach
    </select>

    <br>

    <input type="submit" value="Enviar">
</form>


    <form action="{{route('funcionario.store')}}" method="POST">
        @csrf
        <p>
            <label>
                Nome:
                <input type="text" id="nome" name="nome" placeholder="Nome do funcionário">
            </label>
        </p>
        <p>
            <label>
                Data de nascimento:
                <input type="date" id="data" name="data" placeholder="Data de nascimento do funcionário">
            </label>
        </p>
        <p>
            <label>
                Email:
                <input type="email" id="email" name="email" placeholder="Email do funcionário">
            </label>
        </p>
        <p>
            <label>
                Telefone:
                <input type="number" id="telefone" name="telefone" placeholder="Telefone do funcionário">
            </label>
        </p>
        <p>
            <label>
                Cpf:
                <input type="number" id="cpf" name="cpf" placeholder="CPF do funcionário">
            </label>
        </p>
        <input type="submit" value="Enviar">
    </form>
</div>

@endsection
