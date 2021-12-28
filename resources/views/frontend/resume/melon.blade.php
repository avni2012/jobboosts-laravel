
<!DOCTYPE html>
<html>
<head>
    <title>Melon</title>
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
        .melon-profile{width: 95px;height: 95px;border-radius: 60px;}
        .p-30{padding: 30px;}
        .w-130{width: 130px;}
        .m-username{color: #3f3f3f;font-size: 32px;text-transform: capitalize;}
        .m-aply{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; font-size: 22px;margin-top: -4px;}
        .address-con{color: #bbbbbb;font-size: 14px;margin-top: 8px;}
        .ml-loc-i{width: 13px;margin-bottom: -3px;}
        .work-hed{margin-top: 30px;margin-bottom: 15px;color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; text-transform: capitalize;}
        .w-30p{width: 30%;}
        .melon-cont p, .melon-cont ul, .melon-cont a{color: #5d5d5d;}
        .melon-cont p {margin-bottom: 5px;}
        .melon-cont a{text-decoration: none;}
        .w-195{width: 205px;}
        .me-d-con{margin-left: 30px;}
        .me-d-con li{margin-bottom: 5px;}
        .me-d-con li:last-child, .melon-cont li:last-child {margin-bottom: 25px;}
        .exp-year{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; text-transform: capitalize;font-size: 16px;margin-bottom: 10px;}
        .jpb-pos{color: #484848;font-weight: bold;font-size: 24px;margin-bottom: 10px;}
        .w-location{font-size: 14px;color: #a7a7a7;font-weight: bold;}
        .edu-sc-det{font-size: 18px;margin-bottom: 25px;}
        .mt-0{margin-top: 0;}
        .melo-address-cont p {color: #585858;font-size: 18px;margin-bottom: 8px;font-weight: bold;}
        .melo-skill-cont h6{color: #5e5e5e;font-size: 18px;text-transform: capitalize;}
        .melo-skill-cont{margin-bottom: 10px;}
        .melo-proj-skill ul{list-style: none;display: block;}
        .melo-proj-skill ul li{display: inline-block;}
        .melo-proj-skill ul li:last-child{margin-bottom: 0px;}
        .melo-proj-skill ul li span{height: 6px;width: 6px;border-radius: 25px;background-color: #cbcbcb;display: block;margin-top: 8px;margin-right: 8px;}
        .melo-proj-skill ul li span.melo-active{background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
        .melon-cont p{
            word-break: break-word;
        }
    </style>
</head>
<body>
<div class="melon-cont" style="background-color: #ffffff;">
    <table class="w-100">
        <tbody>
        <tr>
            <td class="p-30 ver-alg-top">
                    <table class="w-100">

                        <tr>
                            @if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
                            <td class="w-130">
                                    <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="melon-profile"> 
                            </td>
                            <td>
                                @if(isset($getResumeFullNameEmail['resume_fullname']))
                                    <h1 class="m-username">{{$getResumeFullNameEmail['resume_fullname']}}</h1>
                                @endif
                                @if(isset($getPersonalDetails['main_job_title']))
                                    <h2 class="m-aply">{{$getPersonalDetails['main_job_title']}}</h2>
                                @endif

                                @if((!empty($getPersonalDetails)))
                                    @if( !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) )
                                        <p class="address-con extra-details" id="ExtraDetails">
                                            <img src="{{asset('frontend/images/resume_templates/melon-images/melon-map.png')}}" alt="map" class="ml-loc-i">
                                            <span id="CityName_Text">{{ $getPersonalDetails['city'] }}</span>,
                                            <span id="CountryName_Text">{{ $getPersonalDetails['country'] }}</span>
                                        </p>
                                    @endif

                                    @if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!='')
                                        <p class="address-con">
                                            <span  id="Email_Text">{{$getResumeFullNameEmail['resume_email']}}</span>
                                        </p>
                                    @endif
                                @else
                                    <p class="address-con extra-details" id="ExtraDetails">
                                        <span  id="CityName_Text"></span>
                                        <span  id="CountryName_Text"></span>
                                    </p>
                                    <p class="address-con">
                                        <span  id="Email_Text"></span>
                                    </p>
                                @endif
                            </td>
                            @else
                            <td class="w-130">
                                    <img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="melon-profile"> 
                            </td>
                            <td>
                                @if(isset($getResumeFullNameEmail['resume_fullname']))
                                    <h1 class="m-username">{{$getResumeFullNameEmail['resume_fullname']}}</h1>
                                @endif
                                @if(isset($getPersonalDetails['main_job_title']))
                                    <h2 class="m-aply">{{$getPersonalDetails['main_job_title']}}</h2>
                                @endif

                                @if((!empty($getPersonalDetails)))
                                    @if( !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) )
                                        <p class="address-con extra-details" id="ExtraDetails">
                                            <img src="{{asset('frontend/images/resume_templates/melon-images/melon-map.png')}}" alt="map" class="ml-loc-i">
                                            <span id="CityName_Text">{{ $getPersonalDetails['city'] }}</span>,
                                            <span id="CountryName_Text">{{ $getPersonalDetails['country'] }}</span>
                                        </p>
                                    @endif

                                    @if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!='')
                                        <p class="address-con">
                                            <span  id="Email_Text">{{$getResumeFullNameEmail['resume_email']}}</span>
                                        </p>
                                    @endif
                                @else
                                    <p class="address-con extra-details" id="ExtraDetails">
                                        <span  id="CityName_Text"></span>
                                        <span  id="CountryName_Text"></span>
                                    </p>
                                    <p class="address-con">
                                        <span  id="Email_Text"></span>
                                    </p>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @if((isset($getPersonalDetails['profile_summary']) && $getPersonalDetails['profile_summary']!=''))
                            <tr>
                                <td colspan="2">
                                    <h2 class="work-hed" id="ProfileSummary">Profile</h2>
                                    <div id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="2">
                                    <h2 class="work-hed" id="ProfileSummary" style="display: none">Profile</h2>
                                    <div id="ProfessionalSummary_Text"></div>
                                </td>
                            </tr>
                        @endif

                        @if( (!empty($getCareers) && count($getCareers) > 0))
                            <tr id="EmployerDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed employment-section">Employment history</h2>
                                    <table class="w-100" id="EmployerDetails_new">
                                        @foreach($getCareers as $key => $employer_details)
                                        @php 
                                            $vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
                                            $vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name']));
                                        @endphp
                                            <tr class="employer-add-more-section" id="EmployerAddMore_section_{{$key}}">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        @if($employer_details['uc_is_present'] == 0)
                                                            <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location employer-city">{{ $employer_details['uc_city'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        {{ implode(" at ", $vars_a) }}
                                                    </h3>
                                                    <div {{--class="c-ul-dec"--}} class="employer-description-text">
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
                                <td colspan="2">
                                    <h2 class="work-hed employment-section" style="display: none">Employment history</h2>
                                    <table class="w-100 employ-histry" id="EmployerDetails_new"></table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getEducation) && count($getEducation) > 0))
                            <tr id="EducationDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed education-section">Education</h2>
                                    <table class="w-100" id="EducationDetails_new">
                                        @foreach($getEducation as $key => $education_details)
                                        @php 
                                            $vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
                                            $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
                                        @endphp
                                            <tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        @if($education_details['ue_is_present'] == 0)
                                                            <span class="education-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="education-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location education-city">{{ $education_details['ue_city'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        {{ implode(" at ", $vars_a) }}
                                                    </h3>
                                                    <div class=" <!---edu-sc-det---> education-description-text">
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
                                <td colspan="2">
                                    <h2 class="work-hed education-section" style="display: none">Education</h2>
                                    <table class="w-100 employ-histry" id="EducationDetails_new"></table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getCourse) && count($getCourse) > 0))
                            <tr id="CourseSectionDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed courses-section" >Courses</h2>
                                    <table class="w-100" id="CourseSectionDetails_new">
                                        @foreach($getCourse as $key => $course_details)
                                        @php 
                                            $vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
                                        @endphp
                                            <tr class="course-section">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        @if($course_details['ucr_is_present'] == 0)
                                                            <span class="course-end-date" id="employer_enddate_{{ $key }}">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="course-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location institution-name">{{ $course_details['ucr_institute'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        <span class="course-title">{{ $course_details['ucr_course_name'] }}</span>
                                                    </h3>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr id="CourseSectionDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed courses-section" style="display: none">Courses</h2>
                                    <table class="w-100 employ-histry" id="CourseSectionDetails_new"></table>
                                </td>
                            </tr>
                        @endif


                        @if((!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0))
                            <tr id="ExtraCurricularActivityDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed activity-section">Extra-curricular Activity</h2>
                                    <table class="w-100" id="ExtraCurricularSectionDetails_new">
                                        @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                        @php 
                                            $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
                                            $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
                                        @endphp
                                            <tr class="extra-curricular-add-more-section">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                            <span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location extra-curricular-city">{{ $extra_curricular_section_details['ueca_city'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        {{ implode(", ", $vars_a) }}
                                                    </h3>
                                                    <div class="<!---edu-sc-det---> extra-curricular-description-text">
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
                                <td colspan="2">
                                    <h2 class="work-hed activity-section" style="display: none">Extra-curricular Activity</h2>
                                    <table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new"></table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getInternship) && count($getInternship) > 0))
                            <tr id="InternshipDetails_Text">
                                <td colspan="2">
                                    <h2 class="work-hed internship-section" >Internships</h2>
                                    <table class="w-100" id="InternshipSectionDetails_new">
                                        @foreach($getInternship as $key => $internship_details)
                                        @php 
                                            $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                            $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
                                        @endphp
                                            <tr class="course-section">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        <span class="internship-start-date">{{ $internship_details['ui_start_date'] }}</span>
                                                        @if($internship_details['ui_is_present'] == 0)
                                                            <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location internship-city">{{ $internship_details['ui_city'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        {{ implode(", ", $vars) }}
                                                    </h3>
                                                    <div class="<!---edu-sc-det---> internship-description-text">
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
                                <td colspan="2">
                                    <h2 class="work-hed internship-section" style="display: none">Internships</h2>
                                    <table class="w-100 employ-histry" id="InternshipSectionDetails_new"></table>
                                </td>
                            </tr>
                        @endif

                        @if((!empty($getCustomSection) && count($getCustomSection) > 0))
                            <tr id="CustomSectionDetails_Text">
                                @php $custom_heading = ''; @endphp
                                @foreach($getCustomSection as $custom)
                                    @php $custom_heading = $custom->ucs_main_heading; @endphp
                                @endforeach
                                <td colspan="2">
                                    <h2 class="work-hed custom-section" >{{ $custom_heading }}</h2>
                                    <table class="w-100" id="CustomSectionDetails_new">
                                        @foreach($getCustomSection as $key => $custom_section_details)
                                        @php 
                                            $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                        @endphp
                                            <tr class="course-section">
                                                <td class="w-195 ver-alg-top">
                                                    <h4 class="exp-year">
                                                        @if($custom_section_details['ucs_is_present'] == 0)
                                                            <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                        @else
                                                            <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                        @endif
                                                    </h4>
                                                    <h5 class="w-location custom-section-city">{{ $custom_section_details['ucs_city'] }}</h5>
                                                </td>
                                                <td class="ver-alg-top">
                                                    <h3 class="jpb-pos">
                                                        <span class="custom-job-title">{{ $custom_section_details['ucs_title'] }}</span>
                                                    </h3>
                                                    <div class="<!---edu-sc-det---> custom-description-text">
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
                                <td colspan="2">
                                    <h2 class="work-hed custom-section" style="display: none">Custom</h2>
                                    <table class="w-100 employ-histry" id="CustomSectionDetails_new"></table>
                                </td>
                            </tr>
                        @endif

                    </table>
            </td>
            <td class="p-30 w-30p ver-alg-top">
                <table class="w-100">
                    @if((!empty($getPersonalDetails)))
                        @if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['phone']))
                        <tr>
                            <td>
                                <h2 class="work-hed mt-0" id="">Details</h2>
                                <div class="melo-address-cont">
                                    @if(isset($getPersonalDetails['address']) && $getPersonalDetails['address']!='')
                                        <p id="Address_Text">{{$getPersonalDetails['address']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['postal_code']) && $getPersonalDetails['postal_code']!='')
                                        <p id="PostalCode_Text">{{ $getPersonalDetails['postal_code'] }}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['phone']) && $getPersonalDetails['phone']!='')
                                        <p  id="ContactNumber_Text">{{$getPersonalDetails['phone']}}</p>
                                    @endif
                                    @if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
                                        @php 
                                            $location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
                                        @endphp
                                        <p  id="ContactNumber_Text">{{ implode(", ",$location) }}</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endif
                    @else
                        <tr>
                            <td>
                                <h2 class="work-hed mt-0" id="Extra_Details" style="display: none">Details</h2>
                                <div class="melo-address-cont">
                                    <p id="Address_Text"></p>
                                    <p id="PostalCode_Text"></p>
                                    <p  id="ContactNumber_Text"></p>
                                </div>
                            </td>
                        </tr>
                    @endif

                    @if( (!empty($getSkill) && count($getSkill) > 0))
                        <tr id="Skills_Text">
                            <td>
                                <h2 class="work-hed">Skills</h2>
                                <table class="w-100" id="SkillDetails_new">
                                    <tr>
                                        <td>
                                            @foreach($getSkill as $key => $skill_details)
                                                <div class="melo-skill-cont">
                                                    <h6 class="skill-name">{{ $skill_details['us_skill'] }}</h6>
                                                    <div class="melo-proj-skill">
                                                        <ul>
                                                            @for($i=1;$i<=$skill_details['us_skill_level'];$i++)
                                                                <li><span class="melo-active"></span></li>
                                                            @endfor
    <!--                                                        <li><span></span></li>-->
                                                        </ul>
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
                                <h2 class="work-hed skill-section" style="display: none">Skills</h2>
                                <table class="w-100" id="SkillDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getLanguage) && count($getLanguage) > 0))
                        <tr id="LanguageDetails_Text">
                            <td>
                                <h2 class="work-hed language-section">Language</h2>
                                <table class="w-100" id="LanguageDetails_new">
                                    <tr>
                                        <td>
                                            @foreach($getLanguage as $key => $language_details)
                                                <div class="melo-skill-cont">
                                                    <h6 class="language-title">{{ $language_details['ul_language'] }}</h6>
                                                    <div class="melo-proj-skill">
                                                        <ul>
                                                            @for($i=1;$i<=$language_details['ul_language_level_id'];$i++)
                                                                <li><span class="melo-active"></span></li>
                                                        @endfor
                                                        <!--                                                        <li><span></span></li>-->
                                                        </ul>
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
                                <h2 class="work-hed language-section" style="display: none">Language</h2>
                                <table class="w-100" id="LanguageDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((isset($getHobby['uh_hobby']) && $getHobby['uh_hobby']!=''))
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="work-hed hobbies-section">Hobbies</h2>
                                <h6 class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</h6>
                            </td>
                        </tr>
                    @else
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="work-hed hobbies-section" style="display: none">Hobbies</h2>
                                <h6 class="hobbies" id="Hobbies_Text"></h6>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0))
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="work-hed website-links-section">Links</h2>
                                <table class="w-100" id="WebsiteSocialLinks_new">
                                    <tr>
                                        <td>
                                            @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                                <div class="melo-skill-cont" id="WebsiteSocialLinksData_{{ $key }}">
                                                    <a style="font-size: medium" class="language-title" target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="work-hed website-links-section" style="display: none">Links</h2>
                                <table class="w-100" id="WebsiteSocialLinks_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getReference) && count($getReference) > 0))
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="work-hed reference-section">Reference</h2>
                                <table class="w-100" id="ReferenceDetails_new">
                                    <tr>
                                        <td>
                                            @if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                                <p>I'd like to hide references and make them available only upon request</p>
                                            @else
                                            @foreach($getReference as $key => $reference_details)
                                            @php 
                                                $vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
                                                $vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
                                            @endphp
                                                <div class="melo-skill-cont">
                                                    <h6 class="reference-name">{{ implode(" from ", $vars) }}</h6>
                                                    <p>
                                                        {{ implode(" | ", $vars_a) }}
                                                    </p>
                                                </div>
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="work-hed reference-section" style="display: none">Reference</h2>
                                <table class="w-100" id="ReferenceDetails_new"></table>
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
