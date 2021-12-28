@extends('layouts.backend.master')

@section('title', 'Create Notification')

@section('breadcrumb-title', 'Create Notification')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Create Notification</li>
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
                                        <form name="Notification-create"  id="Notification-create" action="{{route('manage-notification.store')}}"
                                              method="Post" data-parsley-validate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <label class="form-label">Add Recepients</label><span class="text-danger">*</span>
                                                <div class="row d-flex">
                                                    <div class="checkbox checkbox-green col-md-3">
                                                        <input id="all_customers" name="all_customers" type="checkbox" >
                                                        <label for="all_customers" style="font-weight: 500">All</label>
                                                    </div>
                                                </div>
                                                <select class="form-control select2 recepients-opt" name="customer_ids[]" id="customer_ids" multiple="multiple" required
                                                        data-placeholder="Select Customer" data-parsley-required-message="Please select atleast 1 customer!">
                                                    <optgroup id="customers" label="All Customers">
                                                        @if($users)
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="">No Customers found</option>
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @if ($errors->has('customer_ids'))
                                                    <span class="text-danger">{{ $errors->first('customer_ids') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Title</label><span class="text-danger">*</span>
                                                <input type="text" name="title" class="form-control" value="{{old('title')}}" required data-parsley-required-message="Please enter title!">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Image</label>
                                                <input type="file" name="image" class="form-control" value="{{old('image')}}">
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Description</label><span class="text-danger">*</span>
                                                <textarea id='description' class="form-control" name="description" required data-parsley-required-message="Please enter description!">
                                                    {{old('description')}}
                                                </textarea>
                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-4">
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
        /*(function () {
            new FroalaEditor("#edit")
        })()*/

        jQuery(document).ready(function(){
            $(".recepients-opt").select2();
        });

        $('#all_customers').on('change', function () {
            if($(this).prop("checked")) {
                $.each($('#customer_ids').find('optgroup'), function( key, value ) {
                    if($(value).attr('label') == 'All Customers') {
                        $(value).find('option').prop("selected","selected");
                        $("#customer_ids").trigger("change");
                    }
                })
            } else {
                $.each($('#customer_ids').find('optgroup'), function( key, value ) {
                    if($(value).attr('label') == 'All Customers') {
                        $(value).find('option').attr('selected',false)
                        $("#customer_ids").val(null).trigger("change");
                    }
                })
            }
        });
    </script>

@endsection

