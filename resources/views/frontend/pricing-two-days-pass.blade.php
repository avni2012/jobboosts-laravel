@extends('layouts.frontend.master')

@section('title', 'Pricing Two Days Pass')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<section class="daypass-pb">
  <div class="container">
    <div class="row align-items-center">
      <h2>Not sure? Get our 2 days pass & experience Job Boosts.</h2>
      <div class="col-lg-7">
        <div class="section-title-02 login-user-subscribe">
        <p>The 2 Days pass is our way of helping you decide if you would like to take up our offer to help you find the job that you are looking for. In the 2 days pass you will get the following :</p>
        <p>
          <ul>
            <li>
              Access to Premium content – blogs & guides which you can read & learn from.
            </li>
            <li>
              Use of Job Search Tool – the Resume Builder, to help you create a resume that will stand out & get you noticed by recruiters.
            </li>
            <li>
              Free access to 1 premium On-Demand learning conducted by our Founder & Chief Coach Dr. Gaurav Hirey where he introduces you to the high impact result oriented SOAR methodology that you can adopt in your job search.
            </li>
          </ul>
        </p>
        <p>So what are you waiting for? This is where you can change the game when it comes to looking for a job! Also if you decide to upgrade within 30days the amount you pay will be adjusted against the other packages that you subscribe to! Thousands are already powering their job search! Get Started NOW!!</p>
      </div>
      </div>
      <div class="col-lg-5 mt-4 mt-lg-0">
        <img class="img-fluid" src="{{ asset('/frontend/images/about-02.jpg') }}" alt="">
      </div>
    </div>
  </div>
</section>

<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="p-4 p-sm-5 bg-dark">
          <div class="row align-items-center">
            <div class="col-md-10">
              <h4 class=" text-white mb-3">Try our value adding 2 days pass & experience Job Boosts today!</h4>
              <p class="text-white mb-0">You can use this pass to make your own impressive Resume and also attend the On-Demand webinar on the High Impact, Result Oriented SOAR methodology developed by our Founder & Chief Coach Dr. Gaurav Hirey.</p>
            </div>
            <div class="col-md-2 text-md-right mt-4 mt-md-0">
            @if(Auth::guard('users')->user())
                @if(!empty($pricing_details))
                  @if(($pricing_details->PricingSubscriptions['pricing_id'] == 1) && ($pricing_details->PricingSubscriptions['payment_status'] == 1))
                    <button class="btn btn-success mt-3 mb-3 mb-lg-0" type="" disabled="">Subscribed</button>
                  @else
                      <a class="btn btn-primary mt-3 mb-3 mb-lg-0" type="submit" href="{{ route('dashboard-candidates-pricing') }}">Go to my account</a>
                  @endif
                @else
                  <a class="btn btn-primary mt-3 mb-3 mb-lg-0" href="{{ route('register.index',['plan' => $pricing_details->plan_slug]) }}">Get Started</a>
                @endif
              @else
              <a class="btn btn-primary mt-3 mb-3 mb-lg-0" href="{{ route('register.index',['plan' => $pricing->plan_slug]) }}">Get Started</a>
            @endif
              {{--<a class="btn btn-white" href="#">Get Started</a>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('layouts.frontend.includes.popup')

@endsection

@section('script-js-last')
<script src="{{ asset('frontend/js/pricing/pricing.js') }}"></script>
@endsection

@section('script')
@endsection

