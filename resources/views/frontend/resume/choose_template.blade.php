@extends('layouts.frontend.master')

@section('title', 'Choose Resume Templates')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<!--=================================
Millions of jobs -->
<section class="space-pb cover-pdt">
  @csrf
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 justify-content-center">
        <div class="section-title center cover-section-title cover-design-pd">
          <h2 class="title">20+ Resume templates design & examples</h2>
          <p class="lead">Stand out and get hired faster with our collection of professional resume <br> templates expertly-designed to land you the perfect position. </p>
        </div>
      </div>
    </div>
      <div class="row">
          <div class="col-md-12">
              <!-- Tabs nav -->
              <div class="nav flex-column nav-pills nav-pills-custom nav-pills-cover cover-cla" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                  

                  <a class="nav-link mb-3 p-4 shadow colorrb active" id="v-pills-design-tab" data-toggle="pill" href="#v-pills-design" role="tab" aria-controls="v-pills-design" aria-selected="false">
                      <i class="fa fa-lightbulb mr-2"></i>
                      <span class="font-weight-bold text-uppercase">All Designs</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="original-tab" data-toggle="pill" href="#original" role="tab" aria-controls="original" aria-selected="false">
                      <i class="fa fa-bookmark mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Original</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="executive-tab" data-toggle="pill" href="#executive" role="tab" aria-controls="executive" aria-selected="false">
                      <i class="fa fa-user mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Executive</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="modern-tab" data-toggle="pill" href="#modern" role="tab" aria-controls="modern" aria-selected="false">
                      <i class="fa fa-american-sign-language-interpreting mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Modern</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="trendy-tab" data-toggle="pill" href="#trendy" role="tab" aria-controls="trendy" aria-selected="false">
                      <i class="fa fa-random mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Trendy</span></a>
                  </div>
          </div>


          <div class="col-md-12">
              <!-- Tabs content -->
              <div class="tab-content cover-pdtv" id="v-pills-tabContent">
                  <div class="tab-pane fade rounded bg-white show active" id="v-pills-design" role="tabpanel" aria-labelledby="v-pills-design-tab">
                    <div class="row">
                      @if(!empty($resume_templates))
                      @foreach(json_decode($resume_templates,TRUE) as $template)
                      <div class="col-md-3">
                        <div class="cover-text singlecss">
                          <h5 class="resume-template-name">{{ $template['name'] }}</h5>
                          @if($template['one_page'] == 1)
                            <img src="{{ asset('/frontend/images/single-page-icon.png') }}" class="img-fluid">
                          @endif
                          <p class="resume-desc">{{ $template['description'] }}</p>
                        </div>
                        <div class="cover-letter-box">
                          <img src="{{ asset($template['image']) }}" class="cimg">
                          <div class="cmiddle">
                            <div class="ctext">
                              @if($template['is_available'] == 1)
                                <a onclick="chooseResumeTemplate({{ $template['id'] }})">Use this template</a>
                              @else
                                <a href="{{ route('resumes',['template' => 'madrid']) }}" style="pointer-events: none; cursor: default;">Coming Soon</a>
                              @endif
                              {{--<a href="#">Use this template</a>--}}
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                    </div>
                  </div>
                  
                  @if(!empty($resume_templates_category))
                    @foreach(json_decode($resume_templates_category,true) as $category)
                      <div class="tab-pane fade rounded bg-white" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
                        <div class="row">
                          @if(!empty($resume_templates))
                            @foreach(json_decode($resume_templates,TRUE) as $template)
                              @if($category == $template['category'])
                                <div class="col-md-3">
                                  <div class="cover-text singlecss">
                                    <h5>{{ $template['name'] }}</h5>
                                    @if($template['one_page'] == 1)
                                      <img src="{{ asset('/frontend/images/single-page-icon.png') }}" class="img-fluid">
                                    @endif
                                    <p>{{ $template['description'] }}</p>
                                  </div>
                                  <div class="cover-letter-box">
                                    <img src="{{ asset($template['image']) }}" class="cimg">
                                    <div class="cmiddle">
                                      <div class="ctext">
                                        @if($template['is_available'] == 1)
                                          <a onclick="chooseResumeTemplate({{ $template['id'] }})">Use this template</a>
                                        @else
                                          <a href="{{ route('resumes',['template' => 'madrid']) }}" style="pointer-events: none; cursor: default;">Coming Soon</a>
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
@include('frontend.resume.resume_popup')

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/resumes/choose-resume-template.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var csrftoken = '{{ csrf_token() }}';
</script>
@endsection

@section('script')
@endsection

