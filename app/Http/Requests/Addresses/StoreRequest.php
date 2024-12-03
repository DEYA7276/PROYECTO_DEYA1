<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;  
    }

   
    public function rules()
    {
        return [
            'street' => 'required|string|max:255',
            'internal_num' => 'nullable|integer',
            'external_num' => 'required|integer',
            'neighborhood' => 'required|string|max:255',
            'town' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|integer',
            'references' => 'required|string|max:100',
            'client_id' => 'required|exists:clients,id',
        ];
    }
}
