@extends('layouts.admin_layout.admin_layout')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
          
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
            {{-- <form class="navbar-form navbar-left" method="GET" action="{{url('search')}}">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                  <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
              </div>
            </form> --}}
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Product Name</th>
                    <th class="wd-15p">Product Quantity</th>
                    <th class="wd-15p">Category</th>
                    <th class="wd-20p">Status</th> 
                    <th style="width: 20%">
                      <form class="navbar-form navbar-left" method="GET" action="{{url('search')}}">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" name="search">
                            <button class="btn btn-default" type="submit">
                              <i class="fa fa-search"></i>
                            </button>
                        </div>
                      </form>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            <tr>
                    <td>
                        #
                    </td>
                   
                    <td><img src="{{ asset($product->image_one) }}" width="50px;" height="50px;" alt=""></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td>{{$product->category->category_name}}</td>
                    <td class="project-state">
                    @if($product->status == 1)
                        <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-success">Inctive</span>
                    @endif
                    </td>

                    <td class="project-actions text-right">
                        {{-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a> --}}
                        <a class="btn btn-info btn-sm" href="{{ route('edit.product',$product->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection


