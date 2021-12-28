@extends('layouts.frontend.resume-master')

@section('title', 'Build Cover Letter')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<link href="{{ asset('/frontend/css/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}">
@endsection
@section('style')
<style type="text/css">
    #canvas_container {
        background: #7a8599;
        text-align: center;
    }
    
    .ucs-title{
        margin: auto;
        border: 0;
        padding-left: 0px;
        height: auto;
        font-size: 24px;
        color: inherit;
    }    
</style>
@endsection

@section('content')
    <!--=================================
    Advertise A Job -->
    <section class="space-ptb">
        <div class="container">
            <div class="split left">
                <div class="container">
                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard-candidates-cover-letter') }}" type="button" id="backbtn"><i class="fa fa-angle-left"></i> Back</a>
                    <form method="POST" id="CoverLetterForm" name="CoverLetterForm">
                        @csrf
                        <input type="text" name="cl_title" id="cl_title" class="form-control col-md-3 resm-title" placeholder="Untitled" value="@if(!empty($personal_details)){{ $personal_details->cl_title }}@endif">
                        <fieldset>
                          <legend>Personal Details</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control full-name" id="fullname" name="fullname" value="@if(!empty($resume_email_fullname)){{ $resume_email_fullname->resume_fullname }}@endif" disabled="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cl_job_title">Job Title:</label>
                                    <input type="text" class="form-control" id="cl_job_title" name="cl_job_title" value="@if(!empty($personal_details)){{ $personal_details->cl_job_title }}@endif">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="cl_address">Address:</label>
                                    <input type="text" class="form-control" id="cl_address" name="cl_address" value="@if(!empty($personal_details)){{ $personal_details->cl_address }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="@if(!empty($resume_email_fullname)){{ $resume_email_fullname->resume_email }}@endif" disabled="">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="cl_phone">Phone Number</label>
                                    <input type="text" class="form-control" id="cl_phone" name="cl_phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="@if(!empty($personal_details)){{ $personal_details->cl_phone }}@endif">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Employer Details</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="cl_emp_company_name">Company Name</label>
                                    <input type="text" class="form-control" id="cl_emp_company_name" name="cl_emp_company_name" value="@if(!empty($personal_details)){{ $personal_details->cl_emp_company_name }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cl_emp_hiring_manager_name">Hiring Manager Name</label>
                                    <input type="text" class="form-control" id="cl_emp_hiring_manager_name" name="cl_emp_hiring_manager_name" value="@if(!empty($personal_details)){{ $personal_details->cl_emp_hiring_manager_name }}@endif">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="cl_emp_address">Address</label>
                                    <input type="text" class="form-control" id="cl_emp_address" name="cl_emp_address" value="@if(!empty($personal_details)){{ $personal_details->cl_emp_address }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cl_emp_phone">Email</label>
                                    <input type="text" class="form-control" id="cl_emp_phone" name="cl_emp_phone" value="@if(!empty($personal_details)){{ $personal_details->cl_emp_phone }}@endif">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="cl_emp_email">Phone Number</label>
                                    <input type="text" class="form-control" id="cl_emp_email" name="cl_emp_email" value="@if(!empty($personal_details)){{ $personal_details->cl_emp_email }}@endif">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Letter Details</legend>
                          <hr>
                          <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <textarea cols="80" id="cl_details" name="cl_details" rows="10">@if(!empty($personal_details)) {!! $personal_details->cl_details !!} @endif</textarea>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="split right" id="template_view">
                {{--<a href="javascript:void(0)" id="BackToSelectTemplatePage"><button style="float: right;"><i class="fa fa-times"></i></button></a>--}}
                <a href="javascript:void(0)" id="BackToSelectTemplatePage"><a href="{{ route('dashboard-candidates-cover-letter') }}" class="cls-btn" style="float: right;"><i class="fa fa-times"></i></a></a>
                <div class="centered col-pos">
                    <!-- Them Color Picker START -->
                    <div class="them-colo-pic cover-letter-color-codes">
                        @php $i = 1; @endphp
                        @if(!empty($color_codes) && count($color_codes['colors']) > 0)
                        @foreach($color_codes['colors'] as $key => $color_code)
                        @php $item_class = ($i == 1) ? 'colo-bx-wrp thm-color active' : 'colo-bx-wrp thm-color'; @endphp
                            <div class="colo-bx-wrp thm-color" style="background-color: {{ $color_code }}" color="{{ $color_code }}" onclick="ChangeColorCode({{ $personal_details->id }}, '{{ $color_code }}')">
                                @if($personal_details->cl_variation == $color_code)
                                    <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" class=""><path d="M16.6917162,8.75389189 L18.3082838,10.2461081 L12.3082838,16.7461081 C11.8845221,17.2051833 11.1639539,17.2195889 10.7221825,16.7778175 L6.22218254,12.2778175 L7.77781746,10.7221825 L11.4682653,14.4126304 L16.6917162,8.75389189 Z"></path></svg>
                                @elseif(empty($personal_details->cl_variation))
                                    @if($key == 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" class=""><path d="M16.6917162,8.75389189 L18.3082838,10.2461081 L12.3082838,16.7461081 C11.8845221,17.2051833 11.1639539,17.2195889 10.7221825,16.7778175 L6.22218254,12.2778175 L7.77781746,10.7221825 L11.4682653,14.4126304 L16.6917162,8.75389189 Z"></path></svg>
                                    @endif
                                @endif
                            </div>
                        @php $i++ @endphp
                        @endforeach 
                        @else
                            <div class="colo-bx-wrp thm-color" data-toggle="tooltip" data-placement="right" title="This template doesn't support accent order">
                                <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M8,11 C8,7.83333333 9.375,6 12,6 C14.625,6 16,7.83333333 16,11 C16.5522847,11 17,11.4477153 17,12 L17,17 C17,17.5522847 16.5522847,18 16,18 L8,18 C7.44771525,18 7,17.5522847 7,17 L7,12 C7,11.4477153 7.44771525,11 8,11 Z M10,11 L14,11 C14,8.83333333 13.375,8 12,8 C10.625,8 10,8.83333333 10,11 Z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <!-- Them Color Picker END -->
                    <div id="my_pdf_viewer">
                        <div id="canvas_container">
                            <div class="loader-cont" style="display: none;">
                                <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="loading">
                            </div>
                            <canvas id="pdf_renderer" width="363"></canvas>
                        </div>
                        <div id="navigation_controls">
                            <button id="go_previous" class="next-pre-btn"><i class="fa fa-arrow-left"></i></button><span id='cur_page'>1</span>/<span id='total_page'>1</span><button id="go_next" class="next-pre-btn"><i class="fa fa-arrow-right"></i></button><br/>
                            <input id="current_page" value="1" type="number"/>
                            <div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('update-cover-letter',[$user_cl_id]) }}" class="btn btn-primary sel-temp"><i class="fa fa-th-large" aria-hidden="true"></i>  Select Template</a>
                    <form method="POST"><button class="btn btn-primary" type="button" id="DownloadPDF"><i class="fa fa-file-pdf"></i>  Download PDF</button></form>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Advertise A Job -->

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/frontend/js/htmlpdfgenerator.js') }}"></script>
<script src="{{ asset('/frontend/js/cover_letters/cover_letter.js') }}"></script>
<script src="{{ asset('/frontend/js/cover_letters/save-user-cover-letter-details.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var template_id = '{{ $template_id }}';
    var r_id = '{{ $user_cl_id }}';
    var csrftoken = '{{ csrf_token() }}';
    var user = "{{ Auth::guard('users')->user()->id }}";
    var fullname = '{!! str_replace("'", "\'", json_encode($resume_email_fullname)) !!}';
    var nameData = JSON.parse(fullname);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="{{ asset('/frontend/js/pdf-view.js') }}"></script>
<script type="text/javascript">
</script>
@endsection

@section('script')
@endsection

