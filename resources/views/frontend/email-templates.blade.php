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
                    <p class="subtext text-warning-cover">Intelligent, Instant, Impactful.</p>
                    <h2 class="mb-4">Job Boosts Emails</h2>
                    <p class="mb-4 lead">Let Job Boosts help you make a memorable first impression to your potential employer for your dream job.
                    </p>
                    <a class="btn btn-primary" href="{{ route('email-cover-letter') }}" ><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Get Started</a>

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
    {{--<section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/template-01.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Pick a template</h5>
                            <p class="mb-0">Choose from over 20+ professional resume templates created by industry experts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/template-01.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Fill in the blanks</h5>
                            <p class="mb-0">Add your personalized information using suggestions from our coaches.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/template-01.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Customize your Resume</h5>
                            <p class="mb-0">Emphasize on the content and look of your emails with attractive templates.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!--=================================
    Advertise A Job -->

    <!-- Demo header-->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center email-section-title">
                        <h2 class="title">Job Boosts Email Templates</h2>
                        <p class="lead">With Job Boosts Templates create emails that are perfect to help you get your dream job. Choose from 20 and more  innovative templates built by recruitment  experts for various situations. Try it today!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom nav-pills-email" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link mb-3 p-4 shadow active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
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


                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/feature-01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Intelligent ready to use templates that help you customize your application for specific situations or people and help them to get to know you better.</p>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead">The recruitment experts at Job Boosts have 20+ creative, ready-made Email Templates that can be instantly accessed from anywhere , anyplace and at all times.
                                    </p>
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
                                    <p class="lead">A well-drafted application email can leave a lasting impression on your employer.
                                        <br>
                                        The experts at Job Boosts have created the perfect situational email templates to help you apply and pitch for your dream job.
                                    </p>
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
                    <div class="section-title center email-section-title">
                        <h2 class="title">Your Emails. Situationally Correct</h2>
                        <!-- <p>Use our tools to boost your resume, sharpen your communications & impress potential employers</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 p-4">
                    <div class="view z-depth-1 text-center mx-5">
                        <img src="{{ asset('frontend/images/resume-redefined-cover-email.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title mb-3">
                        <p class="lead">Get user-friendly, ready-to-use, email templates to meet your communication needs for any situation that may arise during your Job Search. <br>
                            Job Boosts Email Templates are always ready to go! Just identify the situation, choose the template, modify it & impress the recruiter or the hiring manager to leave a lasting impression.

                        </p>
                        <div class="text-xs-center">
                            <a class="btn btn-primary my-4" href="{{ route('email-cover-letter') }}">Boost Your Job Search Today!</a>
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

