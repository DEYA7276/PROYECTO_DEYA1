<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $brands = Brand::paginate(4);
         //obtener todos los datos de la tabla
        return view('admin/brands/index', compact('brands'));
        //echo "Index productos";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands=Brand::pluck('brand','description'); //ob¿tener datos especificos
        //dd($brands); //verificar datos que se extraen
        return view('admin/brands/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Brand::create($request->all());
        return to_route('brands.index') -> with('status', 'Marca registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin/brands/show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
        public function edit($id)
{
    $brand = Brand::findOrFail($id);  // Esto devuelve un solo objeto Brand
    return view('admin/brands/edit', compact('brand'));
}
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all()); // actualizamos los datos en la base de datos
        return to_route('brands.index') -> with('status', 'Marca Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyConfirm(Brand $brand)
    {
        return view('admin.brands.delete', compact('brand'));
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return to_route('brands.index')->with('status', 'Marca eliminada');
    }
}


