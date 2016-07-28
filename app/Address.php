<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public function company() {
      return $this->belongsTo('App\Company');
    }

    public function offer() {
      return $this->belongsTo('App\Offer');
    }
}
