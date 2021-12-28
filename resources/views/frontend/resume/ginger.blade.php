<!DOCTYPE html>
<html>
<head>
    <title>London Them</title>
    <style type="text/css">
    body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,button,textarea,p,blockquote,th,
    td {margin: 0;padding: 0;}
    h1,h2,h3,h4,h5,h6 {font-weight: normal;color: #242424;}
    .london-cont p, .london-cont a {color: #222;}
   .london-cont a{text-decoration: none;}
    table {border-collapse: collapse;}
    .london-cont{padding: 0 50px;}
    .w-100 {width: 100%;}
    .txt-center {text-align: center;}
    .pt-1 {padding-top: 1rem;}
    .pt-2 {padding-top: 2rem;}
    .pb-1 {padding-bottom: 1rem;}
    .pb-2 {padding-bottom: 1.1rem;}
    .mt-8px {margin-top: 8px;}
    .mb-8px{margin-bottom: 8px;}
    .mb-10px{margin-bottom: 10px;}
    .f-14px {font-size: 14px;}
    .f-16px {font-size: 16px;}
    .f-18px {font-size: 18px;}
    .f-22px {font-size: 22px;}
    .f-24px {font-size: 24px;}
    .f-26px {font-size: 26px;}
    .pr-2p {padding-right: 2%;}
    .pr-8p {padding-right: 8%;}
    .w-20p {width: 20%;}
    .letter-spacing-1-5 {letter-spacing: 0.8px;}
    .border-botm {border-bottom: 1.5px solid #222;}
    .vert-aling-top {vertical-align: top;}
    .text-upper {text-transform: uppercase;}
    .emp-his {position: relative;}
    .emp-his h4 {position: absolute;right: 5px;top: 0;}
    .list-cont{display: grid;flex-wrap: wrap;grid-gap: 15px;grid-template-columns: repeat(2, 1fr);list-style: none;}
    .list-cont li{display: flex;justify-content: space-between}
    .list-cont h3 {font-size: 20px;font-weight: bold;}
    .f-30px{font-size: 30px;}
    .f-20px{font-size: 20px;}
    .tb-3 tr:last-child td:last-child,.tb-3 tr:last-child td:nth-last-child(2) {border-bottom: 3px solid #222;}
    .w-85{width: 85%;}
    .london-cont p{word-break: break-word;margin-bottom: 10px;}
    </style>
</head>

<body>
    <div class="london-cont">
        <table class="w-100">
            <tbody>
                @if(!empty($getPersonalDetails))
                <tr class="txt-center">
                    <td class="pt-2 pb-2 border-botm" colspan="2">
                        <h1 class="f-30px">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])), {{ $getPersonalDetails['main_job_title'] }}@endif</h1>
                        <h2 class="mt-8px f-22px">
                            @if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
                                @php 
                                    $address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
                                @endphp
                                <span>{{ implode(", ",$address) }}</span>
                            @endif
                            <br>
                            <span>@if(!empty($getPersonalDetails['phone'])){{ $getPersonalDetails['phone'] }}@endif</span><br>
                            <span id="Email_Text">@if(!empty($getResumeFullNameEmail['resume_email']))<a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">{{ $getResumeFullNameEmail['resume_email'] }}</a>@endif</span></h2>
                    </td>
                </tr>
                @else
                <tr class="txt-center">
                    <td class="pt-2 pb-2 border-botm" colspan="2">
                        <h1></h1>
                        <h2 class="mt-8px"></h2>
                    </td>
                </tr>
                @endif

                @if(!empty($getPersonalDetails))
                    @if($getPersonalDetails['profile_summary'] != '')
                    <tr>
                        <td class="pt-1 pb-1 pr-2p w-20p border-botm vert-aling-top">
                            <h2 class="text-upper f-18px letter-spacing-1-5">Profile</h2>
                        </td>
                        <td class="pt-1 pb-1 border-botm">
                            <p class="f-18px" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!} 
                            </p>
                        </td>
                    </tr>
                    @endif
                @else
                    <tr>
                        <td class="pt-1 pb-2 border-botm">
                            <h2 class="text-upper f-18px letter-spacing-1-5" id="ProfileSummary" style="display: none;">Profile</h2>
                        </td>
                        <td class="pt-1 pb-2 border-botm">
                            <p class="f-18px" id="ProfessionalSummary_Text"></p>
                        </td> 
                    </tr>
                @endif

                @if(!empty($getCareers) && count($getCareers) > 0)
                <tr id="EmployerDetails_Text">
                	<td colspan="2">
	                    <table class="w-100" id="employment-cont">
	                        <tr>
	                            <td>
	                                <table class="w-100" id="employe-his-title">
	                                    <tr>
	                                        <td class="pt-1">
	                                            <h3 class="text-upper f-18px letter-spacing-1-5">Employment history</h3>
	                                        </td>
	                                    </tr>
	                                </table>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <table class="w-100 tb-3" id="EmployerDetails_new">
                                        @foreach($getCareers as $key => $employer_details)
                                        @php 
                                            $vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
                                            $vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name']));
                                        @endphp
	                                    <tr id="EmployerAddMore_section_{{ $key }}">
	                                        <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
	                                            <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($employer_details['uc_is_present'] == 0)
                                                    <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif   
                                                </h2>
	                                        </td>
	                                        <td class="pt-1 pb-2">
	                                            <div class="emp-his">
	                                                <h2 class="f-20px mb-10px w-85">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
	                                                 <p class="f-18px mb-8px employer-description-text">{!! $employer_details['career_description'] !!}</p>
	                                                <h4 class="f-14px"><span class="employer-city">{{ $employer_details['uc_city'] }}</span></h4>
	                                            </div>
	                                        </td>
	                                    </tr>
	                                   @endforeach
	                                </table>
	                            </td>
	                        </tr>
	                    </table>
                    </td>
                </tr>
                @endif
               
                @if(!empty($getEducation) && count($getEducation) > 0)
                <tr id="EducationDetails_Text">
                	<td colspan="2">
	                    <table class="w-100" id="education-cont">
	                        <tr>
	                            <td>
	                                <table class="w-100" id="education-his-title">
	                                    <tr>
	                                        <td class="pt-1">
	                                            <h3 class="text-upper f-18px letter-spacing-1-5 education-section">Education</h3>
	                                        </td>
	                                    </tr>
	                                </table>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <table class="w-100 tb-3" id="EducationDetails_new">
                                        @foreach($getEducation as $key => $education_details)
                                        @php 
                                            $vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
                                            $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
                                        @endphp
	                                   <tr id="EducationAddMore_section_{{ $key }}">
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                                                <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($education_details['ue_is_present'] == 0)
                                                    <span class="education-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="education-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
                                                </h2>
                                            </td>
                                            <td class="pt-1 pb-2">
                                                <div class="emp-his">
                                                    <h2 class="f-20px mb-10px w-85">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
                                                     <p class="f-18px mb-8px education-description-text">{!! $education_details['education_description'] !!}</p>
                                                    <h4 class="f-14px"><span class="education-city">{{ $education_details['ue_city'] }}</span></h4>
                                                </div>
                                            </td>
                                        </tr>	                            @endforeach
	                                </table>
	                            </td>
	                        </tr>
	                    </table>
                    </td>
                </tr> 
                @endif

                @if(!empty($getCourse) && count($getCourse) > 0) 
                <tr id="CourseSectionDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-1">
                                                <h3 class="text-upper f-18px letter-spacing-1-5">Courses</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100 tb-3" id="CourseSectionDetails_new">
                                      @foreach($getCourse as $key => $course_details)
                                        @php 
                                            $vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
                                            $vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
                                        @endphp
                                       <tr id="CoursesAddMore_section_{{ $key }}">
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                                                <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($course_details['ucr_is_present'] == 0)
                                                    <span class="education-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="education-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
                                                </h2>
                                            </td>
                                            <td class="pt-1 pb-2">
                                                <div class="emp-his">
                                                    <h2 class="f-20px mb-10px">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
                                                </div>
                                            </td>
                                        </tr>                                   
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif

                @if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
                <tr id="ExtraCurricularActivityDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-1">
                                                <h3 class="text-upper f-18px letter-spacing-1-5">Extra-Curricular Activity</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100 tb-3" id="ExtraCurricularSectionDetails_new">
                                       @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                        @php 
                                            $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
                                            $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
                                        @endphp
                                       <tr id="extraAddMore_section_{{ $key }}">
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                                                <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                    <span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
                                                </h2>
                                            </td>
                                            <td class="pt-1 pb-2">
                                                <div class="emp-his">
                                                    <h2 class="f-20px mb-10px">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
                                                     <p class="f-18px mb-8px extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</p>
                                                    <h4 class="f-14px"><span class="extra-curricular-city">{{ $extra_curricular_section_details['ueca_city'] }}</span></h4>
                                                </div>
                                            </td>
                                        </tr>                                      @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif

                @if(!empty($getInternship) && count($getInternship) > 0) 
                <tr id="InternshipDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-1">
                                                <h3 class="text-upper f-18px letter-spacing-1-5">Internships</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100 tb-3" id="ExtraCurricularSectionDetails_new">
                                     @foreach($getInternship as $key => $internship_details)
                                        @php 
                                            $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                            $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
                                        @endphp
                                       <tr id="InternshipsAddMore_section_{{ $key }}">
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                                                <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($internship_details['ui_is_present'] == 0)
                                                    <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
                                                </h2>
                                            </td>
                                            <td class="pt-1 pb-2">
                                                <div class="emp-his">
                                                    <h2 class="f-20px mb-10px">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
                                                     <p class="f-18px mb-8px internship-description-text">{!! $internship_details['internship_description'] !!}</p>
                                                    <h4 class="f-14px"><span class="internship-city">{{ $internship_details['ui_city'] }}</span></span></h4>
                                                </div>
                                            </td>
                                        </tr>                                      @endforeach
                                    </table>
                                </td>
                            </tr>
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
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-1">
                                                <h3 class="text-upper f-18px letter-spacing-1-5">{{ $custom_heading }}</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100 tb-3" id="CustomSectionDetails_new">
                                     @foreach($getCustomSection as $key => $custom_section_details)
                                        @php 
                                            $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                            $vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
                                        @endphp
                                       <tr id="CustomAddMore_section_{{ $key }}">
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                                                <h2 class="text-upper f-14px letter-spacing-1-5">
                                                @if($custom_section_details['ucs_is_present'] == 0)
                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
                                                </h2>
                                            </td>
                                            <td class="pt-1 pb-2">
                                                <div class="emp-his">
                                                    <h2 class="f-20px mb-10px">
                                                        <b>{{ implode(", ", $vars_a) }}</b>
                                                    </h2>
                                                     <p class="f-18px mb-8px custom-description-text">{!! $custom_section_details['custom_description'] !!}</p>
                                                    <h4 class="f-14px"><span class="custom-section-city">{{ $custom_section_details['ucs_city'] }}</span></span></h4>
                                                </div>
                                            </td>
                                        </tr>                                      
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif

                @if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
                    <tr id="WebsiteSocialLinks_Text">
                        <td class="pt-1 pb-2 pr-2p w-20p border-botm vert-aling-top">
                            <h2 class="text-upper f-16px letter-spacing-1-5">Links</h2>
                        </td>
                        <td class="pt-1 pb-2 border-botm">
                            <table class="w-100" id="WebsiteSocialLinks_new">
                                <tr id="WebsiteSocialLinksData_{{ $key }}"> 
                                  <td class="pt-1 pb-2">
                                     @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                
                                       <span> <a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}, </a>
                                        </span>
                                    @endforeach
                                  </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endif

               @if(!empty($getSkill) && count($getSkill) > 0) 
                <tr id="Skills_Text">
                    <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Skills</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm">
                        <table class="w-100" id="SkillDetails_new">
                            @foreach($getSkill->chunk(2) as $key => $skill_details)
                                <tr>
                                    @foreach($skill_details as $skill)
                                    <td><h5 id="SkillName_{{ $key }}" class="skill-name f-16px">{{ $skill['us_skill'] }}</h5></td>
                                    <td>@if($skill['us_skill_level'] == 1)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Low</p>
                                        @elseif($skill['us_skill_level'] == 2)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Medium</p>
                                        @elseif($skill['us_skill_level'] == 3)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Good</p>
                                        @elseif($skill['us_skill_level'] == 4)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Experience</p>
                                        @elseif($skill['us_skill_level'] == 5)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Experts</p>
                                        @else
                                            <p class="skill-level f-14px"></p>
                                        @endif</td>                                        
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                @endif

               @if(!empty($getLanguage) && count($getLanguage) > 0) 
                <tr id="LanguageDetails_Text">
                    <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Language</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm">
                        <table class="w-100" id="LanguageDetails_new">
                            @foreach($getLanguage->chunk(2)  as $key => $language_details)
                                <tr>
                                    @foreach($language_details as $language)
                                    <td><h5 id="SkillName_{{ $key }}" class="skill-name f-16px">{{ $language['ul_language'] }}</h5></td>
                                    <td>@if($language['ul_language_level_id'] == 1)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Low</p>
                                        @elseif($language['ul_language_level_id'] == 2)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Medium</p>
                                        @elseif($language['ul_language_level_id'] == 3)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Good</p>
                                        @elseif($language['ul_language_level_id'] == 4)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Experience</p>
                                        @elseif($language['ul_language_level_id'] == 5)
                                            <p id="skill_Level_{{ $key }}" class="skill-level f-14px">Experts</p>
                                        @else
                                            <p class="skill-level f-14px"></p>
                                        @endif</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                @endif

                @if(!empty($getHobby))
                    @if(!empty($getHobby['uh_hobby']))
                    <tr id="HobbiesSection">
                        <td class="pt-1 pb-2 pr-2p w-20p border-botm vert-aling-top">
                            <h2 class="text-upper f-16px letter-spacing-1-5">Hobbies</h2>
                        </td>
                        <td class="pt-1 pb-2 border-botm">
                            <p class="f-16px" id="Hobbies_Text">
                               {{ $getHobby['uh_hobby'] }}
                            </p>
                        </td>
                    </tr>
                    @endif
                @endif

                @if(!empty($getReference) && count($getReference) > 0) 
                <tr id="ReferenceDetails_Text">
                
                    <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-18px letter-spacing-1-5">References</h2>
                    </td>
                    <td class="pt-1 pb-2">
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
                                <td class="pb-2">
                                    <div class="emp-his">
                                        <h2 class="f-18px mb-10px"><b>{{ implode(" from ", $vars) }}</b></h2>
                                        <p class="f-16px mb-8px">{{ implode(" | ", $vars_a) }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </td>
                </tr> 
                @endif              
            </tbody>
        </table>
    </div>
</body>

</html>