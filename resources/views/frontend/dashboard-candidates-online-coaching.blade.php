@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Online Coaching')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/select2/select2.css') }}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/datetimepicker.min.css') }}">
<script src="{{ asset('/frontend/js/moment.min.js') }}"></script>
<script src="{{ asset('/frontend/js/datetimepicker.min.js') }}"></script>--}}
@endsection
@section('style')
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title-02 mb-4">
                <h4>Online Coaching</h4>
              </div>
            </div>
          </div>
          @if($get_user_plan == null)
            <div class="row">
              <div class="col-md-12">
                <p>Your plan is expired, Upgrade for continue online coaching.</p>
              </div>
            </div>
          @else
          @if(count($user_sessions) > 0)
            <div class="row">
              <div class="comparisonpln">
                <h3>{{ $user_sessions->count() }} sessions (1-on-1 session)</h3>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              </div>
            </div>
            @php $i = 1; @endphp
            @forelse($user_sessions as $key => $session)
              @if($session->status == 0 || $session->status == 4)
                @if($i==1)
                  @if($user_sessions[$i-1]['status'] == 3 || $user_sessions[$i-1]['status'] == 0 || $user_sessions[$i-1]['status'] == 4)
                  <div class="tab-content bdnone" id="v-pills-tabContent">
                    <div class="tab-pane fade rounded bg-white show active" id="v-pills-Subscriptions" role="tabpanel" aria-labelledby="v-pills-Subscriptions-tab">
                      <div class="accordion-style" id="accordion-Two">
                        <div class="card">
                          <div class="card-header padno" id="headingTwo">
                            
                              <button class="btn btn-link px-0 w-100 d-block text-left collapsed schedule-session" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="row sess_box">
                                <div class="col-md-3">
                                  <div class="session_box1">
                                    <h2>{{ $session->session_name }}</h2>
                                    @if($session->status == 1)
                                      <p><span class="badge badge-warning p-2">Requested</span></p>
                                    @elseif($session->status == 2)
                                      <p><span class="badge badge-primary p-2">Accepted</span></p>
                                    @elseif($session->status == 3)
                                      <p><span class="badge badge-success p-2">Completed</span></p>
                                    @elseif($session->status == 4)
                                      <p><span class="badge badge-danger p-2">Request Rescheduled</span></p>
                                    @else
                                      <p><span class="badge badge-secondary p-2">Pending</span></p>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="session_box2">
                                    @if($session->session_date != null)
                                      <h3><i class="far fa-calendar-alt"></i> {{ date('d F Y',strtotime($session->session_date)) }}</h3>
                                    @endif
                                    @if($session->session_time != null)
                                      <p><i class="fa fa-clock" aria-hidden="true"></i> {{ $session->session_time }}</p>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="session_box3">
                                    @if($session->coach_id != null)
                                    <div class="sesimg">
                                      @if($session->coach->display_image != null)
                                        <img src="{{ asset('/frontend/images/avatar/'.$session->coach->display_image) }}" class="img-fluid rounded-circle">
                                      @endif
                                      <p>{{ $session->coach->name }}</p>
                                    </div>
                                    @endif
                                    <div class="sscheck iconcolr">
                                      <h5 class="accordion-title mb-0">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                      </h5>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              </button>                            
                          </div>
                          @php 
                            $item_class = '';
                          @endphp
                          @if(count($errors) > 0)
                            @php $item_class = 'show'; @endphp
                          @endif
                          <div id="collapseTwo" class="collapse accordion-content bdnone {{ $item_class }}" aria-labelledby="headingTwo" data-parent="#accordion-Two">
                            <div class="card-body">
                              <div class="online-coachfm">
                                <form id="coach-save-form" method="POST" name="coach-save-form" action="{{ route('save-user-session-coach') }}">
                                  @csrf
                                  <input type="hidden" name="c_id" value="{{ $session->id }}">
                                  <input type="hidden" name="coachId" id="coachId" value="{{ $session->coach_id }}">
                                  <div class="row">
                                    @if($session->coach_id == null)
                                      <div class="col-md-8 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                          <label class="online-labelcl">Step 1 - Choose your coach</label><br>
                                          <div class="row">
                                            @if(!empty($coaches))
                                              @foreach($coaches->chunk(4) as $coach)
                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                                @foreach($coach as $cc)
                                                  <div class="online-radio-label">
                                                    <input type="radio" id="coach_{{ $cc->id }}" name="coach" value="{{ $cc->id }}" class="coach-date">
                                                    <label for="coach_{{ $cc->id }}">{{ $cc->name }} - {{ $cc->about_me }}</label>
                                                  </div>
                                                @endforeach
                                              </div>
                                              @endforeach
                                            @endif
                                            @if ($errors->has('coach'))
                                              <span class="text-danger">{{ $errors->first('coach') }}</span>
                                            @endif
                                            <input type="hidden" name="coach" id="ch_id" value="">
                                          </div>
                                        </div>
                                      </div>
                                    @else
                                      <input type="hidden" name="coach" value="{{ $session->coach_id }}">
                                    @endif
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                      <div class="form-group">
                                        <label class="online-labelcl">Step 2 - Choose Date</label>
                                        <div class="coach-date-show"></div>
                                        <div class="input-group date" id="coach_date" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" name="coach_date" id="coach_date" value="" data-target="#coach_date" @if($session->coach_id == null)readonly=""@endif>
                                          <div class="input-group-append" data-target="#coach_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                          </div>
                                        </div>
                                        @if ($errors->has('coach_date'))
                                          <span class="text-danger">{{ $errors->first('coach_date') }}</span>
                                        @endif
                                      </div>
                                      <div class="form-group select-border">
                                        <label class="online-labelcl">Step 3 - Choose Time</label>
                                        <div class="coach-time-show"></div>
                                        <select class="form-control basic-select select2-hidden-accessible" name="coach_time" id="coach_time" data-select2-id="1" tabindex="-1" aria-hidden="true" readonly="">
                                          <option value=""></option>
                                          {{--<option value="value 01" selected="selected" data-select2-id="3">12:00 - 13:00</option>
                                          <option value="value 02" data-select2-id="12">14:00 - 15:00</option>
                                          <option value="value 03" data-select2-id="13">16:00 - 17:00</option>--}}
                                        </select>
                                        @if ($errors->has('coach_time'))
                                          <span class="text-danger">{{ $errors->first('coach_time') }}</span>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="online-co-btn">
                                        <button type="submit" class="btn btn-dark" form="coach-save-form">Request Coaching</button>
                                        {{--<a class="btn btn-dark" href="#">Request Coaching</a>--}}
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                    <div class="row sess_box">
                    <div class="col-md-3">
                      <div class="session_box1">
                        <h2>{{ $session->session_name }}</h2>
                        @if($session->status == 1)
                          <p><span class="badge badge-warning p-2">Requested</span></p>
                        @elseif($session->status == 2)
                          <p><span class="badge badge-primary p-2">Accepted</span></p>
                        @elseif($session->status == 3)
                          <p><span class="badge badge-success p-2">Completed</span></p>
                        @elseif($session->status == 4)
                          <p><span class="badge badge-danger p-2">Request Rescheduled</span></p>
                        @else
                          <p><span class="badge badge-secondary p-2">Pending</span></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="session_box2">
                        @if($session->session_date != null)
                          <h3><i class="far fa-calendar-alt"></i> {{ date('d F Y',$session->session_date) }}24 September 2019</h3>
                        @endif
                        @if($session->session_time != null)
                          <p><i class="fa fa-clock" aria-hidden="true"></i> 11:00 - 12:00 pm</p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="session_box3">
                        @if($session->coach_id != null)
                        <div class="sesimg">
                          @if($session->coach->display_image != null)
                            <img src="{{ asset('/frontend/images/avatar/'.$session->coach->display_image) }}" class="img-fluid rounded-circle">
                          @endif
                          <p>{{ $session->coach->name }}</p>
                        </div>
                        @endif
                        <div class="sscheck iconcolr">
                          <i class="fa fa-ban" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                @endif
                @if($i>1)
                  <div class="row sess_box">
                    <div class="col-md-3">
                      <div class="session_box1">
                        <h2>{{ $session->session_name }}</h2>
                        @if($session->status == 1)
                          <p><span class="badge badge-warning p-2">Requested</span></p>
                        @elseif($session->status == 2)
                          <p><span class="badge badge-primary p-2">Accepted</span></p>
                        @elseif($session->status == 3)
                          <p><span class="badge badge-success p-2">Completed</span></p>
                        @elseif($session->status == 4)
                          <p><span class="badge badge-danger p-2">Request Rescheduled</span></p>
                        @else
                          <p><span class="badge badge-secondary p-2">Pending</span></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="session_box2">
                        @if($session->session_date != null)
                          <h3><i class="far fa-calendar-alt"></i> {{ date('d F Y',$session->session_date) }}24 September 2019</h3>
                        @endif
                        @if($session->session_time != null)
                          <p><i class="fa fa-clock" aria-hidden="true"></i> 11:00 - 12:00 pm</p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="session_box3">
                        @if($session->coach_id != null)
                        <div class="sesimg">
                          @if($session->coach->display_image != null)
                            <img src="{{ asset('/frontend/images/avatar/'.$session->coach->display_image) }}" class="img-fluid rounded-circle">
                          @endif
                          <p>{{ $session->coach->name }}</p>
                        </div>
                        @endif
                        <div class="sscheck iconcolr">
                          <i class="fa fa-ban" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                @php $i++; @endphp
              @endif
              @if(in_array($session->status,[1,2,3]))
                <div class="row sess_box">
                  <div class="col-md-3">
                    <div class="session_box1">
                      <h2>{{ $session->session_name }}</h2>
                      @if($session->status == 1)
                        <p><span class="badge badge-warning p-2">Requested</span></p>
                      @elseif($session->status == 2)
                        <p><span class="badge badge-primary p-2">Accepted</span></p>
                      @elseif($session->status == 3)
                        <p><span class="badge badge-success p-2">Completed</span></p>
                      @elseif($session->status == 4)
                        <p><span class="badge badge-danger p-2">Request Rescheduled</span></p>
                      @else
                        <p><span class="badge badge-secondary p-2">Pending</span></p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="session_box2">
                      @if($session->session_date != null)
                        <h3><i class="far fa-calendar-alt"></i> {{ date('d F Y',strtotime($session->session_date)) }}</h3>
                      @endif
                      @if($session->session_time != null)
                        <p><i class="fa fa-clock" aria-hidden="true"></i> {{ $session->session_time }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="session_box3">
                      @if($session->coach_id != null)
                      <div class="sesimg">
                        @if($session->coach->display_image != null)
                          <img src="{{ asset('/frontend/images/avatar/'.$session->coach->display_image) }}" class="img-fluid rounded-circle">
                        @endif
                        <p>{{ $session->coach->name }}</p>
                      </div>
                      @endif
                      @if($session->status == 1)
                        <div class="sscheck iconcolr">
                          <i class="fa fa-clock" aria-hidden="true"></i>
                        </div>
                      @elseif($session->status == 2)
                        <div class="sscheck iconcolr">
                          <i class="fa fa-clock" aria-hidden="true"></i>
                        </div>
                      @elseif($session->status == 3)
                        <div class="sscheck">
                          <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              @endif
            @empty
              <div class="comparisonpln">
                <p>No sessions found.</p>
              </div>
            @endforelse
            @else
              <p>No any online sessions found.</p>
          @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/select2.full.js') }}"></script>
<script src="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  var csrftoken = "{{ csrf_token() }}";
  var base_url = "{{ url('/') }}";
</script>
<script src="{{ asset('/frontend/js/dashboard/online-coaching.js') }}"></script>
@endsection

@section('script')
@endsection

