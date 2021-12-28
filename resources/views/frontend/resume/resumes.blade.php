@extends('layouts.frontend.resume-master')

@section('title', 'Build Resume')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<link href="{{ asset('/frontend/css/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/croppie.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}">
@endsection
@section('style')
<style type="text/css">
    .website-social-label{
        list-style: none;
    }
    #canvas_container {
        background: #7a8599;
        text-align: center;
        position: relative;
    }
    
    .ucs-title{
        margin: auto;
        border: 0;
        padding-left: 0px;
        height: auto;
        font-size: 24px;
        color: inherit;
    }
    
    .edt-c{font-size: 16px;color: #212529;border-radius: 2px;padding: 10px; cursor: pointer;}
    .edt-c:hover{color: #fff;background-color: #07689f;}
</style>
@endsection

@section('content')


    <!--=================================
    Advertise A Job -->
    {{--@if($template_id != 11)--}}
    <section class="space-ptb">
        <div class="container">
            <div class="split left">
                <div class="container">
                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard-candidates-resume-builder') }}" type="button" id="backbtn"><i class="fa fa-angle-left"></i> Back</a>
                    {{--<form action="" method="POST" id="ResumeForm" enctype="multipart/form-data">--}}
                        @csrf
                        <input type="text" name="main_title" id="ResumeMainTitle" class="form-control col-md-3 resm-title" placeholder="Untitled" value="@if(!empty($personal_details)){{ $personal_details->resume_title }}@endif">

                        {{--<input type="text" class="form-control" id="resume_variation" name="resume_variation" value="@if(!empty($personal_details)){{ $personal_details->resume_variation }}@endif">--}}
                        <fieldset>
                          <legend>Personal Details</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="job_title">Job Title:</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" value="@if(!empty($personal_details)){{ $personal_details->main_job_title }}@endif">
                                </div>
                                <div class="form-group col-md-6 profile-picture-image">
                                    <div class="profile-picture">
                                    {{--<form id="profile_picture_upload" method="POST" enctype="multipart/form-data">--}}
                                    @if($template_id != 17 && $template_id != 4 && $template_id != 7 && $template_id != 9 && $template_id != 11 && $template_id != 13 && $template_id != 3 && $template_id != 18 && $template_id != 19 && $template_id != 2 && $template_id != 20 && $template_id != 15 && $template_id != 5 && $template_id != 1 && $template_id != 14)
                                        <label for="image">Upload Photo</label>
                                        <button type="button" class="btn btn-primary btn-md form-control" data-toggle="modal" data-target="#ImageModal" style="color: #ffffff;" disabled=""><i class="fa fa-ban"></i>
                                          Not Supported
                                        </button>
                                        @else
                                        <label for="image" class="upload-image">Upload Photo:</label>
                                        @if(!empty($personal_details->profile_image))
                                            <button type="button" class="btn btn-primary btn-md form-control edit-profile" data-toggle="modal" data-target="#ImageModal" style="color: #ffffff;">
                                                <i class="fa fa-edit"></i>  Edit Profile
                                            </button>
                                            <a class="" id="deleteProfilePicture" class="btn btn-danger delete-profile" href="javascript:void()">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-primary btn-md form-control upload-profile upload-profile-image" onclick="uploadImage()" style="color: #ffffff;"><i class="fa fa-upload"></i>
                                              Upload photo
                                            </button>
                                        @endif
                                        <div class="delete-profile-picture"></div>
                                    @endif
                                    {{--</form>--}}
                                </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control full-name" id="fullname" name="fullname" value="@if(!empty($resume_email_fullname)){{ $resume_email_fullname->resume_fullname }}@endif" disabled="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="@if(!empty($resume_email_fullname)){{ $resume_email_fullname->resume_email }}@endif" disabled="">
                                </div>
                            </div>
                            {{--<div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control first-name" id="first_name" name="first_name" value="@if(!empty($personal_details)){{ $personal_details->first_name }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control last-name" id="last_name" name="last_name" value="@if(!empty($personal_details)){{ $personal_details->last_name }}@endif">
                                </div>
                            </div>--}}
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="@if(!empty($personal_details)){{ $personal_details->phone }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country:</label>
                                    <input type="text" class="form-control" id="country" name="country" value="@if(!empty($personal_details)){{ $personal_details->country }}@endif">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" value="@if(!empty($personal_details)){{ $personal_details->city }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" value="@if(!empty($personal_details)){{ $personal_details->address }}@endif">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="postal_code">Postal Code:</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="postal_code" name="postal_code" value="@if(!empty($personal_details)){{ $personal_details->postal_code }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nationality">Nationality:</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality" value="@if(!empty($personal_details)){{ $personal_details->nationality }}@endif">
                                </div>
                                {{--<div class="form-group col-md-6">
                                    <label for="driving_licence">Driving License:</label>
                                    <input type="text" class="form-control" id="driving_licence" name="driving_licence" value="@if(!empty($personal_details)){{ $personal_details->driving_licence }}@endif">
                                </div>--}}
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="place_of_birth">Current Location:</label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="@if(!empty($personal_details)){{ $personal_details->place_of_birth }}@endif">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_of_birth">Date Of Birth:</label>
                                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="@if(!empty($personal_details)){{ $personal_details->date_of_birth }}@endif">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Professional Summary</legend>
                          <hr>
                          <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <textarea cols="80" id="professional_summary" name="professional_summary" rows="10">@if(!empty($personal_details)) {!! $personal_details->profile_summary !!} @endif</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Employment History</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary btn-md" id="AddEmployerForm" type="button"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add employment</button>
                                    <br><br>
                                    <form id="employment_form"><div id="ShowEmployerForm"></div></form>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Education</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary btn-md" id="AddEducationForm" type="button"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add education</button>
                                    <br><br>
                                    <form id="education_form"><div id="ShowEducationForm"></div></form>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Website & Social Links</legend>
                          <hr>
                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary btn-md" id="AddWebsiteSocialLinkForm" type="button"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add link</button>
                                    <br><br>
                                    <form id="website_social_link_form"><div id="ShowWebsiteAndSocialLinkForm"></div></form>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                          <legend>Skills</legend>
                          <hr>
                            <div class="row col-md-12">
                                {{--<div id="ShowAutoSuggestSkills">
                                    <form class="skill_form">
                                    @if(!empty($skill))
                                        @foreach($skill as $key => $skill_name)
                                            <div class="chip skill-tag" id="{{ $skill_name->skill }}">
                                                <a href="javascript:void(0)" onclick="mapSkill('{{ $skill_name->skill }}')">{{ $skill_name->skill }}</a>
                                              <i class="fa fa-plus"></i>
                                            </div>
                                        @endforeach
                                    @endif
                                    </form>
                                </div>--}}
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary btn-md" id="AddSkillsForm" type="button"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Skill</button>
                                    <br><br>
                                    <form id="skill_form" class="skill_form"><div id="ShowSkillsForm"></div></form>
                                </div>
                            </div>
                        </fieldset>
                        <div id="CustomSection" style="display: none;">
                            <fieldset class="custom-section-title">
                                <legend><input type="text" name="ucs_main_heading" class="ucs-title" id="ucs_main_heading" placeholder="Untitled" value="@if($custom_section_heading != null){{ $custom_section_heading }} @else{{ "Untitled" }}@endif"><i class="fa fa-pen edt-c" onclick="changeCustomHeading()"></i>&nbsp;<button type="button" onclick="DeleteCustomForm()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                                <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="custom_section_form"><div id="ShowCustomSectionForm"></div></form>
                                        <br>
                                        <button class="btn btn-primary add-custom-form" id="ShowCustomAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Item</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="CourseSection" style="display: none;">
                            <fieldset>
                              <legend>Courses&nbsp;<button type="button" onclick="DeleteCourseSection()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="course_form"><div id="ShowCoursesForm"></div></form>
                                        <br>
                                        <button class="btn btn-primary add-course-form" id="ShowCourseAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Courses</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="ExtraCurricularActivitySection" style="display: none;">
                            <fieldset>
                              <legend>Extra-curricular Activities&nbsp;<button type="button" onclick="DeleteExtraCurricularActivity()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="extra_curricular_form"><div id="ShowExtraCurricularActivityForm"></div></form>
                                        <br>
                                        <button class="btn btn-primary add-extra-curricular-activity-form" id="ShowExtraCurricularActivityAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add activity</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="HobbiesSection">
                            <fieldset>
                                @if(!empty($getHobby))
                              <legend>Hobbies&nbsp;<button type="button" onclick="DeleteHobbies()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              @endif
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="hobby_form">
                                            @if(!empty($getHobby))
                                            <div id="ShowHobbiesForm">
                                                <div class="row" id="HobbiesForm">
                                                    <div class="form-group col-md-12">
                                                        <label for="hobbies">What do you like?</label>
                                                        <textarea cols="80" id="hobbies" class="hobbies-description form-control" name="hobbies" rows="6" data-sample-short placeholder="e.g. Skiing, skydiving, painting">{{ $getHobby->uh_hobby }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                <div id="ShowHobbiesForm"></div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="InternshipSection" style="display: none;">
                            <fieldset>
                              <legend>Internships&nbsp;<button type="button" onclick="DeleteInternship()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="internship_form"><div id="ShowInternshipForm"></div></form>
                                        <br>
                                        <button class="btn btn-primary add-internship-form" id="ShowInternshipAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Internship</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="LanguageSection" style="display: none;">
                            <fieldset>
                              <legend>Languages&nbsp;<button type="button" onclick="DeleteLanguage()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="language_form"><div id="ShowLanguageForm"></div></form>
                                        <br>
                                        <button class="btn btn-primary add-language-form" id="ShowLanguageAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Language</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="ReferenceSection" style="display: none;">
                            <fieldset>
                              <legend>References&nbsp;<button type="button" onclick="DeleteReference()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
                              <hr>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <form id="reference_form">
                                            <div class="custom-control custom-switch">
                                              <input type="checkbox" class="custom-control-input" id="ReferencecustomSwitches" name="reference_present_label" @if(!empty($personal_details) && ($personal_details->is_reference_hide == 1)) {{ "checked" }} @endif>
                                              <label class="custom-control-label" for="ReferencecustomSwitches">I'd like to hide references and make them available only upon request</label>
                                               <input type="hidden" name="reference_present_label" class="reference-present-label" id="ReferencePresentLabel" value="">
                                            </div>
                                            <div id="ShowReferenceForm"></div>
                                        </form>
                                        <br>
                                        <button class="btn btn-primary add-reference-form" id="ShowReferenceAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Reference</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <fieldset>
                            <legend>Add Section</legend>
                            <div class="row">
                                <div class="col">
                                    <button class="btn extra-section add-custom-form" id="AddCustomSection" type="button"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Custom Section</button>
                                    <button class="btn extra-section add-extra-curricular-activity-form" id="AddExtraCurricularActivityForm" type="button"><i class="fa fa-futbol"></i>&nbsp;&nbsp;Extra-curricular Activities</button>
                                    <button class="btn extra-section" type="button" id="AddHobbiesForm"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Hobbies</button>
                                    <button class="btn extra-section add-reference-form" type="button" id="AddReferenceForm"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;References</button>
                                </div>
                                <div class="col">
                                    <button class="btn extra-section add-course-form" id="AddCoursesForm" type="button"><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;Courses</button>
                                    <button class="btn extra-section add-internship-form" type="button" id="AddInternshipForm"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Internships</button>
                                    <button class="btn extra-section add-language-form" type="button" id="AddLanguageForm"><i class="fa fa-language"></i>&nbsp;&nbsp;Languages</button>
                                    {{-- <button class="btn extra-section" type="button"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Languages</button> --}}
                                </div>
                              </div>
                        </fieldset>
                    {{--</form>--}}
                </div>
            </div>
            <div class="split right" id="template_view">
                <a href="javascript:void(0)" id="BackToSelectTemplatePage"><a href="{{ route('dashboard-candidates-resume-builder') }}" class="cls-btn" style="float: right;"><i class="fa fa-times"></i></a></a>
                <div class="centered col-pos">
                    <!-- Them Color Picker START -->
                    <div class="them-colo-pic resume-color-codes">
                        @php $i = 1; @endphp
                        @if(!empty($color_codes) && count($color_codes['colors']) > 0)
                        @foreach($color_codes['colors'] as $key => $color_code)
                        @php $item_class = ($i == 1) ? 'colo-bx-wrp thm-color active' : 'colo-bx-wrp thm-color'; @endphp
                            <div class="colo-bx-wrp thm-color" style="background-color: {{ $color_code }}" color="{{ $color_code }}" onclick="ChangeColorCode({{ $personal_details->id }}, '{{ $color_code }}')">
                                @if($personal_details->resume_variation == $color_code)
                                    <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" class=""><path d="M16.6917162,8.75389189 L18.3082838,10.2461081 L12.3082838,16.7461081 C11.8845221,17.2051833 11.1639539,17.2195889 10.7221825,16.7778175 L6.22218254,12.2778175 L7.77781746,10.7221825 L11.4682653,14.4126304 L16.6917162,8.75389189 Z"></path></svg>
                                @elseif(empty($personal_details->resume_variation))
                                    @if($key == 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" class=""><path d="M16.6917162,8.75389189 L18.3082838,10.2461081 L12.3082838,16.7461081 C11.8845221,17.2051833 11.1639539,17.2195889 10.7221825,16.7778175 L6.22218254,12.2778175 L7.77781746,10.7221825 L11.4682653,14.4126304 L16.6917162,8.75389189 Z"></path></svg>
                                    @endif
                                @endif
                            </div>
                        @php $i++ @endphp
                        @endforeach 
                        @else
                            <div class="colo-bx-wrp thm-color" data-toggle="tooltip" data-placement="right" title="This template doesn't support color variations">
                                <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M8,11 C8,7.83333333 9.375,6 12,6 C14.625,6 16,7.83333333 16,11 C16.5522847,11 17,11.4477153 17,12 L17,17 C17,17.5522847 16.5522847,18 16,18 L8,18 C7.44771525,18 7,17.5522847 7,17 L7,12 C7,11.4477153 7.44771525,11 8,11 Z M10,11 L14,11 C14,8.83333333 13.375,8 12,8 C10.625,8 10,8.83333333 10,11 Z"></path></svg>
                            </div>
                        @endif
                        {{--<div class="colo-bx-wrp thm-color" color="#0C6453"></div>
                        <div class="colo-bx-wrp thm-color" color="#10365C"></div>
                        <div class="colo-bx-wrp thm-color" color="#3E1D53"></div>
                        <div class="colo-bx-wrp thm-color" color="#242935"></div>--}}
                    </div>
                    <!-- Them Color Picker END -->
                    <div id="my_pdf_viewer">
                        <!-- Loader START -->
                        
                        <!-- Loader END -->
                        <div id="canvas_container">
                            <div class="loader-cont" style="display: none;">
                                <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="loading">
                            </div>
                            <canvas id="pdf_renderer" width="363"></canvas>
                        </div>
                        <div id="navigation_controls">
                            <button id="go_previous" class="next-pre-btn"><i class="fa fa-arrow-left"></i></button><span id='cur_page'>1</span>/<span id='total_page'>1</span><button id="go_next" class="next-pre-btn"><i class="fa fa-arrow-right"></i></button><br/>
                            <input id="current_page" value="1" type="number"/>
                            <button id="load_2" class="next-pre-btn">Load 2</button>
                            <div>
                            </div>
                        </div>
                    </div>
                    {{--<div id="select_frame" class="select_frame">
                    </div>--}}
                    {{--<button class="btn btn-primary" type="button" onclick="updateResumeTemplate('{{ $user_resume_id }}')"><i class="fa fa-select"></i>Select Template</button>--}}
                    <a href="{{ route('update-resume-template',[$user_resume_id]) }}" class="btn btn-primary sel-temp"><i class="fa fa-th-large" aria-hidden="true"></i>  Select Template</a>
                    <form method="POST"><button class="btn btn-primary" type="button" id="DownloadPDF"><i class="fa fa-file-pdf"></i>  Download PDF</button></form>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" tabindex="-1" id="ImageModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="profile_picture_form" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title">Upload Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <input type="file" class="form-control" name="profile_picture" id="profile_picture" accept="image/*"  onchange="readURL(this);" />
                    <br />
                    <div id="uploaded_image"></div>
                    @if(!empty($personal_details->profile_image))
                        <img id="uploaded_image_view" src="{{ asset('/frontend/images/profile_pictures/'.$personal_details->profile_image) }}" style="width: 465px;">
                    @else
                        <img id="uploaded_image_view" style="width: 465px;">
                    @endif
                    {{-- <div class="delete-profile"></div> --}}
              </div>
              <div class="modal-footer">
                <div class="spinner-border m-2 loader-image" role="status" style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
                <button type="submit" id="saveImage" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Coming soon modal -->
    <div class="modal" tabindex="-1" id="ComingSoonModal">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4>Coming Soon</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
    <!-- Image crop and rotate -->
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload & Crop Image</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px">
                                @if(!empty($personal_details->profile_image))
                                    <img src="{{ $getProfilePicture['profile_image'] }}">
                                @else
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px;">
                            <br />
                            <br />
                            <br/>
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--@else
    <h3><center>Coming Soon</center></h3>
    @endif--}}
    <!--=================================
    Advertise A Job -->

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/frontend/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/frontend/js/croppie.js') }}"></script>
<script src="{{ asset('/frontend/js/htmlpdfgenerator.js') }}"></script>
<script src="{{ asset('/frontend/js/resume.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/resume-save-details.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/employment.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/education.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/website-links.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/skills.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/course.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/extra-curricular-activity.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/hobbies.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/internship.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/language.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/custom-section.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/reference.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/get-section-data.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var template_id = '{{ $template_id }}';
    var r_id = '{{ $user_resume_id }}';
    var csrftoken = '{{ csrf_token() }}';
    var user = "{{ Auth::guard('users')->user()->id }}";
    var fullname = '{!! str_replace("'", "\'", json_encode($resume_email_fullname)) !!}';
    var nameData = JSON.parse(fullname);
    var employment_details = '{!! str_replace("'", "\'", json_encode($getCareers)) !!}';
    var education_details = '{!! str_replace("'", "\'", json_encode($getEducation)) !!}';
    var website_links = '{!! str_replace("'", "\'", json_encode($getWebsiteSocialLink)) !!}';
    var skill_details = '{!! str_replace("'", "\'", json_encode($getSkill)) !!}';
    var hobbies = '{!! str_replace("'", "\'", json_encode($getHobby)) !!}';
    var custom_details = '{!! str_replace("'", "\'", json_encode($getCustomSection)) !!}';
    var internship_details = '{!! str_replace("'", "\'", json_encode($getInternship)) !!}';
    var course_details = '{!! str_replace("'", "\'", json_encode($getCourse)) !!}';
    var extra_activity_details = '{!! str_replace("'", "\'", json_encode($getExtraCurricularActivity)) !!}';
    var language_details = '{!! str_replace("'", "\'", json_encode($getLanguage)) !!}';
    var reference_details = '{!! str_replace("'", "\'", json_encode($getReference)) !!}';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="{{ asset('/frontend/js/pdf-view.js') }}"></script>
<script type="text/javascript">
</script>
@endsection

@section('script')
@endsection

