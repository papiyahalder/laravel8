@extends('layouts.admin_layout.admin_layout')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Coupon Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif

        <form action="{{route('store.coupon')}}" method="POST" id="addCoupon">
            @csrf
            <div>
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Coupons</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Coupon Name</label>
                            <input type="text" id="coupon_name" name="coupon_name" class="form-control   @error('coupon_name') is-invalid @enderror">
                                @error('coupon_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Discount</label>
                            <input type="text" id="discount" name="discount" class="form-control   @error('discount') is-invalid @enderror">
                                @error('discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select class="form-control custom-select  @error('status') is-invalid @enderror" name="status" id="status">
                            <option selected disabled>Select one</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
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
                <button type="submit"  class="btn btn-success float-right" id="butsave">Create new Coupon</button>
                </div>
            </div>
            </div>
        </form>    
    </section>
    <!-- /.content -->
  </div>

@endsection