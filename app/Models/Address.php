<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
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

   
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
