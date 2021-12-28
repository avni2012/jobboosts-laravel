@extends('layouts.frontend.master')

@section('title', 'Email Cover Letter Example')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<!--=================================
Millions of jobs -->
<section class="space-pb cover-pdt">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 justify-content-center">
        <div class="section-title center cover-section-title cover-design-pd">
          <h2 class="title">Email Templates</h2>
          <p class="lead">Stand out and get hired faster with our collection of professional cover letter <br> templates expertly-designed to land you the perfect position. </p>
        </div>
      </div>
    </div>
      <div class="row">
          <div class="col-md-12">
              <!-- Tabs nav -->
              <div class="nav flex-column nav-pills nav-pills-custom nav-pills-cover cover-cla" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                  
                  <a class="nav-link mb-3 p-4 shadow colorrb active" id="job_search-tab" data-toggle="pill" href="#job_search" role="tab" aria-controls="job_search" aria-selected="false">
                      <i class="fa fa-lightbulb mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Job Search</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                      <i class="fa fa-bookmark mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Application</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="interview-tab" data-toggle="pill" href="#interview" role="tab" aria-controls="interview" aria-selected="false">
                      <i class="fa fa-user mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Interview</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="follow_up-tab" data-toggle="pill" href="#follow_up" role="tab" aria-controls="follow_up" aria-selected="false">
                      <i class="fa fa-american-sign-language-interpreting mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Follow Up</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="acceptance_rejection-tab" data-toggle="pill" href="#acceptance_rejection" role="tab" aria-controls="acceptance_rejection" aria-selected="false">
                      <i class="fa fa-random mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Acceptance/ Rejection</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="post_offer-tab" data-toggle="pill" href="#post_offer" role="tab" aria-controls="post_offer" aria-selected="false">
                      <i class="fa fa-random mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Post Offer</span></a>
              </div>
          </div>


          <div class="col-md-12">
              <!-- Tabs content -->
              <div class="tab-content cover-pdtv" id="v-pills-tabContent">
                @php $i = 1; @endphp
                @if(!empty($email_cover_templates_category))
                  @foreach(json_decode($email_cover_templates_category,true) as $category)
                  @php $item_class = ($i == 1) ? 'show active' : ''; @endphp
                    <div class="tab-pane fade rounded bg-white {{ $item_class }}" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
                      <div class="row">
                      @if(!empty($email_cover_templates))
                        @foreach(json_decode($email_cover_templates,TRUE) as $job_search)
                          @if($category == $job_search['category'])
                             <div class="col-md-3">
                              <div class="cover-text email-samlet">
                                <h5>{{ $job_search['title'] }}</h5>
                              </div>
                              <div class="cover-letter-box">
                                <img src="{{ asset($job_search['image']) }}" class="cimg">
                                <div class="cmiddle">
                                  <div class="ctext">
                                  @if($job_search['is_available'] == 1)
                                    @if(Auth::guard('users')->check())
                                      <a onclick="chooseEmailTemplate('{{ Auth::guard('users')->user()->id}}',{{ $job_search['id'] }})">Use this template</a>
                                    @else
                                      <a onclick="LoginUser()">Use this template</a>
                                    @endif
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
                    @php $i++ @endphp
                  @endforeach
                @endif
              </div>
          </div>
      </div>
  </div>
</section>

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/email_templates/choose-email-template.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var csrftoken = '{{ csrf_token() }}';
</script>
@endsection

@section('script')
@endsection

