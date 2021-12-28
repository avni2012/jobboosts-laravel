
.<!DOCTYPE html>
<html>

<head>
    <title>London Them</title>
    <style type="text/css">
    body,
    div,
    ul,
    li,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    pre,
    input,
    button,
    p,
    th,
    td {
        margin: 0;
        padding: 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: normal;
        color: #242424;
    }

    p {
        color: #222;
    }

    table {
        border-collapse: collapse;
    }
    .london-cont{padding: 0 50px;}

    .w-100 {
        width: 100%;
    }

    .txt-center {
        text-align: center;
    }

    .pt-1 {
        padding-top: 1rem;
    }

    .pt-2 {
        padding-top: 2rem;
    }

    .pb-1 {
        padding-bottom: 1rem;
    }

    .pb-2 {
        padding-bottom: 2rem;
    }

    .mt-8px {
        margin-top: 8px;
    }
    .mb-8px{margin-bottom: 8px;}
    .mb-10px{margin-bottom: 10px;}
    .f-14px {
        font-size: 14px;
    }

    .f-16px {
        font-size: 16px;
    }

    .f-18px {
        font-size: 18px;
    }

    .f-22px {
        font-size: 22px;
    }

    .f-24px {
        font-size: 24px;
    }

    .f-26px {
        font-size: 26px;
    }

    .pr-2p {
        padding-right: 2%;
    }

    .pr-8p {
        padding-right: 8%;
    }

    .w-20p {
        width: 20%;
    }

    .letter-spacing-1-5 {
        letter-spacing: 1.5px;
    }

    .border-botm {
        border-bottom: 2px solid #222;
    }

    .vert-aling-top {
        vertical-align: top;
    }

    .text-upper {
        text-transform: uppercase;
    }

    .emp-his {
        position: relative;
    }

    .emp-his h4 {
        position: absolute;
        right: 5px;
        top: 0;
    }
    .list-cont{
        /* display: grid;
        flex-wrap: wrap;
        grid-gap: 15px;
        grid-template-columns: repeat(2, 1fr);*/
        list-style: none;
            list-style: none;
    display: block;
    }
    .list-cont li{
        /*width: 50%;
        float: left;
        display: flex;*/
        /*justify-content: space-around;*/
            /*display: inline-block;
    width: 43%;
    clear: both;*/
        display: inline-block;
        vertical-align: middle;
        width: 50%;
        margin: 0 -1px;
    }
    .list-cont li p{
        font-size: 18px;
            display: inline-block;
    vertical-align: middle;
    }
    .list-cont h3 {
        /*font-size: 20px;
        font-weight: bold;
        width: 70%;
        float: left;*/
        display: inline-block;
    vertical-align: middle;
    }
    </style>
</head>

