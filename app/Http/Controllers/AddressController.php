<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index($id)
    {   
        $user = DB::table('shipping_address')
        ->join('users','users.id','=','shipping_address.users_id')
        ->select('shipping_address.*','users.name')
        ->where('users.name', '=', $id)
        ->get();
        return view('checkout', compact('user'));
    }

    public function add(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'name' => 'bail|required|string',
            'phone' => 'bail|required|integer|min:10',
            'address' => 'bail|required|unique:shipping_address',
        ]);
        if ($Validator->fails()) {
            return response()->json(['errors'=>$Validator->errors()]);
        } else {
            $newAddress = new Address();
            $newAddress->users_id = $request->id;
            $newAddress->phone = $request->phone;
            $newAddress->city = $request->city;
            $newAddress->district = $request->district;
            $newAddress->ward = $request->ward;
            $newAddress->address = $request->address;
            $newAddress->save();
            return view('checkout');
        }
    }
}
