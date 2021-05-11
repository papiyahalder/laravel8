@extends('layouts.admin_layout.admin_layout')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

        <form action="{{route('store.category')}}" method="POST" id="addCategory">
            @csrf
            <div>
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Categories</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Category Name</label>
                        <input type="text" id="category_name" name="category_name" class="form-control   @error('category_name') is-invalid @enderror">
                            @error('category_name')
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
                <button type="submit"  class="btn btn-success float-right" id="butsave">Create new Category</button>
                </div>
            </div>
            </div>
        </form>    
    </section>
    <!-- /.content -->
  </div>
  
<script src="{{ asset('public/admin/js/admin.js') }}"></script>

<script type="text/javascript">

$('#addCategory').submit(function(event){
      event.preventDefault();

   $.ajax({
      type:"post",
      url:"{{ url('/admin/category/store') }}",
      dataType="json",
      data:$('#addCategory').serialize(),
      success: function(data){
         alert("Data Save: " + data);
      }
      error: function(data){
         alert("Error")
      }
   });
   });


//    $(document).ready(function(){

// $("form#add-category").on('submit', function(){

//     $("#butsave").attr('disabled', true);

    
//     var formData = new FormData(this);
//     $.ajax({
//         method      : 'POST',
//         data        : formData,
//         url         : $(this).attr('action'),
//         processData : false, // Don't process the files
//         contentType : false, // Set content type to false as jQuery will tell the server its a query string request
//         dataType    : 'json',
//         success     : function(response){
//             if(response.success == true)
//             {
//                 swal({   
//                         title: "Success",   
//                         text: response.data,   
//                         type: "success",   
//                         showCancelButton: false,
//                         showConfirmButton: false,
//                         timer: 1000
//                 });
//                 //$("form#add-activity")[0].reset();
//                 location.reload();
//             }
//             else
//             {
//                 $.notify(""+response.data+"", {type:"danger"});
//                 $("#butsave").attr('disabled', false);
//             }
//         },
//         error       : function(data){
//             var errors = $.parseJSON(data.responseText);
//             $.each(errors, function(index, value) {
//                 $.notify(""+value+"", {type:"danger"});
//             });
//             $("#butsave").attr('disabled', false);
//         }

//     });
//     return false;

// });
// });
</script>
@endsection