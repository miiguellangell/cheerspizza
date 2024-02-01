@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Facturas cargadas por: {{ $user->name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Número de Factura</th>
                <th>Productos Peq</th>
                <th>Productos Med</th>
                <th>Productos Gra</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->NumeroDeFactura }}</td>
                    <td>{{ $factura->ProductoPeq }}</td>
                    <td>{{ $factura->ProductoMed }}</td>
                    <td>{{ $factura->ProductoGra }}</td>
                    <td>{{ $factura->PuntosDeFactura }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



  
@endsection