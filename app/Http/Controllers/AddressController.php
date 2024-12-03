<?php
// app/Http/Controllers/AddressController.php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Addresses\StoreRequest;

class AddressController extends Controller
{
    /**
     * Mostrar la lista de direcciones.
     */
    public function index()
    {
        // Obtener todas las direcciones
        $addresses = Address::paginate(4); 
        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Mostrar el formulario para crear una nueva dirección.
     */
    public function create()
    {
        // Obtener todos los clientes disponibles
        $clients = Client::pluck('name', 'id'); // 'name' es lo que mostramos, 'id' lo que se guarda
        return view('admin.addresses.create', compact('clients'));
    }

    /**
     * Almacenar una nueva dirección.
     */
    public function store(StoreRequest $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'internal_num' => 'nullable|integer',
            'external_num' => 'required|integer',
            'neighborhood' => 'required|string|max:255',
            'town' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|integer',
            'references' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id', // Verificar que el cliente existe
        ]);

        // Crear la dirección
        Address::create($validated);

        return to_route('addresses.index')->with('status', 'Dirección registrada');
    }

    /**
     * Mostrar una dirección específica.
     */
    public function show(Address $address)
    {
        return view('admin.addresses.show', compact('address'));
    }

    /**
     * Mostrar el formulario para editar una dirección.
     */
    public function edit(Address $address)
    {
        // Obtener todos los clientes
        $clients = Client::pluck('name', 'id'); 
        return view('admin.addresses.edit', compact('address', 'clients'));
    }

    /**
     * Actualizar una dirección.
     */
    public function update(Request $request, Address $address)
    {
        // Validar los datos
        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'internal_num' => 'nullable|integer',
            'external_num' => 'required|integer',
            'neighborhood' => 'required|string|max:255',
            'town' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'references' => 'required|string|max:100',
            'postal_code' => 'required|integer',
        ]);

        // Actualizar la dirección
        $address->update($validated);

        return to_route('addresses.index')->with('status', 'Dirección actualizada');
    }

    public function destroyConfirm(Address $address)
    {
        return view('admin.addresses.delete', compact('address'));
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return to_route('addresses.index')->with('status', 'Direccion eliminada');
    }
}
