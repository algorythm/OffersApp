<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function address() {
      return $this->hasOne('App\Address');
    }

    public function offers() {
      return $this->belongsTo('App\Offer');
    }
}
