@extends('layouts.main')

@section('title', 'Metas HOME')

@section('content')



@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif

<div class="content">
    <h1>Editar funcionários:</h1>

<form action="{{route('funcionario.edited', ['id' => $funcionario->id])}}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="{{$funcionario->nome}}" value="{{$funcionario->nome}}">
        </label>
    </p>
    <p>
        <label>
            Data de nascimento:
            <input type="date" id="dataDeNascimento" name="dataDeNascimento" placeholder={{$funcionario->dataDeNascimento}}
            value={{$funcionario->dataDeNascimento}}>
            </label>
        </p>
        <p>
            <label>
                Email:
                <input type="email" id="email" name="email" placeholder={{$funcionario->email}}
            value={{$funcionario->email}}>
            </label>
        </p>
        <p>
            <label>
                Telefone:
                <input type="number" id="telefone" name="telefone" placeholder={{$funcionario->telefone}}
            value={{$funcionario->telefone}}>
            </label>
        </p>
        <p>
            <label>
                Cpf:
                <input type="number" id="cpf" name="cpf" placeholder={{$funcionario->cpf}}
            value={{$funcionario->cpf}}>


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

    <input type="submit" value="Salvar mudanças">
</form>

<br>

    <br>
</div>

@endsection

