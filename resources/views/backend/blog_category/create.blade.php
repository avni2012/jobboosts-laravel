@extends('layouts.backend.master')

@section('title', 'Create Blog')

@section('breadcrumb-title', 'Create Blog')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Create Blog</li>
@endsection

@section('css')
{{--<script src="{{ asset('/backend/js/standard-ckeditor.js') }}"></script>--}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.css') }}">
@endsection

@section('style')
<style type="text/css">
</style>
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
              <h1>Create Blog</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-blog.index')}}">Manage Blog </a></li>
                <li class="breadcrumb-item active">Create Blog</li>
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
                    <form name="Blog-create" action="{{route('manage-blog.store')}}" method="Post" enctype="multipart/form-data">
                      <div class="form-group ">@csrf
                          <label class="form-label">Title</label><span class="text-danger">*</span>
                          <input type="text" name="title" class="form-control" value="{{old('title')}}">
                          @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                      </div>
                      <div class="form-group" >
                        <label class="form-label">Category</label><span class="text-danger">*</span>
                        &nbsp;&nbsp;<a type="button" data-toggle="modal" data-target="#addBlogCategory" id="addblogcategory" href="#"><i class="fa fa-plus-circle" style="font-size:24px"></i></a>
                        <select class="form-control" name="category" id="category">
                          <option value="">Select Blog Category</option>
                          @if(count($categories)) > 0)
                              @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ Request::old()?(Request::old('category')==$category->id?'selected="selected"':''):'' }}>{{$category->name}}
                                </option>
                              @endforeach
                          @endif
                        </select>
                        @if ($errors->has('category'))
                          <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Content</label><span class="text-danger">*</span>
                            <textarea id='edit' name="content" >
                              {{old('content')}}
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
                      <div class="form-group" >
                        <label class="form-label">Author</label>
                        <select class="form-control" name="author" id="author">
                          @if(count($coaches)) > 0)
                            <option value="">Anonymous (No Author)</option>
                              @foreach($coaches as $coach)
                                <option value="{{$coach->id}}" {{ Request::old()?(Request::old('author')==$coach->id?'selected="selected"':''):'' }}>{{$coach->name}}
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
                                <option value="{{$tag->id}}" @if(old("tag")){{ (in_array($tag->id, old("tag")) ? "selected":"") }} @endif>{{$tag->name}}
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
                              <input type="text" class="form-control publish_date" name="publish_date" id="publish_date" value="{{old('publish_date')}}">
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
                          <img id="image" src="{{asset('backend/img/img.png')}}" height="100px" width="100px"/>
                          </div>
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Status</label><span class="text-danger">*</span>
                          <select class="form-control" name="status" id="blog_category_status">
                                  <option value="">Select Status</option>
                                  <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                                  <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                           </select>
                           @if($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-purple">Save Blog</button>
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
@include('backend.blogs.blog-popup')
@endsection

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

