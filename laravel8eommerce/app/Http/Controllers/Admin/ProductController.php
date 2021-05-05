<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::get();
        $categories = Category::get();
        // return $categories;
        return view('admin.product.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.product.add',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'price' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            // 'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            // 'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'select category name',
            'brand_id.required' => 'select brand name',
        ]);
            $fileModal = new Product();
            // $data = $request->input();
            $fileModal->category_id = $request->input('category_id');
            $fileModal->brand_id = $request->input('brand_id');
            $fileModal->product_name = $request->input('product_name');
            // 'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            $fileModal->product_code = $request->input('product_code');
            $fileModal->price = $request->input('price');
            $fileModal->product_quantity = $request->input('product_quantity');
            $fileModal->short_description = $request->input('short_description');
            $fileModal->long_description = $request->input('long_description');
            // $fileModal->status = $request->input('status');
            // image_one => $img_url1,
            // image_two => $img_url2,
            // image_three => $img_url3,
            // 'created_at' => Carbon::now(),
            if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $image = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $image);  
                $imgData[] = $image;  
            }
    
            // $fileModal = new Product();
            $fileModal->image = json_encode($imgData);
            $fileModal->image_path = json_encode($imgData);
            
           
            $fileModal->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
