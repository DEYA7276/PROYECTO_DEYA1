@extends('layout.main_template')

@section('content')

<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('sales.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Regresar a la lista de ventas
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Detalles de la Venta</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    
                    <p><strong>Cliente:</strong> {{$sale->client->name}}</p>
                    <p><strong>Producto:</strong> {{$sale->product->nameProducts}}</p>
                    <p><strong>Cantidad:</strong> {{$sale->product->stock}}</p>
                    <p><strong>Precio Unitario:</strong> ${{$sale->product->unit_price}}</p>
                    <p><strong>Fecha de Venta:</strong> {{ \Carbon\Carbon::parse($sale->sale_date)->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    h1 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #333;
    }

    .card {
        background-color: #f9f9f9;
        border-radius: 15px;
        padding: 20px;
    }

    .card-body {
        font-family: 'Arial', sans-serif;
        font-size: 1.1rem;
    }

    .card-title {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-primary a {
        color: white;
        text-decoration: none;
    }

    .btn-primary a:hover {
        color: white;
    }
</style>
