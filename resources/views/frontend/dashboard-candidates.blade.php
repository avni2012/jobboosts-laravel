@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate')

@section('css')
@endsection
@section('style')
@endsection

@section('content')


    <!--=================================
    Millions of jobs -->
<!-- Dashbord Count START -->
<section>
  @if($get_user_plan == null)
  <div class="container">
    <p>Your plan is expired, Ugrade to create resumes, cover letters, email templtes.</p>
  </div>
  @else
  @php $include = json_decode($get_user_plan->pricing->plan_include); $plan_include = $include->plan_include; @endphp
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row mb-3 mb-lg-5 mt-3 mt-lg-0">
            @if(in_array('Resume-Builder',json_decode($plan_include)))
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="candidates-feature-info bg-dark">
                  <div class="candidates-info-icon text-white">
                    <i class="fas flaticon-resume"></i>
                  </div>
                  <div class="candidates-info-content">
                   <h6 class="candidates-info-title text-white">Resume Builder</h6>
                  </div>
                  <div class="candidates-info-count">
                    <h3 class="mb-0 text-white">{{ $resume_count }}</h3>
                  </div>
                </div>
              </div>
            @endif
            @if(in_array('Cover-Note-Creator',json_decode($plan_include)))
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="candidates-feature-info bg-success">
                  <div class="candidates-info-icon text-white">
                    <i class="fas flaticon-suitcase"></i>
                  </div>
                  <div class="candidates-info-content">
                   <h6 class="candidates-info-title text-white">Cover Letters</h6>
                  </div>
                  <div class="candidates-info-count">
                    <h3 class="mb-0 text-white">{{ $cover_letter_count }}</h3>
                  </div>
                </div>
              </div>
            @endif
            @if(in_array('Email-Templates',json_decode($plan_include)))
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="candidates-feature-info bg-primary">
                  <div class="candidates-info-icon text-white">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="candidates-info-content">
                   <h6 class="candidates-info-title text-white">Email Templates</h6>
                  </div>
                  <div class="candidates-info-count">
                    <h3 class="mb-0 text-white">{{ $email_count }}</h3>
                  </div>
                </div>
              </div>
            @endif
          </div>       
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row mb-3 mb-lg-5 mt-3 mt-lg-0">
            @if(array_key_exists('Job_Search_Training',json_decode($get_user_plan->pricing->plan_include)))
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="candidates-feature-info bg-secondary">
                  <div class="candidates-info-icon text-white">
                    <i class="fas fa-clipboard"></i>
                  </div>
                  <div class="candidates-info-content">
                   <h6 class="candidates-info-title text-white">My Courses</h6>
                  </div>
                  <div class="candidates-info-count">
                    <h3 class="mb-0 text-white">{{ $course_count }}</h3>
                  </div>
                </div>
              </div>
            @endif
            @if(array_key_exists('Job_Search_Training',json_decode($get_user_plan->pricing->plan_include)))
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="candidates-feature-info bg-danger">
                  <div class="candidates-info-icon text-white">
                    <i class="fas fa-book"></i>
                  </div>
                  <div class="candidates-info-content">
                   <h6 class="candidates-info-title text-white">My Sessions</h6>
                  </div>
                  <div class="candidates-info-count">
                    <h3 class="mb-0 text-white">{{ $session_count }}</h3>
                  </div>
                </div>
              </div>
            @endif
          </div>       
      </div>
    </div>
  </div>
  @endif
</section>
<!-- Dashbord Count END -->

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

