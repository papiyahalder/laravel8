<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=Product::get();
        // return $products;
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
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'select category name',
            'brand_id.required' => 'select brand name',
        ]);

        
        $imag_one = $request->file('image_one');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save(public_path('frontend/img/product/'.$name_gen));       
        $img_url1 ='frontend/img/product/'.$name_gen;

        $imag_two = $request->file('image_two');                
        $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
        Image::make($imag_two)->resize(270,270)->save(public_path('frontend/img/product/'.$name_gen));     
        $img_url2 = 'frontend/img/product/'.$name_gen;
        // $path = public_path('images/cars/'.$filename);
        // Image::make($image->getRealPath())->resize(468,249)->save($path);
        $imag_three = $request->file('image_three');                
        $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
        Image::make($imag_three)->resize(270,270)->save(public_path('frontend/img/product/'.$name_gen));       
        $img_url3 = 'frontend/img/product/'.$name_gen;
            $fileModal = new Product();
            // $data = $request->input();
            $fileModal->category_id = $request->input('category_id');
            $fileModal->brand_id = $request->input('brand_id');
            $fileModal->product_name = $request->input('product_name');
            $fileModal->product_slug = strtolower(str_replace(' ','-',$request->product_name));
            $fileModal->product_code = $request->input('product_code');
            $fileModal->price = $request->input('price');
            $fileModal->product_quantity = $request->input('product_quantity');
            $fileModal->short_description = $request->input('short_description');
            $fileModal->long_description = $request->input('long_description');
            $fileModal->status = $request->input('status');
            $fileModal->image_one = $img_url1;
            $fileModal->image_two = $img_url2;
            $fileModalimage_three = $img_url3;
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
        return redirect('admin/product/add');

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
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::findOrFail($id);
        return view('admin.product.edit',compact('products','categories','brands'));
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
        // $products = Product::findOrFail($id);

        Product::findOrFail($id)->Update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        return redirect('admin/product/edit/'.$id);
    }

    public function updateImage(Request $request)
    {
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;


        if ($request->has('image_one') && $request->has('image_two')) {
            unlink($old_one);
            unlink($old_two);
            $imag_one = $request->file('image_one');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_one' => $img_url1,
                //  'updated_at' => Carbon::now(),
             ]);

             $imag_one = $request->file('image_two');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_two' => $img_url1,
                //  'updated_at' => Carbon::now(),
             ]);
 
 
             return redirect('admin/product/edit/'.$id);
         }
         
        if ($request->has('image_one')) {
           unlink($old_one);
           $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'fontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                // 'updated_at' => Carbon::now(),
            ]);

            return redirect('admin/product/edit/'.$id);
        }

        if ($request->has('image_two')) {
            unlink($old_two);
            $imag_one = $request->file('image_two');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_two' => $img_url1,
                //  'updated_at' => Carbon::now(),
             ]);
 
             return redirect('admin/product/edit/'.$id);
         }

         if ($request->has('image_three')) {
            unlink($old_three);
            $imag_one = $request->file('image_three');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_three' => $img_url1,
                //  'updated_at' => Carbon::now(),
             ]);
 
             return redirect('admin/product/edit/'.$id);
         }

        
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
