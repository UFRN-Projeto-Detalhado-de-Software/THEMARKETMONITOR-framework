@extends('master')
@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <html>
    <head>

    </head>
    <body>
    <h1>Crie um Cliente</h1>

    <form action="{{route('cliente.store')}}" method="POST">
        @csrf
        <p>
            <label>
                ID
                <input type="number" name="id"  placeholder="id do cliente">
            </label>
        </p>
        <p>
            <label>
                Nome Completo do Cliente
                <input type="text" name="nome_completo"  placeholder="Nome Completo do Cliente">
            </label>
        </p>

        <p>
            <label>
                Endereço do Cliente
                <input type="text" name="endereco"  placeholder="Endereço do Cliente">
            </label>
        </p>

        <p>
            <label>
                E-mail do Cliente
                <input type="text" name="email"  placeholder="E-mail do Cliente">
            </label>
        </p>

        <p>
            <label>
                CPF do Cliente
                <input type="text" name="cpf"  placeholder="CPF do Cliente">
            </label>
        </p>

        <p>
            <label>
                numero
                <input type="text" name="numero"  placeholder="numero da rua do cliente">
            </label>
        </p>

        <p>
            <label>
                Complemento
                <input type="text" name="complemento"  placeholder="complemento do endereço do cliente">
            </label>
        </p>

        <p>
            <label>
                bairro
                <input type="text" name="bairro"  placeholder="bairro do cliente">
            </label>
        </p>

        <p>
            <label>
                cidade
                <input type="text" name="cidade"  placeholder="cidade do cliente">
            </label>
        </p>

        <p>
            <label>
                Estado
                <input type="text" name="estado"  placeholder="estado do cliente">
            </label>
        </p>

        <p>
            <label>
               cep
                <input type="text" name="cep"  placeholder="cep do endereço do cliente">
            </label>
        </p>

        <p>
            <label>
                Telefone
                <input type="text" name="telefone"  placeholder="telefone do cliente">
            </label>
        </p>

        <p>
            <label>
                Genero
                <select name="genero">
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                    <option value="Outro">Outro</option>
                </select>
            </label>
        </p>

        <p>
            <label>
                 area de formação
                <input type="text" name="area_de_formacao"  placeholder="area de formacao  do cliente">
            </label>
        </p>

        <p>
            <label>
                data de nascimento
                <input type="date" name="data_de_nascimento"  placeholder="data de nascimento  do cliente">
            </label>
        </p>

        <input type="submit" value="Enviar">
    </form>

    <a class="btn btn-primary" href="{{route('cliente.index')}}"> Voltar</a>
    </body>
    </html>

