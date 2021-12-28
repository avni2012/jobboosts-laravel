@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Pricing')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .incld-plan{
    color: #969696;
  }
  .incld-ul{
    list-style: none;
    padding-left: 0;
    margin-top: 8px;
    font-size: 15px;
    font-weight: normal;
  }
  .incld-ul li{
    margin-bottom: 3px;
    font-size: 14px;
  }
  .remove-price{
    text-decoration: line-through;
  }
</style>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0">
          <div class="row">
            <div class="col-md-8">
              <div class="section-title-02 mb-4">
                <h4>Your Current Plan @if(!empty($pricing)) - "{{ $pricing->pricing->plan_name }}"@endif</h4>
              </div>
            </div>
            @if($pricing['pricing_id'] < 5)
              <div class="col-lg-4 text-lg-right">
                <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="" data-toggle="modal" data-target="#myModalupgrade"><i class="fas fa-plus-circle"></i> Upgrade</a>
              </div>
            @else
            @endif
          </div>
          @if(!empty($pricing))
          <div class="row">
              <div class="comparisonpln col-md-4 dasprcp">
                <p>Validity - Upto {{ date('d/m/Y',strtotime($pricing->pricing_expiry_date)) }}</p>
                <p>Price - <i class="fas fa-rupee-sign"></i> {{ number_format((float)$pricing->pricing->discounted_price, 2, '.', '') }}/-</p>
                @if($pricing->pricing->discounted_price != $pricing->pricing_amount)<p>You Paid - <i class="fas fa-rupee-sign"></i> {{ $pricing->pricing_amount }}/-</p>@endif
                <p>Your Saving - <i class="fas fa-rupee-sign"></i> {{ number_format((float)($pricing->pricing->discounted_price - $pricing->pricing_amount), 2, '.', '') }}/-</p>
                <br>
                <h6>You have access to</h6>
                {{--<h3><i class="fas fa-rupee-sign"></i> @if($pricing->pricing->discounted_price != $pricing->pricing_amount)<del>{{ number_format((float)$pricing->pricing->discounted_price, 2, '.', '') }}</del>@else {{ number_format((float)$pricing->pricing->discounted_price, 2, '.', '') }} @endif</h3> 
                @if($pricing->pricing->discounted_price != $pricing->pricing_amount)
                <div>Discount: <i class="fas fa-rupee-sign"></i> 
                  {{ number_format((float)($pricing->pricing->discounted_price - $pricing->pricing_amount), 2, '.', '') }}
                </div>
                <div><i class="fas fa-rupee-sign"></i> {{ $pricing->pricing_amount }}</div>
                @endif--}}
               {{--<ul>
                @if(!empty($plan_includes))
                  @foreach($plan_includes as $inc)
                    <li>{{ str_replace(array('_','-'), ' ', $inc) }}</li>
                  @endforeach
                @endif
                </ul>--}}
                {{--<h6>Valid Till: {{ date('d/m/Y',strtotime($pricing->pricing_expiry_date)) }}</h6>--}}
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="dasprcli">
              <ul>
                @if(!empty($plan_includes))
                  @foreach($plan_includes as $inc)
                    <li><span class="tickgreen">✔</span> {{ str_replace(array('_','-'), ' ', $inc) }}</li>
                  @endforeach
                @endif
              </ul>
              </div>
            </div>
          </div>
          @else
            <p>You don't have any active plan. Subscribe to continue.</p>
            <div class="row">
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="myModalupgrade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="mb-0 text-center">Upgrade Your Plan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        @if(!empty($pricing))
          @if(!empty($pricing_details))
            @foreach(array_chunk($pricing_details['pricing_details'], 2) as $upgrade_plan)
              <div class="row">
                @foreach($upgrade_plan as $upgrade)
                      <div class="col-md-6">
                        <div class="login-register upgradefinalp">
                          <h2>{{ $upgrade['plan_name'] }}<input type="radio" class="choose-plan" id="plan_slug" name="plan_slug" value="{{ $upgrade['plan_slug'] }}" data-price="{{ $upgrade['pricing_amount'] }}"></h2>
                          <div class="plan-btn">
                          <a class="ml-auto align-self-center" href="{{ route('pricing') }}">View Plan<i class="fas fa-long-arrow-alt-right"></i></a>
                          </div>
                          @if($upgrade['original_amount'] == $upgrade['pricing_amount'])
                            <p>Final Price: <i class="fas fa-rupee-sign"></i>{{ number_format((float)$upgrade['pricing_amount'], 2, '.', '') }}</p>
                          @else
                            <p>Actual Price: <i class="fas fa-rupee-sign"></i>{{ number_format((float)$upgrade['original_amount'], 2, '.', '') }}</p>
                            <p>Upgrade Difference: <i class="fas fa-rupee-sign"></i>{{ $upgrade['active_plan_price'] }}</p>
                            <p>Final Price: <i class="fas fa-rupee-sign"></i>{{ number_format((float)$upgrade['pricing_amount'], 2, '.', '') }}</p>
                          @endif
                        </div>
                      </div>
                @endforeach
              </div>
            @endforeach
          @endif
        @else
          @if(!empty($all_plans))
            @foreach($all_plans->chunk(2) as $upgradeplan)
              <div class="row">
                @foreach($upgradeplan as $plan)
                      <div class="col-md-6">
                        <div class="login-register upgradefinalp">
                          <h2>{{ $plan['plan_name'] }}<input type="radio" class="choose-plan" id="plan_slug" name="plan_slug" value="{{ $plan['plan_slug'] }}" data-price="{{ $plan['discounted_price'] }}"></h2>
                          <div class="plan-btn">
                          <a class="ml-auto align-self-center" href="{{ route('pricing') }}">View Plan<i class="fas fa-long-arrow-alt-right"></i></a>
                          </div>
                          <p>Final Price: <i class="fas fa-rupee-sign"></i>{{ number_format((float)$plan['discounted_price'], 2, '.', '') }}</p>
                        </div>
                      </div>
                @endforeach
              </div>
            @endforeach
          @endif
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="upgradebtn">
              @if(!empty($pricing))
                <button class="btn btn-primary btn-md" type="submit" id="subscribe_plan" disabled=""> Upgrade</button>
              @else
                <button class="btn btn-primary btn-md" type="submit" id="subscribe_plan" disabled=""> Subscribe</button>
              @endif
              {{--<a href="#" class="btn btn-primary btn-md mb-4 mb-lg-0">Upgrade</a>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script-js-last')
<script src="{{ asset('frontend/js/pricing/pricing.js') }}"></script>
@endsection

@section('script')
<script type="text/javascript">
  $(".choose-plan").on('change' ,function() {
    if(this.checked) {
        $("#subscribe_plan").attr('disabled',false);
        var price = $(this).data('price');
        $("#subscribe_plan").attr("onclick", 'subscribePlan("' + this.value + '","' + price + '")');
    }
  });
</script>
@endsection

