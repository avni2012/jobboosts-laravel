
<!DOCTYPE html>
<html>
<head>
	<title>Lavender</title>
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
	    .lavender-cont{padding: 40px 55px;background-color: #ffffff;}
	    .lavender-cont p, .lavender-cont ul{font-size: 18px;}
	    .lvd-pro{width: 100px;height: 100px;object-fit: cover;border-radius: 10px;}
	    .w-120{width: 120px;}
	    .lvd-nm{font-size: 34px;color: #262b33;text-transform: capitalize;margin-bottom: 2px;}
	    .lvd-s-n{font-size: 18px;color: #262b33;text-transform: capitalize;}
	    .lvd-dt-h{font-size: 24px;color: #262b33;text-transform: capitalize;margin-top: 25px;margin-bottom: 10px;margin-left: -20px;font-weight: bold;}
	    .p-lr-20{padding: 0 20px;}
	    .w-28p{width: 30%;}
	    .lvd-sm-i{width: 12px;margin-right: 2px;}
	    .lavender-cont p{margin-bottom: 10px;    color: #262b33;}
	    .lvd-h-d{font-size: 20px;color: #262b33;font-weight: bold;}
	    .lvd-h-s-d{font-size: 16px;color: #697283;margin-bottom: 10px;}
	    .lvd-ul-c{color: #262b33;margin-left: 35px;}
	    .lvd-ul-c:last-child{margin-bottom: 20px;}
	    .lav-r-s-d{color: #262b33;font-size: 20px;font-weight: bold;margin-top: 25px;margin-bottom: 10px;}
	    .lavender-cont a{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;text-decoration: none;}
	    .lavender-progress {padding: 0;width: 100%;height: 6px;overflow: hidden;background: #e6ebf4;border-radius: 40px;}
		.lavender-bar {position:relative;float:left;min-width:1%;height:100%;background:@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; width: 0%;border-radius: 60px;transition: all 0.8s linear 1s;}		
		.lavender-skl-con {width: 100%;float: left;margin-bottom: 15px;}
		.lavender-skl-con h3{font-size: 18px;margin-bottom: 5px;color: #262b33;text-transform: capitalize;}
		.lavender-cont p{
            word-break: break-word;
        }
	</style>
</head>
<body>
<div class="lavender-cont">
	<table class="w-100">
		@if(!empty($getPersonalDetails))
		<tr class="name-section">
			<td>
				<table class="w-100">
					<tr>
						@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
						<td class="w-120"> 
                                <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="lvd-pro"> 
						</td>
						<td>
							<h1 class="lvd-nm first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
							<h2 class="lvd-s-n" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
						</td>
						@else
						<td class="w-120"> 
                                <img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="lvd-pro"> 
						</td>
						<td>
							<h1 class="lvd-nm first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
							<h2 class="lvd-s-n" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
						</td>
						@endif
					</tr>
				</table>				
			</td>
		</tr>
		@else
		<tr class="name-section">
			<td>
				<table class="w-100">
					<tr>
						<td class="w-120"> 
							{{-- <img src="{{ asset('/frontend/images/resume_templates/lavender-images/profile.jpeg') }}" alt="profile" class="lvd-pro"> --}}
						</td>
						<td>
							<h1 class="lvd-nm first-name last-name"><span id="FirstName_Text" class="first-name"></span> <span id="LastName_Text" class="last-name"></span></h1>
							<h2 class="lvd-s-n" id="JobTitle_Text"></h2>
						</td>
					</tr>
				</table>				
			</td>
		</tr>
		@endif
		<tr>
			<td class="p-lr-20 p-lr-20 ver-alg-top w-w-28p">
				<table class="w-100">
					@if(!empty($getPersonalDetails))
		 				@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td>
								<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_user.png') }}" alt="profile" class="lvd-sm-i"> Profile</h2>
								<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
								
							</td>  
						</tr>
						@endif
		 			@else
		 				<tr>
							<td>
								<h2 class="lvd-dt-h" style="display: none;"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_user.png') }}" alt="profile" class="lvd-sm-i"> Profile</h2>
								<p id="ProfessionalSummary_Text"></p>
							</td>  
						</tr>
					@endif


					@if(!empty($getCareers) && count($getCareers) > 0)
					<tr id="EmployerDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_bag.png') }}" alt="profile" class="lvd-sm-i"> Employment History</h2>
							<table class="w-100" id="EmployerDetails_new">
								@foreach($getCareers as $key => $employer_details)
								@php 
									$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
									$vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name'],$employer_details['uc_city']));
								@endphp
								<tr  id="EmployerAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($employer_details['uc_is_present'] == 0)
												<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="present-label">{{ implode(" - ", $vars) }}</span>
											@endif
										</h4>
										@if(!empty($employer_details['career_description']))
										<div class="lvd-ul-c">
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
							<h2 class="lvd-dt-h" style="display: none;">Employment history</h2>
							<table class="w-100 employ-histry" id="EmployerDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getEducation) && count($getEducation) > 0)
					<tr id="EducationDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> Education</h2>
							<table class="w-100" id="EducationDetails_new">
								@foreach($getEducation as $key => $education_details)
								@php 
									$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
									$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
								@endphp
								<tr id="EducationAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($education_details['ue_is_present'] == 0)
												<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="education-label">{{ implode(" - ", $vars) }}</span>
											@endif
										</h4>
										@if(!empty($education_details['education_description']))	
										<div class="lvd-ul-c">
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
							<h2 class="education-section" style="display: none;">Education</h2>
							<table class="w-100 employ-histry" id="EducationDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getCourse) && count($getCourse) > 0) 
					<tr id="CourseSectionDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> Courses</h2>
							<table class="w-100" id="CourseSectionDetails_new">
								@foreach($getCourse as $key => $course_details)
								@php 
									$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
									$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
								@endphp
								<tr id="CourseAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($course_details['ucr_is_present'] == 0)
                                                <span class="course-end-date">{{ implode(" - ", $vars) }}</span>
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
							<h2 class="education-section" style="display: none;">Courses</h2>
							<table class="w-100 employ-histry" id="CourseSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
					<tr id="ExtraCurricularActivityDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> Extra-curricular Activity</h2>
							<table class="w-100" id="ExtraCurricularSectionDetails_new">
								@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
								@php 
									$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
									$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
								@endphp
								<tr id="ExtraAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($extra_curricular_section_details['ueca_is_present'] == 0)
												<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
											@endif
										</h4>	
										@if(!empty($extra_curricular_section_details['extra_curricular_description']))
										<div class="lvd-ul-c">
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
							<h2 class="education-section" style="display: none;">Extra-curricular Activity</h2>
							<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getInternship) && count($getInternship) > 0) 
					<tr id="InternshipDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> Internships</h2>
							<table class="w-100" id="InternshipSectionDetails_new">
								@foreach($getInternship as $key => $internship_details)
								@php 
									$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
									$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
								@endphp
								<tr id="InternshipsAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($internship_details['ui_is_present'] == 0)
                                                <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif
										</h4>	
										@if(!empty($internship_details['internship_description']))
										<div class="lvd-ul-c">
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
							<h2 class="education-section" style="display: none;">Internships</h2>
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
							<h2 class="lvd-dt-h">@if($custom_heading != null)<img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> {{ $custom_heading }}@endif</h2>
							<table class="w-100" id="CustomSectionDetails_new">
								@foreach($getCustomSection as $key => $custom_section_details)
								@php 
									$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
									$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
								@endphp
								<tr id="CustomAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(", ", $vars_a) }}</h3>
										<h4 class="lvd-h-s-d">
											@if($custom_section_details['ucs_is_present'] == 0)
                                                <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif
										</h4>	
										@if(!empty($custom_section_details['custom_description']))
										<div class="lvd-ul-c">
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
							<h2 class="education-section" style="display: none;">Custom</h2>
							<table class="w-100 employ-histry" id="CustomSectionDetails_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getReference) && count($getReference) > 0) 
					<tr id="ReferenceDetails_Text">
						<td>
							<h2 class="lvd-dt-h"><img src="{{ asset('/frontend/images/resume_templates/lavender-images/lvd_edu.png') }}" alt="profile" class="lvd-sm-i"> Reference</h2>
							<table class="w-100" id="ReferenceDetails_new">
								@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                	<p>I'd like to hide references and make them available only upon request</p>
                                @else
								@foreach($getReference as $key => $reference_details)
								@php 
									$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
									$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
								@endphp
								<tr id="ReferenceAddMore_section_{{ $key }}">
									<td>
										<h3 class="lvd-h-d">{{ implode(" from ", $vars) }}</h3>
										<h4 class="lvd-h-s-d">{{ implode(" | ", $vars_a) }}</h4>								
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
							<h2 class="education-section" style="display: none;">Reference</h2>
							<table class="w-100 employ-histry" id="ReferenceDetails_new">
							</table>
						</td>
					</tr>
					@endif
				</table>
			</td>
			<td class="p-lr-20 ver-alg-top w-28p">
				<table class="w-100">
					@if(!empty($getPersonalDetails))
					<tr>
						<td>
							<h2 class="lav-r-s-d">Details</h2>
							@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
								@php 
									$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
								@endphp
							<p id="ExtraDetails">{{ implode(", ",$address) }}</p>
							@endif
							@if(!empty($getPersonalDetails['phone']))
							<p id="ContactNumber_Text">{{ $getPersonalDetails['phone'] }}</p>
							@endif
							@if(!empty($getResumeFullNameEmail))
							<p id="Email_Text"><a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">{{ $getResumeFullNameEmail['resume_email'] }}</a></p>
							@endif
							@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
								@php 
									$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
								@endphp
								<p>{{ implode(", ",$location) }}</p>
							@endif
						</td>
					</tr>
					@else
					<tr>
						<td>
							<h2 class="lav-r-s-d" style="display: none;">Details</h2>
							<p id="ExtraDetails"></p>
							<p id="ContactNumber_Text"></p>
							<p id="Email_Text"></p>
							
						</td>
					</tr>
					@endif

					@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
					<tr id="WebsiteSocialLinks_Text">
						<td>
							<h2 class="lav-r-s-d">Links</h2>
							<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
								@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
									<tr id="WebsiteSocialLinksData_{{ $key }}">      
		                                <td class="pb-2">
		                            	<td>
				                            <li class="website-social-label">
								 				<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
								 			</li>
								 		</td>
								 	</tr>
								@endforeach
							</table>
						</td>
					</tr>
					@else
					<tr id="WebsiteSocialLinks_Text">
						<td>
							<h2 class="lav-r-s-d" style="display: none;">Links</h2>
							<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
							</table>
						</td>
					</tr>
					@endif

					@if(!empty($getSkill) && count($getSkill) > 0) 
					<tr id="Skills_Text">
						<td>
							<h2 class="lav-r-s-d">Skills</h2>
							<table class="w-100" id="SkillDetails_new">								
								<tr>
									<td>
										@foreach($getSkill as $key => $skill_details)
										<div class="lavender-skl-con">
											<h3>{{ $skill_details['us_skill'] }}</h3>
											<div class="lavender-progress">
												@if($skill_details['us_skill_level'] == 1)
													<div class="lavender-bar" style="width:20%">
													</div>
												@elseif($skill_details['us_skill_level'] == 2)
													<div class="lavender-bar" style="width:40%">
													</div>
												@elseif($skill_details['us_skill_level'] == 3)
													<div class="lavender-bar" style="width:60%">
													</div>
												@elseif($skill_details['us_skill_level'] == 4)
													<div class="lavender-bar" style="width:80%">
													</div>
												@else
													<div class="lavender-bar" style="width:100%">	
													</div>
												@endif
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
							<h2 class="lav-r-s-d" style="display: none;">Skills</h2>
							<table class="w-100" id="SkillDetails_new">
							</table>											
						</td>
					</tr>
					@endif

					@if(!empty($getLanguage) && count($getLanguage) > 0) 
					<tr id="LanguageDetails_Text">
						<td>
							<h2 class="lav-r-s-d">Languages</h2>
							<table class="w-100" id="LanguageDetails_new">
								<tr>
									<td>
										@foreach($getLanguage as $key => $language_details)
										<div class="lavender-skl-con">
											<h3 class="rating-desc language-title">{{ $language_details['ul_language'] }}</h3>
											<div class="lavender-progress">
												
												@if($language_details['ul_language_level_id'] == 1)
													<div class="lavender-bar" style="width:20%"></div>
												@elseif($language_details['ul_language_level_id'] == 2)
													<div class="lavender-bar" style="width:40%"></div>
												@elseif($language_details['ul_language_level_id'] == 3)
													<div class="lavender-bar" style="width:60%"></div>
												@elseif($language_details['ul_language_level_id'] == 4)
													<div class="lavender-bar" style="width:80%"></div>
												@else
													<div class="lavender-bar" style="width:100%"></div>
												@endif
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
							<h2 class="lav-r-s-d" style="display: none;">Language</h2>
							<table class="w-100" id="LanguageDetails_new">
							</table>											
						</td>
					</tr>
					@endif

					@if(!empty($getHobby))
						@if(!empty($getHobby['uh_hobby']))
						<tr>
							<td>
								<h2 class="lav-r-s-d">Hobbies</h2>
								<p class="lvd-hobi" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
							</td>
						</tr>
						@endif
		 			@else
			 			<tr id="HobbiesSection">
							<td>
								<h2 class="lav-r-s-d" style="display: none;">Hobbies</h2>
								<p class="hobbies" id="Hobbies_Text"></p>
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