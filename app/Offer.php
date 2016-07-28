<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function company() {
      return $this->belongsTo('App\Company');
    }

    public function address() {
      return $this->belongsTo('App\Address');
    }
}
