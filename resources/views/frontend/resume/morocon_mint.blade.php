<!DOCTYPE html>
<html>
<head>
	<title>Morocon Mint</title>
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
	    .plr-15{padding: 0 45px;}
	    .morcon-name-ct{position: relative;}
	    .morcon-name-ct h1{font-size: 48px;font-weight: bold;text-transform: capitalize;}
	    .morcon-name-ct h2{font-size: 22px;font-weight: bold;text-transform: capitalize;margin-top: 8px;margin-bottom: 35px;}
	    .baln-squ{height: 20px;width: 20px;background-color: #000;position: absolute;right: 0;top: 17px;}
	    .f-w-bold{font-weight: bold;}
	    .ad-color, .morocon-mint-cont a{color: #5d5d5d;}
	    .morocon-mint-cont p, .morocon-mint-cont ul{font-size: 18px;} 
	    .addr-cnt td{vertical-align: baseline;padding-bottom: 14px;}
	    .m-pro-con{width: 250px;vertical-align: top;margin-bottom: 5px;}
	    .m-tital{font-size: 22px;font-weight: bold;text-transform: uppercase;border-bottom: 2px solid;display: inline-block;margin-bottom: 10px;}
	    .mb-50px{margin-bottom: 50px;}
	    .w-250{width: 250px;}
	    .m-compame{position: relative;}
	    .m-compame h5{position: absolute;right: 0;top: 3px;font-size: 14px;font-weight: bold;text-transform: uppercase;}
	    .m-compame h3{font-size: 20px;font-weight: bold;text-transform: capitalize;width: 70%;}
	    .mh4{font-weight: bold;text-transform: uppercase;}
	    .m-ul-v{color: #5d5d5d;margin-left: 33px;margin-top: 10px;}
	    .m-ul-v li, .morocon-mint-cont li{margin-bottom: 5px;}
	    .m-ul-v li:last-child, ..morocon-mint-cont li:last-child{margin-bottom: 30px;}	    
	    .morocon-mint-cont p{
            word-break: break-word;
            margin-bottom: 10px;
        }
        .desc-p p{
        	margin-bottom: 20px;
        }
        .skill-name{
        	margin-bottom: 30px;
        }
        .course-p{
        	margin-bottom: 20px;	
        }
        .skill-name .website-social-label a{
        	margin-bottom: 40px;	
        }
        .hobbies{
        	margin-bottom: 30px;	
        }
	</style>
</head>
<body>
<div class="morocon-mint-cont plr-15">
	<table class="w-100">
		<tbody>
			@if(!empty($getPersonalDetails))
			<tr>
				<td colspan="2">
					<div class="morcon-name-ct">
						<h1 class="first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
						<h2 id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
						<!-- <div class="baln-squ"></div> -->
					</div>
				</td>
			</tr>
			@else
			<tr>
				<td colspan="2">
					<div class="morcon-name-ct">
						<h1><span id="FirstName_Text" class="first-name"></span> <span id="LastName_Text" class="last-name"></span></h1>
						<h2 id="JobTitle_Text"></h2>
						<div class="baln-squ"></div>
					</div>
				</td>
			</tr>
			@endif
			@if(!empty($getPersonalDetails))
			<tr>
				<td colspan="2">
					<table class="w-100">
						<tr class="addr-cnt">
							@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
								@php 
									$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code']));
								@endphp
							<td>
								<h3 class="f-w-bold">Address</h3>
							</td>
							<td class="ad-color">
								
									<div class="fst-addressline" id="ExtraDetails" class="other-details">{{ implode(", ",$address) }}</div>
								<div class="sec-addressline">{{ $getPersonalDetails['country'] }}</div>
							</td>
							@endif
						</tr>
						<tr>
							@if(!empty($getPersonalDetails['phone']))
							<td>
								<h3 class="f-w-bold">Phone</h3>
							</td>
							<td class="ad-color">
									<div class="detail-cnt call-img contact-number" id="ContactNumber_Text" class="other-details">{{ $getPersonalDetails['phone'] }}</div>
							</td>	
							@endif
						</tr>
						<tr>
							@if(!empty($getPersonalDetails['place_of_birth']))
							<td>
								<h3 class="f-w-bold">Current Location</h3>
							</td>
							<td class="ad-color">
									<div class="detail-cnt call-img contact-number" id="ContactNumber_Text" class="other-details">{{ $getPersonalDetails['place_of_birth'] }}</div>
							</td>	
							@endif
						</tr>
						<tr>
							@if(!empty($getPersonalDetails['date_of_birth']))
							<td>
								<h3 class="f-w-bold">Date Of Birth</h3>
							</td>
							<td class="ad-color">
									<div class="detail-cnt call-img contact-number" id="ContactNumber_Text" class="other-details">{{ $getPersonalDetails['date_of_birth'] }}</div>
							</td>	
							@endif
						</tr>
						<tr class="addr-cnt">
							<td>
								<h3 class="f-w-bold">Email</h3>
							</td>
							<td class="ad-color">
								@if(!empty($getResumeFullNameEmail))
									<div class="detail-cnt email-img email-text" id="Email_Text"><a href="mailto:someone@example.com" class="other-details">{{ $getResumeFullNameEmail['resume_email'] }}</a></div>
									@endif
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@else
			<tr>
				<td colspan="2">
					<table class="w-100">
						<tr class="addr-cnt">
							<td>
								<h3 class="f-w-bold"></h3>
							</td>
							<td class="ad-color">
								<div class="fst-addressline" id="ExtraDetails"><span id="Address_Text"></span><span id="CityName_Text"></span><span id="PostalCode_Text"></span><span id="CountryName_Text"></span></div>
								<div class="sec-addressline"></div>
							</td>
							<td>
								<h3 class="f-w-bold"></h3>
							</td>
							<td class="ad-color"></td>							
						</tr>
						<tr class="addr-cnt">
							<td>
								<h3 class="f-w-bold"></h3>
							</td>
							<td class="ad-color"></td>
						</tr>
					</table>
				</td>
			</tr>
			@endif
			@if(!empty($getPersonalDetails))
		 		@if($getPersonalDetails['profile_summary'] != '')
					<tr>
						<td class="m-pro-con">
							<h2 class="m-tital" id="ProfileSummary">01 Profile</h2>
						</td>
						<td class="desc-p">
							<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
						</td>
					</tr>
				@endif
			@else
				<tr>
					<td>
						<h2 id="ProfileSummary" style="display: none;">01 Profile</h2>
						<p id="ProfessionalSummary_Text"></p>
					</td> 
				</tr>
			@endif
			@if(!empty($getCareers) && count($getCareers) > 0)
			<tr id="EmployerDetails_Text">
				<td colspan="2">
					<h2 class="m-tital">02 Employment History</h2>
					<table class="w-100"  id="EmployerDetails_new">
						@foreach($getCareers as $key => $employer_details)
						@php 
							$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
							$vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name']));
						@endphp
						<tr id="EmployerAddMore_section_{{ $key }}">
							<td class="ver-alg-top w-250">
								<h4 class="mh4">
									@if($employer_details['uc_is_present'] == 0)
										<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="present-label">{{ implode(" - ", $vars) }}</span>
									@endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3>{{ implode(" at ", $vars_a) }}</h3>
									<h5><span class="employer-city">{{ $employer_details['uc_city'] }}</span></h5>
								</div>
								@if(!empty($employer_details['career_description']))
								<div class="m-ul-v">
									<div class="desc-p employer-description-text">{!! $employer_details['career_description'] !!}</div>
								</div>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			@else
				<tr id="EmployerDetails_Text">
					<td>
						<h2 class="m-tital" style="display: none;">02 Employment history</h2>
						<table class="w-100 employ-histry" id="EmployerDetails_new">
						</table>
					</td>
				</tr>
			@endif
			@if(!empty($getEducation) && count($getEducation) > 0)
			<tr id="EducationDetails_Text">
				<td colspan="2">
					<h2 class="m-tital">03 Education</h2>
					<table class="w-100" id="EducationDetails_new">
						@foreach($getEducation as $key => $education_details)
						@php 
							$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
							$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
						@endphp
						<tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
							<td class="ver-alg-top w-250">
								<h4 class="mh4 mb-50px">
									@if($education_details['ue_is_present'] == 0)
										<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="education-label">{{ implode(" - ", $vars) }}</span>
									@endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3>{{ implode(", ", $vars_a) }}</h3>
									<h5><span class="education-city">{{ $education_details['ue_city'] }}</span></h5>
								</div>	
								@if(!empty($education_details['education_description']))
								<div class="m-ul-v">
									<div class="desc-p employer-description-text">{!! $education_details['education_description'] !!}</div>
								</div>
								@endif							
							</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			@else
				<tr id="EducationDetails_Text">
					<td>
						<h2 class="education-section" style="display: none;">03 Education</h2>
						<table class="w-100 employ-histry" id="EducationDetails_new">
						</table>
					</td>
				</tr>
			@endif

			@if(!empty($getSkill) && count($getSkill) > 0) 
				<tr id="Skills_Text">
					<td class="m-pro-con">
						<h2 class="m-tital" >04 Skill</h2>
					</td>
					<td>
						<h3 class="skill-name">@php  $str = ''; @endphp
						@foreach($getSkill as $key => $skill_details)
						@php $str = ($str == '' ? '' : $str . ',') . $skill_details['us_skill'] @endphp
						@endforeach
						{{ $str }}</h3>
					</td>
				</tr>
			@else
				<tr id="Skills_Text">
					<td>
						<h2 style="display: none;">04 Skill</h2>
						<p></p>
					</td> 
				</tr>
			@endif

			@if(!empty($getCourse) && count($getCourse) > 0) 
			<tr id="CourseSectionDetails_Text">
				<td colspan="2">
					<h2 class="m-tital">05 Courses</h2>
					<table class="w-100"  id="CourseSectionDetails_new">
						@foreach($getCourse as $key => $course_details)			
						@php 
							$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
							$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
						@endphp
						<tr>
							<td class="ver-alg-top w-250">
								<h4 class="mh4">
                                    @if($course_details['uc_is_present'] == 0)
                                    	<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                    @else
                                    	<span class="present-label">{{ implode(" - ", $vars) }}</span>
                                    @endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3 class="course-p">{{ implode(", ", $vars_a) }}</h3>
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
						<h2 class="m-tital" style="display: none;">05 Courses</h2>
						<table class="w-100 employ-histry" id="CourseSectionDetails_new">
						</table>
					</td>
				</tr>
			@endif

			@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
				<tr id="WebsiteSocialLinks_Text">
					<td class="m-pro-con">
						<h2 class="m-tital" >06 Links</h2>
					</td>
					<td>
						<h3 calss="skill-name">
						@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
							<span class="website-social-label">
				 				<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
			 				</span>&nbsp;&nbsp;
			 			@endforeach
						</h3><br>
					</td>
				</tr>
			@else
				<tr id="WebsiteSocialLinks_Text">
					<td>
						<h2 style="display: none;">06 Links</h2>
						<p></p>
					</td> 
				</tr>
			@endif
			@if(!empty($getLanguage) && count($getLanguage) > 0) 
				<tr id="LanguageDetails_Text">
					<td class="m-pro-con">
						<h2 class="m-tital" >07 Language</h2>
					</td>
					<td>
						<h3 calss="skill-name">@php  $str = ''; @endphp
						@foreach($getLanguage as $key => $language_details)
						@php $str = ($str == '' ? '' : $str . ',') . $language_details['ul_language'] @endphp
						@endforeach
						{{ $str }}</h3><br>
					</td>
				</tr>
			@else
				<tr id="LanguageDetails_Text">
					<td>
						<h2 style="display: none;">07 Language</h2>
						<p></p>
					</td> 
				</tr>
			@endif
			@if(!empty($getHobby))
				@if(!empty($getHobby['uh_hobby']))
				<tr id="HobbiesSection">
					<td class="m-pro-con">
						<h2 class="m-tital" >08 Hobbies</h2>
					</td>
					<td>
						<h3 class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</h3>
					</td>
				</tr>
				@endif
			@else
				<tr id="HobbiesSection">
					<td>
						<h2 style="display: none;">08 Hobbies</h2>
						<p></p>
					</td> 
				</tr>
			@endif
			@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
			<tr id="ExtraCurricularActivityDetails_Text">
				<td colspan="2">
					<h2 class="m-tital">09 Extra-curricular Activity</h2>
					<table class="w-100"  id="ExtraCurricularSectionDetails_new">
						@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
						@php 
							$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
							$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
						@endphp
						<tr>
							<td class="ver-alg-top w-250">
								<h4 class="mh4">
									@if($extra_curricular_section_details['ueca_is_present'] == 0)
										<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
									@endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3>{{ implode(", ", $vars_a) }}</h3>
									<h5><span class="extra-curricular-city">{{ $extra_curricular_section_details['ueca_city'] }}</span></h5>
								</div>
								@if(!empty($extra_curricular_section_details['extra_curricular_description']))
								<div class="m-ul-v">
									<div class="desc-p extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
								</div>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			@else
				<tr id="ExtraCurricularActivityDetails_Text">
					<td>
						<h2 class="m-tital" style="display: none;">09 Extra-curricular Activity</h2>
						<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
						</table>
					</td>
				</tr>
			@endif

			@if(!empty($getInternship) && count($getInternship) > 0) 
			<tr id="InternshipDetails_Text">
				<td colspan="2">
					<h2 class="m-tital">10 Internships</h2>
					<table class="w-100"  id="CourseSectionDetails_new">
						@foreach($getInternship as $key => $internship_details)
						@php 
							$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
							$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
						@endphp
						<tr>
							<td class="ver-alg-top w-250">
								<h4 class="mh4">
                                    @if($internship_details['ui_is_present'] == 0)
                                     	<span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                    @else
                                    	<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                    @endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3>{{ implode(", ", $vars_a) }}</h3>
									<h5><span class="internship-city">{{ $internship_details['ui_city'] }}</span></h5>
								</div>
								@if(!empty($internship_details['internship_description']))
								<div class="m-ul-v">
									<div class="desc-p internship-description-text">{!! $internship_details['internship_description'] !!}</div>
								</div>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			@else
				<tr id="InternshipDetails_Text">
					<td>
						<h2 class="m-tital" style="display: none;">10 Internships</h2>
						<table class="w-100 employ-histry" id="CourseSectionDetails_new">
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
					<h2 class="m-tital">11 {{ $custom_heading }}</h2>
					<table class="w-100"  id="CustomSectionDetails_new">
						@foreach($getCustomSection as $key => $custom_section_details)
						@php 
							$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
						@endphp
						<tr>
							<td class="ver-alg-top w-250">
								<h4 class="mh4">
									@if($custom_section_details['ucs_is_present'] == 0)
                                    	<span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                    @else
                                    	<span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                    @endif
								</h4>
							</td>
							<td class="ver-alg-top">
								<div class="m-compame">
									<h3><span class="custom-job-title">{{ $custom_section_details['ucs_title'] }}</span></h3>
									<h5><span class="custom-section-city">{{ $custom_section_details['ucs_city'] }}</span></h5>
								</div>
								@if(!empty($custom_section_details['custom_description']))
								<div class="m-ul-v">
									<div class="desc-p custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
								</div>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			@else
				<tr id="InternshipDetails_Text">
					<td>
						<h2 class="m-tital" style="display: none;">11 Custom</h2>
						<table class="w-100 employ-histry" id="CustomSectionDetails_new">
						</table>
					</td>
				</tr>
			@endif
			@if(!empty($getReference) && count($getReference) > 0) 
				<tr id="ReferenceDetails_Text">
					<td class="m-pro-con">
						<h2 class="m-tital" >12 Reference</h2>
					</td>
					<td>
						@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                            <p>I'd like to hide references and make them available only upon request</p>
                        @else
						@foreach($getReference as $key => $reference_details)
						@php 
							$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
							$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
						@endphp
						<h4>{{ implode(" from ", $vars) }}</h4>
						<h5>{{ implode(" | ", $vars_a) }}</h5>
						@endforeach
						@endif
					</td>
				</tr>
			@else
				<tr id="ReferenceDetails_Text">
					<td>
						<h2 style="display: none;">12 Reference</h2>
						<p></p>
					</td> 
				</tr>
			@endif
		</tbody>
	</table>
</div>
</body>
</html>