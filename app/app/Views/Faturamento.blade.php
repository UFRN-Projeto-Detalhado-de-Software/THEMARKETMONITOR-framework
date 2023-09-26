@extends('layouts.main')

@section('title', 'Faturamento')

@section('content')

<div class="content">
    <h1>Faturamento</h1>
    <br>

    <!-- Time Period Selection -->
    <form method="POST" action="{{ route('/*Caminho para o controller do faturamento*/') }}">
        @csrf <!-- Add CSRF token for security -->

        <!-- Date selection inputs (dataDeInicio and dataDeFinal) -->
        <label for="dataDeInicio">Data de Início:</label>
        <input type="date" id="dataDeInicio" name="startDate">
        <br><br>
        <label for="dataDeFinal">Data de Final:</label>
        <input type="date" id="dataDeFinal" name="endDate">
        <br><br>
        <input type="submit" value="Calcular Faturamento" class="calculate-button">
    </form>
    <br>

    <!-- Display Earnings Data -->
    <div id="earningsData">
        <p>Faturamento no período selecionado: <span id="totalEarnings">{{ $valor }}</span></p>
    </div>

</div>

@endsection
