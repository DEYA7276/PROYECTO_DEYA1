<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // Establecer en true si el usuario puede hacer esta solicitud
    }

    /**
     * Obtener las reglas de validación para la solicitud.
     *
     * @return array
     */
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
