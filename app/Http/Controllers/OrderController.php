<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Http\Requests;
use App\Order;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function buy($offer_id)
    {
      $offer = \App\Offer::where('id', $offer_id)->firstOrFail();
      return view('order.index')->with('offer', $offer);
    }
}
