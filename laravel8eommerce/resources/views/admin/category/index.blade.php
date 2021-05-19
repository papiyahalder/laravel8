@extends('layouts.admin_layout.admin_layout')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Projects</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Projects</li>
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
        <h3 class="card-title">Projects</h3>

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
                    <th style="width: 20%">
                        Category Name
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
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
            @foreach ($categories as $category)
            <tr>
                    <td>
                        #
                    </td>
                    <td>{{ $category->category_name }}</td>
                    
                    <td class="project-state">
                    @if($category->status == 1)
                        <a class="updateStatus" id="category-{{ $category->id}}" category_id="{{ $category->id }}" href="javascript:void(0)" height="120" width="120">Active</a>
                    @else
                    <a class="updateStatus" id="category-{{ $category->id}}" category_id="{{ $category->id }}" href="javascript:void(0)" height="120" width="120">Inactive</a>
                    @endif
                    </td>

                    <td class="project-actions text-right">
                        {{-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a> --}}
                        <a class="btn btn-info btn-sm" href="{{ route('edit.category',$category->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('category.destroy', $category->id) }}">
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
 <script type="text/javascript">
  $(document).ready(function(){
    $(".updateStatus").click(function(){
      var status = $(this).text();
      var category_id = $(this).attr("category_id");
      // alert(status);
      // alert(category_id);
      $.ajax({
        type:'POST',
        url:'/admin/update-status',
        data:{status:status,category_id:category_id},
        success:function(resp){
          // alert(resp['status']);
          // alert(resp['category_id']);
          if(resp['status'] == 0){
            $("#category-"+category_id).html("<a class='updateStatus' href='javascript:void(0)'>Inctive</a>");
          }elseif(resp['status'] == 1){
            $("#category-"+category_id).html("<a class='updateStatus'  href='javascript:void(0)'>Active</a>");
          }
        },error:function(){
          alert('Error');
        }
      });
    });
  });
 </script>
@endsection