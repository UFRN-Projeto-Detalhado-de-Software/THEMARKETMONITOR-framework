@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<html>
<head></head>
<body>
<h1>Editar Cliente:</h1>

<form action="{{route('cliente.update', ['cliente' => $cliente->id])}}" method="POST">

    @csrf
    <p>

        <label>
            Nome:
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="nome_completo" placeholder="{{$cliente->nome_completo}}" value="{{$cliente->nome_completo}}">
        </label>
    </p>
    <p>
        <label>
            ID:
            <input type="number"  name="id" placeholder="{{$cliente->id}}"
            value="{{$cliente->id}}">
        </label>
    </p>

    <p>
        <label>
            Endereço do Cliente
            <input type="text" name="endereco"  placeholder="{{$cliente->endereco}}"
            value="{{$cliente->endereco}}">
        </label>
    </p>

    <p>
        <label>
            E-mail do Cliente
            <input type="text" name="email"  placeholder="{{$cliente->email}}"
            value="{{$cliente->email}}">
        </label>
    </p>

    <p>
        <label>
            CPF do Cliente
            <input type="text" name="cpf"  placeholder="{{$cliente->cpf}}"
            value="{{$cliente->cpf}}">
        </label>
    </p>

    <p>
        <label>
            numero
            <input type="text" name="numero"  placeholder="{{$cliente->numero}}"
            value="{{$cliente->numero}}">
        </label>
    </p>

    <p>
        <label>
            Complemento
            <input type="text" name="complemento"  placeholder="{{$cliente->complemento}}"
            value="{{$cliente->complemento}}">
        </label>
    </p>

    <p>
        <label>
            bairro
            <input type="text" name="bairro"  placeholder="{{$cliente->bairro}}"
            value="{{$cliente->bairro}}">
        </label>
    </p>

    <p>
        <label>
            cidade
            <input type="text" name="cidade"  placeholder="{{$cliente->cidade}}"
            value="{{$cliente->cidade}}">
        </label>
    </p>

    <p>
        <label>
            Estado
            <input type="text" name="estado"  placeholder="{{$cliente->estado}}"
            value="{{$cliente->estado}}">
        </label>
    </p>

    <p>
        <label>
            cep
            <input type="text" name="cep"  placeholder="{{$cliente->cep}}"
            value="{{$cliente->cep}}">
        </label>
    </p>

    <p>
        <label>
            Telefone
            <input type="text" name="telefone"  placeholder="{{$cliente->telefone}}"
            value="{{$cliente->telefone}}">
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
            <input type="text" name="area_de_formacao"  placeholder="{{$cliente->area_de_formacao}}"
            value="{{$cliente->area_de_formacao}}">
        </label>
    </p>

    <p>
        <label>
            data de nascimento
            <input type="date" name="data_de_nascimento"  placeholder="{{$cliente->data_de_nascimento}}"
            value="{{$cliente->data_de_nascimento}}">
        </label>
    </p>

    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>

