<?php
// app/Http/Controllers/AddressController.php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Addresses\StoreRequest;

class AddressController extends Controller
{
 
    public function index()
    {
        
        $addresses = Address::paginate(4); 
        return view('admin.addresses.index', compact('addresses'));
    }

    
    public function create()
    {
        
        $clients = Client::pluck('name', 'id'); 
        return view('admin.addresses.create', compact('clients'));
    }

   
    public function store(StoreRequest $request)
    {
        
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
            'client_id' => 'required|exists:clients,id', 
        ]);

        Address::create($validated);

        return to_route('addresses.index')->with('status', 'Dirección registrada');
    }

    
    public function show(Address $address)
    {
        return view('admin.addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
       
        $clients = Client::pluck('name', 'id'); 
        return view('admin.addresses.edit', compact('address', 'clients'));
    }

    
    public function update(Request $request, Address $address)
    {
        
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

        
        $address->update($validated);

        return to_route('addresses.index')->with('status', 'Dirección actualizada');
    }

    public function destroyConfirm(Address $address)
    {
        return view('admin.addresses.delete', compact('address'));
    }

   
    public function destroy(Address $address)
    {
        $address->delete();
        return to_route('addresses.index')->with('status', 'Direccion eliminada');
    }
}
