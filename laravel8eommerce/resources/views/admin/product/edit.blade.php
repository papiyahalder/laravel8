
@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
            <form action="{{ route('update.product',$products->id) }}" method="POST" >
            @csrf
            <div class="form-layout">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" value="{{ $products->product_name }}" placeholder="product name">
                    @error('product_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">product_code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" value="{{ $products->product_code }}" placeholder="product code">
                    @error('product_code')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" value="{{ $products->price }}" placeholder="product price">
                    @error('price')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="product_quantity" value="{{ $products->product_quantity }}" placeholder="product quantity">
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                      <option label="Choose category"></option>
                        @foreach ($categories as $category)                            
                      <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? "selected":"" }}>{{ $category->category_name }}</option>
                      @endforeach
    
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
              
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                        <option label="Choose brand"></option>
                        @foreach ($brands as $brand)                            
                        <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? "selected":"" }}>{{ $brand->brand_name }}</option>
                        @endforeach     
                      </select>
                      @error('brand_id')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                      <textarea name="short_description" id="summernote">{{ $products->short_description }}</textarea>
                      @error('short_description')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->


                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                      <textarea name="long_description" id="summernote2">{{ $products->long_description }}</textarea>
                      @error('long_description')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                  
              </div><!-- row -->
             
              <button class="btn btn-info mg-r-5" type="submit">Udpate Data</button>

          </form>

      
         <form action="{{ route('update.image',$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="img_one" value="{{ $products->image_one }}">
            <input type="hidden" name="img_two" value="{{ $products->image_two }}">
            <input type="hidden" name="img_three" value="{{ $products->image_three }}">
          <div class="row row-sm mt-5">
             <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                        <img src="{{ asset($products->image_one) }}" alt="" height="120px;" width="120px;">
                    </div>
                  </div><!-- col-4 -->
                  
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                        <img src="{{ asset($products->image_two) }}" alt="" height="120px;" width="120px;">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                        <img src="{{ asset($products->image_three) }}" alt="" height="120px;" width="120px;">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="image_one" >
                      @error('image_one')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="image_two" >
                      @error('image_two')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="image_three" >
                      @error('image_three')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->                              
              
            </div><!-- row -->
  
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Udpate Image</button>
              </div><!-- form-layout-footer -->
            </form> 
          </section>

</div>
@endsection