@extends('layouts.frontend.master')

@section('title', 'Dashboard Candidate Sessions')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/js/datepicker/bootstrap-datepicker.min.css') }}">
@endsection
@section('style')
<style type="text/css">
  .label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: #4CAF50;} 
.info {background-color: #2196F3;} 
.coach-profile{
  width: 120px;
}
</style>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0">
          <div class="row">
            <div class="col-md-8">
              <div class="section-title-02 mb-4">
                <h4></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="comparisonpln col-md-12">
              <table>
                <thead>
                  <tr>
                    <th></th>
                    <th>Coach Name</th>
                    <th>Profile</th>
                    <th>Experience</th>
                    <th>Available</th>
                  </tr>
                </thead>
                <tbody>
                   @if(!empty($available_coaches))
                      @foreach($available_coaches as $coach)
                        <tr>
                          <td>
                            @if($coach->display_image != null)
                              <img src="{{ asset('/frontend/images/avatar/'.$coach->display_image) }}" class="coach-profile">
                            @endif  
                          </td>
                          <td>{{ $coach->name }}</td>
                          <td>{{ $coach->about_me }}</td>
                          <td>{{ $coach->experience }}</td>
                          <td>
                            From <b>{{ $coach['available_dates']->first()->availability_start_date }}</b> to <b>{{ $coach['available_dates']->first()->availability_end_date }}</b>
                            {{--<div class="input-group date" id="available_dates" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="available_dates" placeholder="Enter date of birth" data-target="#available_dates">
                              <div class="input-group-append" data-target="#available_dates" data-toggle="available_dates">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                              </div>
                            </div>--}}
                          </td>
                        </tr>
                      @endforeach
                   @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection

@section('script')
<script type="text/javascript">
  /*$('body').on('focus',".date", function(){
    $(this).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      endDate: '+0d'
    });
  });*/
</script>
@endsection

