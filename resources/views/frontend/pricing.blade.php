@extends('layouts.frontend.master')

@section('title', 'Pricing')

@section('css')
@endsection
@section('style')
@endsection

@section('content')


    <!--=================================
    Plans&and Packages -->
    <section class="space-ptb">
<div class="container">
<div class="comparison">
  <table>
    <thead>
      <tr>
        <th class="tl"></th>
        @foreach($pricing_details as $detail)
        <th class="compare-heading">
          {{ $detail->plan_name }}
        </th>
        @endforeach
      </tr>
      <tr>
        <th class="dayasimg">
          <div class="daysimgv">
            <a href="{{ route('two-days-pass') }}">
            <img src="{{ asset('/frontend/images/two-day-pass.png') }}" alt="Days Pass" class="img-fluid">
            </a>
          </div>
        </th>
        @foreach($pricing_details as $detail)
        <th class="price-info">
          <div class="price-was"><i class="fas fa-rupee-sign"></i>{{ number_format((float)$detail->price, 2, '.', '') }}</div>
          <div class="price-now"><span><i class="fas fa-rupee-sign"></i>{{ number_format((float)$detail->discounted_price, 2, '.', '') }}</span></div>
          @if(Auth::guard('users')->check())
            <div class="login-user-subscribe">
                    @csrf
                    @if(!empty($user_plans_active))
                        {{--@if($detail->id == $user_plans_active->pricing_id)
                            <div><button class="btn btn-success btn-md" type="" disabled="">
                            Subscribed</button></div>
                        @else
                            @if($user_plans_active->pricing_id > $detail->id)
                                <div><button class="btn btn-secondary btn-md" disabled="">Not Available</button></div>
                            @endif
                            @if($user_plans_active->pricing_id < $detail->id)
                                <div><button class="btn btn-primary btn-md" type="submit" onclick="subscribePlan('{{ $detail->plan_slug }}',{{ $detail->discounted_price }})">Upgrade</button></div>
                            @endif
                        @endif--}}
                    @else
                        <div><button class="btn btn-primary btn-md" type="submit" onclick="subscribePlan('{{ $detail->plan_slug }}',{{ $detail->discounted_price }})">Subscribe</button></div>
                    @endif
                    {{--<div><a href="{{ route('pricing.subscribe', ['plan' => $detail->plan_slug]) }}" class="btn btn-primary btn-md">Subscribe</a></div>--}}
            </div>
          @else
            <div><a href="{{ route('register.index', ['plan' => $detail->plan_slug]) }}" class="btn btn-primary btn-md">Sign Up</a></div>
            {{--<div><a href="{{ route('register.index', ['plan' => $detail->plan_slug]) }}" class="btn btn-primary btn-md">Sign Up</a></div>--}}
          @endif
          <!-- <div class="price-try"><span class="hide-mobile">or </span><a href="#">try <span class="hide-mobile">it free</span></a></div> -->
        </th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td colspan="4">Platform Access</td>
      </tr>
      <tr class="compare-row">
        <td>Platform Access</td>
        @if(!empty($pricing_validity))
            @foreach($pricing_validity as $month)
                @if($month->validity == '1')
                    <td>{{ $month->validity }} month</td>
                @else
                    <td>{{ $month->validity }} months</td>
                @endif
            @endforeach
        @endif
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Resume Builder</td>
      </tr>
      <tr>
        <td>Resume Builder</td>
        @if(!empty($plan_includes))
            @foreach($plan_includes as $key => $include)
                @if(in_array('Resume-Builder', json_decode($include)))
                    <td><span class="tickgreen">✔</span></td>
                @else
                    <td><span class="tickblue">✘</span></td>
                @endif
            @endforeach
        @endif
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Cover Note Creator</td>
      </tr>
      <tr class="compare-row">
        <td>Cover Note Creator</td>
        @if(!empty($plan_includes))
            @foreach($plan_includes as $key => $include)
                @if(in_array('Cover-Note-Creator', json_decode($include)))
                    <td><span class="tickgreen">✔</span></td>
                @else
                    <td><span class="tickblue">✘</span></td>
                @endif
            @endforeach
        @endif
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Email Templates</td>
      </tr>
      <tr>
        <td>Email Templates</td>
        @if(!empty($plan_includes))
            @foreach($plan_includes as $key => $include)
                @if(in_array('Email-Templates', json_decode($include)))
                    <td><span class="tickgreen">✔</span></td>
                @else
                    <td><span class="tickblue">✘</span></td>
                @endif
            @endforeach
        @endif
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Job Search Plan</td>
      </tr>
      <tr class="compare-row">
        <td>Job Search Plan</td>
        @if(!empty($job_search_plans))
            @foreach($job_search_plans as $key => $value)
                @if($value['Job_Search_Plan_Detail'] == null)
                    <td><span class="tickblue">NA</span></td>
                @else
                    <td><span class="tickgreen">{{ $value['Job_Search_Plan_Detail'] }}</span></td>
                @endif
            @endforeach  
        @endif
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Job Search Coaching</td>
      </tr>
      <tr>
        <td>Job Search Coaching</td>
        @if(!empty($job_search_coaching))
            @foreach($job_search_coaching as $key => $value)
                @if($value['Job_Search_Coaching_Session'] == null && $value['Job_Search_Coaching_Time'] == null)
                    <td><span class="tickblue">NA</span></td>
                @else
                    <td><span class="tickgreen"> {{ $value['Job_Search_Coaching_Session'] }} sessions (1-on-1 session) <br> Coaching time {{ $value['Job_Search_Coaching_Time'] }} minutes</span></td>
                @endif
            @endforeach
        @endif            
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">Job Search Training</td>
      </tr>
      <tr class="compare-row">
        <td>Job Search Training</td>
        @if(!empty($job_search_training))
            @foreach($job_search_training as $key => $value)
                @if($value['Job_Search_Training_Course'] == null || $value['Job_Search_Training_Text'] == null)
                    <td><span class="tickblue">NA</span></td>
                @else
                    <td><span class="tickgreen"> {{ $value['Job_Search_Training_Course'] }} Learning Courses <br> 
                        @php $training_arr = explode(',', $value['Job_Search_Training_Text']) @endphp
                        @if(count($course_category) > 0)
                            @foreach($course_category as $key => $category)
                                @if(in_array($category->id, $training_arr))
                                    @php $count = count(array_filter($training_arr)); @endphp
                                    @if($count == 1)
                                        ({{ $category->name }}
                                    @elseif($count == 2)
                                        @if($key == 0)
                                            ({{ $category->name }} &
                                        @endif
                                        @if($key == 1)
                                            {{ $category->name }}
                                        @endif
                                    @elseif($count == 3)
                                        @if($key == 0)
                                            ({{ $category->name }},
                                        @endif
                                        @if($key == 1)
                                            {{ $category->name }} &
                                        @endif
                                        @if($key == 2)
                                            {{ $category->name }}
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                            Courses)
                        @endif
                    </span></td>
                    {{--<td><span class="tickgreen"> {{ $value['Job_Search_Training_Course'] }} Learning Courses <br> ({{ $value['Job_Search_Training_Text'] }})</span></td>--}}
                @endif
            @endforeach
        @endif
      </tr>
    </tbody>
  </table>
</div>
</div>
</section>
    <!--=================================
    Plans&and Packages -->

    <!--=================================
    clients -->
    <section class="space-ptb bg-light our-clients">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <!-- <div class="section-title">
                      <h2>Powering over 1500 reward programs for brands around the world.</h2>
                    </div> -->
                    <div class="owl-carousel owl-nav-center" data-animateOut="fadeOut" data-nav-dots="false" data-items="4" data-md-items="4" data-sm-items="4" data-xs-items="3" data-xx-items="2" data-space="50">
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('frontend/images/client/visa.svg') }}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('frontend/images/client/amex.svg') }}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('frontend/images/client/mastercard.svg') }}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('frontend/images/client/paypal.svg') }}" alt="">
                        </div>

                    </div>
                    <p class="mt-lg-5 lead">We accept all major payment methods and process payments with Stripe SSL Secure / 256-bit SSL secure checkout. 7-Day Money Back Guarantee.</p>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    clients -->

    <!--=================================
    accordion -->
    <section class="space-ptb">
        <div class="container">
            {{--<div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                    <div class="accordion-style" id="accordion-Two">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="accordion-title mb-0">
                                    <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum? <i class="fas fa-chevron-down fa-xs"></i></button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show accordion-content" aria-labelledby="headingOne" data-parent="#accordion-Two">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="accordion-title mb-0">
                                    <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum? <i class="fas fa-chevron-down fa-xs"></i></button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse accordion-content" aria-labelledby="headingOne" data-parent="#accordion-Two">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="accordion-title mb-0">
                                    <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum? <i class="fas fa-chevron-down fa-xs"></i></button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse accordion-content" aria-labelledby="headingOne" data-parent="#accordion-Two">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="accordion-title mb-0">
                                    <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum? <i class="fas fa-chevron-down fa-xs"></i></button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse accordion-content" aria-labelledby="headingOne" data-parent="#accordion-Two">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="accordion-title mb-0">
                                    <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum? <i class="fas fa-chevron-down fa-xs"></i></button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse accordion-content" aria-labelledby="headingOne" data-parent="#accordion-Two">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>--}}
            <div class="row">
                @if(count($faqs) > 0)
                    <div class="col-lg-12">
                        <div class="section-title-02">
                            <h2>Frequently Asked Questions</h2>
                        </div>
                        <div class="accordion-style" id="accordion-Two">
                            @foreach($faqs as $key => $faq)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $key }}">
                                        <h5 class="accordion-title mb-0">
                                            <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="@if($key == 0) true @else false @endif"
                                                    aria-controls="collapse{{ $key }}">{{ $faq->title }} <i class="fas fa-chevron-down fa-xs"></i></button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif accordion-content" aria-labelledby="heading{{ $key }}" data-parent="#accordion-Two">
                                        <div class="card-body">
                                            {!! $faq->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                @endif
            </div>
        </div>
    </section>
    <!--=================================
    accordion -->


@endsection

@section('script-js-last')
<script type="text/javascript">
    var pricing = <?php echo json_encode($pricing_details); ?>;
</script>
<script src="{{ asset('frontend/js/pricing/pricing.js') }}"></script>
@endsection

@section('script')
@endsection

