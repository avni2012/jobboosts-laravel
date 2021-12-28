
<!DOCTYPE html>
<html>
<head>
	<title>Mochaccino</title>
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
	    .mochaccino-cont{padding-top: 40px;}
	    .moch-bor-btm{border-bottom: 1px solid #5884a4;}
	    .moch-n-cont h1{background-color: #fff;margin-bottom: -5px;margin-left: 45px;padding: 10px 31px 0 10px;display: inline-block;font-size: 44px;color: #4c7b9e;line-height: 45px;text-transform: uppercase;}
	    .sec-nm-c{vertical-align: bottom;padding-bottom: 10px;}
	    .mon-p-sub-n{text-transform: uppercase;color: #39485b;letter-spacing: 2px;font-size: 24px;}
	    .moch-profile-img img{height: 220px;width: 220px;object-fit: cover;}
	    .r-pr-back{background-color: #e4ebf1;padding: 35px;}
	    .p-50{padding: 50px;}
	    .moch-pro-name{margin-top: 20px;color: #243449;font-size: 22px;margin-bottom: 10px;text-transform: capitalize;}
	    .mochaccino-cont p, .mochaccino-cont ul{color: #707c8c;}
	    .mb-75{margin-bottom: 55px;}
	    .mt-75{margin-top: 75px;}
	    .mochaccino-cont ul{margin-left: 20px;}	    
	    .pb-65{padding-bottom: 65px;}
	    .w-285p{width: 285px;}
	    .pre-w-h{color: #28384d;font-size: 18px;font-weight: bold;margin-bottom: 5px;}
	    .pre-w-p{color: #28384d;font-size: 16px;font-style: italic;margin-bottom: 10px;}   
	    .pre-w-dt li:last-child, .mochaccino-cont li:last-child{margin-bottom: 20px;}
	    .mb-20{margin-bottom: 20px;}
	    .mb-5{margin-bottom: 5px;}
	    a.other-details,#WebsiteSocialLinks_new a{color: #707c8c;}
	    .mochaccino-cont p{
            word-break: break-word;
            margin-bottom: 10px;
        }
	</style>
</head>
<body>
<div class="mochaccino-cont">
	<table class="w-100">
		<tbody>
			@if(!empty($getPersonalDetails))
			<tr>
				<td class="moch-bor-btm">
					<div class="moch-n-cont">
						<h1>
							<div class="moch-firstname">@if(!empty($getResumeFullNameEmail))
							@php $name = explode(' ', $getResumeFullNameEmail['resume_fullname']); 
								$firstname = array_slice($name, 0, -1);
							@endphp
							<span>{{ implode(" ", $firstname) }}</span>
							<br>
							<span>{{ end($name) }}</span>@endif</div>
						</h1>
					</div>
				</td>
				<td class="moch-bor-btm sec-nm-c">
					<h2 class="mon-p-sub-n" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
				</td>
			</tr>
			@else
			<tr>
				<td class="moch-bor-btm">
					<div class="moch-n-cont">
						<h1>
							<div class="moch-firstname"></div>
						</h1>
					</div>
				</td>
				<td class="moch-bor-btm sec-nm-c">
					<h2 class="mon-p-sub-n" id="JobTitle_Text"></h2>
				</td>
			</tr>
			@endif
			<tr>
				<td class="p-50 w-285p ver-alg-top">
					<table class="w-100">
						<tr>
							<td class="r-pr-back">
								<table class="w-100">
									<tr>
										<td>
											@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
											<div class="moch-profile-img text-center"> 
												<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image"> 
											</div>
											@else
											<div class="moch-profile-img text-center"> 
												<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image"> 
											</div>
											@endif
										</td>
									</tr>
									@if(!empty($getPersonalDetails))
			 					  		@if($getPersonalDetails['profile_summary'] != '')
										<tr>
											<td>
												<h2 class="moch-pro-name">Personal Summary</h2>
												<div class="mb-75" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</div>
											</td>
										</tr>
										@endif
									@else
									<tr>
										<td>
											<h2 class="moch-pro-name" style="display: none;">Personal Summary</h2>
											<div class="mb-75" id="ProfessionalSummary_Text"></div>
										</td>
									</tr>
									@endif

									@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
									<tr id="WebsiteSocialLinks_Text">
										<td>
											<h2 class="moch-pro-name">Links</h2>
											<ul class="cor-comp" id="WebsiteSocialLinks_new">
												@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
													<li><a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a></li>
												@endforeach	
											</ul>
										</td>
									</tr>
									@else
									<tr id="WebsiteSocialLinks_Text">
										<td>
											<h2 class="moch-pro-name" style="display: none;">Links</h2>
											<ul class="cor-comp" id="WebsiteSocialLinks_new"></ul>
										</td>
									</tr>
									@endif

									@if(!empty($getSkill) && count($getSkill) > 0) 
									<tr id="Skills_Text">
										<td>
											<h2 class="moch-pro-name">Skills</h2>
											<ul class="cor-comp" id="SkillDetails_new">
												@foreach($getSkill as $key => $skill_details)
													<li>{{ $skill_details['us_skill'] }}</li>
												@endforeach	
											</ul>
										</td>
									</tr>
									@else
									<tr id="Skills_Text">
										<td>
											<h2 class="moch-pro-name" style="display: none;">Skills</h2>
											<ul class="cor-comp" id="SkillDetails_new"></ul>
										</td>
									</tr>
									@endif

									@if(!empty($getLanguage) && count($getLanguage) > 0) 
									<tr id="Skills_Text">
										<td>
											<h2 class="moch-pro-name">Language</h2>
											<ul class="cor-comp" id="LanguageDetails_new">
												@foreach($getLanguage as $key => $language_details)
													<li>{{ $language_details['ul_language'] }}</li>
												@endforeach	
											</ul>
										</td>
									</tr>
									@else
									<tr id="Skills_Text">
										<td>
											<h2 class="moch-pro-name" style="display: none;">Language</h2>
											<ul class="cor-comp" id="LanguageDetails_new"></ul>
										</td>
									</tr>
									@endif
									@if(!empty($getHobby))
										@if(!empty($getHobby[0]['uh_hobby']))
										<tr id="HobbiesSection">
											<td>
												<h2 class="moch-pro-name">Hobbies</h2>
												<p id="Hobbies_Text">{{ $getHobby[0]['uh_hobby'] }}</p>
											</td>
										</tr>
										@endif
									@else
									<tr id="HobbiesSection">
										<td>
											<h2 class="moch-pro-name" style="display: none;">Hobbies</h2>
											<<p id="Hobbies_Text"></p>
										</td>
									</tr>
									@endif

									@if(!empty($getPersonalDetails))
									<tr>
										<td class="pb-65">
											<h2 class="moch-pro-name mt-75">Contact Info</h2>
											@if(!empty($getPersonalDetails['phone']))
	 										<p id="ContactNumber_Text" class="other-details">Phone Number: {{ $getPersonalDetails['phone'] }}</p>
	 										@endif
	 										@if(!empty($getPersonalDetails['phone']))
	 										<p id="ContactNumber_Text" class="other-details">Mobile: {{ $getPersonalDetails['phone'] }}</p>
	 										@endif
											@if(!empty($getResumeFullNameEmail))
	 										<p id="Email_Text">Email Address: <a href="mailto:$getResumeFullNameEmail['resume_email']" class="other-details" >{{ $getResumeFullNameEmail['resume_email'] }}</a></p>
	 										@endif
											@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
												@php 
													$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
												@endphp
											<p id="ExtraDetails" class="other-details"><span >Address: {{ implode(", ",$address) }}</span>

											{{--<span>{{ $getPersonalDetails['postal_code'] }}, {{ $getPersonalDetails['country'] }}</span>--}}
											</p>
											@endif
 											@if(!empty($getPersonalDetails['place_of_birth']))
	 										<p id="ContactNumber_Text" class="other-details">Current Location: {{ $getPersonalDetails['place_of_birth'] }}</p>
	 										@endif
	 										@if(!empty($getPersonalDetails['date_of_birth']))
	 										<p id="ContactNumber_Text" class="other-details">Date Of Birth: {{ $getPersonalDetails['date_of_birth'] }}</p>
	 										@endif								
										</td>
									</tr>
									@else
 									<tr>
 										<td class="pb-65">
											<h2 class="moch-pro-name mt-75" style="display: none;">Contact Info</h2>
										</td>
 									</tr>
 									@endif
								</table>
							</td>
						</tr>						
					</table>									
				</td>
				<td class="p-50">
					<table class="w-100">
						@if(!empty($getCareers) && count($getCareers) > 0)
						<tr id="EmployerDetails_Text">
							<td>
								<h2 class="moch-pro-name">Previous Positions</h2>
								<table class="w-100" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										$vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name'],$employer_details['uc_city']));
									@endphp
									<tr>
										<td>
											<h3 class="pre-w-h">{{ implode(" | ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
													@if($employer_details['uc_is_present'] == 0)
														<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="present-label">{{ implode(" - ", $vars) }}</span>
													@endif</h4>
											@if(!empty($employer_details['career_description']))
											<div class="pre-w-dt">
												<div class="employer-description-text">{!! $employer_details['career_description'] !!}</div>
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
									<h2 class="moch-pro-name" style="display: none;">Previous Positions</h2>
									<table class="w-100 employ-histry" id="EmployerDetails_new">
									</table>
								</td>
							</tr>
						@endif


						@if(!empty($getEducation) && count($getEducation) > 0)
						<tr id="EducationDetails_Text">
							<td>
								<h2 class="moch-pro-name">Traning & Education</h2>
								<table class="w-100" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
										$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
									@endphp
 									<tr id="EducationAddMore_section_{{ $key }}">
										<td>
											<h3 class="pre-w-h">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
													@if($education_details['uc_is_present'] == 0)
														<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="education-label">{{ implode(" - ", $vars) }}</span>
													@endif</h4>
											@if(!empty($education_details['education_description']))
											<div class="ul-r-con">
 												<div class="education-description-text">{!! $education_details['education_description'] !!}</div>
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
									<h2 class="moch-pro-name" style="display: none;">Traning & Education</h2>
									<table class="w-100 employ-histry" id="EducationDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getCourse) && count($getCourse) > 0) 
							<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="moch-pro-name">Courses</h2>
								<table class="w-100" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
										$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
									@endphp
 									<tr id="CoursesAddMore_section_{{ $key }}">
										<td>
											<h3 class="pre-w-h">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
											@if($course_details['ucr_is_present'] == 0)
                                                <span class="course-end-date" id="employer_enddate_{{ $key }}">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="course-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif</h4>
										</td>
									</tr>
									@endforeach		
								</table>
							</td>
						</tr>
						@else
							<tr id="EducationDetails_Text">
								<td>
									<h2 class="moch-pro-name" style="display: none;">Courses</h2>
									<table class="w-100 employ-histry" id="CourseSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
						<tr id="ExtraCurricularActivityDetails_Text">
							<td>
								<h2 class="moch-pro-name">Extra-curricular Activity</h2>
								<table class="w-100" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
										$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
									@endphp
 									<tr id="extracurricularAddMore_section_{{ $key }}">
										<td>
											<h3 class="pre-w-h">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
											@if($extra_curricular_section_details['ueca_is_present'] == 0)
												<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
											@endif</h4>
										@if(!empty($extra_curricular_section_details['extra_curricular_description']))
											<div class="ul-r-con">
 												<div class="extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
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
									<h2 class="moch-pro-name" style="display: none;">Extra-curricular Activity</h2>
									<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif


						@if(!empty($getInternship) && count($getInternship) > 0) 
						<tr id="InternshipDetails_Text">
							<td>
								<h2 class="moch-pro-name">Internships</h2>
								<table class="w-100" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
										$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
									@endphp
 									<tr id="InternshipsAddMore_section_{{ $key }}">
										<td>
											<h3 class="pre-w-h">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
											@if($internship_details['ui_is_present'] == 0)
                                                <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif</h4>
                                            @if(!empty($internship_details['internship_description']))
											<div class="ul-r-con">
 												<div class="internship-description-text">{!! $internship_details['internship_description'] !!}</div>
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
									<h2 class="moch-pro-name" style="display: none;">Internships</h2>
									<table class="w-100 employ-histry" id="InternshipSectionDetails_new">
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
								<h2 class="moch-pro-name">{{ $custom_heading }}</h2>
								<table class="w-100" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
										$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
									@endphp
 									<tr id="CustomAddMore_section_{{ $key }}">
										<td>
											<h3 class="pre-w-h">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="pre-w-p">
											@if($custom_section_details['ucs_is_present'] == 0)
                                                <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif</h4>
                                            @if(!empty($custom_section_details['custom_description']))
											<div class="ul-r-con">
 												<div class="custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
 											</div>
 											@endif
										</td>
									</tr>
									@endforeach		
								</table>
							</td>
						</tr>
						@else
							<tr id="CustomSectionDetails_Text">
								<td>
									<h2 class="moch-pro-name" style="display: none;">Custom</h2>
									<table class="w-100 employ-histry" id="CustomSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getReference) && count($getReference) > 0) 
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="moch-pro-name">character reference</h2>
								<table class="w-100" id="ReferenceDetails_new">
									@foreach($getReference as $key => $reference_details)
									@php 
										$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
										$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
									@endphp
									<tr>
										<td>
											<div class="mb-5">
												<p>{{ implode(" from ", $vars) }}</p>
												<p>{{ implode(" | ", $vars_a) }}</p>
												
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
								<h2 class="moch-pro-name" style="display: none;">character reference</h2>
								<table class="w-100 employ-histry" id="ReferenceDetails_new">
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