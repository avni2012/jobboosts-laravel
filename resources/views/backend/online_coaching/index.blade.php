@extends('layouts.backend.master')

@section('title', 'Manage Online Coaching')

@section('breadcrumb-title', 'Manage Online Coaching')

@section('breadcrumb-item')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<li class="breadcrumb-item active">Manage Online Coaching</li>
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
              <h1>Manage Online Coaching</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Manage Online Coaching</li>
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
              <div class="col-sm-2">
                <select class="form-control search-status" name="status" id="status">
                  <option value="1">Requested</option>
                  <option value="2">Accepted</option>
                  <option value="3">Completed</option>
                  <option value="4">Rescheduled</option>
                  <option value="">All</option>
                </select>
              </div>
              <div class="col-sm-6">
                <div class="add_staff_btn">
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
                      <table id="onlinecoachingDatatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>User</th>
                          <th>Session Name</th>
                          <th>Coach</th>
                          <th>Status</th>
                          @if(Auth::guard()->user()->can('view-online-coaching'))
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
@if(Auth::guard()->user()->can('view-online-coaching'))
<script>
   delete_edit_action = true;
</script>
@endif
@endsection

