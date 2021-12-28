<!DOCTYPE html>
<html>
<head>
    <title>Cinnamon</title>
    <style type="text/css">
        body,div,ul,ol,li,h1,h2,h3,h4,h5,h6,form,input,button,p,th,td {
            margin: 0;
            padding: 0;
            font-family: "Calibri";
        }
        table {
            border-collapse: collapse;
        }
        .w-100 {
            width: 100%;
        }
        .w-50{width: 50%;}
        h1,h2,h3,h4,h5,h6 {
            font-weight: normal;
        }
        .m-auto{margin: auto;}
        .f-12px{font-size: 12px;}
        .f-14px{font-size: 14px;}
        .f-16px{font-size: 16px;}
        .f-18px{font-size: 18px;}
        .f-22px{font-size: 22px;}
        .f-24px{font-size: 24px;}
        .f-26px{font-size: 26px;}
        .text-capitalize{text-transform: capitalize;}
        .text-upper{text-transform: uppercase;}
        .text-center{text-align: center;}
        .ver-alg-mid{vertical-align: middle;}
        .ver-alg-top{vertical-align: top;}
        .c-primg{width: 80px;height: 80;border-radius: 90px;object-fit: contain;}
        .w-100p{width: 100px;}
        .p-tb-lr{padding: 40px 45px;}
        .p-lr{padding: 0 45px;}
        .p-lr-35{padding: 0 55px;}
        .rig-bg{width: 35%;background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; color: #f5faff;}
        .cinnamon-contant a{color: #373737;text-decoration: none;}
        .c-heading{font-size: 42px;font-weight: bold;color: #0b0b0b;text-transform: capitalize;}
        .c-subhed{font-size: 16px;text-transform: uppercase;color: #8b8b8b;}
        .prof-hrds{font-size: 24px;font-weight: bold;margin-bottom: 10px;color: #292929;text-transform: capitalize;}
        .mt-25{margin-top: 25px;}
        .c-ul-dec{margin-left: 27px;margin-top: 10px;color: #373737;}
        .c-ul-dec li, .cinnamon-contant li{margin-bottom: 5px;}
        .c-ul-dec li:last-child, .cinnamon-contantli:last-child{margin-bottom: 15px;}
        .time-pre{color: #cbcbcb;text-transform: uppercase;font-size: 16px;}
        .c-compname{font-size: 18px;font-weight: bold;text-transform: capitalize;}
        .mb-20{margin-bottom: 20px;}
        .c-sm-hed{font-size: 22px;margin-bottom: 12px;text-transform: capitalize;}
        .addre-s span{display: block;margin-bottom: 3px;}
        .m-t-20{margin-top: 20px;}
        .hone-progress {padding: 0;width: 100%;height: 8px;overflow: hidden;background: #8cabd0;}
        .hone-bar {position:relative;float:left;min-width:1%;height:100%;background:#f4fdfd;width: 0%;transition: all 0.8s linear 1s;}
        .hone-skl-con {width: 100%;float: left;margin-bottom: 15px;}
        .hone-skl-con h3{font-size: 18px;margin-bottom: 5px;color: #fff;text-transform: capitalize;}
        .cinnamon-contant p{
            word-break: break-word;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="cinnamon-contant">
    <table class="w-100">
        <tbody>
            <tr>
                <td class="p-tb-lr">
                    <table class="w-100">
                        <tr>
                            @if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
                            <td class="w-100p">
                                <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="c-primg"> 
                            </td>
                            <td>
                                @if(isset($getResumeFullNameEmail['resume_fullname']))
                                    <h1 class="c-heading">{{$getResumeFullNameEmail['resume_fullname']}}</h1>
                                @endif
                                @if(isset($getPersonalDetails['main_job_title']))
                                    <h2 class="c-subhed">{{$getPersonalDetails['main_job_title']}}</h2>
                                @endif
                            </td>
                            @else
                            <td class="w-100p">
                                <img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="c-primg"> 
                            </td>
                            <td>
                                @if(isset($getResumeFullNameEmail['resume_fullname']))
                                    <h1 class="c-heading">{{$getResumeFullNameEmail['resume_fullname']}}</h1>
                                @endif
                                @if(isset($getPersonalDetails['main_job_title']))
                                    <h2 class="c-subhed">{{$getPersonalDetails['main_job_title']}}</h2>
                                @endif
                            </td>
                            @endif
                        </tr>
                    </table>
                </td>
                <td class="rig-bg"></td>
            </tr>
            <tr>
                <td class="p-lr ver-alg-top">
                    <table class="w-100">
                        @if((isset($getPersonalDetails['profile_summary']) && $getPersonalDetails['profile_summary']!=''))
                            <tr>
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds" id="ProfileSummary">Profile</h2>
                                    </div>
                                    <p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds" id="ProfileSummary" style="display: none">Profile</h2>
                                    </div>
                                    <p id="ProfessionalSummary_Text"></p>
                                </td>
                            </tr>
                        @endif

                        @if( (!empty($getCareers) && count($getCareers) > 0))
                            <tr id="EmployerDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 employment-section" >Employment history</h2>
                                    </div>
                                    <table class="w-100" id="EmployerDetails_new">
                                        @foreach($getCareers as $key => $employer_details)
                                        @php 
                                            $vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
                                            $vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name'],$employer_details['uc_city']));
                                        @endphp
                                            <tr class="employer-add-more-section" id="EmployerAddMore_section_{{$key}}">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre">
                                                        @if($employer_details['uc_is_present'] == 0)
                                                            <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <div {{--class="c-ul-dec"--}} class="employer-description-text c-ul-dec">
                                                        {!! $employer_details['career_description'] !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="EmployerDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 employment-section" style="display: none">Employment history</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="EmployerDetails_new">

                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getEducation) && count($getEducation) > 0))
                            <tr id="EducationDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 education-section" >Education</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="EducationDetails_new">
                                        @foreach($getEducation as $key => $education_details)
                                        @php 
                                            $vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
                                            $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
                                        @endphp
                                            <tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre">
                                                        @if($education_details['ue_is_present'] == 0)
                                                            <span class="education-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="education-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <div class="education-description-text c-ul-dec">
                                                        {!! $education_details['education_description'] !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="EducationDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 education-section" style="display: none">Education</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="EducationDetails_new">
                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getCourse) && count($getCourse) > 0))
                            <tr id="CourseSectionDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 courses-section" >Courses</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="CourseSectionDetails_new">
                                        @foreach($getCourse as $key => $course_details)
                                        @php 
                                            $vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
                                            $vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
                                        @endphp
                                            <tr  class="course-section">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre mb-20">
                                                        @if($course_details['ucr_is_present'] == 0)
                                                            <span class="course-end-date" id="employer_enddate_{{ $key }}">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="course-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="CourseSectionDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 courses-section" style="display: none">Courses</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="CourseSectionDetails_new">
                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0))
                            <tr id="ExtraCurricularActivityDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 activity-section" >Extra-curricular Activity</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
                                        @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                        @php 
                                            $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
                                            $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
                                        @endphp
                                            <tr class="extra-curricular-add-more-section">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre">
                                                        @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                            <span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <div class="extra-curricular-description-text c-ul-dec">
                                                        {!! $extra_curricular_section_details['extra_curricular_description'] !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="ExtraCurricularActivityDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 activity-section" style="display: none">Extra-curricular Activity</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">

                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getInternship) && count($getInternship) > 0))
                            <tr id="InternshipDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 internship-section" >Internships</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="InternshipSectionDetails_new">
                                        @foreach($getInternship as $key => $internship_details)
                                        @php 
                                            $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                            $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
                                        @endphp
                                            <tr class="course-section">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre">
                                                        @if($internship_details['ui_is_present'] == 0)
                                                            <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <div class="internship-description-text c-ul-dec">
                                                        {!! $internship_details['internship_description'] !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="InternshipDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 internship-section" style="display: none">Internships</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="InternshipSectionDetails_new">

                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getCustomSection) && count($getCustomSection) > 0))
                            <tr id="CustomSectionDetails_Text">
                                @php $custom_heading = ''; @endphp
                                @foreach($getCustomSection as $custom)
                                    @php $custom_heading = $custom->ucs_main_heading; @endphp
                                @endforeach
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 custom-section" >{{ $custom_heading }}</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="CustomSectionDetails_new">
                                        @foreach($getCustomSection as $key => $custom_section_details)
                                        @php 
                                            $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                            $vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
                                        @endphp
                                            <tr class="course-section">
                                                <td>
                                                    <h3 class="c-compname">{{ implode(", ", $vars_a) }}</h3>
                                                    <h4 class="time-pre">
                                                        @if($custom_section_details['ucs_is_present'] == 0)
                                                            <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <div class="custom-description-text c-ul-dec">
                                                        {!! $custom_section_details['custom_description'] !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="CustomSectionDetails_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 custom-section" style="display: none">Custom</h2>
                                    </div>
                                    <table class="w-100 employ-histry" id="CustomSectionDetails_new">

                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((isset($getHobby['uh_hobby']) && $getHobby['uh_hobby']!=''))
                            <tr id="HobbiesSection">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 hobbies-section">Hobbies</h2>
                                    </div>
                                    <h6 class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</h6>
                                </td>
                            </tr>
                        @else
                            <tr id="HobbiesSection">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 hobbies-section" style="display: none">Hobbies</h2>
                                    </div>
                                    <h6 class="hobbies" id="Hobbies_Text"></h6>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0))
                            <tr id="WebsiteSocialLinks_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 website-links-section">Links</h2>
                                    </div>
                                    <table class="w-100" id="WebsiteSocialLinks_new">
                                        @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                            <tr>
                                                <td id="WebsiteSocialLinksData_{{ $key }}">
                                                    <a class="language-title" target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="WebsiteSocialLinks_Text">
                                <td>
                                    <div class="c-detal-nm">
                                        <h2 class="prof-hrds mt-25 website-links-section" style="display: none">Links</h2>
                                    </div>
                                    <table class="w-100" id="WebsiteSocialLinks_new"></table>
                                </td>
                            </tr>
                        @endif

                            @if((!empty($getReference) && count($getReference) > 0))
                                <tr id="ReferenceDetails_Text">
                                    <td>
                                        <div class="c-detal-nm">
                                            <h2 class="prof-hrds mt-25 reference-section">Reference</h2>
                                        </div>
                                        <table class="w-100" id="ReferenceDetails_new">
                                            @if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                                <p>I'd like to hide references and make them available only upon request</p>
                                            @else
                                            @foreach($getReference as $key => $reference_details)
                                            @php 
                                                $vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
                                                $vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
                                            @endphp
                                                <tr>
                                                    <td>
                                                        <h3 class="c-compname reference-name">{{ implode(" from ", $vars) }}</h3>
                                                        <p>{{ implode(" | ", $vars_a) }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            @else
                                <tr id="ReferenceDetails_Text">
                                    <td>
                                        <div class="c-detal-nm">
                                            <h2 class="prof-hrds mt-25 reference-section" style="display: none">Reference</h2>
                                        </div>
                                        <table class="w-100" id="ReferenceDetails_new"></table>
                                    </td>
                                </tr>
                            @endif

                    </table>
                </td>
                <td class="rig-bg ver-alg-top p-lr-35">
                    <table class="w-100">

                        @if((!empty($getPersonalDetails)))
                            <tr>
                                <td>
                                    <h2 class="c-sm-hed" style="color: white">Details</h2>
                                    @if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
                                        @php 
                                            $address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
                                        @endphp
                                        <p class="addre-s extra-details" id="ExtraDetails">
                                            <span>{{ implode(", ",$address) }}</span>
                                            {{--<span class="c-fst-address" id="Address_Text">{{$getPersonalDetails['address']}},</span>
                                            <span class="c-sec-address">
                                                <label  id="CityName_Text">{{ $getPersonalDetails['city'] }},</label>
                                                <label  id="PostalCode_Text">{{ $getPersonalDetails['postal_code'] }},</label>
                                                <label  id="CountryName_Text">{{ $getPersonalDetails['country'] }}</label>
                                            </span>--}}
                                        </p>
                                    @endif

                                    @if(isset($getPersonalDetails['phone']) && $getPersonalDetails['phone']!='')
                                        <p class="addre-s">
                                            <span class="c-fst-address" id="ContactNumber_Text">{{$getPersonalDetails['phone']}}</span>
                                        </p>
                                    @endif

                                    @if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!='')
                                        <p class="addre-s">
                                            <span class="c-fst-address" id="Email_Text">{{$getResumeFullNameEmail['resume_email']}}</span>
                                        </p>
                                    @endif

                                    @if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
                                        @php 
                                            $location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
                                        @endphp
                                        <p class="addre-s">
                                            <span class="c-fst-address" id="ContactNumber_Text">{{ implode(", ",$location) }}</span>
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    <h2 class="c-sm-hed"></h2>
                                    <p class="addre-s extra-details" id="ExtraDetails">
                                        <span class="c-fst-address" id="Address_Text"></span>
                                        <span class="c-sec-address" id="CityName_Text"></span>
                                        <span class="c-sec-address" id="PostalCode_Text"></span>
                                        <span class="c-sec-address" id="CountryName_Text"></span>
                                    </p>
                                    <p class="addre-s">
                                        <span class="c-fst-address" id="ContactNumber_Text"></span>
                                    </p>
                                    <p class="addre-s">
                                        <span class="c-fst-address" id="Email_Text"></span>
                                    </p>
                                </td>
                            </tr>
                        @endif

                        @if( (!empty($getSkill) && count($getSkill) > 0))
                            <tr id="Skills_Text">
                                <td>
                                    <h2 class="c-sm-hed m-t-20" style="color: white">Skills</h2>
                                    <table class="w-100" id="SkillDetails_new">
                                            <tr>
                                                <td>
                                                    @foreach($getSkill as $key => $skill_details)
                                                        <div class="hone-skl-con">
                                                            <h3 class="skill-name">{{ $skill_details['us_skill'] }}</h3>
                                                            <div class="hone-progress">
                                                                <div class="hone-bar" style="width:{{$skill_details['us_skill_level']*100/5}}%"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="Skills_Text">
                                <td>
                                    <h2 class="c-sm-hed m-t-20 skill-section" style="display: none">Skills</h2>
                                    <table class="w-100" id="SkillDetails_new">
                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getLanguage) && count($getLanguage) > 0))
                            <tr id="LanguageDetails_Text">
                                <td>
                                    <h2 class="c-sm-hed m-t-20 language-section" style="color: white">Language</h2>
                                    <table class="w-100" id="LanguageDetails_new">
                                        <tr>
                                            <td>
                                                @foreach($getLanguage as $key => $language_details)
                                                    <div class="hone-skl-con">
                                                        <h3 class="language-title">{{ $language_details['ul_language'] }}</h3>
                                                        <div class="hone-progress">
                                                            <div class="hone-bar" style="width:{{$language_details['ul_language_level_id']*100/11}}%"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="LanguageDetails_Text">
                                <td>
                                    <h2 class="c-sm-hed m-t-20 language-section" style="display: none">Language</h2>
                                    <table class="w-100" id="LanguageDetails_new">
                                    </table>
                                </td>
                            </tr>
                        @endif

                    </table>

                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
