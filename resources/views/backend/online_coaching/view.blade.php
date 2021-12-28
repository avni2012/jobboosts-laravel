@extends('layouts.backend.master')

@section('title', 'View Online Coaching')

@section('css')
@endsection

@section('style')
<style type="text/css">
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    #customers tr:hover {background-color: #ddd;}
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #07689f;
      color: white;
    }
    .coach-available tr td,
    .coach-available tr th  {
        white-space: nowrap;
    }
</style>
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
                            <h1>View User Session</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('manage-online-coaching.index') }}">Manage Online Coaching</a></li>
                                <li class="breadcrumb-item active">View User Session</li>
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
            <div class="flash-message">
                  @if(session()->has('approve_session'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ session('approve_session.responseMessage') }}
                      <?php Session::forget('approve_session')?>
                    </div>
                  @endif
                  @if(session()->has('complete_session'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ session('complete_session.responseMessage') }}
                      <?php Session::forget('complete_session')?>
                    </div>
                  @endif
                  @if(session()->has('reject_session'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ session('reject_session.responseMessage') }}
                      <?php Session::forget('reject_session')?>
                    </div>
                  @endif
                </div>

        <!-- Main content -->
            <section class="content ">
                <div class="container-fluid">
                    <div class="manage_staff_page">
                            <div class="row">
                                 <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <!-- <div class="card-header">
                                                    <h6>Save</h6>
                                                </div> -->
                                                <div class="box box-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-aqua-active">
                                                      <h3 class="widget-user-username text-left">@if($get_user_sessions->users != null){{ $get_user_sessions->users->name }}@endif</h3>
                                                      <h5 class="widget-user-desc text-left"><a href="#">@if($get_user_sessions->users != null){{ $get_user_sessions->users->email }}@endif</a></h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                    @if($get_user_sessions->users != null)
                                                    @if($get_user_sessions->users->profile_picture != null)
                                                        <img class="img-circle" src="{{ asset('/frontend/images/user_profiles/'.$get_user_sessions->users->profile_picture) }}" alt="User Avatar">
                                                    @else
                                                        <img class="img-circle" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
                                                    @endif
                                                    @endif
                                                    </div>
                                                    <div class="box-footer">
                                                      <div class="row">
                                                        <div class="col-sm-4 border-right">
                                                          <div class="description-block">
                                                            <h5 class="description-header">{{ $user_resumes_count }}</h5>
                                                            <span class="description-text">Resumes</span>
                                                          </div>
                                                          <!-- /.description-block -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-4 border-right">
                                                          <div class="description-block">
                                                            <h5 class="description-header">{{ $user_cover_letter_count }}</h5>
                                                            <span class="description-text">Covers</span>
                                                          </div>
                                                          <!-- /.description-block -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-4">
                                                          <div class="description-block">
                                                            <h5 class="description-header">{{ $user_email_templates_count }}</h5>
                                                            <span class="description-text">Emails</span>
                                                          </div>
                                                          <!-- /.description-block -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <!-- /.col -->
                                                        <div class="col-sm-6 border-right">
                                                          <div class="description-block">
                                                            <h5 class="description-header">0</h5>
                                                            <span class="description-text">Courses</span>
                                                          </div>
                                                          <!-- /.description-block -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                          <div class="description-block">
                                                            <h5 class="description-header">{{ $user_session_count }}</h5>
                                                            <span class="description-text">Sessions</span>
                                                          </div>
                                                          <!-- /.description-block -->
                                                        </div>
                                                        <!-- /.col -->
                                                      </div>
                                                      <!-- /.row -->
                                                    </div>
                                                </div>
                                                    <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Status</label>
                                                            <label class="form-control">                     @if($get_user_sessions->users != null)
                                                                @if($get_user_sessions->users->status == 1)     
                                                                  {{ "Active" }}
                                                                @else
                                                                  {{ "InActive" }}
                                                                @endif
                                                            @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Email</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    {{ $get_user_sessions->users->email }}
                                                                @endif
                                                            </label>
                                                        </div>       
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Date of Birth</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    {{ $get_user_sessions->users->date_of_birth }}
                                                                @endif
                                                            </label>
                                                        </div>         
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Mobile No</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    {{ $get_user_sessions->users->mobile_no }}
                                                                @endif
                                                            </label>
                                                        </div>    
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Gender</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    @if($get_user_sessions->users->gender == '1')
                                                                        {{ "Male" }}
                                                                    @elseif($get_user_sessions->users->gender == '2')
                                                                        {{ "Female" }}
                                                                    @elseif($get_user_sessions->users->gender == 3)
                                                                        {{ "Others" }}
                                                                    @else
                                                                    @endif
                                                                @endif
                                                            </label>
                                                        </div>   
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Industry</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    @if(!empty($industry))
                                                                        @foreach($industry as $ind)
                                                                            @if($get_user_sessions->users->industry == $ind->id)
                                                                                {{ $ind->name }}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Work Experience</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    @if($get_user_sessions->users->work_experience == '1')
                                                                        {{ "Career starter" }}
                                                                    @elseif($get_user_sessions->users->work_experience == '2')
                                                                        {{ "Mid Experienced" }}
                                                                    @elseif($get_user_sessions->users->work_experience == '3')
                                                                        {{ "Experienced" }}
                                                                    @else
                                                                    @endif
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Education Level</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    @if($get_user_sessions->users->education_level == '1')
                                                                        {{ "Under Graduate" }}
                                                                    @elseif($get_user_sessions->users->education_level == '2')
                                                                        {{ "Graduate" }}
                                                                    @elseif($get_user_sessions->users->education_level == '3')
                                                                        {{ "Post Graduate" }}
                                                                    @elseif($get_user_sessions->users->education_level == '4')
                                                                        {{ "Doctorate" }}
                                                                    @else
                                                                    @endif
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="form-label">Address</label>
                                                            <label class="form-control">
                                                                @if($get_user_sessions->users != null)
                                                                    {{ $get_user_sessions->users->address }}
                                                                @endif
                                                            </label>
                                                        </div>      
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Personal Info</h6>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                  <li><a href="#tab_2" data-toggle="tab" aria-expanded="false" class="active">Course/Live Session</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_2">
                                                        <h5>Current Requested Session</h5>
                                                        @if(!empty($get_current_requested_session))
                                                            <table id="customers">
                                                              <tr>
                                                                <th>Session Name</th>
                                                                <th>Session Date</th>
                                                                <th>Session Time</th>
                                                                <th>Coach</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $get_current_requested_session->session_name }}</td>
                                                                <td>{{ $get_current_requested_session->session_date }}</td>
                                                                <td>{{ $get_current_requested_session->session_time }}</td>
                                                                <td>@if($get_current_requested_session->coach != null){{ $get_current_requested_session->coach->name }}@endif</td>
                                                                <td>
                                                                  @if($get_current_requested_session->status == 2)
                                                                    <span class="btn-primary btn" style="cursor: default;">Approved</span>
                                                                  @else
                                                                    <a style="color: #fff;" class="btn btn-primary" onclick="acceptSession({{ $get_user_sessions->id }})">Approve</a>
                                                                  @endif
                                                                    <a style="color: #fff;" class="btn btn-success" onclick="completeSession({{ $get_user_sessions->id }})">Complete</a>
                                                                    <form method="POST">
                                                                        @csrf
                                                                        {{--<button class="btn btn-success" type="button" id="approve_session_click" onclick="acceptSession({{ $get_user_sessions->id }})">Approve</button>--}}
                                                                        <button class="btn btn-danger" type="button" id="reject_session_click" onclick="rejectSession({{ $get_user_sessions->id }})">Reject</button>
                                                                    </form>
                                                                    <a style="color: #fff;" class="btn btn-info" onclick="showCoachAvailability({{ $get_user_sessions->id }})">Coach Availability</a>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                        @else
                                                            <p>No any requested session found.</p>
                                                        @endif
                                                        <hr>
                                                        <h5>Past Sessions</h5>
                                                        @if(!empty($get_past_completed_session))
                                                        <table id="customers">
                                                          <tr>
                                                            <th>Session Name</th>
                                                            <th>Session Date</th>
                                                            <th>Session Time</th>
                                                            <th>Coach</th>
                                                            <th>Status</th>
                                                            <th>Completed on</th>
                                                        </tr>
                                                        <tr>
                                                            @forelse($get_past_completed_session as $complete_session)                                            
                                                            <tr>
                                                                <td>{{ $complete_session->session_name }}</td>
                                                                <td>{{ $complete_session->session_date }}</td>
                                                                <td>{{ $complete_session->session_time }}</td>
                                                                <td>@if($complete_session->coach != null){{ $complete_session->coach->name }}@endif</td>
                                                                <td>@if($complete_session->status == 3)<span class="text-success">Completed</span>@endif</td>
                                                                <td>{{ $complete_session->coach_completedon }}</td>
                                                            </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="6">No any past completed sessions found.</td>
                                                                </tr>
                                                            @endforelse        
                                                        </tr>
                                                        </table>
                                                        @else
                                                            <p>No any past completed sessions found.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content reject-session">
            <form id="rejectSession" method="POST" action="{{ route('admin.reject-session',[$get_user_sessions->id]) }}"> 
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reason for reject session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                        <input type="hidden" name="s_id" id="s_id" value="">
                        <div class="form-group">
                            <textarea cols="15" class="form-control" rows="6" name="reason_for_reject_session" id="reason_for_reject_session" placeholder="Enter reason for reject session...">{{ old('reason_for_reject_session') }}</textarea>
                        </div>
                </div>
                  <div class="modal-footer">
                    <div class="spinner-border m-2 reject-loader" role="status" style="display: none;">
                      <span class="sr-only">Loading...</span>
                    </div>
                    <button type="submit" class="btn btn-primary save-reject-reason" id="save_reject_session">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="coachAvailabilityModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content coach-available">
            <form id="coachAvailability"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Coach Availability</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="s_id" id="s_id" value="">
                    <div id="coach_total_booked_sessions"></div>
                </div>
            </form>
        </div>
      </div>
    </div>
@endsection

@section('script-js-last')
<script src="{{asset('backend/developer/developer.js')}}"></script>
<script type="text/javascript">
    var csrftoken = "{{ csrf_token() }}";
    var base_url = "{{ url('/') }}";
</script>
@endsection

@section('script')
@endsection

