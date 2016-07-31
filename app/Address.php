<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
      'address1', 'address2', 'city', 'postal_code', 'country',
    ];

    public function company() {
      return $this->hasOne('App\Company');
    }

    public function offer() {
      return $this->belongsTo('App\Offer');
    }

    public function getReadbleAddress($address)
    {
      $readableAddress = $address->address1;
      if ($address->address2)
      {
        $readableAddress .= ', ' . $address->address2;
      }
      $readableAddress .= ', ' . $address->postal_code . ' ' . $address->city;
      return $readableAddress;
    }
}
