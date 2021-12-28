
<!DOCTYPE html>
<html>
<head>
	<title>Honey Leather</title>
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
	    .plr-20{padding: 0 65px;}
	    .ptb-20{padding: 20px 0;}
	    .p-20{padding: 30px 65px;}
	    .hone-profilenam{font-size: 58px;text-transform: uppercase;letter-spacing: 5px;font-weight: bold;color: #1e1e1e;}
	    .hone-sub{color: #8d8d8d;font-size: 18px;text-transform: capitalize;}
	    .border-bot{border-bottom: 1px solid #d8d8d8;}
	    .hone-cat-con{text-transform: uppercase;color: #505050;letter-spacing: 1px;font-weight: bold;font-size: 28px;}
	    .hone-hr{border-bottom: 2px solid #343434;width: 34px;margin-left: 0;margin-bottom: 30px;}
	    .address-h-sec h4{color: #5d5d5d;font-weight: bold;text-transform: uppercase;}
	    .address-h-sec{margin-bottom: 15px;}
	    .address-h-sec p, .honey-cont a{color: #5d5d5d;}
	    .honey-cont a{text-decoration: none;}
	    .mt-15{margin-top: 15px;}
	    .hone-progress {padding: 0;width: 100%;height: 8px;overflow: hidden;background: #d8d8d8;}
		.hone-bar {position:relative;float:left;min-width:1%;height:100%;background:#242424;width: 0%;transition: all 0.8s linear 1s;}
		.hone-skl-con {width: 100%;float: left;margin-bottom: 15px;}
		.hone-skl-con h3{font-size: 18px;margin-bottom: 5px;color: #9d9d9d;text-transform: capitalize;}
		.wp-30{width: 35%;}
		.b-left{border-left: 1px solid #d8d8d8;}
		.honey-cont p, .honey-cont ul{color: #5d5d5d;}
		.honey-cont p{font-size: 18px;}
		.f-hr{border: none;border-bottom: 1px solid #d8d8d8;margin: 18px 0;}
		.hone-his-cont{position: relative;}
		.hone-his-cont h3{color: #5c5c5c;font-weight: bold;font-size: 22px;text-transform: capitalize;width: 78%;}
		.hone-his-cont h5{position: absolute;top: 4px;right: 0px;color: #919191;font-size: 14px;}
		.sub-h{color: #9b9b9b;margin-bottom: 10px;font-size: 16px;}
		.hone-r-cont{margin-left: 33px;}
		.hone-r-cont li{margin-bottom: 5px;}
		.hone-r-cont li:last-child{margin-bottom: 18px;}
		.hone-skl-con1{margin-bottom: 0px;}
		.honey-cont p{
            word-break: break-word;
        }
        .b-left p{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="honey-cont">
	<table class="w-100">
		<tbody>
			@if(!empty($getPersonalDetails))
			<tr>
				<td colspan="2" class="plr-20">
					<table class="w-100">
						<tr>
							<td class="border-bot ptb-20">
								<h1 class="hone-profilenam">@if(!empty($getResumeFullNameEmail))
									@php $name = explode(' ', $getResumeFullNameEmail['resume_fullname']); 
									$firstname = array_slice($name, 0, -1);
									@endphp
									<span>{{ implode(" ", $firstname) }}</span><br><span>{{ end($name) }}</span>
								@endif</h1>
								<h2 class="hone-sub" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
			@else
			<tr class="name-section">
				<td colspan="2" class="plr-20">
					<table class="w-100">
						<tr>
							<td class="border-bot ptb-20">
								<h1 class="hone-profilenam"><span class="firstname"></span><br><span class="lastname"></span></h1>
								<h2 class="hone-sub"></h2>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
			@endif
			<tr>
				<td class="p-20 wp-30 ver-alg-top">
					<table class="w-100">
						@if(!empty($getPersonalDetails))
						<tr>
							<td>
								<h2 class="hone-cat-con">Info</h2>
								<hr class="hone-hr">
								<div class="address-h-sec">
									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
									<h4>Address</h4>
									<p id="ExtraDetails" class="other-details">&nbsp;{{ implode(", ",$address) }}</div>
									@endif
								</div>
								<div class="address-h-sec">
									@if(!empty($getPersonalDetails['phone']))
									<h4>Phone</h4>
									<p id="ContactNumber_Text" class="other-details">&nbsp;{{ $getPersonalDetails['phone'] }}</p>
									@endif
									
								</div>
								<div class="address-h-sec">
									@if(!empty($getResumeFullNameEmail))
									<h4>Email</h4>
									<p id="Email_Text"><a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">&nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a></p>
									@endif									
								</div>
								<div class="address-h-sec">
									@if(!empty($getPersonalDetails['nationality']))
									<h4>Nationality</h4>
									<p>{{ $getPersonalDetails['nationality'] }}</p>
									@endif		
								</div>
								<div class="address-h-sec">
									@if(!empty($getPersonalDetails['place_of_birth']))
									<h4>Current Location</h4>
									<p>{{ $getPersonalDetails['place_of_birth'] }}</p>
									@endif		
								</div>
								<div class="address-h-sec">
									@if(!empty($getPersonalDetails['date_of_birth']))
									<h4>Date Of Birth</h4>
									<p>{{ $getPersonalDetails['date_of_birth'] }}</p>
									@endif		
								</div>
							</td>
						</tr>
						@else
						<tr>
							<td>
								<h2 class="hone-cat-con">Info</h2>
								<hr class="hone-hr">
								<div class="address-h-sec">
									<h4>Address</h4>
									<p></p>
								</div>
								<div class="address-h-sec">
									<h4>Phone</h4>
									<p></p>									
								</div>
								<div class="address-h-sec">
									<h4>Email</h4>
									<p></p>									
								</div>
								<div class="address-h-sec">
									<h4>Nationality</h4>
									<p></p>									
								</div>
							</td>
						</tr>
						@endif
						@if(!empty($getSkill) && count($getSkill) > 0) 
						<tr id="Skills_Text">
							<td>
								<h2 class="hone-cat-con mt-15">Skills</h2>
								<hr class="hone-hr">	
								<table class="w-100" id="SkillDetails_new">
										<tr>
											<td>
												@foreach($getSkill as $key => $skill_details)
												<div class="hone-skl-con">
													<h3>{{ $skill_details['us_skill'] }}</h3>
													
														@if($skill_details['us_skill_level'] == 1)
																<div class="hone-progress">
																	<div class="hone-bar" style="width:20%">
																	</div>
																@elseif($skill_details['us_skill_level'] == 2)
																<div class="hone-progress">
																	<div class="hone-bar" style="width:40%">
																	</div>
																@elseif($skill_details['us_skill_level'] == 3)
																<div class="hone-progress">
																	<div class="hone-bar" style="width:60%">
																	</div>
																@elseif($skill_details['us_skill_level'] == 4)
																<div class="hone-progress">
																	<div class="hone-bar" style="width:80%">
																	</div>
																@else
																<div class="hone-progress">
																	<div class="hone-bar" style="width:100%">
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
								<h2 class="skill-section" style="display: none;">Skills</h2>
								<table class="w-100" id="SkillDetails_new">
								</table>											
							</td>
						</tr>
						@endif
						@if(!empty($getLanguage) && count($getLanguage) > 0) 
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="hone-cat-con mt-15">Languages</h2>
								<hr class="hone-hr">	
								<table class="w-100" id="LanguageDetails_new">
									<tr>
										<td>
											@foreach($getLanguage as $key => $language_details)
											<div class="hone-skl-con">
												<h3>{{ $language_details['ul_language'] }}</h3>
												<div class="hone-progress">

													@if($language_details['ul_language_level_id'] == 1)
													<div class="hone-bar" style="width:20%">		
													@elseif($language_details['ul_language_level_id'] == 2)
														<div class="hone-bar" style="width:40%">		
													@elseif($language_details['ul_language_level_id'] == 3)
														<div class="hone-bar" style="width:60%">		
													@elseif($language_details['ul_language_level_id'] == 4)
														<div class="hone-bar" style="width:80%">		
													@else
														<div class="hone-bar" style="width:100%">		
													@endif								
													</div>
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
								<h2 class="skill-section" style="display: none;">Language</h2>
								<table class="w-100" id="LanguageDetails_new">
								</table>											
							</td>
						</tr>
						@endif
						@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="hone-cat-con mt-15">Links</h2>
								<hr class="hone-hr">	
								<table class="w-100" id="WebsiteSocialLinks_new">
										<tr>
											<td>
												@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
												<div class="hone-skl-con1 hone-skl-con">
													<h3><a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a></h3>	
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
								<h2 class="hone-cat-con mt-15" style="display: none;">Links</h2>
								<table class="w-100" id="WebsiteSocialLinks_new">
								</table>											
							</td>
						</tr>
						@endif
						@if(!empty($getHobby))
							@if(!empty($getHobby['uh_hobby']))
							<tr id="HobbiesSection">
								<td>
									<h2 class="hone-cat-con mt-15">Hobbies</h2>
									<hr class="hone-hr">	
									<p class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>	
								</td>
							</tr>
							@endif
						@else
						<tr id="HobbiesSection">
							<td>
								<h2 class="hone-cat-con mt-15" style="display: none;">Hobbies</h2>
								<p class="hobbies" id="Hobbies_Text"></p>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="ver-alg-top b-left">
					<table class="w-100">
						<tr>
							<td class="p-20">
								<table class="w-100">
									@if(!empty($getPersonalDetails))
		 								@if($getPersonalDetails['profile_summary'] != '')
										<tr>
											<td>
												<h2 class="hone-cat-con">Profile</h2>
												<hr class="hone-hr">
												<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
											</td>
										</tr>
										@endif
										<tr><td><hr class="f-hr"></td></tr>
									@else
		 							<tr>
										<td>
											<h2 id="ProfileSummary" style="display: none;">Profile</h2>
											<hr class="hone-hr">
											<p id="ProfessionalSummary_Text"></p>
										</td> 
									</tr>
		 							@endif

									@if(!empty($getCareers) && count($getCareers) > 0)
									<tr id="EmployerDetails_Text">
										<td>
											<h2 class="hone-cat-con">Employment history</h2>
											<hr class="hone-hr">
											<table class="w-100" id="EmployerDetails_new">
												@foreach($getCareers as $key => $employer_details)
												@php 
													$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
													$vars_a = array_filter(array($employer_details['uc_company_name'],$employer_details['uc_city']));
												@endphp
												<tr>
													<td>
														<div class="hone-his-cont">
															<h3>{{ implode(", ", $vars_a) }}</h3>
															<h5><span class="employer-city">{{ $employer_details['uc_city'] }}</span></h5>
														</div>
														<h4 class="sub-h">
														@if($employer_details['uc_is_present'] == 0)
															<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
														@else
															<span class="present-label">{{ implode(" - ", $vars) }}</span>
														@endif</h4>
														@if(!empty($employer_details['career_description']))
														<div class="hone-r-cont">
															<div class="employer-description-text">{!! $employer_details['career_description'] !!}</div>
														</div>
														@endif
													</td>
												</tr>
												@endforeach
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="EmployerDetails_Text">
										<td>
											<h2 class="employment-section" style="display: none;">Employment history</h2>
											<table class="w-100 employ-histry" id="EmployerDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getEducation) && count($getEducation) > 0)
									<tr id="EducationDetails_Text">
										<td>
											<h2 class="nhone-cat-co education-section">Education</h2>
											<hr class="hone-hr">
											<table class="w-100" id="CourseSectionDetails_new">
												@foreach($getEducation as $key => $education_details)
												@php 
													$vars = array_filter(array($education_details['ue_start_date'],$education_details['ue_end_date']));
													$vars_a = array_filter(array($education_details['ue_school_name'],$education_details['ue_city']));
												@endphp
													<tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<div class="hone-his-cont">
																<h3>{{ implode(", ", $vars_a) }}</h3>
																<h5><span class="education-city">{{ $education_details['ue_city'] }}</span></h5>
															</div>
															<h5  class="sub-h">
															@if($education_details['uc_is_present'] == 0)
																<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="education-label">{{ implode(" - ", $vars) }}</span>
															@endif
															</h5>
															<div>
																@if(!empty($education_details['education_description']))
																<div class="hone-r-cont">
																	<div class=" education-description-text">{!! $education_details['education_description'] !!}</div>
																</div>
																@endif
															</div>
														</td> 
													</tr>
												@endforeach
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="EducationDetails_Text">
										<td>
											<h2 class="hone-cat-co education-section" style="display: none;">Education</h2>
											<table class="w-100 employ-histry" id="CourseSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getCourse) && count($getCourse) > 0) 
									<tr id="CourseSectionDetails_new">
										<td>
											<h2 class="nhone-cat-co course-section">Courses</h2>
											@if(!empty($getCourse))<hr class="hone-hr">@else jfhgjhd @endif
											<table class="w-100" id="CourseSectionDetails_new">
												@foreach($getCourse as $key => $course_details)
												@php 
													$vars = array_filter(array($course_details['ucr_start_date'],$course_details['ucr_end_date']));
													$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
												@endphp
													<tr id="CoursesAddMore_section_{{ $key }}" class="CourseSectionDetails_new-add-more-section">
														<td>
															<div class="hone-his-cont">
																<h3>
																	{{ implode(", ", $vars_a) }}
																</h3>
															</div>
															<h5  class="sub-h">
																@if($course_details['ucr_is_present'] == 0)
				                                                    <span class="course-end-date" id="employer_enddate_{{ $key }}">{{ implode(" - ", $vars) }}</span>
				                                                @else
				                                                    <span class="course-present-label">{{ implode(" - ", $vars) }}</span>
				                                                @endif
															</h5>
														</td> 
													</tr>
												@endforeach
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="CourseSectionDetails_Text">
										<td>
											<h2 class="hone-cat-co course-section" style="display: none;">Courses</h2>
											<table class="w-100 employ-histry" id="CourseSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
									<tr id="ExtraCurricularActivityDetails_Text">
										<td>
											<h2 class="nhone-cat-co">Extra-curricular Activity</h2>
											<hr class="hone-hr">
											<table class="w-100" id="ExtraCurricularSectionDetails_new">
												@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
												@php 
													$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
													$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
												@endphp
													<tr id="extra_activityAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<div class="hone-his-cont">
																<h3>{{ implode(", ", $vars_a) }}</h3>
																<h5><span class="extra-curricular-city">{{ $extra_curricular_section_details['ueca_city'] }}</span></h5>
															</div>
															<h5  class="sub-h">
															@if($extra_curricular_section_details['ueca_is_present'] == 0)
																<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
															@endif
															</h5>
															<div>
																@if(!empty($extra_curricular_section_details['extra_curricular_description']))
																<div class="hone-r-cont">
																	<div class=" extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
																</div>
																@endif
															</div>
														</td> 
													</tr>
												@endforeach
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="ExtraCurricularActivityDetails_Text">
										<td>
											<h2 class="hone-cat-co" style="display: none;">Extra-curricular Activity</h2>
											<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getInternship) && count($getInternship) > 0) 
									<tr id="InternshipDetails_Text">
										<td>
											<h2 class="nhone-cat-co internship-section">Internships</h2>
											<hr class="hone-hr">
											<table class="w-100" id="InternshipSectionDetails_new">
												@foreach($getInternship as $key => $internship_details)
												@php 
													$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
													$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
												@endphp
													<tr id="InternshipsAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<div class="hone-his-cont">
																<h3>{{ implode(", ", $vars_a) }}</h3>
																<h5><span class="internship-city">{{ $internship_details['ui_city'] }}</span></h5>
															</div>
															<h5  class="sub-h">
															@if($internship_details['ui_is_present'] == 0)
			                                                    <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
			                                                @else
			                                                    <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
			                                                @endif
															</h5>
															<div>
																@if(!empty($internship_details['internship_description']))
																<div class="hone-r-cont">
																	<div class=" internship-description-text">{!! $internship_details['internship_description'] !!}</div>
																</div>
																@endif
															</div>
														</td> 
													</tr>
												@endforeach
										
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="InternshipDetails_Text">
										<td>
											<h2 class="nhone-cat-co internship-section" style="display: none;">Internships</h2>
											<table class="employ-histry" id="InternshipSectionDetails_new">
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
											<h2 class="nhone-cat-co custom-section">{{ $custom_heading }}</h2>
											<hr class="hone-hr">
											<table class="w-100" id="CustomSectionDetails_new">
												@foreach($getCustomSection as $key => $custom_section_details)
												@php 
													$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
												@endphp
													<tr id="CustomAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<div class="hone-his-cont">
																<h3><span class="custom-job-title">{{ $custom_section_details['ucs_title'] }}</span>
																</h3>
																<h5><span class="custom-section-city">{{ $custom_section_details['ucs_city'] }}</span></h5>
															</div>
															<h5  class="sub-h">
																@if($custom_section_details['ucs_is_present'] == 0)
				                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
				                                                @else
				                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
				                                                @endif
															</h5>
															<div>
																@if(!empty($custom_section_details['custom_description']))
																<div class="hone-r-cont">
																	<div class=" custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
																</div>
																@endif
															</div>
														</td> 
													</tr>
												@endforeach
										
											</table>
										</td>
									</tr>
									<tr><td><hr class="f-hr"></td></tr>
									@else
									<tr id="CustomSectionDetails_Text">
										<td>
											<h2 class="nhone-cat-co custom-section" style="display: none;">Custom</h2>
											<table class="employ-histry" id="CustomSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getReference) && count($getReference) > 0) 
									<tr id="ReferenceDetails_Text">
										<td>
											<h2 class="nhone-cat-co reference-section">Reference</h2>
											<hr class="hone-hr">
											<table class="w-100" id="ReferenceDetails_new">
												@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
			                                        <p>I'd like to hide references and make them available only upon request</p>
			                                    @else
												@foreach($getReference as $key => $reference_details)
												@php 
													$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
													$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
												@endphp
													<tr id="CustomAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<h4>{{ implode(" from ", $vars) }}</h4>
															<h5 class="sub-h">
																{{ implode(" | ", $vars_a) }}
															</h5>
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
											<h2 class="nhone-cat-co reference-section" style="display: none;">Reference</h2>
											<table class="employ-histry" id="ReferenceDetails_new">
											</table>
										</td>
									</tr>
									@endif
								</table>								
							</td>
						</tr>						
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>
