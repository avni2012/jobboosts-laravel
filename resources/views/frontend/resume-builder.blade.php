@extends('layouts.frontend.master')

@section('title', 'Resume Builder')

@section('css')
@endsection
@section('style')
@endsection

@section('content')


    <!--=================================
    Millions of jobs -->
    <section class="space-ptb" style="background-image: url('{{ asset('frontend/images/google-map.png') }}'); background-position: center center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-auto text-xs-center">
                    <p class="subtext text-primary">Intelligent, Instant, Impactful.</p>
                    <h2 class="mb-4">Job Boosts Resumes</h2>
                    <p class="mb-4 lead">Building a resume can be unnerving, hard and stressful. Not anymore -  With the Job Boosts Resume Builder you can make yours  easily. </p>
                    <a class="btn btn-primary" href="{{ route('choose-resume-template') }}" ><i class="fa fa-angle-right" aria-hidden="true"></i> Get Started</a>

                </div>
                <div class="col-md-6">
                    <div class="text-center">

                        <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('frontend/images/resume-builder-intro.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Millions of jobs -->

    <!--=================================
    Advertise A Job -->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/pic-template.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Pick a template.</h5>
                            <p class="mb-0">Choose from over 20+ professional resume templates created by industry experts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/Fill-in-the-blanks.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Fill in the blanks</h5>
                            <p class="mb-0">Fill your personalized information using suggestions from our coaches.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/Customize-your-Resume.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Customize your Resume</h5>
                            <p class="mb-0">Effortlessly enhance the look and feel of your resume.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Advertise A Job -->

    <!-- Demo header-->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">Stand out with Job Boosts Resume Builder</h2>
                        <!-- <p>Job Boosts Resume Builder helps you create resumes quickly and get that dream job. Highlight your skills, accomplishments and brand yourself using 20+ templates. Try it today!</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        {{--<a class="nav-link mb-3 p-4 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-envelope-open-text mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Be Different. Stand Out</span></a>--}}

                        <a class="nav-link mb-3 p-4 shadow active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-lightbulb mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Intelligent</span></a>

                        <a class="nav-link mb-3 p-4 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Instant</span></a>

                        <a class="nav-link mb-3 p-4 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fa fa-check mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Impactful</span></a>
                    </div>
                </div>


                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <h2 class="font-weight-bold mb-3 black-text">Hi! I am the first one.</h2> -->
                                    <p class="lead">Select from our professional, and easy to read Resume Templates. Designs that set you apart and help you stand out in a crowd of applicants.</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/feature-01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/feature-01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Making a resume is difficult but it is needed as it is the most important step towards achieving your dream job. <br>
                                        Using intelligent prompts the Job Boosts Resume Builder can help you personalize your resume and customize it ensuring that your application stands out.</p>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead">Getting a job is stressful, so we at Job Boosts decided that your work of making a resume shouldn’t.
                                        <br>
                                        The Resume Builder allows you to choose from 20+ templates designed by Recruitment  Experts. You can access, edit, download or print your resume anywhere, anyplace and at all times.</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/feature-01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/feature-01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Job Boosts Resume Builder gives you ready to use content and  tips from recruitment experts to help you make a lasting impression.  It helps you boost your chances of getting your dream job.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=================================
    Feature box -->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">Your Resume. Revamped.</h2>
                        <!-- <p>Use our tools to boost your resume, sharpen your communications & impress potential employers</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 p-4">
                    <div class="view z-depth-1 text-center mx-5">
                        <img src="{{ asset('frontend/images/resume-redefined.png') }}" alt=""  class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title mb-3">
                        <p class="lead">Job Boosts Resume Builder. Using dozens of personalized resume templates created by experts highlight your strengths & career achievements  to communicate your potential. <br>
                            Get user-friendly, ready-to-use, impressive  professional designs to let the employers know you're the best fit for the job.
                        </p>
                        <div class="text-xs-center">
                            <a class="btn btn-primary my-4" href="{{ url('/choose-resume-template') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Create Your Resume</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Feature box -->

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

