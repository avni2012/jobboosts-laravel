@extends('layouts.frontend.master')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/intlTelInput.css') }}">
@endsection
@section('style')
<style type="text/css">
    .iti-flag {
        background-image:url("{{ asset('/frontend/images/flags.png') }}");
    }
    .coupon-success{
        color: green;
    }
    .coupon-error{
        color: red;
    }
    @media (min-width: 992px){
        .remove-cpn{
            position: absolute;
            bottom: 43px;
            right: -189px;
        }
    }
</style>
@endsection

@section('content')

    <!--=================================
Register -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="login-register">
                        <div class="section-title">
                            <h4 class="text-center">Create Your Account</h4>
                        </div>
                        {{--<fieldset>
                            <legend class="px-2">Choose your Account Type</legend>
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                                <li class="nav-item mr-4">
                                    <a class="nav-link active"  data-toggle="tab" href="#candidate" role="tab" >
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h6 class="mb-0">Candidate</h6>
                                                <p class="mb-0">I want to discover companies.</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item ml-auto">
                                    <a class="nav-link" data-toggle="tab" href="#employer" role="tab">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-suitcase"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h6 class="mb-0">Employer</h6>
                                                <p class="mb-0">I want to attract the best talent.</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>--}}
                        <div class="tab-content">
                            <div class="tab-pane active register-user" id="candidate" role="tabpanel">
                                <form class="mt-4" method="POST" action="{{ route('register.submit') }}" id="registerForm"> 
                                    @csrf
                                    <div class="form-row position-relative">
                                        <div class="form-group col-md-6">
                                            <label for="Username">Full Name</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email Address</label><span class="text-danger">*</span><span class="change-email" style="float:right;"></span>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        </div>
                                        
                                        <div class="form-group col-md-6 otp-verification" style="display: none;">
                                            <label>OTP</label>
                                            <input type="number" class="form-control" id="otp" placeholder="Enter Your OTP" name="otp" min="0">                 
                                        </div>
                                        <div class="form-group col-md-6 mt-2 otp-verification" id="OTP_btn" style="display: none;">
                                            <label></label>
                                            <div class="row">
                                                <div class="col">
                                                    <button id="validate_otp" class="btn btn-primary d-block w-80" type="button">Validate</button>
                                                </div>
                                                <div class="col">
                                                    <button id="resend_otp" class="btn btn-primary d-block w-80" type="button" disabled="">Resend</button>
                                                </div>
                                                <div class="col time-c" style="display: none;"><span id="timer"></span>&nbsp;Sec. Left</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label><span class="text-danger">*</span>
                                            <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password2">Confirm Password</label><span class="text-danger">*</span>
                                            <input type="password" class="form-control" id="confirm_password" placeholder="Enter Your Password Again" name="confirm_password" value="{{old('confirm_password')}}">
                                        @if($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6" id="cont_id">
                                            <label for="phone">Country Code & Contact</label><span class="text-danger">*</span>
                                            <input type="tel" class="form-control" name="mobile_no" id="mobile_no" value="{{old('mobile_no')}}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                            <input type="hidden" name="country_code" id="country_code" value="91">
                                        </div>
                                        <div class="form-group col-md-6 select-border">
                                            <label for="sector">Function</label><span class="text-danger">*</span>
                                            <select class="form-control" name="industry">
                                                <option value="" selected>Select Function</option>
                                                @if(!empty($industry))
                                                @foreach($industry as $ind)
                                                    <option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? "selected" : "" }}>{{ $ind->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('industry'))
                                                <span class="text-danger">{{ $errors->first('industry') }}</span>
                                            @endif
                                        </div>
                                        {{--<div class="form-group col-12">
                                            <label for="phone">Phone</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="mobile_no" placeholder="Enter Your Mobile Number" name="mobile_no" value="{{old('mobile_no')}}">
                                        @if($errors->has('mobile_no'))
                                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                        @endif
                                        </div>--}}
                                        <div class="form-group col-md-6 select-border">
                                            <label for="sector">Plans</label><span class="text-danger">*</span>
                                            <select class="form-control" name="plan" id="pricing_plans">
                                                <option value="" selected>Select Plan</option>
                                                @if(!empty($pricing))
                                                @foreach($pricing as $plans)
                                                    <option value="{{ $plans->id }}" {{ old('plan') == $plans->id ? "selected" : "" }} @if(Request::has('plan') && ($select_plan == $plans->plan_slug)) {{ "selected" }} @elseif(Session::has('coupon') && (session('coupon.plan_id') == $plans->id)) {{ "selected" }} @endif>{{ $plans->plan_name }} - ₹ {{ $plans->discounted_price }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('plan'))
                                                <span class="text-danger">{{ $errors->first('plan') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-3 select-border">
                                            <label for="sector">Have a coupon code?</label>
                                            <input type="text" class="form-control" id="coupon_code" placeholder="Coupon code" name="coupon_code" value="@if(Session::has('coupon')){{ session('coupon.coupon_code') }}@else{{old('coupon_code')}}@endif" @if(Session::has('coupon')) readonly="" @endif>
                                            <span class="coupon-success"></span>
                                            <span class="coupon-error"></span>                           
                                        </div>
                                        <div class="form-group col-md-3 select-border">
                                            <label for="sector">&nbsp;</label>
                                            <button class="btn btn-primary d-block w-100" type="button" onclick="ApplyCoupon()" id="apply_coupon" @if(Session::has('coupon')) disabled="" @endif>Apply Coupon</button> 
                                        </div>
                                        <div class="form-group col-md-3 select-border remove-cpn">
                                            <div class="remove-coupon">
                                                @if(Session::has('coupon'))
                                                    <button class="btn btn-primary d-block w-100" type="button" id="remove_coupon">Remove</button>
                                                @endif
                                            </div>
                                        </div>
                                        {{--<div class="form-group col-md-6">
                                            <label for="Username">Full Name (Used for resume builder)</label>
                                            <input type="text" class="form-control" id="resume_fullname" placeholder="Enter Your Name" name="resume_fullname" value="{{old('resume_fullname')}}">
                                        @if($errors->has('resume_fullname'))
                                            <span class="text-danger">{{ $errors->first('resume_fullname') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email Address (Used for resume builder)</label>
                                            <input type="email" class="form-control" id="resume_email" placeholder="Enter Your Email Address" name="resume_email" value="{{old('resume_email')}}">
                                        @if($errors->has('resume_email'))
                                            <span class="text-danger">{{ $errors->first('resume_email') }}</span>
                                        @endif
                                        </div>--}}
                                        {{--<div id="VerifyOTP" class="row">
                                            <div class="form-group col-md-6">
                                                <label>OTP</label>
                                                <input type="number" class="form-control" id="otp" placeholder="Enter Your OTP" name="otp" min="0">
                                                <div>Time left = <span id="timer"></span></div>
                                            </div>
                                            <div class="form-group col-md-6 mt-2" id="OTP_btn">
                                                <label></label>
                                                <button id="validate_otp" class="btn btn-primary d-block w-80" type="button">Validate</button>
                                                <button id="resend_otp" class="btn btn-primary d-block w-80" type="button" disabled="">Resend OTP</button>
                                            </div>
                                        </div>--}}
                                        <div class="form-group col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="agree_terms" id="agree_terms" {{ old('agree_terms') ? 'checked' : null }}>
                                                <label class="custom-control-label" for="agree_terms">I accept your <a href="{{ route('terms-conditions') }}" target="_blank">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy</a></label>
                                                @if($errors->has('agree_terms'))
                                                    <span class="text-danger">{{ $errors->first('agree_terms') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            {{--<a class="btn btn-primary d-block" href="#">Sign up</a>--}}
                                            <button class="btn btn-primary d-block w-100" type="submit" disabled="disabled" id="register_user">Sign up</button>
                                        </div>
                                        <div class="col-md-6 text-md-right mt-2 text-center">
                                            <p>Already registered? <a href="#" data-toggle="modal" data-target="#exampleModalCenter"> Sign in here</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--<div class="tab-pane fade" id="employer" role="tabpanel">
                                <form class="mt-4">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Username *</label>
                                            <input type="text" class="form-control" id="Username">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email Address *</label>
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" id="Password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password2">Confirm Password *</label>
                                            <input type="password" class="form-control" id="password2">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="sector">Select Sector</label>
                                            <input type="text" class="form-control" id="sector">
                                        </div>
                                        <div class="form-group col-12 mt-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="accepts-02">
                                                <label class="custom-control-label" for="accepts-02">you accept our Terms and Conditions and Privacy Policy</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-block" href="#">Sign up</a>
                                        </div>
                                        <div class="col-md-6 text-md-right mt-2 text-center">
                                            <a href="#">Already have an account?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>--}}
                        </div>
                        {{--<div class="mt-4">
                            <fieldset>
                                <legend class="px-2">Login or Sign up with</legend>
                                <div class="social-login">
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li class="facebook text-center">
                                            <a href="#"> <i class="fab fa-facebook-f mr-4"></i>Login with Facebook</a>
                                        </li>
                                        <li class="twitter text-center">
                                            <a href="#"> <i class="fab fa-twitter mr-4"></i>Login with Twitter</a>
                                        </li>
                                        <li class="google text-center">
                                            <a href="#"> <i class="fab fa-google mr-4"></i>Login with Google</a>
                                        </li>
                                        <li class="linkedin text-center">
                                            <a href="#"> <i class="fab fa-linkedin-in mr-4"></i>Login with Linkedin</a>
                                        </li>
                                    </ul>
                                </div>
                            </fieldset>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Register -->

    <!--=================================
    Action box & Counter -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-sm-5 mb-lg-0">
                    <div class="d-sm-flex">
                        <!-- <div class="align-self-center footer-top-logo"><img class="img-fluid" src="images/logo-dark.svg" alt=""></div> -->
                        <div class="pl-sm-3 ml-sm-3 mt-3 mt-sm-0 border-sm-left "><h5>
                                Thousands are boosting their job search.
                                <strong>Sign up</strong> now!

                            </h5></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="counter mb-4 mb-sm-0">
                                <div class="counter-icon">
                                    <i class="flaticon-team"></i>
                                </div>
                                <div class="counter-content">
                                    <span class="timer mb-1 text-dark" data-to="1562" data-speed="10000">1,5620</span>
                                    <label class="mb-0">Resumes built</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class="flaticon-job-3"></i>
                                </div>
                                <div class="counter-content">
                                    <span class="timer mb-1 text-dark" data-to="240" data-speed="10000">1240</span>
                                    <label class="mb-0">Signups a day</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Action box & Counter -->

@endsection

@section('script-js-last')
<script type="text/javascript">
    // var RAZORPAY_KEY = "{{config('razorpay.api_key')}}";
</script>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="{{ asset('/frontend/js/intlTelInput.js') }}"></script>
<script>
    /*var input = document.querySelector("#country_code");
    window.intlTelInput(input);*/
    /*$(document).ready(function(){ 
        @if (session('message.level'))
            @if(session('message.level') == 'success')
                swal("Success!", "{{ session('message.content') }}!", "success");
            @endif
            @if(session('message.level') == 'danger')
                swal("Oops!", "{{ session('message.content') }}!", "error");
            @endif
            @if(session('message.level') == 'warning')
                swal("Warning!", "{{ session('message.content') }}!", "warning");
            @endif
        @endif
    });*/
</script>
@endsection

