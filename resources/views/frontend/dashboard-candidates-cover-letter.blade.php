@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Cover Letter')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .resm-title {
    margin: auto;
    border: 0;
    text-align: left;
  }
  .pointer{
    cursor: pointer;
  }
  .template-name{
    color: #1d2936;
  }
</style>
@endsection

@section('content')

<!-- Resume Builder START -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="section-title-02">
          <h3>Cover Letters</h3>
        </div>
      </div>
      <div class="col-lg-4 text-lg-right">
        @if($get_user_plan != null)
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="javascript:void();" onclick="chooseCoverLetterTemplate(4)"><i class="fas fa-plus-circle"></i> Create New</a>
        @else
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="{{ route('dashboard-candidates-pricing') }}"><i class="fas fa-plus-circle"></i> Create New</a>
        @endif
      </div>
    </div>

    @if($get_user_plan == null)
      <div class="row">
        <div class="col-lg-12">
          <p>Your plan is expired, Upgrade to create cover letters.</p>
        </div>
      </div>
    @else
    <div class="row">
      @if(count($user_cover_letters) > 0)
        @foreach($user_cover_letters as $cover_letter)
        <div class="col-lg-6">
          <div class="resumeedit">
            <div class="resumepdf">
              <a href="#">
                @if($cover_letter->cl_thumb_image != null)
                  <img src="{{ asset('/frontend/images/user_cover_letters/'.$cover_letter->cl_thumb_image) }}" alt="resum temp">
                @else
                  <img src="{{ asset('/frontend/images/default_template.png') }}" alt="resum temp">
                @endif
              </a>
            </div>

            <div class="resumeupd">
              <h3>
                <input type="text" name="main_title" id="CoverLetterMainTitle_{{ $cover_letter->id }}" class="form-control resm-title cover-letters" placeholder="Untitled" value="@if($cover_letter->cl_title != null){{ $cover_letter->cl_title }}@else{{ "Untitled" }}@endif" data-id="{{ $cover_letter->id }}">&nbsp;
                <span class="edit-resume-name" onclick="changeCoverLetterTitle({{ $cover_letter->id }})"><i class="fa fa-pencil-alt" aria-hidden="true"></i></span>
                {{--<a href="">Vinay Resume <span><i class="fa fa-pencil-alt" aria-hidden="true"></i></span></a>--}}
              </h3>
              <p>Updated {{ date('d F, H:i', strtotime($cover_letter->updated_at)) }}</p>
              <h6 class="template-name">
                @if($cover_letter->cl_template_name != null)
                @if(!empty($cover_letters))
                  @foreach($cover_letters as $template)
                    @if($template['id'] == $cover_letter->cl_template_name)
                      {{ $template['name'] }}
                    @endif
                  @endforeach
                @endif
                @endif
              </h6>
              <ul>
                <li><a href="{{ route('cover_letters',[$cover_letter->id]) }}"><span><i class="fa fa-pencil-alt" aria-hidden="true"></i></span> Edit</a></li>
                <li><a href="{{ route('download-cover-letter-pdf',[$cover_letter->id]) }}" target="_blank"><span><i class="fa fa-arrow-down" aria-hidden="true"></i></span> Download PDF</a></li>
                <li><form method="POST"><a class="pointer" onclick=deleteCoverLetter({{ $cover_letter->id }})><span><i class="fa fa-trash" aria-hidden="true"></i></span> Delete</a></form></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <p>Start building your first cover letter.</p>
      @endif
    </div>
    @endif
  </div>
</section>
<!-- Resume Builder END -->

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/dashboard/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('/frontend/js/cover_letters/choose-cover-letters.js') }}"></script>
@endsection

@section('script')
@endsection

