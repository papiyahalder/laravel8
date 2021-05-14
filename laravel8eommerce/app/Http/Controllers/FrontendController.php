<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::Where('status' ,'1')->get();
        $categories = Category::Where('status' ,'1')->get();
        // return $products;
        // $featuresproducts = Product::Where('category_id','$categories->id')
        // ->Where('status' ,'1')->get();
        //  return $featuresproducts;
        return view('pages.index', compact('products','categories'));
    }
} 
