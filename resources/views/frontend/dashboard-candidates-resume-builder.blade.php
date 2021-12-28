@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Resume Builder')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .pointer{
    cursor: pointer;
  }
  .resm-title {
    margin: auto;
    border: 0;
    text-align: left;
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
          <h3>Resume Builder</h3>
        </div>
      </div>
      <div class="col-lg-4 text-lg-right">
        @if($get_user_plan != null)
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="javascript:void();" onclick="chooseResumeTemplate(11)"><i class="fas fa-plus-circle"></i> Create New</a>
        @else
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="{{ route('dashboard-candidates-pricing') }}"><i class="fas fa-plus-circle"></i> Create New</a>
        @endif
      </div>
    </div>
    @if($get_user_plan == null)
      <div class="row">
        <div class="col-lg-12">
          <p>Your plan is expired, Upgrade to create resumes.</p>
        </div>
      </div>
    @else
      <div class="row">
      @if(count($user_resumes) > 0)
      @foreach($user_resumes as $resume)
        <div class="col-lg-6">
        <div class="resumeedit">
          <div class="resumepdf">
            <a href="{{ route('resumes',[$resume->id]) }}">
              @if($resume->resume_thumb_image != null)
                <img src="{{ asset('/frontend/images/user_resumes/'.$resume->resume_thumb_image) }}" alt="resum temp">
                {{--<img src="http://demo.v4web.com/jobboosts/v5/images/pdf/resume-builder.jpeg" alt="resum temp">--}}
              @else
                <img src="{{ asset('/frontend/images/default_template.png') }}" alt="resum temp">
              @endif
            </a>
          </div>

          <div class="resumeupd">
            <h3>
              <input type="text" name="main_title" id="ResumeMainTitle_{{ $resume->id }}" class="form-control resm-title resume-builders" placeholder="Untitled" value="@if($resume->resume_title != null){{ $resume->resume_title }}@else{{ "Untitled" }}@endif" data-id="{{ $resume->id }}">&nbsp;
              <span class="edit-resume-name" onclick="changeResumeTitle({{ $resume->id }})"><i class="fa fa-pencil-alt" aria-hidden="true"></i></span>
            </h3>
            <p>Updated {{ date('d F, H:i', strtotime($resume->updated_at)) }}</p>
            <h6 class="template-name">
              @if($resume->resume_template_name != null)
                @if(!empty($resume_templates))
                  @foreach($resume_templates as $template)
                    @if($template['id'] == $resume->resume_template_name)
                      {{ $template['name'] }}
                    @endif
                  @endforeach
                @endif
              @endif
            </h6>
            <ul>
              <li><a href="{{ route('resumes',[$resume->id]) }}"><span><i class="fa fa-pencil-alt" aria-hidden="true"></i></span> Edit</a></li>
              <li><a href="{{ route('download-resume-builder-pdf',[$resume->id]) }}" target="_blank"><span><i class="fa fa-arrow-down" aria-hidden="true"></i></span> Download PDF</a></li>
              <li><form method="POST"><a class="pointer" onclick=deleteResume({{ $resume->id }})><span><i class="fa fa-trash" aria-hidden="true"></i></span> Delete</a></form></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
      @else
        <p>Start building your first resume.</p>
      @endif
    </div>
    @endif
  </div>
</section>
<!-- Resume Builder END -->
@endsection

@section('script-js-last')
@endsection

@section('script')
<script type="text/javascript">
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
<script type="text/javascript" src="{{ asset('/frontend/js/dashboard/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('/frontend/js/resumes/choose-resume-template.js') }}"></script>
@endsection

