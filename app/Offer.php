<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
      'name', 'company_id', 'slug', 'description', 'price', 'image', 'stock',
    ];

    public function company() {
      return $this->belongsTo('App\Company');
    }

    public function address() {
      return $this->belongsTo('App\Address');
    }

    public function orders() {
      return $this->hasMany('App\Order');
    }

    public function test() {
      return 'test';
    }

    public function hasLowStock()
    {
        if ($this->outOfStock())
        {
          return false;
        }

        else {
          return (bool) ($this->stock <= 5);
        }
    }

    public function outOfStock()
    {
        return $this->stock === 0;
    }

    public function inStock()
    {
        return $this->stock >= 1;
    }

    public function hasStock($quantity)
    {
        return $this->stock >= $quantity;
    }

    public function order()
    {
      return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
