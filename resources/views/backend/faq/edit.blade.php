@extends('layouts.backend.master')

@section('title', 'Edit Faq')

@section('breadcrumb-title', 'Edit Faq')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Edit Faq</li>
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
              <h1>Edit Faq</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-faq.index')}}">Manage Faq</a></li>
                <li class="breadcrumb-item active">Edit Faq</li>
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
          <div class="manage_faq_page ">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="faq-Edit" action="{{route('manage-faq.update',$faq->id)}}" method="Post">
                      <div class="form-group ">@csrf
                        {{ method_field('PATCH') }}
                          <label class="form-label">Title</label><span class="text-danger">*</span>
                          <input type="text" name="title" class="form-control" value="{{old('title',$faq->title)}}">
                          @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                      </div>
                      <div class="form-group" >
                        <label class="form-label">Category</label><span class="text-danger">*</span>
                        <select class="form-control" name="category_id" id="category_id" required>
                          <option value="">Select Faq Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $faq->category_id) selected @endif>{{ $category->category }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                          <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                      </div>
                      <div id="editor">
                        <div class="form-group ">
                          <label class="form-label">Description</label><span class="text-danger">*</span>
                            <textarea id='edit' name="description" >
                              {{old('description',$faq->description)}}
                            </textarea>
                            <script>
                              CKEDITOR.replace('edit', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                      </div>
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Status</label><span class="text-danger">*</span>
                          <select class="form-control" name="status">
                                  <option value="">Select Status</option>
                                   <option value="1" @if(old('status',$faq->status) == 1)selected @endif >Active</option>
                                  <option value="0" @if(old('status',$faq->status) == 0)selected @endif >InActive</option>
                           </select>
                           @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-purple">Update Faq</button>
                      <a href="{{route('manage-faq.index')}}" class="btn btn-default">Cancel</a>
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

@section('script-js-last')
@endsection

@section('script')
@endsection

