<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageCompany($company_id)
    {
      $company = \App\Company::where('id', $company_id)->firstOrFail();

      if (Auth::user()->isOwner($company)) {
        return view('admin.manageCompany')->with('company', $company);
      } else {
        return view('admin.401');
      }
    }

    public function addCompany()
    {
      if (Auth::user()->isSuperAdmin) {
        return view('add.company'); // Logic here? Idk yet...
      } else {
        return view('admin.401');
      }
    }

    public function addAddress($company_id)
    {
      $company = \App\Company::where('id', $company_id)->firstOrFail();
      if (Auth::user()->isOwner($company)) {
        // Logic here...
      } else {
        return view('admin.401');
      }
    }

    public function addPost($company_id)
    {
      $company = \App\Company::where('id', $company_id)->firstOrFail();
      if (Auth::user()->isOwner($company)) {
        return view('admin.addOffer')->with('company', $company);
      } else {

      }
    }

    public function createPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|Unique:offers|max:255',
        'company_id' => 'required|integer',
        'slug' => 'required|Unique:offers|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        //'image' => 'required|max:255',
        'stock' => 'required|integer',
      ]);

      if ($validator->fails()) {
        return Redirect::action('AdminController@addPost', $request->company_id)
          ->withInput()
          ->withErrors($validator);
      } else {
        \App\Offer::create([
          'name' => $request->name,
          'company_id' => $request->company_id,
          'slug' => $request->slug,
          'description' => $request->description,
          'price' => $request->price,
          'image' => 'https://placeholdit.imgix.net/~text?txtsize=75&txt=800%C3%97500&w=800&h=500'/*$request->image*/,
          'stock' => $request->stock,
        ]);
      }

      return Redirect::to('/admin');
    }
}
