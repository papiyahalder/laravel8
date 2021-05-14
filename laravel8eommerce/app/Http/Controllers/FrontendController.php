<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::Where('status' ,'1')->get();
        // return $products;
        return view('pages.index', compact('products'));
    }
}
