@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate My Profile')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/intlTelInput.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/js/datepicker/bootstrap-datepicker.min.css') }}">
@endsection
@section('style')
<style type="text/css">
  .iti-flag {
        background-image:url("{{ asset('/frontend/images/flags.png') }}");
    }
  #profile_picture{
    cursor: pointer;
  }
  #file-upload-error{
    color: red;
  }
  .dial-code{
    color: #969696 !important;
  }
</style>
@endsection

@section('content')
<!-- My Account START -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <form method="POST" id="profile_update" action="{{ route('dashboard-profile-update') }}" enctype="multipart/form-data"> 
        <div class="user-dashboard-info-box">
          <div class="mb-2">
            <h4>Basic Information</h4>
          </div>
          <div class="cover-photo-contact mb-2 d-flex align-items-flex-end">
            <div class="upload-file">
              <div class="custom-file mb-0">
                <input type="file" class="custom-file-input" name="profile_picture" id="profile_picture" accept="image/x-png,image/gif,image/jpeg">
                <label class="custom-file-label">Upload Profile Photo</label>
              </div>
              <span id="file-upload-error"></span>
            </div>
            <div id="profile_picture_show"></div>
          </div>
            <div class="form-row profile-lbcl">
              <div class="form-group col-md-6">
                <label>Full Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="name" id="name" placeholder="Vinay Chaurasiya" value="{{ old('name',$users->name) }}">
              </div>
              <div class="form-group col-md-6">
                <label>Email</label><span class="text-danger">*</span>
                <input type="email" class="form-control" name="email" id="email" placeholder="vinay@v4web.com" value="{{ old('name',$users->email) }}">
              </div>
              <div class="form-group col-md-6">
                <label>Date of birth</label><span class="text-danger">*</span>
                <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" name="date_of_birth" placeholder="Select date of birth" data-target="#date_of_birth" value="{{ old('date_of_birth',$users->date_of_birth) }}">
                  <div class="input-group-append" data-target="#date_of_birth" data-toggle="date_of_birth">
                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6" id="cont_id">
                <label>Phone</label><span class="text-danger">*</span>
                <input type="tel" class="form-control" name="mobile_no" id="mobile_no" value="{{ old('name',$users->mobile_no) }}">
                <input type="hidden" name="country_code" id="country_code" value="@if($users->country_code != null){{ $users->country_code }}@else{{ "91" }}@endif">
              </div>
              <div class="form-group col-md-6">
                <label class="d-block mb-3">Gender</label>
                  <div class="custom-control custom-radio d-inline">
                    <input type="radio" id="male" name="gender" class="custom-control-input" value="1"{{ old('gender',$users->gender) == '1' ? "checked" : "" }}>
                    <label class="custom-control-label" for="male">Male</label>
                  </div>
                  <div class="custom-control custom-radio d-inline ml-3">
                    <input type="radio" id="female" name="gender" class="custom-control-input" value="2"{{ old('gender',$users->gender) == '2' ? "checked" : "" }}>
                    <label class="custom-control-label" for="female">Female</label>
                  </div>
              </div>
              <div class="form-group col-md-6 select-border">
                    <label for="sector">Industry Selected:</label><span class="text-danger">*</span>
                    <select class="form-control" name="industry">
                      <option value="" selected>Select Industry</option>
                      @if(!empty($industry))
                        @foreach($industry as $ind)
                          <option value="{{ $ind->id }}" {{ old('industry',$users->industry) == $ind->id ? "selected" : "" }}>{{ $ind->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
              </div>
              <div class="form-group col-md-6">
                <label>Total work experience</label>
                <select class="form-control" name="work_experience">
                      <option value="0">Select Work Experience</option>
                      <option value="1" {{ old('work_experience',$users->work_experience) == '1' ? "selected" : "" }}>Career starter</option>
                      <option value="2" {{ old('work_experience',$users->work_experience) == '2' ? "selected" : "" }}>Mid Experienced</option>
                      <option value="3" {{ old('work_experience',$users->work_experience) == '3' ? "selected" : "" }}>Experienced</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Level of Education</label>
                <select class="form-control" name="education_level">
                      <option value="0">Select Education Level</option>
                      <option value="1" {{ old('education_level',$users->education_level) == '1' ? "selected" : "" }}>Under Graduate</option>
                      <option value="2" {{ old('education_level',$users->education_level) == '2' ? "selected" : "" }}>Graduate</option>
                      <option value="3" {{ old('education_level',$users->education_level) == '3' ? "selected" : "" }}>Post Graduate</option>
                      <option value="4" {{ old('education_level',$users->education_level) == '4' ? "selected" : "" }}>Doctorate</option>
                </select>
              </div>

              <div class="form-group mb-0 col-md-12">
                <label>Address</label>
                <textarea class="form-control" rows="5" name="address" placeholder="Type Your Address">{{ old('address',$users->address) }}</textarea>
              </div>
            </div>
        </div>
        <button class="btn btn-md btn-primary" type="submit">Save Settings</button>
        {{--<a class="btn btn-md btn-primary" href="#">Save Settings</a>--}}
        </form>
      </div>
      </div>
    </div>
  }
</section>
<!-- My Account END -->
@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/intlTelInput.js') }}"></script>
<script type="text/javascript" src="{{ asset('/frontend/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/frontend/js/dashboard/dashboard-my-profile.js') }}"></script>
<script type="text/javascript">
  var cont = '{{ $users->country_code }}';
</script>
@endsection

@section('script')
@endsection

