<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }
}
