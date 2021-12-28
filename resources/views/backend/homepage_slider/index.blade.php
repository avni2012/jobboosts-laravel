@extends('layouts.backend.master')

@section('title', 'Manage Homepage Slider')

@section('breadcrumb-title', 'Manage Homepage Slider')

@section('breadcrumb-item')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <li class="breadcrumb-item active">Manage Homepage Slider</li>
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
                            <h1>Manage Homepage Slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Manage Homepage Slider</li>
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
                            </div>
                            <div class="col-sm-6">
                                @if(Auth::user()->can('create-homepageslider'))
                                    <div class="add_staff_btn">
                                        <a type="button" class="btn btn-default btn-purple" href="{{route('manage-homepage-sliders.create')}}">
                                            <i class="fas fa-plus-circle"></i> Add Homepage Slider
                                        </a>
                                    </div>
                                @endif
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
                                            <table id="homepageSliderDatatable" class="table table-bordered table-striped">
                                                <thead>
                                                <th>Sr No.</th>
                                                <th>Image</th>
                                                <th>Heading</th>
                                                <th>Small Description</th>
                                                <th>Button Text</th>
                                                <th>Button URL</th>
                                                @if(auth()->user()->can('edit-homepageslider') || auth()->user()->can('delete-homepageslider')) <th>Action</th> @endif
                                                </thead>
                                                <tbody>
                                                @if(count($imgs) > 0)
                                                    @foreach($imgs as $key => $img)
                                                        <tr>
                                                            <td>{{ (int)$key+1 }}</td>
                                                            <td><img src="{{ asset('frontend/images/slider/'.$img->image) }}" height="100px"></td>
                                                            <td>{{ $img->heading }}</td>
                                                            <td>{!! str_limit(strip_tags($img->small_desc, 60)) !!}</td>
                                                            <td>{{ $img->button_text }}</td>
                                                            <td>{{ $img->button_url }}</td>
                                                            @if(auth()->user()->can('edit-homepageslider') || auth()->user()->can('delete-homepageslider'))
                                                                <td>
                                                                    @if(auth()->user()->can('edit-homepageslider'))
                                                                        <a style="cursor:pointer;" href="{{ route('manage-homepage-sliders.edit', $img->id) }}"><i class="fa fa-edit"></i> </a>
                                                                    @endif
                                                                    @if(auth()->user()->can('delete-homepageslider'))
                                                                        <a id="delete" data-id="{{ $img->id }}" style="color: #886ab5; cursor:pointer; text-decoration: none;"><i class="fas fa-trash-alt icon_color"></i></a>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr><td colspan="7"><center>No homepage slider found.</center></td></tr>
                                                @endif
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

@section('script')
    <script>
        var csrftoken = '{{ csrf_token() }}';
        var base_url = "{{url('/')}}";
        var delete_url = '{{ route('manage-homepage-sliders.destroy', $img->id) }}';
        $(document).on('click','#delete',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var data = {_method: "DELETE", id: '{{ $img->id }}', _token: $('meta[name="csrf-token"]').attr('content') };
            swal({
                title: "Are you sure?",
                text: "Selected deleted, you will not be able to recover this homepage slider data list!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.post(delete_url, data, function (result) {
                            console.log(result);
                            if (result == 'success') {
                                swal({
                                    title: 'Success!',
                                    text: 'Image deleted successfully!'
                                }).then((value) => {
                                    window.location.reload();
                                })
                            }
                            else {
                                swal('Error!', result, 'error');
                            }
                        }).fail(function (xhr) {
                            console.log(xhr);
                        });
                    }
                });
        });
    </script>
@endsection

@section('script-js-last')
    <script src="{{asset('backend/developer/developer.js')}}"></script>
@endsection
