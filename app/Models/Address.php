<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id', 
        'street', 
        'numero', 
        'complement', 
        'neighborhood', 
        'city', 
        'uf', 
        'zip_code'
    ];


    public function create_or_update_address( array $address_data, int $user_id )
    {
        return $this->updateOrCreate(
            [ 'user_id' => $user_id ],
            [ 
                'user_id'      => $user_id, 
                'street'       => $address_data['street'], 
                'numero'       => $address_data['number'], 
                'complement'   => $address_data['complement'], 
                'neighborhood' => $address_data['neighborhood'], 
                'city'         => $address_data['city'], 
                'uf'           => $address_data['uf'], 
                'zip_code'     => $address_data['zip_code'],
            ]
        );
    }
}
