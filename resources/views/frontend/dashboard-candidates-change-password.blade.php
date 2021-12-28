@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Change Password')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<!-- Change Password START -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" id="user_change_password" action="{{ route('dashboard-change-password') }}">
        <div class="user-dashboard-info-box">
          <div class="section-title-02 mb-4">
            <h4>Change Password</h4>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="form-group col-md-12">
                  <label>Current Password</label>
                  <input type="password" name="current_password" class="form-control" value="">
                </div>
                <div class="form-group col-md-12">
                  <label>New Password</label>
                  <input type="password" name="new_password" class="form-control" value="">
                </div>
                <div class="form-group col-md-12 mb-0">
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" value="">
                </div>
            </div>
          </div>
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Change Password</button>
        {{--<a class="btn btn-lg btn-primary" href="#">Change Password</a>--}}
      </form>
      </div>
    </div>
  </div>
</section>
<!-- Change Password END -->

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/dashboard/dashboard-change-password.js') }}"></script>
@endsection

@section('script')
@endsection

