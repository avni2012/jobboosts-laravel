@extends('layouts.frontend.master')

@section('title', 'Cover Letter Example')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<section class="space-pb cover-exm-pdt">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 justify-content-center">
        <div class="section-title center cover-section-title">
          <h2 class="title">20+ Cover letter examples</h2>
          <p class="lead">Stand out and get hired faster with our collection of professional cover letter <br> templates expertly-designed to land you the perfect position.</p>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <!-- Tabs nav -->
      <div class="nav flex-column nav-pills nav-pills-custom nav-pills-cover cover-cla" id="v-pills-tab" role="tablist" aria-orientation="horizontal">

          <a class="nav-link mb-3 p-4 shadow active cover-claa" id="v-pills-Examples-tab" data-toggle="pill" href="#v-pills-Examples" role="tab" aria-controls="v-pills-Examples" aria-selected="false">
            <i class="fa fa-lightbulb mr-2"></i>
            <span class="font-weight-bold text-uppercase">All Examples</span>
        </a>

        <div class="dropdown btn-hoverv">
            <button type="button" class="btn btn-default dropdown-toggle shadow mb-3 p-4 dropbtn" data-toggle="dropdown">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                <span class="font-weight-bold text-uppercase">Choose Function</span>
            </button>
            <div class="dropdown-content cover-clacl">   
              <div class="row">
                <div class="col-md-7 col-md-offset-4">
                  <div class="menu-offset-mdv">
                    <div class="column col-md-4">
                    <a class="nav-link" id="account_finance-tab" data-toggle="pill" href="#account_finance" role="tab" aria-controls="account_finance" aria-selected="false">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="text-capitalize">Accounts & Finance</span>
                    </a>

                    <a class="nav-link" id="administration_support-tab" data-toggle="pill" href="#administration_support" role="tab" aria-controls="administration_support" aria-selected="false">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="text-capitalize">Administration & Support</span>
                    </a>

                    <a class="nav-link" id="business_operation-tab" data-toggle="pill" href="#business_operation" role="tab" aria-controls="business_operation" aria-selected="false">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="text-capitalize">Business Operations</span>
                    </a>

                    <a class="nav-link" id="college_graduate-tab" data-toggle="pill" href="#college_graduate" role="tab" aria-controls="college_graduate" aria-selected="false">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="text-capitalize">College Graduates</span>
                    </a>

                </div>
                <div class="column col-md-4">
                  <a class="nav-link" id="web_development-tab" data-toggle="pill" href="#web_development" role="tab" aria-controls="web_development" aria-selected="false">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="text-capitalize">Web Development</span>
                </a>

                <a class="nav-link" id="data_analytics-tab" data-toggle="pill" href="#data_analytics" role="tab" aria-controls="data_analytics" aria-selected="false">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="text-capitalize">Data Analytics</span>
                </a>

                <a class="nav-link" id="digital_marketing-tab" data-toggle="pill" href="#digital_marketing" role="tab" aria-controls="digital_marketing" aria-selected="false">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="text-capitalize">Digital Marketing</span>
                </a>

                <a class="nav-link" id="information_technology-tab" data-toggle="pill" href="#information_technology" role="tab" aria-controls="information_technology" aria-selected="false">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="text-capitalize">Information Technology</span>
                </a>

            </div>
            <div class="column col-md-4">
              <a class="nav-link" id="bpo-call_center-tab" data-toggle="pill" href="#bpo-call_center" role="tab" aria-controls="bpo-call_center" aria-selected="false">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="text-capitalize">BPO/Call Center</span>
            </a>

            <a class="nav-link" id="sales-tab" data-toggle="pill" href="#sales" role="tab" aria-controls="sales" aria-selected="false">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="text-capitalize">Sales</span>
            </a>
            <a class="nav-link" id="research-tab" data-toggle="pill" href="#research" role="tab" aria-controls="research" aria-selected="false">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="text-capitalize">Research</span>
            </a>
            <a class="nav-link" id="events-tab" data-toggle="pill" href="#events" role="tab" aria-controls="events" aria-selected="false">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="text-capitalize">Events</span>
            </a>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>
</div>


<div class="col-md-12">
  <!-- Tabs content -->
  <div class="tab-content cover-pdtv" id="v-pills-tabContent">
    <div class="tab-pane fade rounded bg-white show active" id="v-pills-Examples" role="tabpanel" aria-labelledby="v-pills-Examples-tab">
        <div class="row">
            @if(!empty($cover_letter_examples))
                @foreach(json_decode($cover_letter_examples,TRUE) as $cover_examples)
                    <div class="col-md-3">
                        <div class="cover-text">
                          <h5>{{ $cover_examples['title'] }}</h5>
                        </div>
                        <div class="cover-letter-box">
                            <img src="{{ asset($cover_examples['image']) }}" class="cimg">
                            <div class="cmiddle">
                                <div class="ctext">
                                @if($cover_examples['is_available'] == 1)
                                    <a onclick="chooseCoverLetterTemplate({{ $cover_examples['id'] }})">Use this template</a>
                                  @else
                                    <a href="javascript:void(0);" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
</div>

@if(!empty($cover_letter_examples_category))
@foreach(json_decode($cover_letter_examples_category,true) as $category)
    <div class="tab-pane fade rounded bg-white" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
        <div class="row">
            @if(!empty($cover_letter_examples))
            @foreach(json_decode($cover_letter_examples,TRUE) as $cover_examples)
                @if($category == $cover_examples['category'])
                    <div class="col-md-3">
                        <div class="cover-text">
                          <h5>{{ $cover_examples['title'] }}</h5>
                        </div>
                        <div class="cover-letter-box">
                            <img src="{{ asset($cover_examples['image']) }}" class="cimg">
                            <div class="cmiddle">
                                <div class="ctext">
                                @if($cover_examples['is_available'] == 1)
                                    <a onclick="chooseCoverLetterTemplate({{ $cover_examples['id'] }})">Use this template</a>
                                @else
                                    <a href="javascript:void(0);" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        </div>
    </div>
@endforeach
@endif
</div>
</div>
</div>
</div>
</section>
@include('frontend.cover_letters.cover_letter_popup')

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/cover_letters/choose-cover-letters.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var csrftoken = '{{ csrf_token() }}';
</script>
@endsection

@section('script')
@endsection

