
<!DOCTYPE html>
<html>
<head>
    <title>Chocolate</title>
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
        .list-s-none{list-style: none;}
        .cho-img-c img{width: 200px;height: 200px;object-fit: cover;margin-top: -88px;margin-bottom: 20px;}
        .cho-r-b{border: 3px solid #053460;border-left: none;width: 38%;padding: 0 30px;}
        .chocolate-cont{padding-top: 80px;padding-bottom: 40px;}
        .cho-prof-n{font-size: 28px;color: #053460;text-transform: uppercase;font-weight: bold;letter-spacing: 1px;margin-bottom: 8px;}
        .cho-oc{font-size: 18px;text-transform: uppercase;color: #418c9d;letter-spacing: 3px;padding-bottom: 25px;border-bottom: 2px solid #053460;font-weight: bold;}
        .l-s-p-cho-c{font-size: 18px;color: #053460;font-weight: bold;text-transform: uppercase;margin-top: 25px;margin-bottom: 10px;}
        .lft-colr, .cho-are-e{color: #4991a1;}
        .mb-5p{margin-bottom: 5px;}
        .cho-are-e{text-transform: capitalize;}
        .cho-are-e li:last-child{margin-bottom: 5px;}
        .mb-70{margin-bottom: 70px;}
        .p-lr-50{padding: 0 50px}
        .cho-r-s-h{background-color: #ccd6db;color: #0a3863;text-transform: uppercase;font-weight: bold;padding: 8px 15px;font-size: 22px;margin-bottom: 15px;}
        .cho-s-c-h{font-size: 18px;color: #086a81;font-weight: bold;text-transform: uppercase;margin-bottom: 6px;}
        .cho-s-c-hp{font-size: 16px;color: #086a81;font-weight: bold;text-transform: capitalize;margin-bottom: 6px;}
        .cho-exp-c{color: #486b8a;margin-left: 20px;}
        .cho-exp-c li:last-child, .chocolate-cont li:last-child{margin-bottom: 30px;}
        .cho-ref-con{color: #456888;margin-bottom: 3px;}
        .chocolate-cont p{
            word-break: break-word;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="chocolate-cont" style="background-color: #ffffff;">
    <table class="w-100">
        <tr>
            <td class="cho-r-b ver-alg-top">
                <table class="w-100">
                    <tr>
                        <td>
                            <div class="cho-img-c text-center">
                                @if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
                                    <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="melon-profile">
                                @else 
                                    <img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="melon-profile">
                                @endif
                            </div>
                            <h1 class="cho-prof-n">
                                @if(isset($getResumeFullNameEmail['resume_fullname']))
                                    <div class="cho-firstname">{{$getResumeFullNameEmail['resume_fullname']}}</div>
                                @endif
{{--                                <div class="cho-lastname">Dubois</div>--}}
                            </h1
                            @if(isset($getPersonalDetails['main_job_title']))>
                                <h2 class="cho-oc">{{$getPersonalDetails['main_job_title']}}</h2>
                            @endif
                        </td>
                    </tr>
                    @if((isset($getPersonalDetails['profile_summary']) && $getPersonalDetails['profile_summary']!=''))
                        <tr>
                            <td>
                                <h2 class="l-s-p-cho-c" id="ProfileSummary">Personal Profile</h2>
                                <p class="lft-colr mb-5p" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <h2 class="l-s-p-cho-c" id="ProfileSummary" style="display: none">Personal Profile</h2>
                                <p class="lft-colr mb-5p" id="ProfessionalSummary_Text"></p>
                            </td>
                        </tr>
                    @endif

                    @if( (!empty($getSkill) && count($getSkill) > 0))
                        <tr id="Skills_Text">
                            <td>
                                <h2 class="l-s-p-cho-c">Areas of Expertise</h2>
                                <ul class="cho-are-e list-s-none" id="SkillDetails_new">
                                    @foreach($getSkill as $key => $skill_details)
                                        <li class="skill-name">{{ $skill_details['us_skill'] }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr id="Skills_Text">
                            <td>
                                <h2 class="l-s-p-cho-c skill-section" style="display: none">Areas of Expertise</h2>
                                <ul class="cho-are-e list-s-none" id="SkillDetails_new">
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getLanguage) && count($getLanguage) > 0))
                        <tr id="LanguageDetails_Text">
                            <td>
                                <h2 class="l-s-p-cho-c language-section">Language</h2>
                                <ul class="cho-are-e list-s-none" id="LanguageDetails_new">
                                    @foreach($getLanguage as $key => $language_details)
                                        <li class="language-title">{{ $language_details['ul_language'] }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr id="LanguageDetails_Text">
                            <td>
                                <h2 class="l-s-p-cho-c language-section" style="display: none">Language</h2>
                                <ul class="cho-are-e list-s-none" id="LanguageDetails_new">
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0))
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="l-s-p-cho-c website-links-section">Links</h2>
                                <ul class="cho-are-e list-s-none" id="WebsiteSocialLinks_new">
                                    @foreach($getWebsiteSocialLink as $key => $website_social_links_details)
                                        <li id="WebsiteSocialLinksData_{{ $key }}">
                                            <a style="font-size: medium" class="language-title" target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr id="WebsiteSocialLinks_Text">
                            <td>
                                <h2 class="l-s-p-cho-c website-links-section" style="display: none">Links</h2>
                                <ul class="cho-are-e list-s-none" id="WebsiteSocialLinks_new">
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if((isset($getHobby['uh_hobby']) && $getHobby['uh_hobby']!=''))
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="l-s-p-cho-c hobbies-section">Hobbies</h2>
                                <h4 class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</h4>
                            </td>
                        </tr>
                    @else
                        <tr id="HobbiesSection">
                            <td>
                                <h2 class="l-s-p-cho-c hobbies-section" style="display: none">Hobbies</h2>
                                <h6 class="hobbies" id="Hobbies_Text">
                                </h6>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getPersonalDetails) || !empty($getResumeFullNameEmail)))
                        <tr>
                            <td>
                                <h2 class="l-s-p-cho-c" id="Extra_Details">Contact info</h2>
                                <div class="lft-colr mb-70">
                                    @if(isset($getPersonalDetails['address']) && $getPersonalDetails['address']!='')
                                        <p class="cho-address" id="Address_Text">Address: {{$getPersonalDetails['address']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['country']) && $getPersonalDetails['country']!='')
                                        <p class="cho-address" id="CountryName_Text">Country: {{$getPersonalDetails['country']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['city']) && $getPersonalDetails['city']!='')
                                        <p class="cho-address" id="CityName_Text">City: {{$getPersonalDetails['city']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['postal_code']) && $getPersonalDetails['postal_code']!='')
                                        <p class="cho-address" id="PostalCode_Text">Postal Code: {{$getPersonalDetails['postal_code']}}</p>
                                    @endif
                                    @if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!='')
                                        <p class="cho-email" id="Email_Text">Email: {{$getResumeFullNameEmail['resume_email']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['phone']) && $getPersonalDetails['phone']!='')
                                        <p class="cho-weblink" id="ContactNumber_Text">Phone: {{$getPersonalDetails['phone']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['place_of_birth']) && $getPersonalDetails['place_of_birth']!='')
                                        <p class="cho-weblink" id="ContactNumber_Text">Current Location: {{$getPersonalDetails['place_of_birth']}}</p>
                                    @endif
                                    @if(isset($getPersonalDetails['date_of_birth']) && $getPersonalDetails['date_of_birth']!='')
                                        <p class="cho-weblink" id="ContactNumber_Text">Date Of Birth: {{$getPersonalDetails['date_of_birth']}}</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <h2 class="l-s-p-cho-c" id="Extra_Details" style="display: none">Contact info</h2>
                                <div class="lft-colr mb-70">
                                    <p class="cho-address" id="Address_Text"></p>
                                    <p class="cho-address" id="CountryName_Text"></p>
                                    <p class="cho-address" id="CityName_Text"></p>
                                    <p class="cho-address" id="PostalCode_Text"></p>
                                    <p class="cho-email" id="Email_Text"></p>
                                    <p class="cho-weblink" id="ContactNumber_Text"></p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </table>
            </td>
            <td class="p-lr-50 ver-alg-top">
                <table class="w-100">

                    @if( (!empty($getCareers) && count($getCareers) > 0))
                        <tr id="EmployerDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h employment-section">Work Experience</h2>
                                <table class="w-100" id="EmployerDetails_new">
                                    @foreach($getCareers as $key => $employer_details)
                                    @php 
                                        $vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
                                        $vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name'],$employer_details['uc_city']));
                                    @endphp
                                        <tr class="employer-add-more-section" id="EmployerAddMore_section_{{$key}}">
                                            <td>
                                                <h3 class="cho-s-c-h employer-job-title">{{ implode(" | ", $vars_a) }}</h3>
                                                <h4 class="cho-s-c-hp">
                                                    @if($employer_details['uc_is_present'] == 0)
                                                        <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="cho-exp-c employer-description-text">
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
                                <h2 class="cho-r-s-h employment-section" style="display: none">Work Experience</h2>
                                <table class="w-100" id="EmployerDetails_new">
                                </table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getEducation) && count($getEducation) > 0))
                        <tr id="EducationDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h education-section">Academic history</h2>
                                <table class="w-100" id="EducationDetails_new">
                                    @foreach($getEducation as $key => $education_details)
                                    @php 
                                        $vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
                                        $vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
                                    @endphp
                                        <tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
                                            <td>
                                                <h3 class="cho-s-c-h education-school">{{ implode(" | ", $vars_a) }}</h3>
                                                <h4 class="cho-s-c-hp">
                                                    @if($education_details['ue_is_present'] == 0)
                                                        <span class="education-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="education-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="cho-exp-c education-description-text">
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
                                <h2 class="cho-r-s-h education-section" style="display: none">Academic history</h2>
                                <table class="w-100" id="EducationDetails_new"></table>
                            </td>
                        </tr>
                    @endif


                    @if((!empty($getInternship) && count($getInternship) > 0))
                        <tr id="InternshipDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h internship-section" >Internships</h2>
                                <table class="w-100" id="InternshipSectionDetails_new">
                                    @foreach($getInternship as $key => $internship_details)
                                    @php 
                                        $vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
                                        $vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
                                    @endphp
                                        <tr class="course-section">
                                            <td>
                                                <h3 class="cho-s-c-h internship-employer">{{ implode(" | ", $vars_a) }}</h3>
                                                <h4 class="cho-s-c-hp">
                                                    @if($internship_details['ui_is_present'] == 0)
                                                        <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="cho-exp-c internship-description-text">
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
                                <h2 class="cho-r-s-h internship-section" style="display: none">Internships</h2>
                                <table class="w-100" id="InternshipSectionDetails_new"></table>
                            </td>
                        </tr>
                    @endif


                    @if((!empty($getCourse) && count($getCourse) > 0))
                        <tr id="CourseSectionDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h courses-section">Courses</h2>
                                <table class="w-100" id="CourseSectionDetails_new">
                                    @foreach($getCourse as $key => $course_details)
                                    @php 
                                        $vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
                                        $vars = array_filter(array($course_details['ucr_course_name'], $course_details['ucr_institute']));
                                    @endphp
                                        <tr class="course-section">
                                            <td>
                                                <h3 class="cho-s-c-h institution-name">{{ implode(" | ", $vars_a) }}</h3>
                                                <h4 class="cho-s-c-hp">
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
                                <h2 class="cho-r-s-h courses-section" style="display: none">Courses</h2>
                                <table class="w-100" id="CourseSectionDetails_new"></table>
                            </td>
                        </tr>
                    @endif



                    @if((!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0))
                        <tr id="ExtraCurricularActivityDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h activity-section">Extra-curricular Activity</h2>
                                <table class="w-100" id="ExtraCurricularSectionDetails_new">
                                    @foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
                                    @php 
                                        $vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
                                        $vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
                                    @endphp
                                        <tr class="extra-curricular-add-more-section">
                                            <td>
                                                <h3 class="cho-s-c-h extra-curricular-section-employer">{{ implode(" | ", $vars_a) }}</h3>
                                                <h4 class="cho-s-c-hp">
                                                    @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                        <span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="cho-exp-c extra-curricular-description-text">
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
                                <h2 class="cho-r-s-h activity-section" style="display: none">Extra-curricular Activity</h2>
                                <table class="w-100" id="ExtraCurricularSectionDetails_new"></table>
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
                                <h2 class="cho-r-s-h custom-section" >{{ $custom_heading }}</h2>
                                <table class="w-100" id="CustomSectionDetails_new">
                                    @foreach($getCustomSection as $key => $custom_section_details)
                                    @php 
                                        $vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
                                        $vars = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
                                    @endphp
                                        <tr class="course-section">
                                            <td>
                                                <h3 class="cho-s-c-h custom-job-title">{{ implode(" | ", $vars) }}</h3>
                                                <h4 class="cho-s-c-hp">
                                                    @if($custom_section_details['ucs_is_present'] == 0)
                                                        <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                        <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
                                                </h4>
                                                <div class="cho-exp-c custom-description-text">
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
                                <h2 class="cho-r-s-h custom-section" style="display: none">Custom</h2>
                                <table class="w-100" id="CustomSectionDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                    @if((!empty($getReference) && count($getReference) > 0))
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h reference-section">Work references</h2>
                                <table class="w-100" id="ReferenceDetails_new">
                                    @foreach($getReference as $key => $reference_details)
                                    @php 
                                        $vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
                                        $vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
                                    @endphp
                                        <tr>
                                            <td>
                                                <div class="cho-ref-con">
                                                    <p class="reference-name">{{ implode(" from ", $vars) }}</p>
                                                    <p class="referent-email">{{ implode(" | ", $vars_a) }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr id="ReferenceDetails_Text">
                            <td>
                                <h2 class="cho-r-s-h reference-section" style="display: none">Work references</h2>
                                <table class="w-100" id="ReferenceDetails_new"></table>
                            </td>
                        </tr>
                    @endif

                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
