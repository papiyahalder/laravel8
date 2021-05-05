<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        // return view('admin.category.index',compact('categories'));
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'category_name' => 'required|unique:categories,category_name',
            'status' => 'required'
        ]);
        
       
        // Category::create([
        //     'category_name' => $request->category_name,
        //     'created_at' => Carbon::now()
        // ]);
        Category::create($request->all());

        // return redirect('admin/category/add')
        //     ->with('success', 'Category created successfully.');
        // return json_encode(array(
        //     "statusCode"=>200,
        //     "message"=>"submited",
        //     'success' => true,
        // ));
        return response()->json([ "statusCode"=>200,
        "message"=>"submited",
        'success' => true,]);
        // return view('admin.category.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $update = Category::find($id);
        $update->category_name=$request->get('category_name');
        // $update->destination=Input::get('destination');
        $update->save();
        return redirect('admin/category');
        // return redirect()->route('admin.category.index')
        // ->with('success', 'Category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);

        $data->delete();
    
        return redirect('admin/category');
    }
    public function search(Request $request)
    {
        $cari = $request->get('search');
        $data['result']= Category::where('title', 'LIKE', '%' .$cari . '%')->paginate(10);
        // return view('/article/show', $data);
    }
}
