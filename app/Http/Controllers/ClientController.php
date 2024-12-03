<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Mostrar la lista de clientes.
     */
    public function index()
    {
        $clients = Client::paginate(4);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Mostrar el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Almacenar un nuevo cliente.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'last_name' => 'required|string|max:40',
            'second_last_name' => 'nullable|string|max:40',
            'email' => 'required|email|max:50|unique:clients,email',
            'phone' => 'nullable|digits_between:10,15',
        ]);

        Client::create($validated);
        return to_route('clients.index')->with('status', 'Cliente registrado');
    }

    /**
     * Mostrar un cliente específico.
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Mostrar el formulario para editar un cliente.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Actualizar un cliente.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'last_name' => 'required|string|max:40',
            'second_last_name' => 'nullable|string|max:40',
            'email' => 'required|email|max:50|unique:clients,email,' . $client->id,
            'phone' => 'nullable|digits_between:10,15',
        ]);

        $client->update($validated);
        return to_route('clients.index')->with('status', 'Cliente actualizado');
    }

    /**
     * Mostrar la página de confirmación de eliminación.
     */
    public function destroyConfirm(Client $client)
    {
        return view('admin.clients.delete', compact('client'));
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('status', 'Cliente eliminado');
    }
}
