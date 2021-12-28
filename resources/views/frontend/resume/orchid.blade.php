
<!DOCTYPE html>
<html>
<head>
	<title>Orchid</title>
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
	    .orchid-cont{padding: 40px 55px;background-color: #ffffff;}
	    .orchid-cont p, .orchid-cont ul{font-size: 18px;}
	    .orc-pro{width: 100px;height: 100px;object-fit: cover;border-radius: 80px;}
	    .orc-nm-c{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; font-size: 26px;margin-bottom: 15px;margin-top: 30px;}
	    .pb-25{padding-bottom: 25px;}
	    .orc-info h5{color: #000;font-size: 16px;margin-bottom: 5px;}
	    .orc-info p, .orchid-cont p, .orchid-cont a{color: #5d5d5d;margin-bottom: 10px;}
	    .orchid-cont a{text-decoration: none;}
	    .orc-link-con a{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; display: block;margin-bottom: 5px;text-decoration: none;}
	    .orchid-skill-cont h6{color: #000;font-size: 18px;text-transform: capitalize;}
	    .orchid-skill-cont{margin-bottom: 10px;}
	    .orchid-proj-skill ul{list-style: none;display: block;}
	    .orchid-proj-skill ul li{display: inline-block;}
	    .orchid-proj-skill ul li span{height: 10px;width: 10px;border-radius: 25px;background-color: #e4e4e4;display: block;margin-top: 8px;margin-right: 8px;}
	    .orchid-proj-skill ul li span.orchid-active{background-color: #000;}
	    .orc-pr-nam{font-size: 34px;color: #000;text-transform: capitalize;margin-bottom: 6px;margin-top: 8px;}
	    .orc-pr-det{font-size: 18px;color: #5d5d5d; text-transform: capitalize;margin-bottom: 22px;}
	    .orc-hobi{color: #000;}
	    .orc-loc{width: 9px;margin-left: 12px;}
	    .orc-h-con{font-size: 18px;text-transform: capitalize;margin-bottom: 4px;}
	    .orc-d-con{font-size: 16px;text-transform: capitalize;margin-bottom: 15px;}
	    .orc-d-con span{color: #5d5d5d}
	    .p-lr-20{padding: 0 20px;}
	    .orc-ul-c{color: #5d5d5d;margin-left:20px;}
	    .orc-ul-c li:last-child{margin-bottom: 15px;}
	    .w-20{width: 30%;}
	    .h-104{height: 104px;}
	    .orchid-cont p{
            word-break: break-word;
        }
	</style>
</head>
<body>
<div class="orchid-cont">
	<table class="w-100">
		<tr>
			<td class="ver-alg-top w-20">
				<table class="w-100">
					<tr>
						<td class="h-104">
							@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
	                            <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="orc-pro"> 
	                        @else
	                        	<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="orc-pro"> 
	                        @endif
						</td>
					</tr>
					@if(!empty($getPersonalDetails))
					<tr>
						<td>
							<h2 class="orc-nm-c">Info</h2>
							@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
								@php 
									$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
								@endphp
							<div class="orc-info">
								<h5>Address</h5>
								<p>{{ implode(", ",$address) }}</p>
							</div>
							@endif
							@if(!empty($getPersonalDetails['phone']))
							<div class="orc-info">
								<h5>Phone</h5>
								<p>{{ $getPersonalDetails['phone'] }}</p>
							</div>	
							@endif
							@if(!empty($getResumeFullNameEmail))						
							<div class="orc-info">
								<h5>Email</h5>
								<p><a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">{{ $getResumeFullNameEmail['resume_email'] }}</a></p>
							</div>
							@endif
							@if(!empty($getPersonalDetails['place_of_birth']))
							<div class="orc-info">
								<h5>Current Location</h5>
								<p>{{ $getPersonalDetails['place_of_birth'] }}</p>
							</div>	
							@endif
							@if(!empty($getPersonalDetails['date_of_birth']))
							<div class="orc-info">
								<h5>Date Of Birth</h5>
								<p>{{ $getPersonalDetails['date_of_birth'] }}</p>
							</div>	
							@endif
						</td>
					</tr>
					@else
					<tr>
						<td>
							<h2 class="orc-nm-c">Info</h2>
							<div class="orc-info">
								<h5>Address</h5>
								<p></p>
							</div>
							<div class="orc-info">
								<h5>Phone</h5>
								<p></p>
							</div>				
							<div class="orc-info">
								<h5>Email</h5>
								<p></p>
							</div>
						</td>
					</tr>
					@endif

					@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
					<tr id="WebsiteSocialLinks_Text">
						<td>
							<h2 class="orc-nm-c">Links</h2>
							<div class="orc-link-con" id="WebsiteSocialLinks_new">
								@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
								<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
								@endforeach
							</div>
						</td>
					</tr>
					@else
					<tr id="WebsiteSocialLinks_Text">
						<td>
							<h2 class="orc-nm-c" style="display: none;">Links</h2>
							<div class="orc-link-con" id="WebsiteSocialLinks_new"></div>
							
						</td>
					</tr>
					@endif
					
					@if(!empty($getSkill) && count($getSkill) > 0) 
					<tr id="Skills_Text">
						<td>
							<h2 class="orc-nm-c">Skills</h2>
							<table class="w-100" id="SkillDetails_new">
								<tr>
									<td>
										@foreach($getSkill as $key => $skill_details)
										<div class="orchid-skill-cont">
											<h6>{{ $skill_details['us_skill'] }}</h6>
											<div class="orchid-proj-skill">
												<ul>
													@if($skill_details['us_skill_level'] == 1)
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($skill_details['us_skill_level'] == 2)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($skill_details['us_skill_level'] == 3)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($skill_details['us_skill_level'] == 4)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
													@else
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
													@endif
													
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
							<h2 class="orc-nm-c" style="display: none;">Skills</h2>
							<table class="w-100" id="SkillDetails_new">
							</table>											
						</td>
					</tr>
					@endif

					@if(!empty($getLanguage) && count($getLanguage) > 0) 
					<tr id="LanguageDetails_Text">
						<td>
							<h2 class="orc-nm-c">Languages</h2>
							<table class="w-100" id="LanguageDetails_new">
								<tr>
									<td>
										@foreach($getLanguage as $key => $language_details)
										<div class="orchid-skill-cont">
											<h6>{{ $language_details['ul_language'] }}</h6>
											<div class="orchid-proj-skill">
												<ul>
													@if($language_details['ul_language_level_id'] == 1)
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($language_details['ul_language_level_id'] == 2)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($language_details['ul_language_level_id'] == 3)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
													@elseif($language_details['ul_language_level_id'] == 4)
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span></span></li>
													@else
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
														<li><span class="orchid-active"></span></li>
													@endif
													
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
							<h2 class="orc-nm-c" style="display: none;">Language</h2>
							<table class="w-100" id="LanguageDetails_new">
							</table>											
						</td>
					</tr>
					@endif

					@if(!empty($getHobby))
						@if(!empty($getHobby['uh_hobby']))
						<tr>
							<td>
								<h2 class="orc-nm-c">Hobbies</h2>
								<p class="orc-hobi" id="Hobbies_Text">
									{{ $getHobby['uh_hobby'] }}
								</p>
							</td>
						</tr>
						@endif
		 			@else
			 			<tr>
							<td>
								<h2 class="orc-nm-c" style="display: none;">Hobbies</h2>
								<p class="orc-hobi" id="Hobbies_Text"></p>
							</td>
						</tr>
					@endif
				</table>
			</td>
			<td class="ver-alg-top p-lr-20">
				<table class="w-100">
					@if(!empty($getPersonalDetails))
					<tr>
						<td class="h-104">
							<h1 class="orc-pr-nam">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
							<h2 class="orc-pr-det" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
						</td>  
					</tr>
					@else
					<tr>
						<td class="h-104">
							<h1 class="orc-pr-nam" style="display: none;"></h1>
							<h2 class="orc-pr-det" id="JobTitle_Text"></h2>
						</td>  
					</tr>
					@endif

					@if(!empty($getPersonalDetails))
		 				@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td>
								<h2 class="orc-nm-c">Profle</h2>
								<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
							</td>
						</tr>
						@endif
		 			@else
		 				<tr>
							<td>
								<h2 class="orc-nm-c" style="display: none;">Profle</h2>
								<p id="ProfessionalSummary_Text"></p>
							</td>
						</tr>
					@endif

					@if(!empty($getCareers) && count($getCareers) > 0)
					<tr id="EmployerDetails_Text">
						<td>
							<h2 class="orc-nm-c">Employment History</h2>
							<table class="w-100" id="EmployerDetails_new">
								@foreach($getCareers as $key => $employer_details)
								@php 
									$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
									$vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name']));
								@endphp
								<tr>
									<td>
										<h3 class="orc-h-con">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="orc-d-con">
											@if($employer_details['uc_is_present'] == 0)
												<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="present-label">{{ implode(" - ", $vars) }}</span>
											@endif<span class="employer-city">@if(!empty($employer_details['uc_city']))<img src="{{ asset('/frontend/images/resume_templates/orchid-images/orchid-location.png') }}" alt="location" class="orc-loc">&nbsp;{{ $employer_details['uc_city'] }}@endif</span></h4>
										@if(!empty($employer_details['career_description']))
										<div class="orc-ul-c">
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
							<h2 class="orc-nm-c" style="display: none;">Employment history</h2>
							<table class="w-100 employ-histry" id="EmployerDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getEducation) && count($getEducation) > 0)
					<tr id="EducationDetails_Text">
						<td>
							<h2 class="orc-nm-c">Education</h2>
							<table class="w-100" id="EducationDetails_new">
								@foreach($getEducation as $key => $education_details)
								@php 
									$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
									$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
								@endphp
								<tr id="EducationAddMore_section_{{ $key }}" >
									<td>
										<h3 class="orc-h-con">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="orc-d-con">
										@if($education_details['ue_is_present'] == 0)
											<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
										@else
											<span class="education-label">{{ implode(" - ", $vars) }}</span>
										@endif <span class="education-city">@if(!empty($education_details['ue_city']))<img src="{{ asset('/frontend/images/resume_templates/orchid-images/orchid-location.png') }}" alt="location" class="orc-loc">{{ $education_details['ue_city'] }}@endif</span></h4>
										@if(!empty($education_details['education_description']))
										<div class="orc-ul-c">
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
							<h2 class="orc-nm-c" style="display: none;">Education</h2>
							<table class="w-100 employ-histry" id="EducationDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getCourse) && count($getCourse) > 0) 
					<tr id="CourseSectionDetails_Text">
						<td>
							<h2 class="orc-nm-c">Courses</h2>
							<table class="w-100" id="CourseSectionDetails_new">
								@foreach($getCourse as $key => $course_details)
								@php 
									$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
									$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
								@endphp
								<tr id="CourseAddMore_section_{{ $key }}" >
									<td>
										<h3 class="orc-h-con">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="orc-d-con">
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
					<tr id="CourseSectionDetails_Text">
						<td>
							<h2 class="orc-nm-c" style="display: none;">Courses</h2>
							<table class="w-100 employ-histry" id="CourseSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
					<tr id="ExtraCurricularActivityDetails_Text">
						<td>
							<h2 class="orc-nm-c">Extra-curricular Activity</h2>
							<table class="w-100" id="ExtraCurricularSectionDetails_new">
								@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
								@php 
									$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
									$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
								@endphp
								<tr id="extraAddMore_section_{{ $key }}" >
									<td>
										<h3 class="orc-h-con">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="orc-d-con">
										@if($extra_curricular_section_details['ueca_is_present'] == 0)
											<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
										@else
											<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
										@endif <span class="extra-curricular-city">@if(!empty($extra_curricular_section_details['ueca_city']))<img src="{{ asset('/frontend/images/resume_templates/orchid-images/orchid-location.png') }}" alt="location" class="orc-loc"> {{ $extra_curricular_section_details['ueca_city'] }}@endif</span></h4>
										@if(!empty($extra_curricular_section_details['extra_curricular_description']))
										<div class="orc-ul-c">
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
							<h2 class="orc-nm-c" style="display: none;">Extra-curricular Activity</h2>
							<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getInternship) && count($getInternship) > 0) 
					<tr id="InternshipDetails_Text">
						<td>
							<h2 class="orc-nm-c">Internships</h2>
							<table class="w-100" id="InternshipSectionDetails_new">
								@foreach($getInternship as $key => $internship_details)
								@php 
									$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
									$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
								@endphp
								<tr id="InternshipsAddMore_section_{{ $key }}" >
									<td>
										<h3 class="orc-h-con">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="orc-d-con">
										@if($internship_details['ui_is_present'] == 0)
                                            <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                        @else
                                            <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                        @endif <span class="internship-city">@if(!empty($internship_details['ui_city']))<img src="{{ asset('/frontend/images/resume_templates/orchid-images/orchid-location.png') }}" alt="location" class="orc-loc">{{ $internship_details['ui_city'] }}@endif</span></h4>
                                        @if(!empty($internship_details['internship_description']))
										<div class="orc-ul-c">
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
							<h2 class="orc-nm-c" style="display: none;">Internships</h2>
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
							<h2 class="orc-nm-c">{{ $custom_heading }}</h2>
							<table class="w-100" id="CustomSectionDetails_new">
								@foreach($getCustomSection as $key => $custom_section_details)
								@php 
									$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
								@endphp
								<tr id="CustomAddMore_section_{{ $key }}" >
									<td>
										<h3 class="orc-h-con">{{ $custom_section_details['ucs_title'] }}</h3>
										<h4 class="orc-d-con">
										@if($custom_section_details['ucs_is_present'] == 0)
                                            <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                        @else
                                            <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                        @endif <span class="custom-section-city">@if(!empty($custom_section_details['ucs_city']))<img src="{{ asset('/frontend/images/resume_templates/orchid-images/orchid-location.png') }}" alt="location" class="orc-loc">{{ $custom_section_details['ucs_city'] }}@endif</span></h4>
                                        @if(!empty($custom_section_details['custom_description']))
										<div class="orc-ul-c">
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
							<h2 class="orc-nm-c" style="display: none;">Custom</h2>
							<table class="w-100 employ-histry" id="CustomSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getReference) && count($getReference) > 0) 
					<tr id="ReferenceDetails_Text">
						<td>
							<h2 class="orc-nm-c">Reference</h2>
							<table class="w-100" id="ReferenceDetails_new">
								@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                    <p>I'd like to hide references and make them available only upon request</p>
                                @else
								@foreach($getReference as $key => $reference_details)
								@php 
									$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
									$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
								@endphp
								<tr class="custom-section">
									<td>
										<div class="orc-ul-c">
											<div>
												<h4>{{ implode(" from ", $vars) }}</h4>
												<h5>{{ implode(" | ", $vars_a) }}</h5>
											</div>
										</div>
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
							<h2 class="orc-nm-c" style="display: none;">Reference</h2>
							<table class="w-100 employ-histry" id="ReferenceDetails_new">
							</table>
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