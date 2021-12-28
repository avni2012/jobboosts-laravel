@extends('layouts.backend.master')

@section('title', 'Edit Cms')

@section('breadcrumb-title', 'Edit Cms')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Edit Cms</li>
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
              <h1>Edit Cms</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage-cms.index')}}">Manage Cms</a></li>
                <li class="breadcrumb-item active">Edit Cms</li>
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
                    <form name="Cms-Edit" id="Cms-Edit" action="{{route('manage-cms.update',$cms->id)}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label class="form-label">Page Title</label><span class="text-danger">*</span>
                          <input type="text" name="page_title" class="form-control" value="{{old('page_title',$cms->page_title)}}">
                          @if ($errors->has('page_title'))
                            <span class="text-danger">{{ $errors->first('page_title') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        {{ method_field('PATCH') }}
                          <label class="form-label">Page Slug</label><span class="text-danger">*</span>
                          <input type="text" name="page_slug" class="form-control" value="{{old('page_slug',$cms->page_slug)}}">
                          @if ($errors->has('page_slug'))
                            <span class="text-danger">{{ $errors->first('page_slug') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Page Name</label><span class="text-danger">*</span>
                          <input type="text" name="page_name" class="form-control" value="{{old('page_name',$cms->page_name)}}">
                          @if ($errors->has('page_name'))
                            <span class="text-danger">{{ $errors->first('page_name') }}</span>
                          @endif
                      </div>
                      <div id="editor">
                        <div class="form-group ">
                          <label class="form-label">Description</label><span class="text-danger">*</span>
                            <!-- <textarea id='edit' name="description" >
                              {{old('description',$cms->description)}}
                            </textarea> -->
                            <textarea cols="80" id="edit" name="description" rows="10" data-sample-short>{{old('description',$cms->description)}}</textarea>
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
                      <div class="form-group">
                        <label class="form-label">Image</label><br>
                        <div class="col-md-9" style="display: inline-block">
                          <input type="file" class="form-control" id="cms_image" name="image" onchange="readURL(this);">
                        </div>
                        <div class="col-md-1" style="float: right; margin-right: 130px">
                          <img id="image" src="@if($cms->image) {{ asset('/backend/images/cms/'.$cms->image) }} @else {{asset('backend/img/img.png')}} @endif" height="100px" width="100px"/>
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
                    <div class="form-group">
                      <label class="form-label">Seo Keyword</label>
                      <input type="text" name="seo_keyword" class="form-control" form="Cms-Edit" value="{{old('seo_keyword',$cms->seo_keyword)}}">
                      @if ($errors->has('seo_keyword'))
                        <span class="text-danger">{{ $errors->first('seo_keyword') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="form-label">Seo Description</label>
                      <input type="text" name="seo_description" form="Cms-Edit" class="form-control"
                      value="{{old('seo_description',$cms->seo_description)}}">
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
                     <div class="form-group">
                          <label class="form-label">Status</label><span class="text-danger">*</span>
                          <select class="form-control" name="status" form="Cms-Edit">
                                  <option value="">Select Status</option>
                                   <option value="1" @if(old('status',$cms->status) == 1)selected @endif >Active</option>
                                  <option value="0" @if(old('status',$cms->status) == 0)selected @endif >InActive</option>
                           </select>
                           @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-purple" form="Cms-Edit">Save Cms</button>
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

