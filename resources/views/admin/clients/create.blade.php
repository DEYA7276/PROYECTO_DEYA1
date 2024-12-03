@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Crear Cliente</h2>


<link href="{{ asset('css/app.css') }}" rel="stylesheet">


@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


<button class="btn btn-secondary">
    <a href="{{ route('clients.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Clientes
    </a>
</button>

<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="last_name">Apellido Paterno:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
    </div>

    <div>
        <label for="second_last_name">Apellido Materno:</label>
        <input type="text" name="second_last_name" id="second_last_name" value="{{ old('second_last_name') }}" required>
    </div>

    <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="phone">Teléfono:</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
    </div>

    <div>
        <button type="submit">Guardar Cliente</button>
    </div>
</form>
@endsection
