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
      //dd($tmp = Auth::user()->companies->get("name")->toArray);
      //echo in_array($company->name, $tmp);
      return view('admin.manageCompany')->with('company', $company);
      //dd(Auth::user()->companies);
      /*if (in_array($company, Auth::user()->companies)) {
        return view('admin.manageCompany');
      } else {
        return view('admin.401');
      }*/
      dd($company);
    }
}
