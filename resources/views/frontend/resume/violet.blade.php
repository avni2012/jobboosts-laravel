
<!DOCTYPE html>
<html>
<head>
	<title>Violet</title>
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
        .position-relative{position: relative;}
        .p-40{padding: 40px;}
        .v-profile{width: 165px;height: 165px;border-radius: 95px;object-fit: contain;}
        .proback{background-image: url('{{ asset('/frontend/images/resume_templates/violet-images/violate_back.jpg') }}');background-position: center;background-repeat: no-repeat;background-size: cover;background-color: #c1c1c1;}
        .w-pro-cont{width: 265px;max-width: 265px;}
        .v-u-name{font-size: xxx-large;color: #fff;text-transform: uppercase;font-weight: bold;letter-spacing: 2px;text-shadow: 0px 0px 6px rgb(41 41 41 / 74%);}
        .v-aply-cont{color: #fff;font-size: x-large;letter-spacing: 2px;text-transform: uppercase;text-shadow: 0px 0px 6px rgb(41 41 41 / 74%);}
        .v-s-heading{color: #7b8588;text-transform: uppercase;letter-spacing: 4px;padding-bottom: 5px;font-size: larger;font-weight: bold;}
        .v-hr{width: 60px;margin-left: 0;margin-bottom: 12px;border-bottom: 2px solid #7b8588;}
        .violet-cont p, .violet-cont ul, .violet-cont a{color: #9b9b9b;}
        .violet-cont a{text-decoration: none;}
        .wht-back{background-color: #fff;}
        .mt-35{margin-top: 35px;}
        .v-address{list-style: none;}
        .v-address li{display: flex;margin-bottom: 10px;}
        .v-address li span{margin-right: 10px;}
        .v-round-con{margin-left: 18px;}
        .v-round-con li{margin-bottom: 5px;}
        .back-dark{background-color: #efefef;}
        .w-det-con{font-size: larger;text-transform: capitalize;color: #888;}
        .w-sub-det-con{text-transform: uppercase;font-size: 15px;margin-bottom: 10px;color: #979797;}
        .woexp li:last-child{margin-bottom: 20px;}
        .woexp p{ margin-bottom: 13px; }
        .vl-img-con{display: table;}
        .v-imag-con{display: table-cell;}
        .v-imag-con img{margin-right: 115px;}
        .vl-name-c{display: table-cell;vertical-align: middle;width: 100%;height: 169px;}
        .violet-cont p{
            word-break: break-word;
        }
	</style>
</head>
<body>
	<div class="violet-cont">
		<table class="w-100">
			<tbody>
				
				<tr>
					<td class="p-40 wht-back w-pro-cont ver-alg-top" style="padding-top: 5px;">
						<table class="w-100">
                            @if(!empty($getPersonalDetails))
                                @if($getPersonalDetails['profile_summary'] != '')
                                    <tr>
                                        <td>
                                            <h2 class="v-s-heading">Personal profile</h2>
                                            <hr class="v-hr">
                                            <p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td>
                                        <h2 class="v-s-heading" id="ProfileSummary" style="display: none;">Personal profile</h2>
                                        <hr class="v-hr" style="display: none;">
                                        <p id="ProfessionalSummary_Text"></p>
                                    </td>
                                </tr>
                            @endif
                            @if(!empty($getPersonalDetails))
                                <tr>
                                    <td>
                                        <h2 class="v-s-heading mt-35">Contact</h2>
                                        <hr class="v-hr">
                                        <ul class="v-address">
                                            <li>
                                                <span>
                                                    <img src="{{ asset('/frontend/images/resume_templates/violet-images/violet_location.png')}}" alt="location">
                                                </span>
                                                @if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']))
                                                @php 
                                                    $address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
                                                @endphp
                                                    <span id="ExtraDetails">{{ implode(", ",$address) }}</span>
                                                @endif
                                            </li>
                                            <li>
                                                <span>
                                                    <img src="{{ asset('/frontend/images/resume_templates/violet-images/violet_mail.png')}}" alt="mail">
                                                </span>
                                                @if(!empty($getResumeFullNameEmail))
                                                    <span id="Email_Text">{{ $getResumeFullNameEmail['resume_email'] }}</span>
                                                @endif
                                            </li>
                                            <li>
                                                <span>
                                                    <img src="{{ asset('/frontend/images/resume_templates/violet-images/violet_phone.png')}}" alt="phone">
                                                </span>
                                                @if(!empty($getPersonalDetails['phone']))
                                                    <span id="ContactNumber_Text">{{ $getPersonalDetails['phone'] }}</span>
                                                @endif
                                            </li>
                                            <li>
                                                <span>
                                                    <img src="{{ asset('/frontend/images/resume_templates/violet-images/violet_location.png')}}" alt="location">
                                                </span>
                                                @if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
                                                    @php 
                                                        $location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
                                                    @endphp
                                                    <span id="ContactNumber_Text">{{ implode(", ",$location) }}</span>
                                                @endif
                                            </li>
                                            {{--<li>
                                                <span>
                                                    <img src="{{ asset('/frontend/images/resume_templates/violet-images/violet_linkin.png')}}" alt="phone">
                                                </span>
                                                <span>/linkname</span>
                                            </li>--}}
                                        </ul>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>
                                        <h2 class="v-s-heading mt-35">Contact</h2>
                                        <hr class="v-hr">
                                        <ul class="v-address">
                                            <li id="ExtraDetails"></li>
                                            <li id="Email_Text"></li>
                                            <li id="ContactNumber_Text"></li>
                                            <li></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endif

                            @if( (!empty($getEducation) && count($getEducation) > 0))
                                <tr id="EducationDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 education-section">Education</h2>
                                        <hr class="v-hr">
                                        <div id="EducationDetails_new">
                                            @foreach($getEducation as $key => $education_details)
                                            @php 
                                                $vars = array_filter(array($education_details['ue_start_date'],$education_details['ue_end_date']));
                                                $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
                                            @endphp
                                                <div id="EducationAddMore_section_{{ $key }}" style="margin-bottom: 5px">
                                                    <h3 class="w-det-con"><b>{{ implode(", ", $vars_a) }}</b></h3>
                                                    <p>
                                                        @if($education_details['ue_is_present'] == 0)
                                                            <span class="education-label">{{ implode(" To ", $vars) }}</span>
                                                        @else
                                                            <span class="education-label">{{ implode(" To ", $vars) }}</span>
                                                        @endif
                                                    </p>
                                                    <div class="<!--v-round-con--> woexp employer-description-text">{!! $education_details['education_description'] !!}</div>
                                                    {{--<p class="woexp education-description-text">{!! $education_details['education_description'] !!} </p>--}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr id="EducationDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 education-section" style="display:none;" >Education</h2>
                                        <hr class="v-hr" style="display: none">
                                        <div id="EducationDetails_new"></div>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getHobby))
                                <tr id="HobbiesSection">
                                    <td>
                                        <h2 class="v-s-heading hobbies-section mt-35">Hobbies</h2>
                                        <hr class="v-hr">
                                        <p class="Hobbies_Text">
                                            {{ $getHobby['uh_hobby'] }}
                                        </p>
                                    </td>
                                </tr>
                            @else
                                <tr id="HobbiesSection">
                                    <td>
                                        <h2 class="v-s-heading hobbies-section mt-35" style="display: none;">Hobbies</h2>
                                        <hr class="v-hr" style="display: none">
                                        <p style="display: none" class="Hobbies_Text"></p>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
                                <tr id="WebsiteSocialLinks_Text">
                                    <td>
                                        <h2 class="v-s-heading website-links-section mt-35">Links</h2>
                                        <hr class="v-hr">
                                        <div class="WebsiteSocialLinks_new">
                                            @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                                <p class="website-social-label" id="WebsiteSocialLinksData_{{ $key }}">
                                                    <a target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
                                                </p>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr id="WebsiteSocialLinks_Text">
                                    <td>
                                        <h2 class="v-s-heading website-links-section mt-35" style="display: none;">Links</h2>
                                        <hr class="v-hr" style="display: none">
                                        <div style="display: none" class="WebsiteSocialLinks_new"></div>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getReference) && count($getReference) > 0)
                                <tr id="ReferenceDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading reference-section mt-35">Reference</h2>
                                        <hr class="v-hr">
                                        <div class="ReferenceDetails_new">
                                            @if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                                <p>I'd like to hide references and make them available only upon request</p>
                                            @else
                                            @foreach($getReference as $key => $reference_details)
                                            @php 
                                                $vars = array_filter(array($reference_details['ur_refer_full_name'],$reference_details['ur_refer_company_name']));
                                                $vars_a = array_filter(array($reference_details['ur_refer_phone'],$reference_details['ur_refer_email']));
                                            @endphp
                                                <p>
                                                    {{ implode(" from ", $vars) }}
                                                </p>
                                                <p>
                                                    {{ implode(" | ", $vars) }}
                                                </p>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr id="ReferenceDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading reference-section mt-35" style="display: none;">Reference</h2>
                                        <hr class="v-hr" style="display: none">
                                        <div style="display: none" class="ReferenceDetails_new"></div>
                                    </td>
                                </tr>
                            @endif


						</table>
					</td>
					<td class="ver-alg-top p-40 back-dark" style="padding-top: 5px;">
						<table class="w-100">

                            @if(!empty($getSkill) && count($getSkill) > 0)
                                <tr id="Skills_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-351">Skills</h2>
                                        <hr class="v-hr">
                                        <ul class="v-round-con" id="SkillDetails_new">
                                            @foreach($getSkill as $key => $skill_details)
                                                <li class="skill-name">{{ $skill_details['us_skill'] }}
                                                    @if($skill_details['us_skill_level'] != null)
                                                        @if($skill_details['us_skill_level'] == 1)
                                                            ({{ "Low" }})
                                                        @elseif($skill_details['us_skill_level'] == 2)
                                                            ({{ "Average" }})
                                                        @elseif($skill_details['us_skill_level'] == 3)
                                                            ({{ "Intermediate" }})
                                                        @elseif($skill_details['us_skill_level'] == 4)
                                                            ({{ "Experienced" }})
                                                        @else
                                                            ({{ "Experts" }})
                                                        @endif
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @else
                                <tr id="Skills_Text">
                                    <td>
                                        <h2 class="v-s-heading skill-section mt-35" style="display: none;">Skills</h2>
                                        <hr class="v-hr" style="display: none">
                                        <ul class="v-round-con" id="SkillDetails_new"></ul>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getLanguage) && count($getLanguage) > 0)
                                <tr id="LanguageDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading language-section mt-35">Languages</h2>
                                        <hr class="v-hr">
                                        <ul class="v-round-con" id="LanguageDetails_new">
                                            @foreach($getLanguage as $key => $language_details)
                                                <li class="language-title">{{ $language_details['ul_language'] }}
                                                    @if($language_details['ul_language_level_id'] != null)
                                                        ({{ $language_details->language_level->level }})
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @else
                                <tr id="LanguageDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading language-section mt-35" style="display: none;">Languages</h2>
                                        <hr class="v-hr" style="display: none">
                                        <ul class="v-round-con" id="LanguageDetails_new"></ul>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getCareers) && count($getCareers) > 0)
                                <tr id="EmployerDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 employment-section">Work experience</h2>
                                        <hr class="v-hr">
                                        <table class="w-100" id="EmployerDetails_new">
                                            @foreach($getCareers as $key => $employer_details)
                                            @php 
                                                $vars = array_filter(array($employer_details['uc_start_date'],$employer_details['uc_end_date']));
                                                $vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name'],$employer_details['uc_city']));
                                            @endphp
                                                <tr id="EmployerAddMore_section_{{ $key }}">
                                                    <td>
                                                        <h3 class="w-det-con">
                                                            <b class="employer-job-title">
                                                                {{ implode(", ", $vars_a) }}
                                                            </b>
                                                        </h3>
                                                        <h4 class="w-sub-det-con">
                                                            @if($employer_details['uc_is_present'] == 0)
                                                                <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                            @else
                                                                <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                            @endif
                                                        </h4>
                                                        <div class="<!--v-round-con--> woexp employer-description-text">{!! $employer_details['career_description'] !!}</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            @else
                                <tr id="EmployerDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 employment-section" style="display: none;">Work experience</h2>
                                        <hr class="v-hr" style="display: none">
                                        <table class="w-100" id="EmployerDetails_new">

                                        </table>
                                    </td>
                                </tr>
                            @endif


                            @if(!empty($getCourse) && count($getCourse) > 0)
                                <tr id="CourseSectionDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 employment-section">Courses</h2>
                                        <hr class="v-hr">
                                        <table class="w-100" id="CourseSectionDetails_new">
                                            @foreach($getCourse as $key => $course_details)
                                            @php 
                                                $vars = array_filter(array($course_details['ucr_start_date'],$course_details['ucr_end_date']));
                                                $vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
                                            @endphp
                                                <tr>
                                                    <td>
                                                        <h3 class="w-det-con">
                                                            <b class="course-title">
                                                                {{ implode(", ",$vars_a) }}
                                                            </b>
                                                        </h3>
                                                        <h4 class="w-sub-det-con">
                                                            @if($course_details['ucr_is_present'] == 0)
                                                                <span class="course-end-date">{{ implode(" - ",$vars) }}</span>
                                                            @else
                                                                <span class="course-present-label">{{ implode(" - ",$vars) }}</span>
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
                                        <h2 class="v-s-heading mt-35 courses-section" style="display: none;">Courses</h2>
                                        <hr class="v-hr" style="display: none">
                                        <table class="w-100" id="CourseSectionDetails_new">

                                        </table>
                                    </td>
                                </tr>
                            @endif


                            @if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0)
                                <tr id="ExtraCurricularActivityDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 activity-section">Extra-curricular Activity</h2>
                                        <hr class="v-hr">
                                        <table class="w-100" id="ExtraCurricularSectionDetails_new">
                                            @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                            @php 
                                                $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
                                                $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
                                            @endphp
                                                <tr class="extra-curricular-add-more-section">
                                                    <td>
                                                        <h3 class="w-det-con">
                                                            <b class="function-title">{{ implode(", ", $vars_a) }}</b>
                                                        </h3>
                                                        <h4 class="w-sub-det-con">
                                                            @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                                <span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                            @else
                                                                <span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                            @endif
                                                        </h4>
                                                        <div class="woexp extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            @else
                                <tr id="ExtraCurricularActivityDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 activity-section" style="display: none;">Extra-curricular Activity</h2>
                                        <hr class="v-hr" style="display: none">
                                        <table class="w-100" id="ExtraCurricularSectionDetails_new">

                                        </table>
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($getInternship) && count($getInternship) > 0)
                                <tr id="InternshipDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 internship-section">Internships</h2>
                                        <hr class="v-hr">
                                        <table class="w-100" id="InternshipSectionDetails_new">
                                            @foreach($getInternship as $key => $internship_details)
                                            @php 
                                                $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                                $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
                                            @endphp
                                                <tr>
                                                    <td>
                                                        <h3 class="w-det-con">
                                                            <b class="internship-job-title">{{ implode(", ",$vars_a) }}</b>
                                                        </h3>
                                                        <h4 class="w-sub-det-con">
                                                            @if($internship_details['ui_is_present'] == 0)
                                                                <span class="present-label">{{ implode(" - ",$vars) }}</span>
                                                            @else
                                                                <span class="present-label">{{ implode(" - ",$vars) }}</span>
                                                            @endif
                                                        </h4>
                                                        <div class="<!--v-round-con--> woexp internship-description-text">{!! $internship_details['internship_description'] !!}</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            @else
                                <tr id="InternshipDetails_Text">
                                    <td>
                                        <h2 class="v-s-heading mt-35 internship-section" style="display: none;">Internships</h2>
                                        <hr class="v-hr" style="display: none">
                                        <table class="w-100" id="InternshipSectionDetails_new">

                                        </table>
                                    </td>
                                </tr>
                            @endif

                                @if(!empty($getCustomSection) && count($getCustomSection) > 0)
                                    <tr id="CustomSectionDetails_Text">
                                        @php $custom_heading = ''; @endphp
                                        @foreach($getCustomSection as $custom)
                                            @php $custom_heading = $custom->ucs_main_heading; @endphp
                                        @endforeach
                                        <td>
                                            <h2 class="v-s-heading mt-35 custom-section">{{ $custom_heading }}</h2>
                                            <hr class="v-hr">
                                            <table class="w-100" id="CustomSectionDetails_new">
                                                @foreach($getCustomSection as $key => $custom_section_details)
                                                @php 
                                                    $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                                    $vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
                                                @endphp
                                                    <tr class="custom-section">
                                                        <td>
                                                            <h3 class="w-det-con">
                                                                <b class="custom-job-title">{{ implode(", ", $vars_a) }}</b>
                                                            </h3>
                                                            <h4 class="w-sub-det-con">
                                                                @if($custom_section_details['ucs_is_present'] == 0)
                                                                <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                                @else
                                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                                @endif
                                                            </h4>
                                                            <div class="<!--v-round-con--> woexp custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                @else
                                    <tr id="CustomSectionDetails_Text">
                                        <td>
                                            <h2 class="v-s-heading mt-35 custom-section" style="display: none;">Custom</h2>
                                            <hr class="v-hr" style="display: none">
                                            <table class="w-100" id="CustomSectionDetails_new">
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
