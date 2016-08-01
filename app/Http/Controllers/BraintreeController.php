<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Braintree_ClientToken;

class BraintreeController extends Controller
{
    public function token(Response $response)
    {
      return $response->withJson([
        'token' => Braintree_ClientToken::generate(),
      ]);
    }
}
