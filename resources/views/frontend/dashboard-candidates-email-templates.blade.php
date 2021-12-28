@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Email Templates')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .resm-title {
    margin: auto;
    border: 0;
  }
  .pointer{
    cursor: pointer;
  }
</style>
@endsection

@section('content')

<!-- Email Templates START -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="section-title-02">
          <h3>Email Templates</h3>
        </div>
      </div>
      <div class="col-lg-4 text-lg-right">
        @if($get_user_plan != null)
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="javascript:void();" onclick="chooseEmailTemplate({{ Auth::guard('users')->user()->id }},4)"><i class="fas fa-plus-circle"></i> Create New</a>
        @else
          <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="{{ route('dashboard-candidates-pricing') }}"><i class="fas fa-plus-circle"></i> Create New</a>
        @endif
      </div>
    </div>

    @if($get_user_plan == null)
      <div class="row">
        <div class="col-lg-12">
          <p>Your plan is expired, Upgrade to create email templates.</p>
        </div>
      </div>
    @else
    <div class="row">
      @if(count($user_email_templates) > 0)
        @foreach($user_email_templates as $email_template)
          <div class="col-lg-4">
            <div class="resumeedit">
              <div class="resumeupd">
                <h3>
                  <input type="text" name="main_title" id="EmailTemplateMainTitle_{{ $email_template->id }}" class="form-control resm-title email-templates text-left" placeholder="Untitled" value="@if($email_template->uet_title != null){{ $email_template->uet_title }}@else{{ $email_template->user->resume_fullname }}@endif" data-id="{{ $email_template->id }}">
                <span class="edit-resume-name" onclick="changeEmailTemplateTitle({{ $email_template->id }})"><i class="fa fa-pencil-alt" aria-hidden="true"></i></span>
                </h3>
                <p>Updated {{ date('d F, H:i', strtotime($email_template->updated_at)) }}</p>
                <ul>
                  <li><a href="{{ route('email_templates',[$email_template->id]) }}"><span><i class="fa fa-pencil-alt" aria-hidden="true"></i></span> Edit</a></li>
                  <li><form method="POST"><a class="pointer" onclick=deleteEmailTemplate({{ $email_template->id }})><span><i class="fa fa-trash" aria-hidden="true"></i></span> Delete</a></form></li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <p>Start building your first email template.</p>
      @endif
    </div>
    @endif
  </div>
</section>
<!-- Email Templates END -->

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/dashboard/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('/frontend/js/email_templates/choose-email-template.js') }}"></script>
@endsection

@section('script')
@endsection

