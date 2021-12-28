@extends('layouts.backend.master')

@section('title', 'Create Homepage Slider')

@section('breadcrumb-title', 'Create Homepage Slider')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Create Homepage Slider</li>
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
                            <h1>Create Homepage Slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item "><a href="{{route('manage-homepage-sliders.index')}}">Manage Homepage Slider </a></li>
                                <li class="breadcrumb-item active">Create Homepage Slider</li>
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
                                        <form name="Faq-create" action="{{route('manage-homepage-sliders.store')}}" method="Post" data-parsley-validate enctype="multipart/form-data" data-parsley-validate>
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-md-6" style="display: inline-block">
                                                    <label class="form-label">Image</label><span class="text-danger">*</span><span class="text-danger">(dimension: 1920x700) (Maximum image size: 1 MB)</span>
                                                    <input type="file" name="image" class="form-control" onchange="readURL(this);" value="{{old('image')}}" required data-parsley-required-message="Please choose slider image.">
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4" style="margin-right: 130px; float: right">
                                                    <img id="image" src="{{asset('backend/img/img.png')}}" height="100px" width="100px"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Heading</label>
                                                <input type="text" name="heading" class="form-control" value="{{old('heading')}}">
                                                @if ($errors->has('heading'))
                                                    <span class="text-danger">{{ $errors->first('heading') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Small Description</label>
                                                <textarea id='edit' name="small_desc">{{old('small_desc')}}</textarea>
                                                @if ($errors->has('small_desc'))
                                                    <span class="text-danger">{{ $errors->first('small_desc') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Button Text</label>
                                                <input type="text" name="button_text" class="form-control" value="{{old('button_text')}}">
                                                @if ($errors->has('button_text'))
                                                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Button URL</label>
                                                <input type="text" name="button_url" class="form-control" value="{{old('button_url')}}">
                                                @if ($errors->has('button_url'))
                                                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-purple">Save Homepage Slider</button>
                                                <a href="{{route('manage-homepage-sliders.index')}}" class="btn btn-default">Cancel</a>
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
    <script src="{{asset('backend/developer/developer.js')}}"></script>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('edit', {
            height: 150
        });
    </script>
@endsection

