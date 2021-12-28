@extends('layouts.frontend.resume-master')

@section('title', 'Build Email Template')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<link href="{{ asset('/frontend/css/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}">
@endsection
@section('style')
<style type="text/css">
  .email-title{
    justify-content: center;
  }
  #copyToclipboard{
    cursor: pointer;
  }
  .copy-to-clipboard{
    font-size: 40px;
  }
  .cke_contents.cke_reset{
    height: 42vh !important;
  }
  .clip-copy{
    position: absolute;
    transform: translateY(-50%);
    left: 50%;
    top: 30%;
  }
</style>
@endsection

@section('content')

<section class="space-ptb pt-0">
  <div class="container email-template-form">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title-02 text-center">
          <h2>Let’s Build Email Templates</h2>
        </div>
      </div>
    </div>
    <form method="POST" id="EmailTemplateForm" name="EmailTemplateForm" action="{{ route('store-user-email-template-data') }}">
      @csrf
      <div class="form-row email-title">
        <div class="form-group col-md-6">
          <input type="text" class="form-control resm-title" id="uet_title" name="uet_title" placeholder="Untitled" value="@if(!empty($personal_details)){{ $personal_details->uet_title }}@else{{ "Untitled" }}@endif">
        </div>
        <div class="form-group col-12 text-center">
          @if(!empty($email_template_subject))
            @foreach($email_template_subject as $template)
                @if($personal_details->uet_name == $template['id'])
                  {!! $template['subject'] !!}
                @endif
            @endforeach
          @endif
        </div>
        <div class="form-group col-12 mb-0">
          <textarea cols="80" id="uet_content" name="uet_content" rows="10">@if(!empty($personal_details)) {!! $personal_details->uet_content !!} @endif</textarea>
        </div>
        <div class="col-12 clearfix">
          <div class="float-right mt-4">
            <button type="submit" class="btn btn-primary">Save Email Template</button>
          </div>
          <div class="float-left mt-4">
            <a href="{{ route('email-cover-letter-examples') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> See more examples</a>
          </div>
          <div class="mt-4 clip-copy">
            <a class="copyToclipboard d-block text-center" data-toggle="tooltip" data-placement="right" title="Copy to clipboard" onclick="copyToclipboard('#uet_content')"><i class="fas fa-paste copy-to-clipboard"></i></a>
          </div>
        </div>
        {{--<div class="col-12 text-right mt-4">
          <button type="submit" class="btn btn-primary">Save Email Template</button>
        </div>--}}
      </div>
    </form>
  </div>
</section>

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/frontend/js/email_templates/save-email-template.js') }}"></script>
<script src="{{ asset('/frontend/js/email_templates/email-template.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var template_id = '{{ $template_id }}';
    var r_id = '{{ $user_cl_id }}';
    var csrftoken = '{{ csrf_token() }}';
</script>
@endsection

@section('script')
@endsection

