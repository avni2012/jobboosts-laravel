
<!DOCTYPE html>
 <html>
 <head>
 	<title>Lemon Grass</title>
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
	    .p-30{padding: 45px 50px;}
	    .lmn-profile {width: 75px;height: 75px;object-fit: cover;border-radius: 80px;}
	    .grn-back{background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
	    .wht-col{color: #fff;}
	    .l-username{text-transform: capitalize;font-size: 26px;color: #fff;}
	    .l-sm-hr{width: 12px;}
	    .l-sub-name{font-size: 14px;text-transform: uppercase;color: #fff;}
	    .address-bl span{display: block;}
	    .l-w-con-hed{font-size: 22px;margin-bottom: 8px;text-transform: capitalize;color: #fff;}
	    .lemon-progress {padding: 0;width: 100%;height: 8px;overflow: hidden;background: #39837b;}
		.lemon-bar {position:relative;float:left;min-width:1%;height:100%;background:#fdfafd;width: 0%;transition: all 0.8s linear 1s;}		
		.lemon-skl-con {width: 100%;float: left;margin-bottom: 15px;}
		.lemon-skl-con h3{font-size: 18px;margin-bottom: 5px;color: #fff;text-transform: capitalize;}
		.address-bl {line-height: 1.4;}
		.mt-20{margin-top: 20px;}
		.wp-30{width: 33%;}
		.l-w-p p, .l-w-p ul{color: #0d111a;font-size: 18px;}
		.l-b-text-con{color: #0d111a;margin-bottom: 10px;font-weight: bold;text-transform: capitalize;font-size: 24px;}
		.mb-20{margin-bottom: 20px;}
		.lm-emp-his{color: #232323;text-transform: capitalize;font-size: 18px;font-weight: bold;}
		.lm-emp-time{color: #959ba6;font-size: 14px;text-transform: uppercase;letter-spacing: 2px;margin-bottom: 10px;}
		.ul-r-con{margin-left: 44px;}
		.ul-r-con li{margin-bottom: 5px;}
		.ul-r-con li:last-child{margin-bottom: 20px;}
		.lm-refer{font-size: 18px;color: #232323;font-weight: bold;text-transform: capitalize;}
		.lm-ref-det{font-size: 16px;color: #232323;}
		a.other-details,.website-social-label a {color: #fff;text-decoration:none;}
		.lemon-cont p{
            word-break: break-word;
        }
        .l-w-p p{margin-bottom: 10px;}
	</style>
 </head>
 <body>
 	<div class="lemon-cont">
 		<table class="w-100"> 
 			<tbody>
 				<tr>
 					<td class="p-30 grn-back wht-col ver-alg-top wp-30">
 						<table class="w-100">
 							@if(!empty($getPersonalDetails))
 							<tr>
 								<td>
 									<div class="text-center">
 										@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
											<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="lmn-profile"> 
										@else
											<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="lmn-profile"> 
										@endif
			 							<h1 class="l-username">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
			 							<hr class="l-sm-hr">
			 							<h2 class="l-sub-name" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
			 						</div>
 								</td>
 							</tr>
 							@else
 							<tr>
 								<td>
 									<div class="text-center">
			 							{{-- <img src="{{ asset('/frontend/images/resume_templates/lemongrass-images/profile.jpeg') }}" alt="profile" class="lmn-profile">--}}
			 							<h1 class="l-username"></h1>
			 							<hr class="l-sm-hr">
			 							<h2 class="l-sub-name"></h2>
			 						</div>
 								</td>
 							</tr>
 							@endif

 							@if(!empty($getPersonalDetails))
 							<tr>
 								<td>
 									<h2 class="l-w-con-hed mt-20">Details</h2>
 									<p class="address-bl">
 										@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
										<span id="ExtraDetails" class="other-details">{{ implode(", ",$address) }}</span>

										<span>{{ $getPersonalDetails['postal_code'] }}, {{ $getPersonalDetails['country'] }}</span>

										@endif
 										
 										@if(!empty($getPersonalDetails['phone']))
 										<span id="ContactNumber_Text" class="other-details">{{ $getPersonalDetails['phone'] }}</span>
 										@endif
 										@if(!empty($getResumeFullNameEmail))
 										<span id="Email_Text"><a href="mailto:someone@example.com" class="other-details" >{{ $getResumeFullNameEmail['resume_email'] }}</a></span>
 										@endif
 										@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
											@php 
												$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
											@endphp
 										<span id="ContactNumber_Text" class="other-details">{{ implode(", ",$location) }}</span>
 										@endif
 									</p>
 								</td>
 							</tr>
 							@else
 							<tr>
 								<td>
 									<h2 class="l-w-con-hed mt-20">Details</h2>
 									<p class="address-bl">
 										<span id="ExtraDetails" class="other-details"><span id="Address_Text"></span><span id="CityName_Text"></span><span id="PostalCode_Text"></span><span id="CountryName_Text"></span></span>
 										<span  id="ContactNumber_Text" ></span>
 										<span id="Email_Text"></span>
 									</p>
 								</td>
 							</tr>
 							@endif
 							@if(!empty($getSkill) && count($getSkill) > 0) 
							<tr id="Skills_Text">
 								<td>
 									<h2 class="l-w-con-hed mt-20">Skills</h2>
 									<table class="w-100" id="SkillDetails_new">
										<tr>
											<td>
												@foreach($getSkill as $key => $skill_details)
												<div class="lemon-skl-con">
													<h3>{{ $skill_details['us_skill'] }}</h3>
													<div class="lemon-progress">
														@if($skill_details['us_skill_level'] == 1)
															<div class="lemon-bar" style="width:20%"></div>
														@elseif($skill_details['us_skill_level'] == 2)
															<div class="lemon-bar" style="width:40%"></div>
														@elseif($skill_details['us_skill_level'] == 3)
															<div class="lemon-bar" style="width:60%"></div>
														@elseif($skill_details['us_skill_level'] == 4)
															<div class="lemon-bar" style="width:80%"></div>
														@else
															<div class="lemon-bar" style="width:100%"></div>
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
									<h2 class="l-w-con-hed mt-20" style="display: none;">Skills</h2>
									<table class="w-100" id="SkillDetails_new">
									</table>											
								</td>
							</tr>
							@endif

							@if(!empty($getLanguage) && count($getLanguage) > 0) 
							<tr id="LanguageDetails_Text">
 								<td>
 									<h2 class="l-w-con-hed mt-20">Language</h2>
 									<table class="w-100" id="LanguageDetails_new">
										<tr>
											<td>
												@foreach($getLanguage as $key => $language_details)
												<div class="lemon-skl-con">
													<h3>{{ $language_details['ul_language'] }}</h3>
													<div class="lemon-progress">
														@if($language_details['ul_language_level_id'] == 1)
															<div class="lemon-bar" style="width:20%"></div>
														@elseif($language_details['ul_language_level_id'] == 2)
															<div class="lemon-bar" style="width:40%"></div>
														@elseif($language_details['ul_language_level_id'] == 3)
															<div class="lemon-bar" style="width:60%"></div>
														@@elseif($language_details['ul_language_level_id'] == 4)
															<div class="lemon-bar" style="width:80%"></div>
														@else
															<div class="lemon-bar" style="width:100%"></div>
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
									<h2 class="l-w-con-hed mt-20" style="display: none;">Language</h2>
									<table class="w-100" id="LanguageDetails_new">
									</table>											
								</td>
							</tr>
							@endif

							@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
							<tr id="WebsiteSocialLinks_Text">
 								<td>
 									<h2 class="l-w-con-hed mt-20 website-links-section">Links</h2>
 									<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
 										@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
											<tr id="WebsiteSocialLinksData_{{ $key }}">      
				                                <td class="pb-2">
				                            	<td>
						                            <p class="website-social-label">
										 				<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
										 			</p>
										 		</td>
										 	</tr>
										@endforeach
									</table>
 								</td>
 							</tr>
 							@else
 							<tr id="WebsiteSocialLinks_Text">
 								<td>
 									<h2 class="l-w-con-hed mt-20 website-links-section" style="display: none;">Links</h2>
 									<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
											</table>
 								</td>
 							</tr>
 							@endif

 							@if(!empty($getHobby))
								@if(!empty($getHobby['uh_hobby']))
								<tr id="HobbiesSection">
	 								<td>
	 									<h2 class="l-w-con-hed mt-20 hobbies-section">Hobbies</h2>
	 									<p class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
	 								</td>
	 							</tr>
	 							@endif
 							@else
 							<tr id="HobbiesSection">
 								<td>
 									<h2 class="l-w-con-hed mt-20 hobbies-section" style="display: none;">Hobbies</h2>
 									<p class="hobbies" id="Hobbies_Text"></p>
 								</td>
 							</tr>
 							@endif

 						</table> 						
 					</td> 
 					<td class="p-30 ver-alg-top l-w-p">
 						<table class="w-100">
 							@if(!empty($getPersonalDetails))
		 					  	@if($getPersonalDetails['profile_summary'] != '')
		 							<tr>
		 								<td >
		 									<h2 class="l-b-text-con">Profile</h2>
		 									<div class="mb-20" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</div>
		 								</td>
		 							</tr>
		 						@endif
		 					@else
		 							<tr>
		 								<td>
		 									<h2 class="l-b-text-con" style="display: none;">Profile</h2>
		 									<p class="mb-20" id="ProfessionalSummary_Text"></p>
		 								</td>
		 							</tr>
		 					@endif
 							
 							@if(!empty($getCareers) && count($getCareers) > 0)
							<tr id="EmployerDetails_Text">
 								<td>
 									<h2 class="l-b-text-con">Employment history</h2>
 									<table class="w-100" id="EmployerDetails_new">
 										@foreach($getCareers as $key => $employer_details)
 										@php 
											$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
											$vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name'],$employer_details['uc_city']));
										@endphp
 										<tr id="EmployerAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
													@if($employer_details['uc_is_present'] == 0)
														<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="present-label">{{ implode(" - ", $vars) }}</span>
													@endif
 												</h4>
 												@if(!empty($employer_details['career_description']))
 												<div class="ul-r-con">
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
										<h2 class="l-b-text-con" style="display: none;">Employment history</h2>
										<table class="w-100 employ-histry" id="EmployerDetails_new">
										</table>
									</td>
								</tr>
							@endif

 							@if(!empty($getEducation) && count($getEducation) > 0)
							<tr id="EducationDetails_Text">
 								<td>
 									<h2 class="l-b-text-con">Education</h2>
 									<table class="w-100" id="EducationDetails_new">
 										@foreach($getEducation as $key => $education_details)
 										@php 
											$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
											$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
										@endphp
 										<tr id="EducationAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
													@if($education_details['ue_is_present'] == 0)
														<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="education-label">{{ implode(" - ", $vars) }}</span>
													@endif
 												</h4>
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
										<h2 class="l-b-text-con" style="display: none;">Education</h2>
										<table class="w-100 employ-histry" id="EducationDetails_new">
										</table>
									</td>
								</tr>
							@endif

							@if(!empty($getCourse) && count($getCourse) > 0) 
							<tr id="CourseSectionDetails_Text">
 								<td>
 									<h2 class="l-b-text-con">Courses</h2>
 									<table class="w-100" id="CourseSectionDetails_new">
 										@foreach($getCourse as $key => $course_details)
 										@php 
											$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
											$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
										@endphp
 										<tr id="CoursesAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
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
										<h2 class="l-b-text-con" style="display: none;">Courses</h2>
										<table class="w-100 employ-histry" id="CourseSectionDetails_new">
										</table>
									</td>
								</tr>
							@endif

							@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
							<tr id="ExtraCurricularActivityDetails_Text">
 								<td>
 									<h2 class="l-b-text-con">Extra-curricular Activity</h2>
 									<table class="w-100" id="ExtraCurricularSectionDetails_new">
 										@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
 										@php 
											$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
											$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
										@endphp
 										<tr id="extracurricularAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
													@if($extra_curricular_section_details['ueca_is_present'] == 0)
														<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
													@endif
 												</h4>
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
										<h2 class="l-b-text-con" style="display: none;">Extra-curricular Activity</h2>
										<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
										</table>
									</td>
								</tr>
							@endif

							@if(!empty($getInternship) && count($getInternship) > 0) 
							<tr id="InternshipDetails_Text">
 								<td>
 									<h2 class="l-b-text-con">Internships</h2>
 									<table class="w-100" id="InternshipSectionDetails_new">
 										@foreach($getInternship as $key => $internship_details)
 										@php 
											$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
											$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
										@endphp
 										<tr id="InternshipsAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
													@if($internship_details['ui_is_present'] == 0)
	                                                    <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
	                                                @else
	                                                    <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
	                                                @endif
 												</h4>
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
										<h2 class="l-b-text-con" style="display: none;">Internships</h2>
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
 									<h2 class="l-b-text-con">{{ $custom_heading }}</h2>
 									<table class="w-100" id="CustomSectionDetails_new">
 										@foreach($getCustomSection as $key => $custom_section_details)
 										@php 
											$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
											$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
										@endphp
 										<tr id="CustomAddMore_section_{{ $key }}">
 											<td>
 												<h3 class="lm-emp-his">{{ implode(", ", $vars_a) }}</h3>
 												<h4 class="lm-emp-time">
													@if($custom_section_details['ucs_is_present'] == 0)
	                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
	                                                @else
	                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
	                                                @endif
 												</h4>
 												@if(!empty($custom_section_details['custom_description'] ))
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
										<h2 class="l-b-text-con" style="display: none;">Custom</h2>
										<table class="w-100 employ-histry" id="CustomSectionDetails_new">
										</table>
									</td>
								</tr>
							@endif

							@if(!empty($getReference) && count($getReference) > 0) 
							<tr id="ReferenceDetails_Text">
 								<td>
 									<h2 class="l-b-text-con mt-20">References</h2>
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
 											<td>
	 											<div class="mb-20"> 			
	 												<h4 class="lm-refer">{{ implode(" from ", $vars) }}</h4>
	 												<h5 class="lm-ref-det">{{ implode(" | ", $vars_a) }}</h5>
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
										<h2 class="l-b-text-con mt-20" style="display: none;">Reference</h2>
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