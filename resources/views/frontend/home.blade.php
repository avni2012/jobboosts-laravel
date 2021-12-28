@extends('layouts.frontend.master')

@section('title', 'Home')

@section('css')
@endsection
@section('style')
@endsection

@section('content')
    <!--=================================
Banner -->
    @if(count($images) > 0)
        @include('layouts.frontend.includes.banner', compact('images'))
    @endif
    <!--=================================
Banner -->

    <!--=================================
    Category-style -->
    @include('layouts.frontend.includes.category')
    <!--=================================
Category-style -->

    <!--=================================
    Feature box -->
    @include('layouts.frontend.includes.feature-box')
    <!--=================================
Feature box -->

    <!--=================================
    Browse listing  -->
    @include('layouts.frontend.includes.browse')
    <!--=================================
Browse listing -->

    <!--=================================
    Employers  -->
    @include('layouts.frontend.includes.coaches', compact('coaches'))
    <!--=================================
Employers  -->

    <!--=================================
    Companies Detail  -->
    <!-- <section class="space-ptb bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="section-title">
              <h2 class="title">Companies Hiring Now</h2>
              <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
              <div class="item">
                <div class="row align-items-center bg-white">
                  <div class="col-xl-4 col-lg-5">
                    <div class="companies-img">
                      <img class="img-fluid" src="images/about/about-03.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-xl-8 col-lg-7">
                    <div class="companies-info d-sm-flex">
                      <div class="companies-details">
                        <div class="companies-name">
                          <div class="d-flex mb-3">
                            <div class="companies-logo border mr-3">
                              <img class="img-fluid" src="images/svg/01.svg" alt="">
                            </div>
                            <div class="employers-list-option">
                              <h5>Pendragon Green Ltd</h5>
                              <p class="mb-0"><i class="fas fa-map-marker-alt pr-1"></i> Needham, MA</p>
                              <div class="d-flex">
                                <ul class="list-unstyled mb-0  d-flex mr-1">
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                </ul>
                                <small class="align-self-center">current employer 5</small>
                              </div>
                            </div>
                          </div>
                          <p>We know this in our gut, but what can we do about it? How can we motivate ourselves? One of the most difficult aspects of achieving success is staying motivated over the long haul.</p>
                          <a href="#" class="btn btn-primary">View Profile</a>
                          <a href="#" class="btn btn-outline-primary">Follow</a>
                        </div>
                      </div>
                      <div class="companies-counter border-left p-3">
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer" data-to="1227" data-speed="10000">1227</span>
                            <label class="mb-0">Jobs Posted</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="123" data-speed="10000">123</span>
                            <label class="mb-0">Jobs Filled</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="129" data-speed="10000">129</span>
                            <label class="mb-0">Members</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="159" data-speed="10000">159</span>
                            <label class="mb-0">Companies</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row align-items-center bg-white">
                  <div class="col-xl-4 col-lg-5">
                    <div class="companies-img">
                      <img class="img-fluid" src="images/about/about-06.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-xl-8 col-lg-7">
                    <div class="companies-info d-sm-flex">
                      <div class="companies-details">
                        <div class="companies-name">
                          <div class="d-flex mb-3">
                            <div class="companies-logo border mr-3">
                              <img class="img-fluid" src="images/svg/02.svg" alt="">
                            </div>
                            <div class="employers-list-option">
                              <h5>Fast Systems Consultants</h5>
                              <p class="mb-0"><i class="fas fa-map-marker-alt pr-1"></i> Wellesley Rd, London</p>
                              <div class="d-flex">
                                <ul class="list-unstyled mb-0  d-flex mr-1">
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                  <li><i class="fas fa-star"></i></li>
                                </ul>
                                <small class="align-self-center">current employer 5</small>
                              </div>
                            </div>
                          </div>
                          <p>We know this in our gut, but what can we do about it? How can we motivate ourselves? One of the most difficult aspects of achieving success is staying motivated over the long haul.</p>
                          <a href="#" class="btn btn-primary">View Profile</a>
                          <a href="#" class="btn btn-outline-primary">Follow</a>
                        </div>
                      </div>
                      <div class="companies-counter border-left p-3">
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer" data-to="1137" data-speed="10000">1137</span>
                            <label class="mb-0">Jobs Posted</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="137" data-speed="10000">137</span>
                            <label class="mb-0">Jobs Filled</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="109" data-speed="10000">109</span>
                            <label class="mb-0">Members</label>
                          </div>
                        </div>
                        <div class="counter py-2">
                          <div class="counter-content">
                            <span class="timer mb-1" data-to="167" data-speed="10000">167</span>
                            <label class="mb-0">Companies</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!--=================================
    Companies Detail  -->

    <!--=================================
    Top Companies  -->
    <!-- <section class="space-ptb employers-box">
      <div class="container">
        <div class="row">
          <div class="col-md-12 justify-content-center">
           <div class="section-title center">
             <h2 class="title">Apply to thousands of jobs with one profile</h2>
             <p>We know this in our gut, but what can we do about it?</p>
           </div>
          </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-lg-0">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/07.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h6 class="mb-0"><a href="#">Trout Design Ltd</a></h6>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-md-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/08.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Lawn Hopper</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fas fa-map-marker-alt pr-1"></i>Needham, MA</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-lg-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/09.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Trout Design Ltd</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-md-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/10.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Lawn Hopper</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fas fa-map-marker-alt pr-1"></i>Needham, MA</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-lg-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/11.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Rippin LLC</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fas fa-map-marker-alt pr-1"></i>Park Avenue, Mumbai</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-lg-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/15.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Trophy and Sons</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fas fa-map-marker-alt pr-1"></i>Green Lanes, London</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-md-0 pb-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/13.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Lawn Hopper</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li class="mb-md-0"><i class="fas fa-map-marker-alt pr-1"></i>Needham, MA</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-lg-0 pb-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/14.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Rippin LLC</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li class="mb-md-0"><i class="fas fa-map-marker-alt pr-1"></i>Park Avenue, Mumbai</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-sm-0 pb-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/12.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Trout Design Ltd</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li class="mb-md-0"><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-sm-0 pb-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/16.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Trophy and Sons</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li class="mb-sm-0"><i class="fas fa-map-marker-alt pr-1"></i>Green Lanes, London</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid mb-3 mb-sm-0 pb-0">
                  <div class="employers-list-logo">
                    <img class="img-fluid" src="images/svg/17.svg" alt="">
                  </div>
                  <div class="employers-list-details">
                    <div class="employers-list-info">
                      <div class="employers-list-title">
                        <h6 class="mb-0"><a href="#">Lawn Hopper</a></h6>
                      </div>
                      <div class="employers-list-option">
                        <ul class="list-unstyled">
                          <li class="mb-sm-0"><i class="fas fa-map-marker-alt pr-1"></i>Needham, MA</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="employers-grid pb-0">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/18.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h6 class="mb-0"><a href="#">Trout Design Ltd</a></h6>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li class="mb-0"><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section> -->
    <!--=================================
    Top Companies  -->


    <!--=================================
    Easiest Way to Use -->
    @include('layouts.frontend.includes.how-it-works')
    <!--=================================
Easiest Way to Use -->

    <!--=================================
    Action box & Counter -->
    @include('layouts.frontend.includes.action-box')
    <!--=================================
Action box & Counter -->
    
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

