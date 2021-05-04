@extends('layouts.admin_layout.admin_layout')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('update.brand',$brands->id) }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="Brand_name">Brand Name</label>
                    <input type="text"name="brand_name" id="brand_name" class="form-control" value="{{ $brands->brand_name }}">
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-control custom-select">
                     
                      <option value="0" selected>Inactive</option>
                      <option value="1" selected>Active</option>
                      <!-- {{-- @foreach ($categories as $category)
                      @if($category->status == 1)
                      <option value="{{$category->status}}" {{(old('status', $category->status) == $category->status ? 'selected' : '')}} > Active </option>
                      @else
                      <option value="{{$category->status}}" {{(old('status', $category->status) == $category->status ? 'selected' : '')}} > Inactive </option>
                      @endif
                      @endforeach --}} -->
                    </select>
                  </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Save Changes" class="btn btn-success float-right">
          </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
@endsection