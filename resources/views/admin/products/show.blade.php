@extends('layout.main_template')

@section('content')

@include('fragments.formstyle')

<style>
    button {
        width: 100%;
        padding: 8px 16px;
        margin-block-start: 32px;
        border: 1px solid #000;
        border-radius: 5px;
        display: block;
        color: white;
        background-color: #000;
    }

    h3 {
        width: 100%;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        display: inline-block;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center">Detalles del Producto</h1>

    <div class="row justify-content-center">
        <div class="col-8">
          
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="text-center mb-4">Información del Producto</h3>
                    <p><strong>Producto:</strong> {{$product->nameProducts}}</p>
                    <p><strong>Marca:</strong> {{$product->brand->brand}}</p>
                    <p><strong>Descripción de la Marca:</strong> {{$product->brand->description}}</p>
                    <p><strong>Cantidad:</strong> {{$product->stock}}</p>
                    <p><strong>Precio Unitario:</strong> ${{$product->unit_price}}</p>

                   
                    @if ($product->imagen)
                        <div class="text-center mt-3">
                            <img src="{{ asset('image/products/' . $product->imagen) }}" class="img-fluid rounded" alt="Imagen del producto">
                        </div>
                    @else
                        <p class="text-muted text-center mt-3">No se ha cargado una imagen para este producto.</p>
                    @endif
                </div>
            </div>

            
            <div class="text-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                    <i class="fa-solid fa-arrow-left"></i> Regresar a la lista de productos
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
