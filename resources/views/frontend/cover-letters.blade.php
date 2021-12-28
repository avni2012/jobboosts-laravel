@extends('layouts.frontend.master')

@section('title', 'Cover Letters')

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
                    <h2 class="mb-4">Job Boosts Cover Letters</h2>
                    <p class="mb-4 lead">With Job Boosts Cover Letters you do not have to second-guess to make an impression.</p>
                    <a class="btn btn-warning-cover" href="{{ route('cover-letter-example') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Browse Cover Letter Example</a>
                    <a class="btn btn-warning-cover" href="{{ route('cover-letter-design-template') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Choose Design Template</a>
                </div>
                <div class="col-md-6">
                    <div class="text-center">

                        <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('frontend/images/cover-letter-intro.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('frontend/images/step/browse-cover-letter.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Browse through Cover Letter Example</h5>
                            <p class="mb-0">Add your personalized information using suggestions from our coaches.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/choose-template.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Choose Design Template</h5>
                            <p class="mb-0">Emphasize on the look and feel of your Cover Letters with attractive templates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('frontend/images/step/customize-cover-letter.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-warning-cover">Customize your Cover Letter</h5>
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
                    <div class="section-title center cover-section-title">
                        <h2 class="title">Job Boosts Cover Letters</h2>
                        <p class="lead">With Job Boosts Cover Letters create the perfect  letters to help you get your dream job. Choose from 20+ impressive templates and add details to tell your story better.
                            Try it today!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom nav-pills-cover" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                        <a class="nav-link mb-3 p-4 shadow colorrb active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-lightbulb mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Intelligent</span></a>

                        <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Instant</span></a>

                        <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fa fa-check mr-2"></i>
                            <span class="font-weight-bold text-uppercase">Impactful</span></a>
                    </div>
                </div>


                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/Intelligent.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Use storytelling to customize your skills and experience for the job that you’ve been waiting for.
                                        <br>
                                        Job Boosts Cover Letters are easy-to-use, simple and effective and enable you to confidently place your application.</p>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead">With over 20+ stunning templates supervised by our Recruitment Experts,  Job Boosts Cover Letters tell your story instantly .
                                        <br>
                                        These templates can be created, edited and accessed anyplace, anywhere and at all times.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/instant.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view z-depth-1">
                                        <img src="{{ asset('frontend/images/features/impact-full.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">With meticulously researched tips and ready-made content by our Recruitment Experts,
                                        Job Boosts Cover Letters help you boost your chances of getting the job and achieving your goals faster.
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
                    <div class="section-title center cover-section-title">
                        <h2 class="title">Your Cover Letter. Remodeled.</h2>
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
                        <p class="lead">Job Boosts Cover Letters. Your personalized writer.
                            Use storytelling to customize skills and experience for the job that you’ve waited on for long.
                            <br>
                            Get user-friendly, ready-to-use, impressive templates and confidently put your application.

                        </p>
                        <div class="text-xs-center">
                            <!-- <a class="btn btn-warning-cover my-4" href="#">Create Your Resume</a> -->
                            <a class="btn btn-warning-cover my-4" href="{{ route('cover-letter-example') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Create Your Cover Letter</a>
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

