<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use App\Offer;
use Validator;
use Redirect;
//use App\Helpers; // http://laravel.io/bin/9voqW Look at this! // couldn't make it work...

class OfferController extends Controller
{
  //public function __construct($getOfferAddress)

    public function index(Offer $offer)
    {
        $offers = $offer->all();
        return view('welcome')->with('offers', $offers);
    }

    public function getOffer($offer_id)
    {
        $offer = \App\Offer::where('id', $offer_id)->firstOrFail();
        return view('offers.offer')->with('offer', $offer);
    }

    public function getBuy($offer_id)
    {
      $offer = \App\Offer::where('id', $offer_id)->firstOrFail();
      return view('offers.buy')->with('offer', $offer);
    }

    public function processPurchase(Request $request, Customer $customer)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'offer_id' => 'required|numeric',
      ]);

      if ($validator->fails()) {
        return Redirect::action('OfferController@getBuy', $request->offer_id)
          ->withInput()
          ->withErrors($validator);
      }

      $hash = bin2hex(random_bytes(32));
      $customer = $customer->firstORCreate([
        'email' => $request->email,
        'name'  => $request->name,
      ]);

      $offer = \App\Offer::where('id', $request->offer_id)->firstOrFail();
      //dd($offer->id);
      if ($offer->stock <= 0) {
        return Redirect::to('/'); // Add error description.
      } else {
        \App\Order::create([
          'hash' => $hash,
          'paid' => false,
          'total' => $offer->price,
          'customer_id' => $customer->id,
          'offer_id' => $offer->id,
        ]);
      }
      /*Order::create([
        'hash' => $hash,
        'paid' => false,
        'total' => $request->offer
      ]);*/
    }
}
