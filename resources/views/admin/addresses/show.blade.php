@extends('layout.main_template')

@section('content')
<!-- Botón de regreso a la lista de direcciones -->
<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('addresses.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Regresar a la lista de direcciones
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Detalles de la Dirección</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Calle: {{ $address->street }}</h3>
                    <p><strong>Número Interior:</strong> {{ $address->internal_num }}</p>
                    <p><strong>Número Exterior:</strong> {{ $address->external_num }}</p>
                    <p><strong>Colonia:</strong> {{ $address->neighborhood }}</p>
                    <p><strong>Ciudad:</strong> {{ $address->town }}</p>
                    <p><strong>Estado:</strong> {{ $address->state }}</p>
                    <p><strong>País:</strong> {{ $address->country }}</p>
                    <p><strong>Código Postal:</strong> {{ $address->postal_code }}</p>
                    <p><strong>Referencias:</strong> {{ $address->references }}</p>
                    <p><strong>Cliente ID:</strong> {{ $address->client_id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .btn-primary a {
        text-decoration: none;
    }

    h1 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #333;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background-color: #f9f9f9;
    }

    .card-body h3 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #555;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }
</style>
