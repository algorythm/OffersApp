<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'hash', 'total', 'address_id', 'paid', 'customer_id', 'offer_id'
    ];

    public function offer()
    {
      return $this->belongsTo('App\Offer');
    }
}
