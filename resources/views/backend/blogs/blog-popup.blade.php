<div class="modal fade" id="addBlogCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content addblog-category">
              <form id="addblogcategoryform" method="post" action="{{route('manage-blog.add-category')}}">
                <div class="modal-header">@csrf
                    <h5 class="modal-title" id="exampleModalLabel">Add Blog Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      <div class="  alert alert-danger " style="display:none"></div>
                      <div class="  alert alert-success " style="display:none"></div>

                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Category Name</label><span class="text-danger">*</span>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>  
                        <label class="form-label">Status</label><span class="text-danger">*</span>
                        <select class="form-control" name="status">
                            <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                            <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                        </select>                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-purple">Save Blog Category</button>
                    <button type="button" class="btn btn-purple" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addTagCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add-tags">
              <form id="addtagform" method="post" action="{{route('manage-blog.add-tag')}}">
                <div class="modal-header">@csrf
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      <div class="alert alert-danger" style="display:none"></div>
                      <div class="alert alert-success" style="display:none"></div>

                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Tag Name</label><span class="text-danger">*</span>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>  
                        <label class="form-label">Status</label><span class="text-danger">*</span>
                        <select class="form-control" name="status">
                            <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                            <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                        </select>                         
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-purple">Save Tag</button>
                    <button type="button" class="btn btn-purple" data-dismiss="modal">Cancel</button>

                </div>
              </form>
            </div>
        </div>
  </div>