
<!DOCTYPE html>
<html>
<head>
    <title>Cotton</title>
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
        .c-name-cont{width: 50%;margin: 25px 0;padding: 30px;border: 1px solid #898989;position: absolute;top: 10px;left: 23%;background-color: #fff;}
        .p-30{padding: 30px;}
        .fsd{position: relative;height: 118px;}
        .sftv{background-color: #f5f5f5;width: 30%;}
        .c-username{font-size: 34px;text-transform: uppercase;letter-spacing: 3px;font-weight: bold;color: #393939;}
        .sub-name{color: #a2a2a2;font-size: 18px;text-transform: uppercase;letter-spacing: 3px;}
        .heg-fst{height:160px;}
        .p-30{padding: 30px}
        .cot-cat-tital{font-size: 18px;border-bottom: 1px solid #777777;padding-bottom: 8px;color: #5a5a5a;text-transform: uppercase;letter-spacing: 2px;margin-bottom: 15px;    font-weight: bold;}
        .cotton-cont p, .cotton-cont ul, .cotton-cont a, .cotton-cont ul li{color: #9c9c9c}
        .cotton-cont a{text-decoration: none;}
        .cot-info-cont{margin-bottom: 12px;}
        .cot-info-cont h4{color: #5b5b5b;text-transform: uppercase;font-weight: bold;font-size: 16px;}
        .mt-20{margin-top: 20px;}
        .cot-skill-cont h6{color: #8a8a8a;font-size: 16px;text-transform: capitalize;}
        .cot-skill-cont{margin-bottom: 10px;}
        .proj-skill ul{list-style: none;display: block;}
        .proj-skill ul li{display: inline-block;}
        .proj-skill ul li:last-child{margin-bottom: 5px;}
        .proj-skill ul li span{height: 8px;width: 8px;border-radius: 25px;background-color: #282828;display: block;margin-top: 8px;margin-right: 8px;}
        .mb-10{margin-bottom: 10px;}
        .his-det{position: relative;}
        .his-det h3{font-weight: bold;font-size: 18px;color: #555555;width: 80%;}
        .his-det h5{position: absolute;right: 0;top: 3px;color: #989898;}
        .yesr-c{color: #a8a8a8;font-size: 16px;margin-bottom: 10px;}
        .his-det-ct{margin-left: 20px;}
        .his-det-ct li, .cotton-cont li{margin-bottom: 5px;}
        .his-det-ct li:last-child, .cotton-cont li:last-child{margin-bottom: 22px;}
        .cotton-cont p{
            word-break: break-word;            
        }
        .rcon p{margin-bottom: 10px;}
    </style>
</head>
<body>
<div class="cotton-cont">
    <table class="w-100 tabl">
        <tbody>
        <tr class="fsd">
            <td class="sftv heg-fst">
            </td>
            <td class="text-center p-30">
                <div class="c-name-cont">
                    @if(isset($getResumeFullNameEmail['resume_fullname']))
                        <h1 class="c-username">{{$getResumeFullNameEmail['resume_fullname']}}</h1>
                    @endif
                    @if(isset($getPersonalDetails['main_job_title']))
                        <h2 class="sub-name">{{$getPersonalDetails['main_job_title']}}</h2>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td class="sftv ver-alg-top p-30">
                <table class="w-100">

                    @if((!empty($getPersonalDetails)))
                        <tr>
                            <td>
                                <h2 class="cot-cat-tital">Info</h2>
                                @if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']))
                                    <div class="cot-info-cont extra-details" id="ExtraDetails">
                                        <h4>Address</h4>
                                        <p id="Address_Text">{{$getPersonalDetails['address']}}</p>
                                        <p id="CityName_Text">{{ $getPersonalDetails['city'] }}</p>
                                        <p id="PostalCode_Text">{{ $getPersonalDetails['postal_code'] }}</p>
                                        <p id="CountryName_Text">{{ $getPersonalDetails['country'] }}</p>
                                    </div>
                                @endif

                                @if(isset($getPersonalDetails['phone']) && $getPersonalDetails['phone']!='')
                                    <div class="cot-info-cont">
                                        <h4>Phone</h4>
                                        <p id="ContactNumber_Text">{{$getPersonalDetails['phone']}}</p>
                                    </div>
                                @endif

                                @if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!='')
                                    <div class="cot-info-cont">
                                        <h4>Email</h4>
                                        <p id="Email_Text">{{$getResumeFullNameEmail['resume_email']}}</p>
                                    </div>
                                @endif

                                @if(!empty($getPersonalDetails['place_of_birth']))
                                    <div class="cot-info-cont">
                                        <h4>Current Location</h4>
                                        <p id="Email_Text">{{ $getPersonalDetails['place_of_birth'] }}</p>
                                    </div>
                                @endif

                                @if(!empty($getPersonalDetails['date_of_birth']))
                                    <div class="cot-info-cont">
                                        <h4>Date Of Birth</h4>
                                        <p id="Email_Text">{{ $getPersonalDetails['date_of_birth'] }}</p>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <h2 class="cot-cat-tital"></h2>
                                <div class="cot-info-cont extra-details" id="ExtraDetails">
                                    <h4></h4>
                                    <p id="Address_Text"></p>
                                    <p id="CityName_Text"></p>
                                    <p id="PostalCode_Text"></p>
                                    <p id="CountryName_Text"></p>
                                </div>
                                <div class="cot-info-cont">
                                    <h4></h4>
                                    <p id="ContactNumber_Text"></p>

                                </div>
                                <div class="cot-info-cont">
                                    <h4></h4>
                                    <p id="Email_Text"></p>
                                </div>
                            </td>
                        </tr>
                    @endif

                    @if( (!empty($getSkill) && count($getSkill) > 0))
                        <tr id="Skills_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20">Skills</h2>
                                <div id="SkillDetails_new">
                                    @foreach($getSkill as $key => $skill_details)
                                        <div class="cot-skill-cont">
                                            <h6 class="skill-name">{{ $skill_details['us_skill'] }}</h6>
                                            <div class="proj-skill">
                                                <ul>
                                                    @if($skill_details['us_skill_level']>0)
                                                        @for($i=1;$i<=$skill_details['us_skill_level'];$i++)
                                                            <li><span></span></li>
                                                        @endfor
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr id="Skills_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 skill-section" style="display: none">Skills</h2>
                                <div id="SkillDetails_new"></div>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getLanguage) && count($getLanguage) > 0))
                        <tr id="LanguageDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 language-section">Language</h2>
                                <div id="LanguageDetails_new">
                                    @foreach($getLanguage as $key => $language_details)
                                        <div class="cot-skill-cont">
                                            <h6 class="language-title">{{ $language_details['ul_language'] }}</h6>
                                            <div class="proj-skill">
                                                <ul>
                                                    @if($language_details['ul_language_level_id']>0)
                                                        @for($i=1;$i<=$language_details['ul_language_level_id'];$i++)
                                                            <li><span></span></li>
                                                        @endfor
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr id="LanguageDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 language-section" style="display: none">Language</h2>
                                <div id="LanguageDetails_new"></div>
                            </td>
                        </tr>
                    @endif

                    @if((isset($getHobby['uh_hobby']) && $getHobby['uh_hobby']!=''))
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="cot-cat-tital mt-20 hobbies-section">Hobbies</h2>
                                <h6 class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</h6>
                            </td>
                        </tr>
                    @else
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="cot-cat-tital mt-20 hobbies-section" style="display: none">Hobbies</h2>
                                <h6 class="hobbies" id="Hobbies_Text"></h6>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0))
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 website-links-section">Links</h2>
                                <div id="WebsiteSocialLinks_new">
                                    @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                        <div class="cot-skill-cont" id="WebsiteSocialLinksData_{{ $key }}">
                                            <a class="language-title" target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 website-links-section" style="display: none">Links</h2>
                                <div id="WebsiteSocialLinks_new"></div>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getReference) && count($getReference) > 0))
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 reference-section">Reference</h2>
                                <div id="ReferenceDetails_new">
                                    @if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                        <p>I'd like to hide references and make them available only upon request</p>
                                    @else
                                    @foreach($getReference as $key => $reference_details)
                                    @php 
                                        $vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
                                        $vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
                                    @endphp
                                        <div class="cot-skill-cont">
                                            <h4 class="reference-name">{{ implode(" from ", $vars) }}</h4>
                                            <p>{{ implode(" | ", $vars_a) }}</p>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 reference-section" style="display: none">Reference</h2>
                                <div id="ReferenceDetails_new"></div>
                            </td>
                        </tr>
                    @endif


                </table>
            </td>
            <td class="ver-alg-top p-30 rcon">
                <table class="w-100">
                    @if((isset($getPersonalDetails['profile_summary']) && $getPersonalDetails['profile_summary']!=''))
                        <tr>
                            <td>
                                <h2 class="cot-cat-tital" id="ProfileSummary">Profile</h2>
                                <p class="mb-10" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <h2 class="cot-cat-tital" id="ProfileSummary" style="display: none">Profile</h2>
                                <p class="mb-10" id="ProfessionalSummary_Text"></p>
                            </td>
                        </tr>
                    @endif

                    @if( (!empty($getCareers) && count($getCareers) > 0))
                        <tr id="EmployerDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 employment-section">Employment history</h2>
                                <table class="w-100" id="EmployerDetails_new" >
                                    @foreach($getCareers as $key => $employer_details)
                                    @php 
                                        $vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
                                        $vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name']));
                                    @endphp
                                        <tr class="employer-add-more-section" id="EmployerAddMore_section_{{$key}}">
                                            <td>
                                                <div class="his-det">
                                                    <h3>
                                                        {{ implode(", ", $vars_a) }}
                                                    </h3>
                                                    <h5 class="f-16px employer-city">{{ $employer_details['uc_city'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($employer_details['uc_is_present'] == 0)
                                                        <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div {{--class="his-det-ct"--}} class="employer-description-text" >{!! $employer_details['career_description'] !!}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="EmployerDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 employment-section" style="display: none">Employment history</h2>
                                <table class="w-100" id="EmployerDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getEducation) && count($getEducation) > 0))
                        <tr id="EducationDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 education-section">Education</h2>
                                <table class="w-100 employ-histry" id="EducationDetails_new">
                                    @foreach($getEducation as $key => $education_details)
                                    @php 
                                        $vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
                                        $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
                                    @endphp
                                        <tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
                                            <td>
                                                <div class="his-det">
                                                    <h3 class="text-capitalize">
                                                        <span class="education-degree">{{ implode(", ",$vars_a) }}</span>
                                                    </h3>
                                                    <h5 class="f-16px education-city">{{ $education_details['ue_city'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($education_details['uc_is_present'] == 0)
                                                        <span class="education-end-date">{{ implode(" - ",$vars) }}</span>
                                                    @else
                                                        <span class="education-label">{{ implode(" - ",$vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="education-description-text">
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
                                <h2 class="cot-cat-tital mt-20 education-section" style="display: none">Education</h2>
                                <table class="w-100 employ-histry" id="EducationDetails_new">
                                </table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getCourse) && count($getCourse) > 0))
                        <tr id="CourseSectionDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 courses-section">Courses</h2>
                                <table class="w-100 employ-histry" id="CourseSectionDetails_new">
                                    @foreach($getCourse as $key => $course_details)
                                    @php 
                                        $vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
                                    @endphp
                                        <tr class="course-section">
                                            <td>
                                                <div class="his-det">
                                                    <h3 class="text-capitalize">
                                                        <span class="course-title">{{ $course_details['ucr_course_name'] }}</span>
                                                    </h3>
                                                    <h5 class="f-16px institution-name">{{ $course_details['ucr_institute'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($course_details['ucr_is_present'] == 0)
                                                       <span class="course-end-date" id="employer_enddate_{{ $key }}">{{ implode(" - ",  $vars) }}</span>
                                                    @else
                                                       <span class="course-present-label">{{ implode(" - ",  $vars) }}</span>
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
                                <h2 class="cot-cat-tital mt-20 courses-section" style="display: none">Courses</h2>
                                <table class="w-100 employ-histry" id="CourseSectionDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0))
                        <tr id="ExtraCurricularActivityDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 activity-section">Extra-curricular Activity</h2>
                                <table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
                                    @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                    @php 
                                        $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
                                        $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
                                    @endphp
                                        <tr class="extra-curricular-add-more-section">
                                            <td>
                                                <div class="his-det">
                                                    <h3 class="text-capitalize">
                                                        {{ implode(", ",$vars_a) }}
                                                    </h3>
                                                    <h5 class="f-16px extra-curricular-city">{{ $extra_curricular_section_details['ueca_city'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                        <span class="extra-curricular-end-date">{{ implode(" - ",$vars) }}</span>
                                                    @else
                                                        <span class="extra-curricular-present-label">{{ implode(" - ",$vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="ExtraCurricularActivityDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 activity-section" style="display: none">Extra-curricular Activity</h2>
                                <table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getInternship) && count($getInternship) > 0))
                        <tr id="InternshipDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 internship-section">Internships</h2>
                                <table class="w-100 employ-histry" id="InternshipSectionDetails_new">
                                    @foreach($getInternship as $key => $internship_details)
                                    @php 
                                        $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                        $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
                                    @endphp
                                        <tr class="course-section">
                                            <td>
                                                <div class="his-det">
                                                    <h3 class="text-capitalize">
                                                        {{ implode(", ",$vars_a) }}
                                                    </h3>
                                                    <h5 class="f-16px internship-city">{{ $internship_details['ui_city'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($internship_details['ui_is_present'] == 0)
                                                        <span class="internship-end-date">{{ implode(" - ",$vars) }}</span>
                                                    @else
                                                        <span class="internship-present-label">{{ implode(" - ",$vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="internship-description-text">{!! $internship_details['internship_description'] !!}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="InternshipDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 internship-section" style="display: none">Internships</h2>
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
                            <td>
                                <h2 class="cot-cat-tital mt-20 custom-section">{{ $custom_heading }}</h2>
                                <table class="w-100 employ-histry" id="CustomSectionDetails_new">
                                    @foreach($getCustomSection as $key => $custom_section_details)
                                    @php 
                                        $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                    @endphp
                                        <tr class="custom-section">
                                            <td>
                                                <div class="his-det">
                                                    <h3 class="text-capitalize">
                                                        <span class="custom-job-title">{{ $custom_section_details['ucs_title'] }}</span>
                                                    </h3>
                                                    <h5 class="f-16px custom-section-city">{{ $custom_section_details['ucs_city'] }}</h5>
                                                </div>
                                                <h4 class="yesr-c">
                                                    @if($custom_section_details['ucs_is_present'] == 0)
                                                        <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="CustomSectionDetails_Text">
                            <td>
                                <h2 class="cot-cat-tital mt-20 custom-section" style="display: none">Custom</h2>
                                <table class="w-100 employ-histry" id="CustomSectionDetails_new"></table>
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
