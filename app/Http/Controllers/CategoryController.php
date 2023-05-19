<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDad;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category()
    {       
        $CategoryDad = CategoryDad::paginate(4);
        $CategoryDad1 = CategoryDad::offset(0)->limit(13)->get(); 
        $CategoryDad2 = CategoryDad::offset(13)->limit(13)->get();
        $CategoryChild1 = CategoryDad::with('categoryChildren')->offset(0)->limit(5)->get();  
        $CategoryChild2 = CategoryDad::with('categoryChildren')->offset(5)->limit(6)->get();   
        $CategoryChild3 = CategoryDad::with('categoryChildren')->offset(11)->limit(5)->get();   
        $CategoryChild4 = CategoryDad::with('categoryChildren')->offset(16)->limit(5)->get();   
        $CategoryChild5 = CategoryDad::with('categoryChildren')->offset(21)->limit(5)->get();   

        $users = DB::table('users')->get();
        $FlashSales = Product::inRandomOrder()
        ->skip(0)->take(16)
        ->get();
     
        $tikiMall1 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(0)->take(2)
        ->get();
        $tikiMall2 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(2)->take(2)
        ->get();
        $tikiMall3 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(4)->take(2)
        ->get();
        $tikiMall4 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(6)->take(2)
        ->get();
        $tikiMall5 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(8)->take(2)
        ->get();
        $tikiMall6 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(10)->take(2)
        ->get();
        $tikiMall7 = DB::table('shop')
        ->join('product','product.shop_id','=','shop.id')
        ->skip(12)->take(1)
        ->get();
    
        $TopSearchs = Product::inRandomOrder()
        ->skip(0)->take(21)
        ->get();
    
        $Suggestions = Product::with('categoryChild')->inRandomOrder()
        ->skip(0)->take(48)
        ->get();
    
        $user_id = optional(session('user'))->id;
        return view('header-footer-index', compact(
          'CategoryDad',
      'CategoryDad1',
      'CategoryDad2',
      'CategoryChild1',
      'CategoryChild2',
      'CategoryChild3',
      'CategoryChild4',
      'CategoryChild5',
      'FlashSales',
      'tikiMall1',
      'tikiMall2',
      'tikiMall3',
      'tikiMall4',
      'tikiMall5',
      'tikiMall6',
      'tikiMall7',
      'TopSearchs',
      'Suggestions',
      'users',
        ));
    }
}
