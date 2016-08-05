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

Route::get('/', 'OfferController@index');

Route::get('/company/{company}', function($company) {
  $company = App\Company::where('name', $company)->firstOrFail();
  echo $company->name . '.<br />';
  dd($company->address);
});

Route::get('buy', function() {
  return Redirect::to('/');
});

/*Route::get('/offer/{offer}', function($offer) {
  $offer = App\Offer::where('id', $offer)->firstOrFail();
  return controller('OfferController@index');
  //return view('offers.offer');
});*/

Route::get('/offer/{offer}', 'OfferController@getOffer');

//Route::get('/buy/{offer_id}', 'OfferController@buy');

Route::get('/buy/{offer_id}', 'OfferController@getBuy');

Route::post('/buy/process', 'OfferController@processPurchase');

Route::get('/order', 'OrderController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/braintree/token', [
  'uses' => 'BraintreeController@token',
  'as' => 'braintree.token',
]);

Route::get('/admin', [
  'uses' => 'AdminController@index',
  'as' => 'admin.index',
  'roles' => ['admin'],
]);

Route::get('/admin/company/manage/{company_id}', [
  'uses' => 'AdminController@manageCompany',
]);

Route::get('/admin/add/offer/{company_id}', [
  'uses' => 'AdminController@addPost',
]);

Route::post('/admin/add/offer', [
  'uses' => 'AdminController@createPost',
]);
