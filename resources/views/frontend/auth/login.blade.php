<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="mb-0 text-center">Login to Your Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-register">
                    {{--<fieldset>
                        <legend class="px-2">Choose your Account Type</legend>
                        <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                            <li class="nav-item mr-4">
                                <a class="nav-link active"  data-toggle="tab" href="#candidate" role="tab" aria-selected="false">
                                    <div class="d-flex">
                                        <div class="tab-icon">
                                            <i class="flaticon-users"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="mb-0">Candidate</h6>
                                            <p class="mb-0">Log in as Candidate</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  data-toggle="tab" href="#employer" role="tab" aria-selected="false">
                                    <div class="d-flex">
                                        <div class="tab-icon">
                                            <i class="flaticon-suitcase"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="mb-0">Employer</h6>
                                            <p class="mb-0">Log in as Employer</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </fieldset>--}}
                    <div class="tab-content">
                        <div class="tab-pane active login-form" id="candidate" role="tabpanel">
                            <form class="mt-4" data-parsley-validate method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="Email2">Email Address</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" value="{{old('email')}}">
                                    </div>
                                    {{-- required data-parsley-required-message="Please provide your email address."
                               data-parsley-email-message="Please provide valid email address." --}}
                                    <div class="form-group col-12">
                                        <label for="password2">Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password" value="{{old('password')}}">
                                    </div>
                                    {{-- required data-parsley-required-message="Please provide your password."
                               data-parsley-password-message="Please provide valid password." --}}
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        {{--<a class="btn btn-primary btn-block" href="#">Sign In</a>--}}
                                        <button class="btn btn-primary d-block w-100" type="submit">Sign In</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                                            {{--<a href="#">Forgot Password?</a>--}}
                                            <a href="javascript:void();" data-toggle="modal" data-target="#forgetpassword" id="forgot_password">
                                              Forgot Password?
                                            </a>
                                            <p class="mt-1">Don't have account? <a href="{{ route('register.index') }}">Sign Up here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--<div class="tab-pane fade" id="employer" role="tabpanel">
                            <form class="mt-4">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="Email2">Username / Email Address:</label>
                                        <input type="text" class="form-control" id="Email2">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="password2">Password *</label>
                                        <input type="password" class="form-control" id="password2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-block" href="#">Sign up</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ml-md-3 mt-3 mt-md-0">
                                            <a href="#">Forgot Password?</a>
                                            <div class="custom-control custom-checkbox mt-2">
                                                <input type="checkbox" class="custom-control-input" id="Remember-02">
                                                <label class="custom-control-label" for="Remember-02">Remember Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>--}}
                    </div>
                    <div class="mt-4">
                        <fieldset>
                            <legend class="px-2">Login or Sign up with</legend>
                            <div class="social-login">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li class="facebook text-center">
                                        <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f mr-4"></i>Login with Facebook</a>
                                    </li>
                                    {{--<li class="twitter text-center">
                                        <a href="#"> <i class="fab fa-twitter mr-4"></i>Login with Twitter</a>
                                    </li>--}}
                                    <li class="google text-center">
                                        <a href="{{ url('auth/google') }}"> <i class="fab fa-google mr-4"></i>Login with Google</a>
                                    </li>
                                    {{--<li class="linkedin text-center">
                                        <a href="#"> <i class="fab fa-linkedin-in mr-4"></i>Login with Linkedin</a>
                                    </li>--}}
                                </ul>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>