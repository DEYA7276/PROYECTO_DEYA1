@extends('layout.main_template')

@section('content')
<h2 class="text-center mb-4">Index Brands</h2>


<div class="d-flex justify-content-around mb-4">
    <a href="{{ route('brands.create') }}" class="btn btn-success">
        <i class="fa-solid fa-plus"></i> Agregar Marca
    </a>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-box"></i> Crear Producto
    </a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-list"></i> Productos
    </a>
</div>


<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark text-center">
        <tr>
            <th>Nombre de la marca</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $b)
            <tr>
                <td class="text-center">{{ $b->brand }}</td>
                <td class="text-center">{{ $b->description }}</td>
                <td class="text-center">
                
                    <a href="{{ route('brands.show', $b) }}" class="btn btn-info">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('brands.edit', $b) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button class="btn btn-danger">
                        <a href="{{ route('brands.destroyConfirm', $b->id) }}" class="text-white text-decoration-none">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<div class="d-flex justify-content-center mt-4">
    {{ $brands->links('pagination::bootstrap-4') }}
</div>
@endsection

<style>
 
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
