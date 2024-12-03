@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Editar Cliente</h2>

<form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}" required>
    </div>

    <div>
        <label for="last_name">Apellido Paterno:</label>
        <input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" required>
    </div>

    <div>
        <label for="second_last_name">Apellido Materno (opcional):</label>
        <input type="text" name="second_last_name" id="second_last_name" value="{{ $client->second_last_name }}">
    </div>

    <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}" required>
    </div>

    <div>
        <label for="phone">Teléfono (opcional):</label>
        <input type="text" name="phone" id="phone" value="{{ $client->phone }}">
    </div>

    <div>
        <button type="submit">Actualizar Cliente</button>
    </div>
</form>
@endsection
