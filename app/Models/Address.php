<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'street',
        'internal_num',
        'external_num',
        'neighborhood',
        'town',
         'state',
        'country',
        'postal_code',
        'references',
        'client_id'
    ];

    // Relación con el modelo Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
