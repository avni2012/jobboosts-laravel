@extends('layouts.backend.master')

@section('title', 'Create Cms')

@section('breadcrumb-title', 'Create Cms')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Create Cms</li>
@endsection

@section('css')
<style type="text/css">
  span.cke_button_icon.cke_button__about_icon{
    display: none;
  }
</style>
@endsection

@section('style')
<!-- <script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script> -->
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
              <h1>Create Cms</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-cms.index')}}">Manage Cms</a></li>
                <li class="breadcrumb-item active">Create Cms</li>
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
          <div class="manage_Cms_page ">
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="Cms-create"  id="Cms-create" action="{{route('manage-cms.store')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group ">
                          <label class="form-label">Page Title</label><span class="text-danger">*</span>
                          <input type="text" name="page_title" class="form-control" value="{{old('page_title')}}">
                          @if ($errors->has('page_title'))
                            <span class="text-danger">{{ $errors->first('page_title') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Page Slug</label><span class="text-danger">*</span>
                          <input type="text" name="page_slug" class="form-control" value="{{old('page_slug')}}">
                          @if ($errors->has('page_slug'))
                            <span class="text-danger">{{ $errors->first('page_slug') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Page Name</label><span class="text-danger">*</span>
                          <input type="text" name="page_name" class="form-control" value="{{old('page_name')}}">
                          @if ($errors->has('page_name'))
                            <span class="text-danger">{{ $errors->first('page_name') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Description</label><span class="text-danger">*</span>
                            <!-- <textarea id='edit' name="description" >
                              {{old('description')}}
                            </textarea> -->
                            <textarea cols="80" id="edit" name="description" rows="10" data-sample-short>{{old('description')}}</textarea>
                            <script>
                              CKEDITOR.replace('edit', {
                                height: 150
                              });
                            </script>
                          @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label class="form-label">Image</label><br>
                        <div class="col-md-9" style="display: inline-block">
                          <input type="file" class="form-control" id="cms_image" name="image" onchange="readURL(this);" accept="jpg,jpeg,png">
                          @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                          @endif
                        </div>
                        <div class="col-md-1" style="float: right; margin-right: 130px">
                          <img id="image" src="{{asset('backend/img/img.png')}}" height="100px" width="100px"/>
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
                    <h6>Seo Details</h6>
                  </div>
                  <div class="card-body">
                      <div class="form-group ">
                          <label class="form-label">Seo Keyword</label>
                          <input type="text" name="seo_keyword" form="Cms-create" class="form-control" value="{{old('seo_keyword')}}">
                          @if ($errors->has('seo_keyword'))
                            <span class="text-danger">{{ $errors->first('seo_keyword') }}</span>
                          @endif
                      </div>
                      <div class="form-group ">
                          <label class="form-label">Seo Description</label>
                          <input type="text" name="seo_description" form="Cms-create" class="form-control" value="{{old('seo_description')}}">
                          @if ($errors->has('seo_description'))
                            <span class="text-danger">{{ $errors->first('seo_description') }}</span>
                          @endif
                      </div>
                  </div>
                </div>
                 <div class="card">
                  <div class="card-header">
                    <h6>Save</h6>
                  </div>
                  <div class="card-body">
                    <div class="form-group ">
                        <label class="form-label">Status</label><span class="text-danger">*</span>
                        <select class="form-control" form="Cms-create" name="status">
                                <option value="">Select Status</option>
                                <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                                <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                         </select>
                         @if ($errors->has('status'))
                          <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                   <div class="text-center">
                    <button type="submit" form="Cms-create" class="btn btn-purple">Save Cms</button>
                    <a href="{{route('manage-cms.index')}}" class="btn btn-default">Cancel</a>
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

