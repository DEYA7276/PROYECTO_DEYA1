<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the sales.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener todas las ventas con relaciones de clientes y productos
        $sales = Sale::with(['client', 'product'])->paginate(4);  // Cambié la paginación a 4 para consistencia
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtener todos los clientes y productos para el formulario de creación
        $clients = Client::pluck('name', 'id');  // Cambié para obtener solo el nombre del cliente y su ID
        $products = Product::pluck('nameProducts', 'id');  // Cambié para obtener solo el nombre del producto y su ID
        return view('admin.sales.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created sale in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
        ]);

        // Crear la nueva venta
        Sale::create($validated);

        return to_route('sales.index')->with('status', 'Venta creada exitosamente.');
    }

    /**
     * Display the specified sale.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\View\View
     */
    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified sale.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\View\View
     */
    public function edit(Sale $sale)
    {
        // Obtener todos los clientes y productos para el formulario de edición
        $clients = Client::pluck('name', 'id');  // Cambié para obtener solo el nombre del cliente y su ID
        $products = Product::pluck('nameProducts', 'id');  // Cambié para obtener solo el nombre del producto y su ID
        return view('admin.sales.edit', compact('sale', 'clients', 'products'));
    }

    /**
     * Update the specified sale in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sale $sale)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
        ]);

        // Actualizar la venta
        $sale->update($validated);

        return to_route('sales.index')->with('status', 'Venta actualizada exitosamente.');
    }

    /**
     * Remove the specified sale from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\RedirectResponse
     */


    public function destroyConfirm(Sale $sale)
    {
        return view('admin.sales.delete', compact('sale'));
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return to_route('sales.index')->with('status', 'Venta eliminada');
    }
}


