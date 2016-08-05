<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

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
        // Logic here
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
        return view('admin.addPost')->with('company', $company);
      } else {

      }
    }
}
