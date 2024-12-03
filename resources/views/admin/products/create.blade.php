<!-- resources/views/admin/products/create.blade.php -->

@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Crear Producto</h2>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    @foreach ($errors->all() as $e)
    <div class="error">
        {{$e}}
    
    @endforeach
@endif

</div>
<button class="btn btn-secondary">
    <a href="{{ route('products.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-candy"></i> Productos
    </a>
</button>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="nameProducts">Nombre del producto:</label>
        <input type="text" name="nameProducts" id="nameProducts" required>
    </div>

    <div>
        <label for="brand_id">Marca:</label>
        <select name="brand_id" id="brand_id" required>
            @foreach ($brands as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="stock">Cantidad:</label>
        <input type="number" name="stock" id="stock" required>
    </div>

    <div>
        <label for="unit_price">Precio:</label>
        <input type="number" name="unit_price" id="unit_price" step="0.01" required>
    </div>

    <div>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
    </div>

    <div>
        <button type="submit">Guardar Producto</button>
    </div>
</form>
@endsection
