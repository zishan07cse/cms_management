 <form  action="{{ url('/') }}/category/store"  method="post" 
        >
       @csrf
              <div class="form-group">
                <label>Category Name:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="category_name">
                      
                  </div>   
              </div>
              <button type="submit" class="btn btn-default" style="margin-top:30px">Submit</button>
          </form>