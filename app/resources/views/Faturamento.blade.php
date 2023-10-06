@extends('layouts.main')

@section('title', 'Faturamento')

@section('content')

<div class="content">
    <h1>Faturamento</h1>
    <br>

    <!-- Time Period Selection -->

        @csrf <!-- Add CSRF token for security -->
     <form action="{{route('calcularfaturamento')}}" method="get">
         <!-- Date selection inputs (dataDeInicio and dataDeFinal) -->
         <label for="dataDeInicio">Data de Início:</label>
         <input type="date" id="dataDeInicio" name="data_inicio"  value="{{ old('data_inicio') }}" placeholder= "{{ old('data_inicio') }}">
         <br><br>
         <label for="dataDeFinal">Data de Final:</label>
         <input type="date" id="dataDeFinal" name="data_fim"  value="{{ old('data_fim') }}" placeholder= "{{ old('data_fim') }}">
         <br><br>
         <input type="submit" value="Calcular Faturamento" class="calculate-button">
         <!--</form>-->
     </form>

    <br>

    <!-- Display Earnings Data -->
    <div id="earningsData">
        <p>Faturamento no período selecionado: {{$faturamento}}</p>
    </div>

</div>

@endsection
