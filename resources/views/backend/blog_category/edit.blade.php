@extends('layouts.backend.master')

@section('title', 'Edit Blog')

@section('breadcrumb-title', 'Edit Blog')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Edit Blog</li>
@endsection

@section('css')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.css') }}">
@endsection

@section('style')
@endsection

@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Blog</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-blog.index')}}">Manage Blog</a></li>
                <li class="breadcrumb-item active">Edit Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      @if(session()->has('message.level'))
          <div class="alert alert-{{ session('message.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('message.content') }}
            <?php Session::forget('message')?>
          </div>
      @endif
      <!-- Main content -->
      <section class="content ">
        <div class="container-fluid">
          <div class="manage_blog_page ">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="blog-Edit" action="{{route('manage-blog.update',$blog->id)}}" method="Post" enctype="multipart/form-data">
                      <div class="form-group ">@csrf
                        {{ method_field('PATCH') }}
                          <label class="form-label">Title</label><span class="text-danger">*</span>
                          <input type="text" name="title" class="form-control" value="{{old('title',$blog->title)}}">
                          @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                      </div>
                      <div class="form-group" >
                        <label class="form-label">Category</label><span class="text-danger">*</span>
                        &nbsp;&nbsp;<a type="button" data-toggle="modal" data-target="#addBlogCategory" id="addblogcategory" href="#"><i class="fa fa-plus-circle" style="font-size:24px"></i></a>
                        <select class="form-control" name="category" id="category" required>
                          <option value="">Select Blog Category</option>
                          @if(!empty($categories))
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(old('category',$category->id) == $blog->category) selected @endif>{{ $category->name }}</option>
                          @endforeach
                          @endif
                        </select>
                        @if ($errors->has('category'))
                          <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                      </div>
                      <div id="editor">
                        <div class="form-group ">
                          <label class="form-label">Content</label><span class="text-danger">*</span>
                            <textarea id='edit' name="content" >
                              {{old('description',$blog->content)}}
                            </textarea>
                            <script>
                              CKEDITOR.replace('edit', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                      </div>
                      <div class="form-group" >
                        <label class="form-label">Author</label>
                        <select class="form-control" name="author" id="author">
                          @if(count($coaches)) > 0)
                            <option value="">Anonymous (No Author)</option>
                              @foreach($coaches as $coach)
                                <option value="{{$coach->id}}" @if(old('author',$coach->id) == $blog->author) selected @endif>{{$coach->name}}
                                </option>
                              @endforeach
                          @endif
                        </select>
                        @if ($errors->has('author'))
                          <span class="text-danger">{{ $errors->first('author') }}</span>
                        @endif
                      </div>
                      <div class="form-group tag-c" >
                        <label class="form-label">Tags</label><span class="text-danger">*</span>
                        &nbsp;&nbsp;<a type="button" data-toggle="modal" data-target="#addTagCategory" id="addtagcategory" href="#"><i class="fa fa-plus-circle" style="font-size:24px"></i></a>
                          <select class="form-control blog-tag" name="tag[]" id="tag" multiple="multiple">
                          @if(count($tags)) > 0)
                              @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if(in_array($tag->id,$blog_array)) selected="selected" @else "" @endif>{{$tag->name}}
                                </option>
                              @endforeach
                          @endif
                        </select>
                        @if ($errors->has('tag'))
                          <span class="text-danger">{{ $errors->first('tag') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Publish Date</label><span class="text-danger">*</span>
                          <div class="input-group date" data-provide="publish_date">
                              <input type="text" class="form-control publish_date" name="publish_date" id="publish_date" value="{{old('publish_date',$blog->publish_date)}}">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                          @if ($errors->has('publish_date'))
                            <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label class="form-label">Blog Image</label><br>
                        <div class="col-md-9" style="display: inline-block">
                          <input type="file" class="form-control" id="blog_image" name="blog_image" onchange="readURL(this);" accept="jpg,jpeg,png">
                          @if ($errors->has('blog_image'))
                            <span class="text-danger">{{ $errors->first('blog_image') }}</span>
                          @endif
                        </div>
                        <div class="col-md-1" style="float: right; margin-right: 130px">
                          <img id="image" src="@if($blog->blog_image) {{ asset('/backend/images/'.$blog->blog_image) }} @else {{asset('backend/img/img.png')}} @endif" height="100px" width="100px"/>
                          </div>
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Status</label><span class="text-danger">*</span>
                          <select class="form-control" name="status">
                                  <option value="">Select Status</option>
                                   <option value="1" @if(old('status',$blog->status) == 1)selected @endif >Active</option>
                                  <option value="0" @if(old('status',$blog->status) == 0)selected @endif >InActive</option>
                           </select>
                           @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-purple">Update Blog</button>
                      <a href="{{route('manage-blog.index')}}" class="btn btn-default">Cancel</a>
                    </div>
                  </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>
@endsection
@include('backend.blogs.blog-popup')

@section('script-js-last')
<script src="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{asset('/backend/developer/developer.js')}}"></script>
<script src="{{asset('/backend/developer/blogs/blog.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
  var csrftoken = '{{ csrf_token() }}';
  var base_url = "{{url('/')}}";
</script>
@endsection

