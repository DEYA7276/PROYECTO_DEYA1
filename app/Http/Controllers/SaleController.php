<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['client', 'product'])->paginate(4);
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::pluck('name', 'id');
        $products = Product::pluck('nameProducts', 'id');
        return view('admin.sales.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
        ]);

        Sale::create($validated);

        return to_route('sales.index')->with('status', 'Venta creada exitosamente.');
    }

    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $clients = Client::pluck('name', 'id');
        $products = Product::pluck('nameProducts', 'id');
        return view('admin.sales.edit', compact('sale', 'clients', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
        ]);

        $sale->update($validated);

        return to_route('sales.index')->with('status', 'Venta actualizada exitosamente.');
    }

    public function destroyConfirm(Sale $sale)
    {
        return view('admin.sales.delete', compact('sale'));
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return to_route('sales.index')->with('status', 'Venta eliminada');
    }
}
