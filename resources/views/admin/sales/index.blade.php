@extends('layout.main_template')

@section('content')
<h2 class="text-center mb-4">Índice de Ventas</h2>

<div class="d-flex justify-content-around mb-4">
    <a href="{{ route('sales.create') }}" class="btn btn-success">
        <i class="fa-solid fa-plus"></i> Agregar Venta
    </a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-box"></i> Productos
    </a>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-users"></i> Clientes
    </a>
</div>


<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark text-center">
        <tr>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Fecha de Venta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td class="text-center">
                    @if ($sale->client)
                        {{ $sale->client->name }}
                    @else
                        No asignado
                    @endif
                </td>
                <td class="text-center">
                    @if ($sale->product)
                        {{ $sale->product->nameProducts }}
                    @else
                        No asignado
                    @endif
                </td>
                <td class="text-center">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d-m-Y') }}</td>

                <td class="text-center">
                    
                    <a href="{{ route('sales.show', $sale) }}" class="btn btn-info">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button class="btn btn-danger">
                        <a href="{{ route('sales.destroyConfirm', $sale->sale_id) }}" class="text-white text-decoration-none">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
<div class="d-flex justify-content-center mt-4">
    {{ $sales->links('pagination::bootstrap-4') }}
</div>

@endsection

<style>
    /* Estilo adicional para mejorar apariencia */
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
</style>
