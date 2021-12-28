@extends('layouts.frontend.master')

@section('title', 'Contact Us')

@section('css') @endsection
@section('style') @endsection

@section('content')

    <!--=================================
    feature-info -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-border p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-placeholder"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Address</h5>
                            <span class="d-block">@if(!empty($contact)){{ $contact->web_address }}@endif</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-border p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-contact fa-flip-horizontal"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Phone Number</h5>
                            <span class="d-block">@if(!empty($contact)){{ $contact->mob_no }}@endif</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-border p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-approval"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Email</h5>
                            <span class="d-block">@if(!empty($contact)){{ $contact->web_email }}@endif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    feature-info -->

    <!--=================================
    Let’s Get In Touch -->
    <section class="space-ptb pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-02 text-center">
                        <h2>Let’s Get In Touch!</h2>
                        <p>We have completed over a 1000+ projects for five hundred clients. Give us your next project.</p>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('contact-us.submit') }}" data-parsley-validate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required pattern="/^[a-zA-Z ]*$/" data-parsley-required-message="Please provide your name."
                               data-parsley-pattern-message="Please provide valid name." value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control" name="subject" id="subject" required data-parsley-required-message="Please provide subject.">
                            <option value="">Select Subject</option>
                            @foreach($contact_us_categories as $contact_us_category)
                                <option value="{{ $contact_us_category->id }}" @if($contact_us_category->id == old('subject')) selected @endif>{{ $contact_us_category->category }}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" required data-parsley-required-message="Please provide subject." value="{{old('subject')}}">--}}
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" required data-parsley-required-message="Please provide your email address."
                               data-parsley-email-message="Please provide valid email address." value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="mobile_no" placeholder="Enter Your Mobile Number" name="mobile_no" pattern="/^[0-9]*$/" required minlength="6" maxlength="16"
                               data-parsley-required-message="Please provide your mobile number." data-parsley-pattern-message="Please provide valid mobile no." value="{{old('mobile_no')}}">
                        @if ($errors->has('mobile_no'))
                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-12 mb-0">
                        <textarea rows="5" class="form-control" id="message" placeholder="Message" name="message" required data-parsley-required-message="Please provide message.">{{old('message')}}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary" type="submit">Send your message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="space-ptb pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-md-0 mb-4">
                        <i class="font-xlll text-primary flaticon-hand-shake"></i>
                        <div class="feature-info-content pl-4">
                            <h5>Chat with Us!</h5>
                            <p class="mb-0">Chat to us online if you have any question.</p>
                            <a class="mt-2 mb-0 d-block" href="#">Click here to open chat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-md-0 mb-4">
                        <i class="font-xlll text-primary flaticon-profiles"></i>
                        <div class="feature-info-content pl-4">
                            <h5>Call Us</h5>
                            <p class="mb-0">Our support agent will work with you to meet your lending needs.</p>
                            <h5 class="mt-2 mb-0">@if(!empty($contact)){{ $contact->mob_no }}@endif</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <i class="font-xlll text-primary flaticon-conversation-1"></i>
                        <div class="feature-info-content pl-4">
                            <h5>Read our latest news</h5>
                            <p class="mb-0">Visit our Blog page and know more about news and career tips</p>
                            <a class="mt-2 mb-0 d-block" href="{{ route('blog') }}">Read Blog post </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Let’s Get In Touch -->


@endsection

@section('script-js-last')
@endsection

@section('script')
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