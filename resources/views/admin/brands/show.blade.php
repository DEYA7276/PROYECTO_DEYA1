@extends('layout.main_template')

@section('content')
<!-- Botón de regreso a la lista de marcas -->
<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('brands.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Regresar a la lista de marcas
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Detalles de la Marca</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Marca: {{$brand->brand}}</h3>
                    <p><strong>Descripción:</strong> {{$brand->description}}</p>

                    <!-- Mostrar imagen de la marca (si existe) -->
                    @if($brand->imagen)
                        <div class="mt-3">
                            <img src="{{ asset('image/brands/'.$brand->imagen) }}" alt="Imagen de la marca" class="img-fluid rounded">
                        </div>
                    @else
                        <p class="mt-3"></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
