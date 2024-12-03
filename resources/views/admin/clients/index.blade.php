@extends('layout.main_template')

@section('content')

@include('fragments.formstyle')

<style>
    button {
        width: 100%;
        padding: 8px 16px;
        margin-block-start: 32px;
        border: 1px solid #000;
        border-radius: 5px;
        display: block;
        color: white;
        background-color: #000;
    }

    h3 {
        width: 100%;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        display: inline-block;
    }

    h2 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
    }

    .btn i {
        margin-right: 5px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table th {
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .d-flex {
        margin-bottom: 20px;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Clientes</h2>

  
    <div class="d-flex justify-content-around mb-4">
        <a href="{{ route('clients.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Agregar Cliente
        </a>
        <a href="{{ route('brands.create') }}" class="btn btn-info">
            <i class="fa-solid fa-box"></i> Crear Marca
        </a>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-box"></i> Crear Producto
        </a>
    </div>

    
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }} {{ $client->last_name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone ?? 'No especificado' }}</td>
                    <td>
                   
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('clients.destroyConfirm', $client->id) }}" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $clients->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
