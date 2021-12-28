@extends('layouts.frontend.master')

@section('title', 'Register')

@section('css')
@endsection
@section('style')
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
                                <form class="mt-4" method="POST" action="{{ route('register.submit') }}" data-parsley-validate data-parsley-trigger="keyup"> 
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Username">Full Name *</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required pattern="/^[a-zA-Z ]*$/" data-parsley-required-message="Please provide your name."
                               data-parsley-pattern-message="Please provide valid name." value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email Address *</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" required data-parsley-required-message="Please provide your email address."
                               data-parsley-email-message="Please provide valid email address." value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password" required data-parsley-required-message="Please provide your password."
                               data-parsley-password-message="Please provide valid password." value="{{old('password')}}" data-parsley-minlength="8" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1">
                                        @if($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password2">Confirm Password *</label>
                                            <input type="password" class="form-control" id="confirm_password" placeholder="Enter Your Confirm Password" name="confirm_password" required data-parsley-required-message="Please provide your confirm password."
                               data-parsley-password-message="Please provide valid password." value="{{old('confirm_password')}}" data-parsley-minlength="8" data-parsley-equalto="#password">
                                        @if($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="mobile_no" placeholder="Enter Your Mobile Number" name="mobile_no" pattern="/^[0-9]*$/" required minlength="6" maxlength="16"
                               data-parsley-required-message="Please provide your mobile number." data-parsley-pattern-message="Please provide valid mobile no." value="{{old('mobile_no')}}">
                                        @if($errors->has('mobile_no'))
                                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-12 select-border">
                                            <label for="sector">Plans</label>
                                            <select class="form-control" name="plan" required data-parsley-required="true" data-parsley-required-message="Plan is required.">
                                                <option value="" selected>Select Plan</option>
                                                @foreach($pricing as $plans)
                                                    <option value="{{ $plans->id }}" {{ old('plan') == $plans->id ? "selected" : "" }} @if(Request::has('plan')) @if($select_plan == $plans->plan_slug) {{ "selected" }} @endif @endif>{{ $plans->plan_name }} - ₹ {{ $plans->discounted_price }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('plan'))
                                                <span class="text-danger">{{ $errors->first('plan') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="agree_terms" id="agree_terms" required {{ old('agree_terms') ? 'checked' : null }}>
                                                <label class="custom-control-label" for="agree_terms">you accept our <a href="{{ route('terms-conditions') }}">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}">Privacy Policy</a></label>
                                                @if($errors->has('agree_terms'))
                                                    <span class="text-danger">{{ $errors->first('agree_terms') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            {{--<a class="btn btn-primary d-block" href="#">Sign up</a>--}}
                                            <button class="btn btn-primary d-block w-100" type="submit">Sign up</button>
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
@endsection

@section('script')
{{--<script type="text/javascript" src="{{ asset('/frontend/js/parsley-password-validation.js') }}"></script>--}}
<script>
    $(document).ready(function(){
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
    });
</script>
@endsection

