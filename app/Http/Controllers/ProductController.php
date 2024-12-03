<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Products\StoreRequest;


class ProductController extends Controller
{
    /**
     * Mostrar la lista de productos.
     */
    public function index()
    {

        $products = Product::paginate(4); // Obtener todos los productos
        return view('admin.products.index', compact('products'));
    }

    /**
     * Mostrar el formulario para crear un nuevo producto.
     */
    public function create()
    {
        // Obtener todas las marcas disponibles
        $brands = Brand::pluck('brand', 'id'); // 'brand' es lo que mostramos, 'id' lo que se guarda
        return view('admin.products.create', compact('brands'));
    }

    /**
     * Almacenar un nuevo producto.
     */
    public function store(StoreRequest $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nameProducts' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id', 
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
            'imagen' => 'nullable|image|max:10240', 
        ]);

        // Si hay imagen, se guarda
        if ($request->hasFile('imagen')) {
            $filename = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('image/products'), $filename);
            $validated['imagen'] = $filename;
        }

        // Crear el producto
        Product::create($validated);

        return to_route('products.index')->with('status', 'Producto registrado');
    }

    /**
     * Mostrar un producto específico.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Mostrar el formulario para editar un producto.
     */
    public function edit(Product $product)
    {
        $brands = Brand::pluck('brand', 'id'); // Obtener las marcas
        return view('admin.products.edit', compact('product', 'brands'));
    }

    /**
     * Actualizar un producto.
     */
    public function update(Request $request, Product $product)
    {
        // Validar los datos
        $validated = $request->validate([
            'nameProducts' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
            'imagen' => 'nullable|image|max:10240',
        ]);

        // Si se sube una nueva imagen, se guarda
        if ($request->hasFile('imagen')) {
            $filename = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('image/products'), $filename);
            $validated['imagen'] = $filename;
        }

        // Actualizar el producto
        $product->update($validated);

        return to_route('products.index')->with('status', 'Producto actualizado');
    }

    public function destroyConfirm(Product $product)
    {
        return view('admin.products.delete', compact('product'));
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('status', 'Producto eliminado');
    }
}
