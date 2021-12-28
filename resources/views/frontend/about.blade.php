@extends('layouts.frontend.master')

@section('title', 'Home')

@section('css')
@endsection
@section('style')
@endsection

@section('content')


    <!--=================================
    Millions of jobs -->
    <section class="space-ptb" style="background-image: url('{{ asset('frontend/images/google-map.png') }}'); background-position: center center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Global Recruitment Experts coach you, in creating your job search plan.</h2>
                </div>
                <div class="col-lg-10">
                    <div class="text-center">
                        <p class="mb-lg-5 mb-4 lead">Developed by Human Resources & talent Acquisition professionals with a combined experience of ore than a 100 years.  Job Boosts aims to help the millions of professionals out there who are taught how to give an interview but are never told how to get one. Created with a lot of research and experience Job Boosts promised to deliver an effective result-oriented job search plan for all participants. Come learn from the best & make your dreams a reality!</p>
                        <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('frontend/images/about/about-img1.png') }}" alt="">
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
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Job Search Coach</h5>
                            <p class="mb-0">The only place where you will be coached on how to search for a job by Global Experts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-profiles"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Job Search Plan</h5>
                            <p class="mb-0">You will be able to develop your own job search plan which will help you achieve your job goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-job-3"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Job Search Tools</h5>
                            <p class="mb-0">Digital tools created to ensure that your application stands out in the crowd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Advertise A Job -->

    <!--=================================
    Why You Choose Job -->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="ab-whych">
                      <img class="img-fluid mb-2 mb-sm-0 w-100" src="{{ asset('frontend/images/about/about-10.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title-02">
                      <h2>Why you should choose job Boosts?</h2>
                      <p>Searching for a job is, a job in itself. It is at times long and frustrating. But you don’t have to go through it alone. Through assistance plans, training &amp; tools Job Boosts ensures that you will stand out &amp; be noticed in the crowd.</p>
                    </div>
                    <div class="row mt-sm-5 mt-4">
                      <div class="col-md-6">
                        <div class="d-flex mb-lg-5 mb-4">
                          <i class="font-xlll text-primary flaticon-team"></i>
                          <h5 class="pl-3 align-self-center mb-0">Experienced Coaches</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-flex mb-lg-5 mb-4">
                          <i class="font-xlll text-primary flaticon-chat"></i>
                          <h5 class="pl-3 align-self-center mb-0">Powerful Tools</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-flex mb-md-0 mb-4">
                          <i class="font-xlll text-primary flaticon-job-3"></i>
                          <h5 class="pl-3 align-self-center mb-0">Easy &amp; Simple  to use</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-flex">
                          <i class="font-xlll text-primary flaticon-job-2"></i>
                          <h5 class="pl-3 align-self-center mb-0">Pricing to suit all budgets</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                {{--<div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="row">
                        <div class="col-sm-7">
                            <img class="img-fluid mb-2 mb-sm-0 w-100" src="{{ asset('frontend/images/about/01.png') }}" alt="">
                        </div>
                        <div class="col-sm-5 mt-4">
                            <img class="img-fluid mb-2 w-100" src="{{ asset('frontend/images/about/02.png') }}" alt="">
                            <div class=" mt-4">
                                <a class="popup-icon bg-holder bg-overlay-black-70" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                                    <i class="flaticon-play-button"></i>
                                    <img class="img-fluid w-100" src="{{ asset('frontend/images/about/03.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title-02">
                        <h2>Why You Choose Job Boosts?</h2>
                        <p>Searching for a job is, a job in itself. It is at times long and frustrating. But you don’t have to go through it alone. Through assistance plans, training & tools Job Boosts ensures that you will stand out & be noticed in the crowd.</p>
                    </div>
                    <div class="row mt-sm-5 mt-4">
                        <div class="col-md-6">
                            <div class="d-flex mb-lg-5 mb-4">
                                <i class="font-xlll text-primary flaticon-team"></i>
                                <h5 class="pl-3 align-self-center mb-0">Experienced Coaches</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-lg-5 mb-4">
                                <i class="font-xlll text-primary flaticon-chat"></i>
                                <h5 class="pl-3 align-self-center mb-0">Powerful Tools</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-md-0 mb-4">
                                <i class="font-xlll text-primary flaticon-job-3"></i>
                                <h5 class="pl-3 align-self-center mb-0">Easy & Simple  to use</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <i class="font-xlll text-primary flaticon-job-2"></i>
                                <h5 class="pl-3 align-self-center mb-0">Pricing to suit all budgets</h5>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    <!--=================================
    Why You Choose Job -->

    <!--=================================
    counter -->
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-dark py-5">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-lg-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="flaticon-curriculum"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ config('services.sign_ups_per_day_starts_with') }}" data-speed="10000">1227</span>
                                        <label class="mb-0 text-white">Signups a day</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-lg-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="flaticon-resume"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ config('services.resume_built_starts_with') }}" data-speed="10000">12302</span>
                                        <label class="mb-0 text-white">Resumes built</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-sm-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="flaticon-suitcase"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ config('services.cover_letters_starts_with') }}" data-speed="10000">170</span>
                                        <label class="mb-0 text-white">Cover Letters</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter justify-content-center">
                                    <div class="counter-icon">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ config('services.email_templates_starts_with') }}" data-speed="10000">127</span>
                                        <label class="mb-0 text-white">Email Templates</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    counter -->

    <!--=================================
    Testimonial -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-12 text-center">
                    <div class="owl-carousel owl-nav-top-center" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                        <div class="item">
                            <div class="testimonial-item text-center">
                                <div class="avatar">
                                    <img class="img-fluid rounded-circle" src="{{ asset('frontend/images/avatar/04.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                                <div class="testimonial-name">
                                    <i class="fas fa-quote-left quotes"></i>
                                    <h6 class="mb-1">Lorem Ipsum</h6>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item text-center">
                                <div class="avatar">
                                    <img class="img-fluid rounded-circle" src="{{ asset('frontend/images/avatar/02.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                                <div class="testimonial-name">
                                    <i class="fas fa-quote-left quotes"></i>
                                    <h6 class="mb-1">Lorem Ipsum</h6>
                                    <span>Graphic Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Testimonial -->

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

