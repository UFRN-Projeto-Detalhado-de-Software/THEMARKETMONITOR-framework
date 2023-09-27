@if (session()->has('message'))
    {{ session()->get('message') }}
@endif
<html>
<head></head>
<body>
<h1>Editar Tipos das Vendas:</h1>

<form action="{{route('tipovenda.update', ['tipovenda' => $tipovenda->id])}}" method="POST">

    @csrf
    <p>

        <label>
            Nome:
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="nome_tipo" placeholder={{$tipovenda->nome_tipo}} value={{$tipovenda->nome_tipo}}>
        </label>
    </p>
    <p>
        <label>
            ID:
            <input type="number"  name="id" placeholder={{$tipovenda->id}}
            value={{$tipovenda->id}}>
        </label>
    </p>

    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>
