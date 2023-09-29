@if (session()->has('message'))
    {{ session()->get('message') }}
@endif
<html>
<head></head>
<body>
<h1>Editar Produto:</h1>

<form action="{{route('produto.update', ['produto' => $produto->id])}}" method="POST">

    @csrf
    <p>

        <label>
            Nome:
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="name" placeholder={{$produto->name}} value={{$produto->name}}>
        </label>
    </p>
    <p>
        <label>
            ID:
            <input type="number"  name="id" placeholder={{$produto->id}}
            value={{$produto->id}}>
        </label>
    </p>

    <p>
        <label>
            TIPO:
            <input type="number"  name="tipo" placeholder={{$produto->tipo}}
            value={{$produto->tipo}}>
        </label>
    </p>

    <p>
        <label>
            VALOR:
            <input type="number"  name="valor" placeholder={{$produto->valor}}
            value={{$produto->valor}}>
        </label>
    </p>

    <p>
        <label>
            TAGS:
            <input type="text"  name="tags" placeholder={{$produto->tags}}
            value={{$produto->tags}}>
        </label>
    </p>

    <p>
        <label>
            SIGLA:
            <input type="text"  name="sigla" placeholder={{$produto->sigla}}
            value={{$produto->sigla}}>
        </label>
    </p>

    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>

