<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDad;
use App\Models\CategoryChild;

class CategorychildController extends Controller
{
    public function index($id)
    {   
        $category = CategoryDad::all();
        $CategoryChild = CategoryChild::all();
        return view('category', compact('category', 'CategoryChild'));
    }
}
