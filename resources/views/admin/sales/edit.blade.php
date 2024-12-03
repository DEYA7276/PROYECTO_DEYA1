@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Editar Venta</h2>

<form action="{{ route('sales.update', $sale) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="client_id">Cliente:</label>
        <select name="client_id" id="client_id" required>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" {{ $sale->client_id == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="product_id">Producto:</label>
        <select name="product_id" id="product_id" required>
            @foreach ($products as $id => $name)
                <option value="{{ $id }}" {{ $sale->product_id == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="sale_date">Fecha de Venta:</label>
        <input type="date" name="sale_date" id="sale_date" value="{{ \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}" required>
    </div>

    <div>
        <button type="submit">Actualizar Venta</button>
    </div>
</form>

@endsection
