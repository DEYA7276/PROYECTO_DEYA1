<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $clients = Client::paginate(4);
        return view('admin.clients.index', compact('clients'));
    }

    
    public function create()
    {
        return view('admin.clients.create');
    }

    
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

   
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    
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

    
    public function destroyConfirm(Client $client)
    {
        return view('admin.clients.delete', compact('client'));
    }

    
    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('status', 'Cliente eliminado');
    }
}
