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


    /**
     *   This function will create or update address from user
     * 
     *   @param array $address_data  A array with address data
     * 
     *   @param int $user_id  Id from user
     * 
     *   @return \Illuminate\Database\Eloquent\Model|null  Return an address model with data from new register
     *           or null in case of failure
     * 
     *   @throws \Illuminate\Database\QueryException  Return an exception in case of failure
     */
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


    /**
     *   This function will find and return the first address from user
     *
     *   @param  int $user_id  The user id to find address
     * 
     *   @return \Illuminate\Database\Eloquent\Model|null  Return a address model or null if not exists
     */
    public function address_from_user( int $user_id )
    {
        return $this->where('user_id', $user_id)
                    ->first();
    }
}
