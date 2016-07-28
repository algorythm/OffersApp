<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $offers = App\Offer::all();
    return view('welcome')->with('offers', $offers);
});

Route::get('/company/{company}', function($company) {
  $company = App\Company::where('name', $company)->firstOrFail();
  echo $company->name . '.<br />';
  dd($company->address);
});

Route::get('/offer/{offer}', function($offer) {
  $offer = App\Offer::where('id', $offer)->firstOrFail();
  dd($offer);
});

Route::auth();

Route::get('/home', 'HomeController@index');
