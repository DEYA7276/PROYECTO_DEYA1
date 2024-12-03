<!-- resources/views/admin/addresses/create.blade.php -->

@extends('layout.main_template')

@section('content')

@include('fragments.formstyle')

<h2>Crear Dirección</h2>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    @foreach ($errors->all() as $e)
        <div class="error">
            {{$e}}
        </div>
    @endforeach
@endif

<button class="btn btn-secondary">
    <a href="{{ route('addresses.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-house"></i> Direcciones
    </a>
</button>

<form action="{{ route('addresses.store') }}" method="POST">
    @csrf

    <div>
        <label for="street">Calle:</label>
        <input type="text" name="street" id="street" value="{{ old('street') }}" required>
    </div>

    <div>
        <label for="internal_num">Número Interior:</label>
        <input type="number" name="internal_num" id="internal_num" value="{{ old('internal_num') }}">
    </div>

    <div>
        <label for="external_num">Número Exterior:</label>
        <input type="number" name="external_num" id="external_num" value="{{ old('external_num') }}" required>
    </div>

    <div>
        <label for="neighborhood">Colonia:</label>
        <input type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood') }}" required>
    </div>

    <div>
        <label for="town">Ciudad/Pueblo:</label>
        <input type="text" name="town" id="town" value="{{ old('town') }}" required>
    </div>

    <div>
        <label for="state">Estado:</label>
        <input type="text" name="state" id="state" value="{{ old('state') }}" required>
    </div>

    <div>
        <label for="country">País:</label>
        <input type="text" name="country" id="country" value="{{ old('country') }}" required>
    </div>

    <div>
        <label for="postal_code">Código Postal:</label>
        <input type="number" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" required>
    </div>

    <div>
        <label for="references">Referencias:</label>
        <textarea name="references" id="references">{{ old('references') }}</textarea>
    </div>

    <div>
        <label for="client_id">Cliente:</label>
        <select name="client_id" id="client_id" required>
            <option value="">Selecciona un Cliente</option>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Guardar Dirección</button>
    </div>
</form>

@endsection
