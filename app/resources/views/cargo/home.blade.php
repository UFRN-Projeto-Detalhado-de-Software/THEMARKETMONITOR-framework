<html>
<head></head>
<body>

@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif

<h1>Lista de cargos:</h1>

@foreach($cargos as $cargo)
    <p>Nome: {{$cargo->nome}}</p>

    <a href="{{route('cargo.formEdit', ['id' => $cargo->id])}}">Editar cargo</a>

    <form action="{{route('cargo.destroy', ['id' => $cargo->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$cargo->id}}">
        <input type="submit" value="Deletar cargo">
    </form>

    <br>
@endforeach

<br>
<a href="{{route('cargo.create')}}">Criar cargo</a>

</body>
</html>
