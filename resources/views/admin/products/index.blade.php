@extends('layout.main_template')

@section('content')
<!-- Vincula el CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Vincula los íconos de FontAwesome si los estás usando -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

<h2>Index productos</h2>
<br>

<!-- Botones con íconos y colores -->
<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('products.create') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-plus-circle"></i> Crear producto
        </a>
    </button>
    <button class="btn btn-success">
        <a href="{{ route('brands.create') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-tag"></i> Agregar marca
        </a>
    </button>
    <button class="btn btn-info">
        <a href="{{ route('brands.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-list"></i> Marcas existentes
        </a>
    </button>
    <button class="btn btn-secondary">
        <a href="{{ route('products.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-candy"></i> Productos
        </a>
    </button>
</div>

<!-- Tabla mejorada con estilos -->
<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre del producto</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $p)
            <tr>
                <td>{{ $p->nameProducts }}</td>
                <td>{{ $p->brand->brand }}</td> <!-- Mostrar el nombre de la marca -->
                <td>{{ $p->stock }}</td>
                <td>{{ $p->brand->description }}</td>
                <td>{{ $p->unit_price }}</td>
                <td><img src="{{ asset('image/products/'.$p->imagen) }}" width="60" alt="{{ $p->nameProducts }}"></td>
                <td>
                    <!-- Botones con íconos -->
                    <button class="btn btn-info">
                        <a href="{{ route('products.show', $p) }}" class="text-white text-decoration-none">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </button>
                    <button class="btn btn-warning">
                        <a href="{{ route('products.edit', $p) }}" class="text-white text-decoration-none">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </button>
                    <button class="btn btn-danger">
                    <a href="{{ route('products.destroyConfirm', $p->id) }}" class="text-white text-decoration-none">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
{{$products->links()}}

@endsection

<style>
    /* Agregar algo de separación y bordes a los botones */
    .btn {
        margin-right: 10px;
        margin-bottom: 10px;
    }

    /* Asegurar que los iconos tengan buen tamaño */
    .btn i {
        font-size: 18px;
    }

    /* Estilo de la tabla */
    .table {
        width: 100%;
        margin-top: 20px;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    /* Reducir tamaño de la paginación */
.pagination .page-item .page-link {
    font-size: 14px;  /* Reducir el tamaño de fuente */
    padding: 5px 10px; /* Reducir el padding */
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
}

/* Botones activos y deshabilitados */
.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}

.pagination .page-item.disabled .page-link {
    background-color: #f1f1f1;
    border-color: #f1f1f1;
}

/* Asegurar que los botones no tengan bordes demasiado grandes */
.pagination .page-link {
    border-radius: 5px;
}

</style>
