 <link rel="stylesheet" href="css/custom.css">
 @extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="col-lg-4">
          @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
          @endif
          
          @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
      </div>
       <div class="col-md-12">
              <div class="col-lg-2" style="float:right">
                <button type="button" class="btn btn-block btn-primary  btn-sm mb-40"
                 data-toggle="modal" data-target="#add_category"
                >Add Category</button>
              </div>
          </div> 
          <div class="container-fluid" >
            <table class="table table-bordered data-table text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0; ?>
                  @foreach ($categorylist as $category)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-10">Delete</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table> 
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
<div id="add_category" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Add Categoy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <form  action="{{ route('category.store') }}"  method="post" 
        >
       @csrf
              <div class="form-group">
                <label>Category Name:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="category_name">
                      
                  </div>   
              </div>
              <button type="submit" class="btn btn-default" style="float:right;margin-top:30px">Submit</button>
          </form>
      </div>
    </div>

  </div>
</div>
  @endsection
