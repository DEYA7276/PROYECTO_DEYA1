@extends('layout.main_template')

@section('content')


@include('fragments.formstyle')
</div>

<h1>Create de brand</h1>


<button class="btn btn-secondary">
    <a href="{{ route('products.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-candy"></i> Productos
    </a>
</button>
<form action="{{route('brands.store')}}" method="POST">
@csrf

<label for="">Nombre de la marca</label>
<input type="text" name="brand">

<label for="">Descripcion</label>
<input type="text" name="description">

<br>
<button type="submit"> Registrar </button>
</form>


@endsection