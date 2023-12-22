 <link rel="stylesheet" href="css/custom.css">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 @extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
                <button type="button" class="btn btn-block btn-primary  btn-sm  mb-40"
                 data-toggle="modal" data-target="#add_blog"
                >Add Blog</button>
              </div>
          </div> 
          <div class="container-fluid " >
            <table class="table table-bordered data-table text-center mt-30">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0; ?>
                  @foreach ($bloglist as $blog)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $blog->title }}</td>
                         <td>{{ $blog->content }}</td>
                         <td>{{ $blog->author }}</td>
                        <td>
                            <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="update_blog('<?php echo $blog->id; ?>')">Edit</a>
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
<div id="update_blog_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Update Blog</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <form  action="{{ route('blog.update',$blog->id) }}"  method="post" 
        >
       @csrf
       @method('PUT')
              <div class="form-group"  style="display:none">
                  <div class="input-group">
                      <input type="text" id="article_id_update" class="form-control" name="id">
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Article Name:</label>
                  <div class="input-group">
                      <input type="text" id="title_update" class="form-control" name="title">
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Category:</label>
                  <div class="input-group">
                    <select class="form-control" id="category_id_update" name="category_id">
                      <option>Select</option>
                        @foreach ($categorylist as $category)
                           <option value={{ $category->id }} > {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Article Slug:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="slug_update" name="slug">
                      
                  </div>   
              </div>
               <div class="form-group">
                <label>Article Content:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="content_update" name="content">
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Author:</label>
                  <div class="input-group">
                      <input type="text" id="author_update" class="form-control" name="author">
                      
                  </div>   
              </div>
              <button type="submit" class="btn btn-default" style="float:right;margin-top:30px">Submit</button>
          </form>
      </div>
    </div>

  </div>
</div>
<div id="add_blog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Add Blog</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <form  action="{{ route('blog.store') }}"  method="post" 
        >
       @csrf
              <div class="form-group">
                <label>Article Name:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="title">
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Category:</label>
                  <div class="input-group">
                    <select class="form-control" name="category_id">
                      <option>Select</option>
                        @foreach ($categorylist as $category)
                           <option value={{ $category->id }} > {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Article Slug:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="slug">
                      
                  </div>   
              </div>
               <div class="form-group">
                <label>Article Content:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="content">
                      
                  </div>   
              </div>
              <div class="form-group">
                <label>Author:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="author">
                      
                  </div>   
              </div>
              <button type="submit" class="btn btn-default" style="float:right;margin-top:30px">Submit</button>
          </form>
      </div>
    </div>

  </div>
</div>
  @endsection
<script>
  function update_blog(id){
      console.log(id);
      $.ajax({
	    	url: "{{ route('ajaxRequest.post') }}",
	        type: "POST",
	        data: {
          id: id, 
          _token: '{!! csrf_token() !!}'
			},
	    beforeSend: function(){
			},
			complete: function(){
			},
			success: function(data){
        console.log(data);
       // var response = JSON.parse(data);
       var id = data.article[0].id;
       category_id = data.article[0].category_id;
        author = data.article[0].author;
        slug = data.article[0].slug;
        title = data.article[0].title;
        content = data.article[0].content;
        $('#update_blog_modal').modal('show');
        document.getElementById("author_update").value = author;
        document.getElementById("category_id_update").value = category_id;
        document.getElementById("slug_update").value = slug;
        document.getElementById("title_update").value = title;
        document.getElementById("content_update").value = content;
        document.getElementById("article_id_update").value = id;
			},
			error: function() {

			}
	    });
  }
</script>