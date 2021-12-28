@extends('layouts.backend.master')

@section('title', 'Manage Contact Us')

@section('breadcrumb-title', 'Manage Contact Us')

@section('breadcrumb-item')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <li class="breadcrumb-item active">Manage Contact Us</li>
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
                            <h1>Manage Contact Us</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Manage Contact Us</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="manage_staff_page">
                        <div class="row drpdn_btn_add_btn">
                            <div class="col-sm-6">
                                {{--@if(Auth::guard()->user()->can('delete-cms'))
                                    <div class="dropdown_select form-group">
                                        <select class="form-control">
                                            <option>Delete</option>
                                        </select>
                                        <button type="button" onclick="MultipleDelete('/multiple-contact-us-delete','cmsDatatable')" class="btn btn-default btn-purple">Apply</button>
                                    </div>
                                @endif--}}
                            </div>
                            <div class="col-sm-6">
                                <div class="add_staff_btn">
                                    @if(Auth::guard()->user()->can('delete-contactus'))<button type="button" onclick="MultipleDelete('/multiple-contact-us-delete','contactUsDatatable')" class="btn btn-default btn-purple"> <i class="fas fa-trash-alt"></i>  Delete Selected</button>@endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="flash-message">
                                    @if(session()->has('message.level'))
                                        <div class="alert alert-{{ session('message.level') }}">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ session('message.content') }}
                                            <?php Session::forget('message')?>
                                        </div>
                                    @endif
                                </div>
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="contactUsDatatable" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th class="select_all">
                                                        <label class="container_chk ">
                                                            <input type="checkbox" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </th>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile No</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Created At</th>
                                                    @if(Auth::guard()->user()->can('delete-contactus'))
                                                        <th>Action</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
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
        var csrftoken = '{{ csrf_token() }}';
        var base_url = "{{url('/')}}";
    </script>
    @if(Auth::guard()->user()->can('delete-contactus'))
        <script>
            deletecheck = true;
        </script>
    @endif
@endsection

