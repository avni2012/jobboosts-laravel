@extends('layouts.frontend.master')

@section('title', 'FAQ')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

    <!--=================================
accordion -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="sidebar">
      <div class="faqsidebarv section-schedule">
        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <!-- <a class="nav-link mb-3 p-4 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                      <i class="fa fa-envelope-open-text mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Be Different. Stand Out</span></a> -->
                      @php $i = 1; $active_class = ''; @endphp
                      @if(count($faqs_category) > 0)
                      @foreach($faqs_category as $category)
                      @php $item_class = ($i == 1) ? 'active view' : ''; 
                           $catt = str_replace(" ", "_", $category->category);
                      @endphp
                      @if($i==1)
                        @php $active_class = 'show active'; @endphp
                      @else
                        @php $active_class = 'none'; @endphp
                      @endif
                      <a class="nav-link mb-3 p-4 shadow {{ $item_class }} colorrb" id="{{ $catt }}-tab" data-toggle="pill" href="#{{ $catt }}" role="tab" aria-controls="{{ $catt }}" aria-selected="false">
                        @if($i==1)
                        <i class="fa fa-thumbs-up mr-2" aria-hidden="true"></i> 
                        @elseif($i==2)
                        <i class="fa fa-file mr-2 v1" aria-hidden="true"></i>
                        @elseif($i==3)
                        <i class="fa fa-sticky-note mr-2" aria-hidden="true"></i>
                        @elseif($i==4)
                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                        @elseif($i==5)
                        <i class="fa fa-book mr-2" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-check mr-2"></i>
                        @endif
                        <span class="font-weight-bold text-uppercase">{{ $category->category }}</span>
                        <i class="fa fa-chevron-right arrow-show"></i>
                    </a>
                    @php $i++ @endphp
                    @endforeach
                    @endif         
                </div>
            </div>
            <div class="widget mb-0">
                <div class="widget-title">
                  <h5>Submit Your Question</h5>
              </div>
              <div class="company-contact-inner widget-box">
                  <form method="post" action="{{ route('faq-email.submit') }}"  data-parsley-validate>
                    @csrf
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" name="name" placeholder="" required pattern="/^[a-zA-Z ]*$/" data-parsley-required-message="Please provide your name." data-parsley-pattern-message="Please provide valid name." value="{{old('name')}}">
                      @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" placeholder="" name="email" required data-parsley-required-message="Please provide your email address." data-parsley-email-message="Please provide valid email address." value="{{old('email')}}">
                      @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                      <label>Mobile No</label>
                      <input type="text" class="form-control" id="mobile_no" placeholder="" name="mobile_no" pattern="/^[0-9]*$/" required minlength="6" maxlength="16" data-parsley-required-message="Please provide your mobile number." data-parsley-pattern-message="Please provide valid mobile no." value="{{old('mobile_no')}}">
                      @if ($errors->has('mobile_no'))
                        <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                      @endif
                      {{--<input type="text" class="form-control" id="Website" placeholder="">--}}
                  </div>
                  <div class="form-group">
                      <label>Message</label>
                      <textarea class="form-control" rows="3" placeholder="" id="message" placeholder="Message" name="message" required data-parsley-required-message="Please provide message.">{{old('message')}}</textarea>
                      @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                      @endif
                  </div>
                  <button type="submit" class="btn btn-primary btn-outline-primary btn-block">Send Email</button>
                  {{--<a class="btn btn-primary btn-outline-primary btn-block" href="#">Send Email</a>--}}
              </form>
          </div>
      </div>
  </div>
</div>
<div class="col-lg-8">
    <div class="section-title-02">
      <h2>Frequently Asked Questions</h2>
  </div>

  <div class="tab-content" id="v-pills-tabContent">
    @php $j = 1; @endphp
    @if(count($faqs_category) > 0)
        @foreach($faqs_category as $cat)
        @php $item = ($j == 1) ? 'show active' : ''; 
             $catt = str_replace(" ", "_", $cat->category);
        @endphp
        <div class="tab-pane fade rounded bg-white {{$item}} faqp5" id="{{ $catt }}" role="tabpanel" aria-labelledby="{{ $catt }}-tab">
            <div class="accordion-style" id="accordion-{{ $catt }}">
            @if(count($faqs) > 0)
                @foreach($faqs as $key => $faq)
                    @if($cat->id == $faq->category_id)
                    <div class="card">
                        <div class="card-header" id="heading{{ $key }}">
                          <h5 class="accordion-title mb-0">
                              <button class="btn btn-link d-flex align-items-center ml-auto" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="@if($key == 0) true @else false @endif">{{ $faq->title }} <i class="fas fa-chevron-down fa-xs"></i></button>
                          </h5>
                        </div>
                        <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif accordion-content" aria-labelledby="heading{{ $key }}" data-parent="#accordion-{{ $catt }}">
                            <div class="card-body">
                                {!! $faq->description !!}
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach          
            @endif          
            </div>
        </div>
        @php $j++ @endphp
        @endforeach
    @endif
</div>
</div>
</div>
</div>
</section>
    {{--<section class="space-ptb">
        <div class="container">
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
                    <center>No Faqs found.</center>
                @endif
            </div>
        </div>
    </section>--}}
    <!--=================================
    accordion -->

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

