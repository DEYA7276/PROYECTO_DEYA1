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
    <h1 class="text-center">Eliminar Marca</h1>

    <div class="row justify-content-center">
        <div class="col-8">
            <!-- Card para eliminar marca -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="text-center">¿Estás seguro que quieres eliminar la marca {{$brand->brand}}?</h3>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <!-- Botón para no eliminar, regresa al índice de marcas -->
                        <form action="{{ route('brands.index') }}" method="GET">
                            <button type="submit" class="btn btn-secondary btn-lg">
                                <i class="fa-solid fa-arrow-left"></i> No
                            </button>
                        </form>

                        <!-- Botón para confirmar la eliminación -->
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fa-solid fa-trash"></i> Sí
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
