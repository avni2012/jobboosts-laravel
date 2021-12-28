@extends('layouts.backend.master')

@section('title', 'Edit Email Template')

@section('breadcrumb-title', 'Edit Email Template')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Edit Email Template</li>
@endsection

@section('css')
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
                            <h1>Edit Email Template</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item "><a href="{{route('manage-faq.index')}}">Manage Email Templates </a></li>
                                <li class="breadcrumb-item active">Edit Email Template</li>
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
                                        <form name="Faq-create" action="{{route('manage-email-templates.update', $email_template->id)}}" method="Post">
                                            @csrf
                                            {{ method_field('patch') }}
                                            <div class="form-group ">
                                                <label class="form-label">Keyword</label><span class="text-danger">*</span>
                                                <input type="text" name="keyword" class="form-control" value="{{$email_template->keyword ?? old('keyword')}}" readonly>
                                                @if ($errors->has('keyword'))
                                                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Macros</label><span class="text-danger">*</span>
                                                <input type="text" name="content_macro" class="form-control" value="{{$email_template->content_macro ?? old('content_macro')}}" readonly>
                                                @if ($errors->has('content_macro'))
                                                    <span class="text-danger">{{ $errors->first('content_macro') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Subject</label><span class="text-danger">*</span>
                                                <input type="text" name="subject" class="form-control" value="{{$email_template->subject ?? old('subject')}}">
                                                @if ($errors->has('subject'))
                                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Content</label><span class="text-danger">*</span>
                                                <textarea class="form-control" id='edit' name="content" >{{$email_template->content ?? old('content')}}</textarea>
                                                @if ($errors->has('content'))
                                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-purple">Save Template</button>
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

@section('script')
<script>
    (function () {
        $('#edit').ckeditor();
    })()

</script>
@endsection

