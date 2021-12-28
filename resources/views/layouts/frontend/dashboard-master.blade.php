<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Job Boosts - Power your job search today" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }}</title>

    @include('layouts.frontend.includes.head')
    @yield('css')
    @yield('style')

</head>
<body>

<!--=================================
Header -->
@include('layouts.frontend.includes.header')
<!--=================================
Header -->
<div class="header-inner bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="candidates-user-info">
          <div class="jobber-user-info">
            <div class="profile-avatar">
              @if(!empty($image))
              @if($image->profile_picture != null)
              <img class="img-fluid" src="{{ asset('/frontend/images/user_profiles/'.$image->profile_picture) }}" alt="Profile">
              <i class="fas fa-pencil-alt" onclick="updateProfilePicture({{ Auth::guard('users')->user()->id }})"></i>
              @else
              <img class="img-fluid" src="{{ asset('/frontend/images/No-image-available.png') }}" alt="Profile">
              <i class="fas fa-pencil-alt" onclick="updateProfilePicture({{ Auth::guard('users')->user()->id }})"></i>
              @endif
              @endif
            </div>
            <div class="profile-avatar-info ml-4 dashboard-iconv">
              <h3>
              @if(Auth::guard('users')->check())
                {{ Auth::guard('users')->user()->name }}
                <input type="hidden" id="userName" value="{{ Auth::guard('users')->user()->name }}">
              @endif
              </h3>
              <ul>
                <li><a href="{{ route('dashboard-candidates-my-profile') }}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                <li><a href="{{ route('dashboard-candidates-change-password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt" aria-hidden="true"></i></a></li>
              </ul>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        @if(!empty($get_user_plan))
        @php $total = 100; $days = ($total/$total_days)*100; $set_days = (int)($days/(10 ** 1)); @endphp
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width:{{ $set_days }}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
            <!-- <span class="progress-bar-number">85%</span> -->
          </div>
        </div>
        @endif
        <div class="candidates-skills">
          @if(!empty($get_user_plan))
          <div class="candidates-skills-info">
            <h3 class="text-primary">{{ $total_days }} days to go</h3>
            <span class="d-block">Plan Valid upto {{ date('jS F, Y', strtotime($get_user_plan->pricing_expiry_date)) }}</span>
          </div>
          @endif
          @if(!empty($user_plan) && $user_plan->pricing_id == 5)
          @else
            <div class="candidates-required-skills ml-auto mt-sm-0 mt-3">
              <a class="btn btn-dark" href="{{ route('dashboard-candidates-pricing') }}">Upgrade Plan</a>
            </div> 
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
    
<!-- Profile Nav menu START -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sticky-top secondary-menu-sticky-top">
          <div class="secondary-menu">
            <ul class="list-unstyled mb-0">
              <li><a class="{{ Request::path() == 'dashboard-candidates' ? 'active' : '' }}" href="{{ route('dashboard-candidates') }}">Dashboard</a></li>
              <li><a class="{{ Request::path() == 'dashboard-candidates-resume-builder' ? 'active' : '' }}" href="{{ route('dashboard-candidates-resume-builder') }}">Resume Builder</a></li>
              <li><a class="{{ Request::path() == 'dashboard-candidates-cover-letter' ? 'active' : '' }}" href="{{ route('dashboard-candidates-cover-letter') }}">Cover Letters</a></li>
              <li><a class="{{ Request::path() == 'dashboard-candidates-email-templates' ? 'active' : '' }}" href="{{ route('dashboard-candidates-email-templates') }}">Email Templates</a></li>
              <li><a class="{{ Request::path() == 'dashboard-candidates-my-courses' ? 'active' : '' }}" href="{{ route('dashboard-candidates-my-courses') }}">My Courses</a></li>
              <li><a class="{{ Request::path() == 'dashboard-candidates-online-coaching' ? 'active' : '' }}" href="{{ route('dashboard-candidates-online-coaching') }}">Online Coaching</a></li>
              {{--<li><a class="{{ Request::path() == 'dashboard-candidates-my-profile' ? 'active' : '' }}" href="{{ route('dashboard-candidates-my-profile') }}">My Profile</a></li>--}}
              <li><a class="{{ Request::path() == 'dashboard-candidates-pricing' ? 'active' : '' }}" href="{{ route('dashboard-candidates-pricing') }}">Pricing Plan</a></li>
              {{--<li><a class="{{ Request::path() == 'dashboard-candidates-change-password' ? 'active' : '' }}" href="{{ route('dashboard-candidates-change-password') }}">Change Password</a></li>
              <li><a href="{{ route('logout') }}">Log Out</a></li>--}}          
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@yield('content')

<!--=================================
    Footer-->
@include('layouts.frontend.includes.footer')
<!--=================================
Footer-->

<!--=================================
Back To Top-->
<div id="back-to-top" class="back-to-top">
    <i class="fas fa-angle-up"></i>
</div>
<!--=================================
Back To Top-->

<!--=================================
Signin Modal Popup -->
@include('frontend.auth.login')
@include('layouts.frontend.includes.popup')
<!--=================================
Signin Modal Popup -->

<!--=================================
Javascript -->
@yield('script-js-last')

@yield('script')

@include('layouts.frontend.includes.scripts')

<script src="{{ asset('/frontend/js/dashboard/dashboard-my-profile.js') }}"></script>
<script type="text/javascript">
  var nm = $("#userName").val();
  var width = $(window).width();
    if (width <= 480) {
      //code for mobile devices
      var name = nm.split(/\s/).reduce((response,word)=> response+=word.slice(0,1),'');
      var upper = name.toUpperCase();
      if(upper.length == 1){
        $("#user_name").text(upper.charAt(0));
      }else{
        $("#user_name").text(upper.substring(0, 2));
      }
    }
</script>
</body>
</html>
