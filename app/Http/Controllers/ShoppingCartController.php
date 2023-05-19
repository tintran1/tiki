<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CategoryDad;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
       
    
        $CategoryDad = CategoryDad::paginate(4);
        $CategoryDad1 = CategoryDad::offset(0)->limit(13)->get(); 
        $CategoryDad2 = CategoryDad::offset(13)->limit(13)->get();
        $CategoryChild1 = CategoryDad::with('categoryChildren')->offset(0)->limit(5)->get();  
        $CategoryChild2 = CategoryDad::with('categoryChildren')->offset(5)->limit(6)->get();   
        $CategoryChild3 = CategoryDad::with('categoryChildren')->offset(11)->limit(5)->get();   
        $CategoryChild4 = CategoryDad::with('categoryChildren')->offset(16)->limit(5)->get();   
        $CategoryChild5 = CategoryDad::with('categoryChildren')->offset(21)->limit(5)->get();  

        return view('shoppingcart', compact('CategoryDad',
        'CategoryDad1',
        'CategoryDad2',
        'CategoryChild1',
        'CategoryChild2',
        'CategoryChild3',
        'CategoryChild4',
        'CategoryChild5',))
            ->with('cart_data',$cart_data)
        ;
    }

    public function addcart(Request $request)
    {

        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity'); 
        $id_user = $request->input('id_users'); 
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;
        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 6000;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {
            $products = Product::find($prod_id);
            $prod_name = $products->title;
            $prod_image = $products->img;
            $priceval = $products->sold;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_id_user' => $id_user,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 6000;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
       
    }

    public function cartload()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }

    public function deletecart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }
}
