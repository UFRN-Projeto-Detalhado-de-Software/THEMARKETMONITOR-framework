<html>
<head></head>
<body>
<h1>Crie um cargo</h1>

<form action="{{route('cargo.store')}}" method="POST">
    @csrf
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="nome">
        </label>
    </p>
    <input type="submit" value="Enviar">
</form>


</body>
</html>
