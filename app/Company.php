<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
      'name', 'address_id',
    ];

    protected $table = 'companies';

    public function address() {
      return $this->belongsTo('App\Address');
    }

    public function offers() {
      return $this->hasMany('App\Offer');
    }

    public function users() {
      return $this->belongsToMany('App\User')->withPivot('accepted');
    }
}
