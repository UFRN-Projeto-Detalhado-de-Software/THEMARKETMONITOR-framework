<html>
<head></head>
<body>
<h1>Editar funcionários:</h1>

<form action="{{route('periodo.tipo.edit', ['periodoTipo' => $periodoTipo->id])}}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="nome" value="{{$periodoTipo->nome}}">
        </label>
    </p>
    <p>
        <label>
            Duração (em dias):
            <input type="number" id="duracao" name="duracao" placeholder="quantidade de dias"
                   value="{{$periodoTipo->duracao}}">
        </label>
    </p>
    <input type="submit" value="Enviar">
</form>

<br>

</body>
</html>
