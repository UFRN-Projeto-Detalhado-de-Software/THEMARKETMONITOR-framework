@extends('master')

@section('content')



    <h2> Meios de Pagamento</h2>

    <ul>
        @foreach( $meiopagamento as $meio)
            <li>{{$meio->id}} |{{$meio->nome_meiopagamento}} |
                <a href="{{route('meiopagamento.edit', ['meiopagamento'=>$meio->id])}}">Edit</a>  |
                <a href="{{route ('meiopagamento.show',['meiopagamento'=>$meio->id])}}">Mostrar</a>
            </li>
        @endforeach
    </ul>

    <a class="btn btn-primary" href="{{route('meiopagamento.create')}}"> Criar um Meio de Pagamento</a>



@endsection
