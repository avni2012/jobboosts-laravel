@extends('layouts.backend.master')

@section('title', 'Create Notification')

@section('breadcrumb-title', 'Create Notification')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Create Notification</li>
@endsection

@section('css')
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
                            <h1>Create Notification</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item "><a href="{{route('manage-notification.index')}}">Manage Notification</a></li>
                                <li class="breadcrumb-item active">Create Notification</li>
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
                                        <form name="Notification-create"  id="Notification-create" action="{{route('manage-notification.update',$notification->id)}}"
                                              method="Post" data-parsley-validate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <label class="form-label">Recepients</label>
                                                <p>{{ $customer_names ?? '-' }}</p>
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Title</label>
                                                <p>{{ $notification->title ?? '-' }}</p>
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Image</label><br>
                                                @if($notification->image)
                                                    <img src="{{asset('assets/backend/developer/notifications/'. $notification->image)}}" width="100px" height="100px">
                                                @else
                                                    <p>-</p>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Description</label>
                                                <p>{{ $notification->description ?? '-' }}</p>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            {{--<div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Save</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <button type="submit" form="Notification-create" class="btn btn-purple">Save Notification</button>
                                            <a href="{{route('manage-notification.index')}}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
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

