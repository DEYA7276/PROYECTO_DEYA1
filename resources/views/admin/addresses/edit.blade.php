<!-- resources/views/admin/addresses/edit.blade.php -->

@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')

<h2>Editar Dirección</h2>

<form action="{{ route('addresses.update', $address) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="street">Calle:</label>
        <input type="text" name="street" id="street" value="{{ $address->street }}" required>
    </div>

    <div>
        <label for="internal_num">Número Interior:</label>
        <input type="text" name="internal_num" id="internal_num" value="{{ $address->internal_num }}">
    </div>

    <div>
        <label for="external_num">Número Exterior:</label>
        <input type="text" name="external_num" id="external_num" value="{{ $address->external_num }}">
    </div>

    <div>
        <label for="neighborhood">Colonia:</label>
        <input type="text" name="neighborhood" id="neighborhood" value="{{ $address->neighborhood }}" required>
    </div>

    <div>
        <label for="town">Ciudad:</label>
        <input type="text" name="town" id="town" value="{{ $address->town }}" required>
    </div>

    <div>
        <label for="state">Estado:</label>
        <input type="text" name="state" id="state" value="{{ $address->state }}" required>
    </div>

    <div>
        <label for="country">País:</label>
        <input type="text" name="country" id="country" value="{{ $address->country }}" required>
    </div>

    <div>
        <label for="postal_code">Código Postal:</label>
        <input type="text" name="postal_code" id="postal_code" value="{{ $address->postal_code }}" required>
    </div>

    <div>
        <label for="references">Referencias:</label>
        <textarea name="references" id="references" rows="4">{{ $address->references }}</textarea>
    </div>

    <div>
        <label for="client_id">Cliente:</label>
        <select name="client_id" id="client_id" required>
            <option value="">Selecciona un cliente</option>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" {{ $address->client_id == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Actualizar Dirección</button>
    </div>
</form>
@endsection