<body>
    <div class="london-cont w-100 common-template-height">
        <table class="w-100">
            <tbody>
                @if(!empty($formData))
                    @if(!empty($formData['first_name']) || !empty($formData['last_name']) || !empty($formData['job_title']) || !empty($formData['email']) || !empty($formData['phone']))
                        <tr class="txt-center">
                            <td class="pt-2 pb-2 border-botm" colspan="2">
                                <h1 class="f-18px"><b>{{ $formData['first_name'] }} {{ $formData['last_name'] }}@if(!empty($formData['job_title'])), {{ $formData['job_title'] }}@endif</b></h1>
                                <h2 class="mt-8px f-16px" id="ExtraDetails"><span id="Address_Text">@if(!empty($formData['address'])){{ $formData['address'] }}@endif</span><span id="CityName_Text">@if(!empty($formData['city'])), {{ $formData['city'] }}@endif</span><span id="PostalCode_Text">@if(!empty($formData['postal_code'])), {{ $formData['postal_code'] }}@endif</span><span id="CountryName_Text">@if(!empty($formData['country'])), {{ $formData['country'] }}@endif</span><span id="ContactNumber_Text">@if(!empty($formData['phone'])), {{ $formData['phone'] }}@endif</span><span id="Email_Text">@if(!empty($formData['email'])), {{ $formData['email'] }}@endif</span></h2>
                            </td>
                        </tr>
                    @endif
                @else
                    <tr class="txt-center" id="MainHeading">
                        <td class="pt-2 pb-2" colspan="2">
                            {{-- <h1></h1> --}}
                            <h1 class="f-18px"><b><span id="FirstName_Text" class="first-name"></span>&nbsp;<span id="LastName_Text" class="last-name"></span><span id="JobTitle_Text" class=""></span></b></h1>
                            <h2 class="mt-8px f-16px" id="ExtraDetails"><span id="Address_Text"></span><span id="CityName_Text"></span><span id="PostalCode_Text"></span><span id="CountryName_Text"></span><span id="ContactNumber_Text"></span><span id="Email_Text"></span></h2>
                        </td>
                    </tr>
                @endif
                @if(!empty($formData))
                @if(!empty($formData['date_of_birth']) || !empty($formData['nationality']))
                <tr id="Extra_Details">
                    <td colspan="2">
                        <table class="w-100">
                            <tr>
                                <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                    <h2 class="f-16px letter-spacing-1-5">@if(!empty($formData['date_of_birth'])) Date of Birth @endif</h2>
                                    </td>
                                    <td class="pt-1 pb-2 border-botm">
                                        <p class="f-16px" id="DateOfBirth_Text">{{ $formData['date_of_birth'] }}</p>
                                </td>
                                <td class="pt-1 pb-2 vert-aling-top border-botm">
                                        <h2 class="f-16px letter-spacing-1-5">@if(!empty($formData['nationality'])) Nationality @endif</h2>
                                </td>
                                <td class="pt-1 pb-2 border-botm">
                                        <p class="f-16px" id="Nationality_Text">{{ $formData['nationality'] }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @else
                <tr id="Extra_Details">
                    <td colspan="2">
                        <table class="w-100">
                            <tr>
                                <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top">
                                    <h2 class="f-16px letter-spacing-1-5 date-of-birth" style="display: none;">Date of Birth</h2>
                                    </td>
                                    <td class="pt-2 pb-2">
                                        <p class="f-16px" id="DateOfBirth_Text">
                                        </p>
                                </td>
                                <td class="pt-2 pb-2 vert-aling-top">
                                        <h2 class="f-16px letter-spacing-1-5 nationality" style="display: none;">Nationality</h2>
                                </td>
                                <td class="pt-2 pb-2">
                                        <p class="f-16px" id="Nationality_Text">
                                        </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData))
                @if($professionalSummary != '')
                <tr>
                    <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Profile</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm" id="ProfessionalSummary_Text">
                        <p class="f-16px">
                            {!! $professionalSummary !!}
                        </p>
                    </td>
                </tr>
                @endif
                @else
                <tr id="">
                    <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top profile-summary">
                        <h2 class="text-upper f-16px letter-spacing-1-5" id="ProfileSummary" style="display: none;">Profile</h2>
                    </td>
                    <td class="pt-2 pb-2 profile-summary">
                        <p class="f-16px" id="ProfessionalSummary_Text">
                        </p>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($employment_arr['employer_details'])) 
                <tr id="EmployerDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Employment history</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="EmployerDetails_new">
                                        @foreach($employment_arr['employer_details'] as $key => $employer_details)
                                        <tr>
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 employer-start-date">@if(!empty($employer_details['employer_start_date'])){{ $employer_details['employer_start_date'] }}@endif 
                                                @if(!empty($employer_details['employer_end_date']))
                                                    -&nbsp;<span class="employer-end-date" id="employer_enddate_{{ $key }}">{{ $employer_details['employer_end_date'] }}</span>
                                                @endif
                                                @if(!empty($employer_details['present_label']))
                                                    -&nbsp;<span class="present-label" id="PresentLabel_{{ $key }}">{{ $employer_details['present_label'] }}</span>
                                                @endif
                                               </h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px employer-job-title employer"><b>{{ $employer_details['employer_job_title'] }}@if(!empty($employer_details['employer'])), {{ $employer_details['employer'] }} @endif</b></h2>
                                                     <p class="f-14px mb-8px employer-description-text">{!! $employer_details['emp_description'] !!}</p>
                                                    <h4 class="f-16px employer-city">{{ $employer_details['employer_city'] }}</h4>
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
                @else
                <tr id="EmployerDetails_Text" class="employment-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 employment-section" style="display: none;">Employment history</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="EmployerDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($education_arr['education_details'])) 
                <tr id="EducationDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Education</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="EducationDetails_new">
                                        @foreach($education_arr['education_details'] as $key => $education_details)
                                        <tr>
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 education-start-date">
                                                {{ $education_details['education_start_date'] }}
                                                @if(!empty($education_details['education_end_date']))
                                                    -&nbsp;<span class="education-end-date" id="educationEndDate_{{ $key }}">{{ $education_details['education_end_date'] }}</span>
                                                @endif
                                                @if(!empty($education_details['education_label']))
                                                    -&nbsp;<span class="education-label" id="education_label_{{ $key }}">{{ $education_details['education_label'] }}</span>
                                                @endif</h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px education-school education-degree"><b>{{ $education_details['education_degree'] }}@if(!empty($education_details['education_school'])), {{ $education_details['education_school'] }} @endif</b></h2>
                                                    <p class="f-14px mb-8px education-description-text">{!! $education_details['education_desc'] !!}</p>
                                                    <h4 class="f-16px education-city">{{ $education_details['education_city'] }}</h4>
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
                @else
                <tr id="EducationDetails_Text" class="education-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 education-section" style="display: none;">Education</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="EducationDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif
                @if(!empty($formData) && !empty($skills_arr['skill_details'])) 
                <tr id="Skills_Text">
                    <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Skills</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm">
                        <table class="w-100" id="SkillDetails_new">
                            @foreach(array_chunk($skills_arr['skill_details'],2) as $key => $skill_details)
                            <tr>
                                @foreach($skill_details as $skill)
                                <td><h3 id="SkillName_{{ $key }}" class="skill-name">{{ $skill['skill'] }}</h3></td>
                                <td>@if($skill['skill_level'] == 1)
                                        <p id="skill_Level_{{ $key }}" class="skill-level">Low</p>
                                    @elseif($skill['skill_level'] == 2)
                                        <p id="skill_Level_{{ $key }}" class="skill-level">Medium</p>
                                    @elseif($skill['skill_level'] == 3)
                                        <p id="skill_Level_{{ $key }}" class="skill-level">Good</p>
                                    @elseif($skill['skill_level'] == 4)
                                        <p id="skill_Level_{{ $key }}" class="skill-level">Experience</p>
                                    @elseif($skill['skill_level'] == 5)
                                        <p id="skill_Level_{{ $key }}" class="skill-level">Experts</p>
                                    @else
                                        <p class="skill-level"></p>
                                    @endif</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                @else
                <tr id="Skills_Text" class="skill-section" style="display: none;">
                    <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5 skill-section" style="display: none;">Skills</h2>
                    </td>
                    <td class="pt-2 pb-2">
                        <table class="w-100" id="SkillDetails_new">
                        </table>
                    </td>
                </tr>
                @endif 
                @if(!empty($formData))
                    @if(!empty($formData['hobbies']))
                    <tr id="HobbiesSection">
                        <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top border-botm">
                            <h2 class="text-upper f-16px letter-spacing-1-5">Hobbies</h2>
                        </td>
                        <td class="pt-2 pb-2 border-botm">
                            <p class="f-16px">
                                {{ $formData['hobbies'] }}
                            </p>
                        </td>
                    </tr>
                    @endif
                @else
                    <tr id="HobbiesSection" class="hobbies-section" style="display: none;">
                        <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top">
                            <h2 class="text-upper f-16px letter-spacing-1-5 hobbies-section" style="display: none;">Hobbies</h2>
                        </td>
                        <td class="pt-2 pb-2 hobbies f-14px" id="Hobbies_Text">
                            <p class="f-16px"></p>
                        </td>
                    </tr>
                @endif
                @if(!empty($formData) && !empty($website_social_link_arr['website_social_links_details']))
                <tr id="WebsiteSocialLinks_Text">
                    <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top border-botm">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Links</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm">
                        <table class="w-100" id="WebsiteSocialLinks_new">
                            <tr>                                
                                <td class="pb-2">
                                    <div class="emp-his">
                                        <ul class="website-links">
                                            @foreach($website_social_link_arr['website_social_links_details'] as $key => $website_social_links_details)
                                            <li id="WebsiteSocialLabel_{{ $key }}" class="website-social-label">
                                                <a href="{{ $website_social_links_details['website_social_link'] }}">
                                                    {{ $website_social_links_details['website_social_label'] }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @else
                <tr id="WebsiteSocialLinks_Text" class="website-links-section" style="display: none;">
                    <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5 website-links-section" style="display: none;">Links</h2>
                    </td>
                    <td class="pt-2 pb-2">
                        <table class="w-100">
                            <tr>           
                                <td class="pb-2">
                                    <div class="emp-his">
                                        <ul id="WebsiteSocialLinks_new" class="website-links">
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif
                @if(!empty($formData) && !empty($course_arr['course_details'])) 
                <tr id="CourseSectionDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Courses</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="CourseSectionDetails_new">
                                        @foreach($course_arr['course_details'] as $key => $course_details)
                                        <tr>
                                            <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 course-start-date">@if(!empty($course_details['course_start_date'])){{ $course_details['course_start_date'] }}@endif 
                                                @if(!empty($course_details['course_end_date']))
                                                    -&nbsp;<span class="course-end-date" id="employer_enddate_{{ $key }}">{{ $course_details['course_end_date'] }}</span>
                                                @endif
                                                @if(!empty($course_details['course_present_label']))
                                                    -&nbsp;<span class="present-label" id="PresentLabel_{{ $key }}">{{ $course_details['course_present_label'] }}</span>
                                                @endif
                                               </h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px course-title institution-name"><b>{{ $course_details['course_title'] }}@if(!empty($course_details['institution'])), {{ $course_details['institution'] }} @endif</b></h2>
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
                @else
                <tr id="CourseSectionDetails_Text" class="courses-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 courses-section" style="display: none;">Courses</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="CourseSectionDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($extra_curricular_section_arr['extra_curricular_section_details'])) 
                <tr id="ExtraCurricularActivityDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Extra-curricular Activity</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="ExtraCurricularSectionDetails_new">
                                        @foreach($extra_curricular_section_arr['extra_curricular_section_details'] as $key => $extra_curricular_section_details)
                                        <tr>
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 extra-curricular-start-date">@if(!empty($extra_curricular_section_details['extra_curricular_start_date'])){{ $extra_curricular_section_details['extra_curricular_start_date'] }}@endif 
                                                @if(!empty($extra_curricular_section_details['extra_curricular_end_date']))
                                                    -&nbsp;<span class="extra-curricular-end-date" id="employer_enddate_{{ $key }}">{{ $extra_curricular_section_details['extra_curricular_end_date'] }}</span>
                                                @endif
                                                @if(!empty($extra_curricular_section_details['extra_curricular_present_label']))
                                                    -&nbsp;<span class="extra-curricular-present-label" id="PresentLabel_{{ $key }}">{{ $extra_curricular_section_details['extra_curricular_present_label'] }}</span>
                                                @endif
                                               </h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px extra-curricular-section-employer function-title"><b>{{ $extra_curricular_section_details['function_title'] }}@if(!empty($extra_curricular_section_details['extra_curricular_section_employer'])), {{ $extra_curricular_section_details['extra_curricular_section_employer'] }} @endif</b></h2>
                                                     <p class="f-14px mb-8px extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_section_description'] !!}</p>
                                                    <h4 class="f-16px employer-city">{{ $extra_curricular_section_details['extra_curricular_city'] }}</h4>
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
                @else
                <tr id="ExtraCurricularActivityDetails_Text" class="activity-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 activity-section" style="display: none;">Extra-curricular Activity</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="ExtraCurricularSectionDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($internship_arr['internship_details'])) 
                <tr id="InternshipDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Internship</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="InternshipDetails_new">
                                        @foreach($internship_arr['internship_details'] as $key => $internship_details)
                                        <tr>
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 internship-start-date">@if(!empty($internship_details['internship_start_date'])){{ $internship_details['internship_start_date'] }}@endif 
                                                @if(!empty($internship_details['internship_end_date']))
                                                    -&nbsp;<span class="internship-end-date">{{ $internship_details['internship_end_date'] }}</span>
                                                @endif
                                                @if(!empty($internship_details['internship_present_label']))
                                                    -&nbsp;<span class="internship-present-label">{{ $internship_details['internship_present_label'] }}</span>
                                                @endif
                                               </h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px internship-job-title internship-employer"><b>{{ $internship_details['internship_job_title'] }}@if(!empty($internship_details['internship_employer'])), {{ $internship_details['internship_employer'] }} @endif</b></h2>
                                                     <p class="f-14px mb-8px internship-description-text">{!! $internship_details['internship_desc'] !!}</p>
                                                    <h4 class="f-16px internship-city">{{ $internship_details['internship_city'] }}</h4>
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
                @else
                <tr id="InternshipDetails_Text" class="internship-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="education-cont">
                            <tr>
                                <td>
                                    <table class="w-100" id="education-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 internship-section" style="display: none;">Internship</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="w-100" id="InternshipDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                @endif
                @if(!empty($formData) && !empty($custom_section_arr['custom_section_details'])) 
                <tr id="CustomSectionDetails_Text">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            {{-- <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5">Employment history</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <table class="w-100" id="CustomSectionDetails_new">
                                        @foreach($custom_section_arr['custom_section_details'] as $key => $custom_section_details)
                                        <tr>
                                            <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
                                                <h2 class="f-14px letter-spacing-1-5 custom-start-date">@if(!empty($custom_section_details['custom_start_date'])){{ $custom_section_details['custom_start_date'] }}@endif 
                                                @if(!empty($custom_section_details['custom_end_date']))
                                                    -&nbsp;<span class="custom-end-date">{{ $custom_section_details['custom_end_date'] }}</span>
                                                @endif
                                                @if(!empty($custom_section_details['custom_present_label']))
                                                    -&nbsp;<span class="custom-present-label">{{ $custom_section_details['custom_present_label'] }}</span>
                                                @endif
                                               </h2>
                                            </td>
                                            <td class="pt-1 pb-2 border-botm">
                                                <div class="emp-his">
                                                    <h2 class="f-16px mb-10px custom-job-title"><b>{{ $custom_section_details['custom_title'] }}</b></h2>
                                                     <p class="f-14px mb-8px custom-description-text">{!! $custom_section_details['custom_section_description'] !!}</p>
                                                    <h4 class="f-16px custom-section-city">{{ $custom_section_details['custom_section_city'] }}</h4>
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
                @else
                <tr id="CustomSectionDetails_Text" class="custom-section" style="display: none;">
                    <td colspan="2">
                        <table class="w-100" id="employment-cont">
                            {{-- <tr>
                                <td>
                                    <table class="w-100" id="employe-his-title">
                                        <tr>
                                            <td class="pt-2">
                                                <h3 class="text-upper f-16px letter-spacing-1-5 custom-section" style="display: none;">Employment history</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <table class="w-100" id="CustomSectionDetails_new">
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($language_arr['language_details'])) 
                <tr id="LanguageDetails_Text">
                    <td class="pt-2 pb-2 pr-2p w-20p border-botm vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5">Languages</h2>
                    </td>
                    <td class="pt-2 pb-2 border-botm">
                        <table class="w-100" id="LanguageDetails_new">
                            @foreach(array_chunk($language_arr['language_details'],2) as $key => $language_details)
                            <tr>
                                @foreach($language_details as $language)
                                <td>
                                    <h3 class="language-title">{{ $language['language_title'] }}</h3>
                                </td>
                                <td>
                                    <p class="language-level">{{ $language['language_level'] }}</p>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                @else
                <tr id="LanguageDetails_Text" class="language-section" style="display: none;">
                    <td class="pt-2 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5 language-section" style="display: none;">Languages</h2>
                    </td>
                    <td class="pt-2 pb-2">
                        <table class="w-100" id="LanguageDetails_new">
                        </table>
                    </td>
                </tr>
                @endif
                @if(!empty($formData) && !empty($reference_arr['reference_details'])) 
                <tr id="ReferenceDetails_Text" class="reference-section"> 
                    <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5 reference-section">References</h2>
                    </td>
                    <td class="pt-1 pb-2">
                        <table class="w-100" id="ReferenceDetails_new">
                            @if(!empty($formData['reference_present_label']))
                                <tr class="reference-add-more-section">
                                    <td class="pt-1 pb-2">
                                        <p id="hideReference" class="hide-reference f-14px">{{ $formData['reference_present_label'] }}</p>
                                    </td>
                                </tr>
                            @else
                            @foreach($reference_arr['reference_details'] as $key => $reference_details)
                                <tr class="reference-add-more-section">
                                    <td class="pt-1 pb-2">
                                        <div class="emp-his referenceDetail">
                                            <h2 class="f-16px mb-10px">
                                                <b>
                                                    <span class="reference-name">{{ $reference_details['referent_name'] }}</span>
                                                    <span class="reference-company"> from {{ $reference_details['reference_company'] }}</span>
                                                </b>
                                            </h2>
                                            <p class="f-14px mb-8px">
                                                <span class="referent-email">{{ $reference_details['reference_email'] }}</span>
                                                <span class="referent-phone"> . {{ $reference_details['referent_phone'] }}</span>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                    </td>
                </tr> 
                @else
                <tr id="ReferenceDetails_Text" class="reference-section" style="display: none;"> 
                    <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
                        <h2 class="text-upper f-16px letter-spacing-1-5 reference-section" style="display: none;">References</h2>
                    </td>
                    <td class="pt-1 pb-2">
                        <table class="w-100" id="ReferenceDetails_new">
                        </table>
                    </td>
                </tr> 
                @endif             
            </tbody>
        </table>
    </div>
</body>

</html>