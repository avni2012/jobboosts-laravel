@extends('layouts.backend.master')

@section('title', 'Create Coach')

@section('breadcrumb-title', 'Create Coach')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Create Coach</li>
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
                            <h1>Create Coach</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item "><a href="{{route('manage-coach.index')}}">Manage Coaches</a></li>
                                <li class="breadcrumb-item active">Create Coach</li>
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
                            <div class="col-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form name="Coach-create"  id="Coach-create" action="{{route('manage-coach.store')}}" method="Post" data-parsley-validate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <label class="form-label">Name</label><span class="text-danger">*</span>
                                                <input type="text" name="name" class="form-control" value="{{old('name')}}" required pattern="/^[a-zA-Z. ]*$/" data-parsley-pattern-message="Please provide valid name." data-parsley-required-message="Please enter coach's name.">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Experience (In Years)</label><span class="text-danger">*</span>
                                                <input type="text" name="experience" class="form-control" value="{{old('experience')}}" maxlength="3" required pattern="/^[0-9]*$/" data-parsley-required-message="Please enter years of experience of coach.">
                                                @if ($errors->has('experience'))
                                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">About Me</label><span class="text-danger">*</span>
                                                <input type="text" name="about_me" class="form-control" value="{{old('about_me')}}" maxlength="150" data-parsley-maxlength-message="Only 150 characters allowed." required data-parsley-required-message="Please enter something about coach.">
                                                @if ($errors->has('about_me'))
                                                    <span class="text-danger">{{ $errors->first('about_me') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Profile</label><span class="text-danger">*</span>
                                                <textarea class="form-control" cols="80" name="profile" rows="6" data-sample-short required data-parsley-required-message="Please enter profile details of coach.">{{old('profile')}}</textarea>
                                                @if ($errors->has('profile'))
                                                    <span class="text-danger">{{ $errors->first('profile') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Facebook Link</label>
                                                <input type="text" name="facebook_link" class="form-control" value="{{old('facebook_link')}}" type="url" data-parsley-type="url" data-parsley-required-message="Please enter valid url.">
                                                @if ($errors->has('facebook_link'))
                                                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Instagram Link</label>
                                                <input type="text" name="instagram_link" class="form-control" value="{{old('instagram_link')}}" type="url" data-parsley-type="url" data-parsley-required-message="Please enter valid url.">
                                                @if ($errors->has('instagram_link'))
                                                    <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Twitter Link</label>
                                                <input type="text" name="twitter_link" class="form-control" value="{{old('twitter_link')}}" type="url" data-parsley-type="url" data-parsley-required-message="Please enter valid url.">
                                                @if ($errors->has('twitter_link'))
                                                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Linkedin Link</label><span class="text-danger">*</span>
                                                <input type="text" name="linkedin_link" class="form-control" value="{{old('linkedin_link')}}" type="url" required="" data-parsley-type="url" data-parsley-required-message="Please enter linkedin link.">
                                                @if ($errors->has('linkedin_link'))
                                                    <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Display Image</label><br>
                                                <div class="col-md-9" style="display: inline-block">
                                                    <input type="file" class="form-control" id="display_image" name="display_image" onchange="readURL(this);" accept="jpg,jpeg,png">
                                                    @if ($errors->has('display_image'))
                                                        <span class="text-danger">{{ $errors->first('display_image') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-1" style="float: right; margin-right: 130px">
                                                    <img id="image" src="{{asset('backend/img/img.png')}}" height="100px" width="100px"/>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" form="Coach-create" class="btn btn-purple">Save Coach Details</button>
                                                <a href="{{route('manage-coach.index')}}" class="btn btn-default">Cancel</a>
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
@endsection

