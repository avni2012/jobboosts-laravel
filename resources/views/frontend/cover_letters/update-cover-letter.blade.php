@extends('layouts.frontend.master')

@section('title', 'Update Cover Letter Design Template')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .selected-temp{
    cursor: default !important;
  }
  .cover-text {
    height: 140px;
}
</style>
@endsection

@section('content')

<!--=================================
Millions of jobs -->
<section class="space-pb cover-pdt">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 justify-content-center">
        <div class="section-title center cover-section-title cover-design-pd">
          <h2 class="title">20+ Cover letter design & examples</h2>
          <p class="lead">Stand out and get hired faster with our collection of professional cover letter <br> templates expertly-designed to land you the perfect position. </p>
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

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-original-tab" data-toggle="pill" href="#v-pills-original" role="tab" aria-controls="v-pills-original" aria-selected="false">
                      <i class="fa fa-bookmark mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Original</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-executive-tab" data-toggle="pill" href="#v-pills-executive" role="tab" aria-controls="v-pills-executive" aria-selected="false">
                      <i class="fa fa-user mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Executive</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-modern-tab" data-toggle="pill" href="#v-pills-modern" role="tab" aria-controls="v-pills-modern" aria-selected="false">
                      <i class="fa fa-american-sign-language-interpreting mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Modern</span></a>

                  <a class="nav-link mb-3 p-4 shadow colorrb" id="v-pills-trendy-tab" data-toggle="pill" href="#v-pills-trendy" role="tab" aria-controls="v-pills-trendy" aria-selected="false">
                      <i class="fa fa-random mr-2"></i>
                      <span class="font-weight-bold text-uppercase">Trendy</span></a>
                  </div>
          </div>


          <div class="col-md-12">
              <!-- Tabs content -->
              <div class="tab-content cover-pdtv" id="v-pills-tabContent">
                  <div class="tab-pane fade rounded bg-white show active" id="v-pills-design" role="tabpanel" aria-labelledby="v-pills-design-tab">
                    <div class="row">
                      @if(!empty($cover_letters))
                        @foreach(json_decode($cover_letters,TRUE) as $cover_let)
                          <div class="col-md-3">
                            <div class="cover-text">
                              <h5>{{ $cover_let['name'] }}</h5>
                              <p>{{ $cover_let['description'] }}</p>
                            </div>
                            <div class="cover-letter-box">
                              <img src="{{ asset($cover_let['image']) }}" class="cimg">
                                  @if($cover_let['is_available'] == 1)
                                    @if($getCoverLetterId['cl_template_name'] == $cover_let['id'])
                                      <div class="cmiddle" style="opacity: 1;">
                                        <div class="ctext">
                                          <a class="selected-temp" disabled="">Selected</a>
                                        </div>
                                      </div>
                                    @else
                                     <div class="cmiddle">
                                        <div class="ctext">
                                          <a onclick="selectUpdateCoverLetter({{ $getCoverLetterId['id'] }},{{ $cover_let['id'] }})">Use this template</a>
                                        </div>
                                      </div>
                                    @endif
                                  @else
                                    <div class="cmiddle">
                                        <div class="ctext">
                                        <a href="javascript:void(0);" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                      </div>
                                    </div>
                                  @endif
                                  {{--<a href="#">Use this template</a>--}}                                
                            </div>
                          </div>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  
                  @if(!empty($cover_letter_examples_category))
                    @foreach(json_decode($cover_letter_examples_category,true) as $category)
                        <div class="tab-pane fade rounded bg-white" id="v-pills-{{ $category }}" role="tabpanel" aria-labelledby="v-pills-{{ $category }}-tab">
                          <div class="row">
                            @if(!empty($cover_letters))
                              @foreach(json_decode($cover_letters,TRUE) as $cover_let)
                                @if($category == $cover_let['category'])
                                <div class="col-md-3">
                                  <div class="cover-text">
                                    <h5>{{ $cover_let['name'] }}</h5>
                                    <p>{{ $cover_let['description'] }}</p>
                                  </div>
                                  <div class="cover-letter-box">
                                    <img src="{{ asset($cover_let['image']) }}" class="cimg">
                                    <div class="cmiddle">
                                      <div class="ctext">
                                        @if($cover_let['is_available'] == 1)
                                          @if($getCoverLetterId['cl_template_name'] == $cover_let['id'])
                                            <a class="selected-temp" disabled="">Selected</a>
                                          @else
                                            <a onclick="selectUpdateCoverLetter({{ $getCoverLetterId['id'] }},{{ $cover_let['id'] }})">Use this template</a>
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

