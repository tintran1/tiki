<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDad;
use App\Models\CategoryChild;

class CategorydadController extends Controller
{
    public function index($id)
    {   
        $category = CategoryChild::with('products')
        ->join('shop', 'shop.user_id', '=', 'users.id')
        ->where('category_child.category_dad_id', '=', $id)
        ->get('shop.img');   
        $CategoryChild = CategoryChild::all();
        return view('category', compact('category', 'CategoryChild'));
    }
}
