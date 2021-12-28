@extends('layouts.backend.master')

@section('title', 'Edit Course')

@section('breadcrumb-title', 'Edit Course')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Edit Course</li>
@endsection

@section('css')
<style type="text/css">
  span.cke_button_icon.cke_button__about_icon{
    display: none;
  }
</style>
@endsection

@section('style')
  <script type="text/javascript" src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
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
              <h1>Edit Course</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage-course.index')}}">Manage Course</a></li>
                <li class="breadcrumb-item active">Edit Course</li>
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
          <div class="manage_Course_page ">
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="Course-Edit" id="Course-Edit" action="{{route('manage-course.update',$course->id)}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          {{ method_field('PATCH') }}
                          <label class="form-label">Title</label><span class="text-danger">*</span>
                          <input type="text" name="title" class="form-control" value="{{old('title',$course->title)}}">
                          @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Category</label><span class="text-danger">*</span>
                          <select class="form-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @if(count($course_category) > 0)
                                @foreach($course_category as $category)
                                  <option value="{{$category->id}}" @if(old('category_id',$category->id) == $course->category_id) selected @endif>{{$category->name}}
                                  </option>
                                @endforeach
                            @endif
                          </select>
                          @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Description</label><span class="text-danger">*</span>
                            <textarea cols="80" id="description" name="description" rows="10" data-sample-short>{{old('description',$course->description)}}</textarea>
                            <script>
                              CKEDITOR.replace('description', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Instructions</label><span class="text-danger">*</span>
                            <textarea cols="80" id="instructions" name="instructions" rows="10" data-sample-short>{{old('instructions',$course->instructions)}}</textarea>
                            <script>
                              CKEDITOR.replace('instructions', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('instructions'))
                            <span class="text-danger">{{ $errors->first('instructions') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">What You Learn</label><span class="text-danger">*</span>
                            <textarea cols="80" id="what_you_learn" name="what_you_learn" rows="10" data-sample-short>{{old('what_you_learn',$course->what_you_learn)}}</textarea>
                            <script>
                              CKEDITOR.replace('what_you_learn', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('what_you_learn'))
                            <span class="text-danger">{{ $errors->first('what_you_learn') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Outcomes</label><span class="text-danger">*</span>
                            <textarea cols="80" id="outcomes" name="outcomes" rows="10" data-sample-short>{{old('outcomes',$course->outcomes)}}</textarea>
                            <script>
                              CKEDITOR.replace('outcomes', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('outcomes'))
                            <span class="text-danger">{{ $errors->first('outcomes') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label class="form-label">Image</label><br>
                        <div class="col-md-9" style="display: inline-block">
                          <input type="file" class="form-control" id="course_image" name="image" onchange="readURL(this);">
                        </div>
                        <div class="col-md-1" style="float: right; margin-right: 130px">
                          <img id="image" src="@if($course->image) {{ asset('/backend/images/course/'.$course->image) }} @else {{asset('backend/img/img.png')}} @endif" height="100px" width="100px"/>
                        </div>
                      </div>
                  </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-header">
                    <h6>Save</h6>
                  </div>
                  <div class="card-body">
                      <div class="text-center">
                        <button type="submit" class="btn btn-purple" form="Course-Edit">Save Course</button>
                        <a href="{{route('manage-course.index')}}" class="btn btn-default">Cancel</a>
                      </div>
                  </div>
                </div>
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

@section('script-js-last')
<script src="{{asset('backend/developer/developer.js')}}"></script>
@endsection

@section('script')
@endsection

