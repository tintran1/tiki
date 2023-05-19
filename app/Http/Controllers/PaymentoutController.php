<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
class PaymentoutController extends Controller
{
    public function index($id)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $user = DB::table('shipping_address')
        ->join('users','users.id','=','shipping_address.users_id')
        ->select('shipping_address.*','users.name','users.id')
        ->where('shipping_address.id', '=', $id)
        ->get();
        return view('payment', compact('user','id'))
            ->with('cart_data',$cart_data)
        ;
    }
}
