<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Offer;
use app\Helpers; // http://laravel.io/bin/9voqW Look at this!

class OfferController extends Controller
{
  //public function __construct($getOfferAddress)

    public function index(Offer $offer)
    {
        $offers = $offer->all();
        return view('welcome')->with('offers', $offers);
    }

    function getOfferAddress($offer)
    {
        return $offer->company->address->address1;
    }

    public function get($offer_id)
    {
        $offer = \App\Offer::where('id', $offer_id)->firstOrFail();
        return view('offers.offer')->with('offer', $offer);
    }
}