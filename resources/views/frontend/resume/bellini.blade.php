<!DOCTYPE html>
<html>
<head>
	<title>Bellini</title>
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
	    .bellini-cont p, .bellini-cont ul{color: #6e6e6e;}
	    .b-username{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;font-size: 34px;text-transform: capitalize;}
	    .b-main-cont{display: block;color: #b9b9b9;margin-bottom: 10px;}
	    .b-main-cont h2{display: inline-block;text-transform: uppercase;font-size: 14px;}
	    .b-main-cont ul{display: inline-block;margin-left: 28px;font-size: 16px;color: #b9b9b9;}
	    .p-30{padding: 30px 55px;}
	    .be-username{margin-top: 20px; margin-bottom: 15px; color: #585858; text-transform: uppercase;font-size: 26px;}	    
	    .b-emp-his{color: #454545;font-weight: bold;font-size: 22px;text-transform: capitalize;margin-bottom: 8px;}
	    .d-timep{text-transform: capitalize;color: #a9a9a9;margin-bottom: 15px;}
	    .ml-40{margin-left: 40px;}
	    .de-ul-dec li{margin-bottom: 5px;}
	    .de-ul-dec li:last-child{margin-bottom: 15px;}
	    .be-address-sec span.baddress-ln-fs {display: block;}
	    .be-address-sec span{margin-bottom: 5px;}
	    .be-rig-sec {width: 30%;padding: 0 30px;}
	    .d-block{display: block;}
	    .mt-0{margin-top: 0;}
	    .belin-progress {padding: 0;width: 100%;height: 5px;overflow: hidden;background: #e5e5e5;}
		.belin-bar {position:relative;float:left;min-width:1%;height:100%;background:#878787;width: 0%;transition: all 0.8s linear 1s;}		
		.belin-skl-con {width: 100%;float: left;margin-bottom: 15px;}
		.belin-skl-con h3{font-size: 18px;margin-bottom: 5px;color: #696969;text-transform: capitalize;}
		.d-refer{color: #a9a9a9;margin-bottom: 15px;}
		a{text-decoration: none;color: #b9b9b9;}
		.website-social-label a{color: #585858;}
		.website-lnk{
	 		color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
	 		text-decoration: none;
	 	}
	 	.bellini-cont p{
            word-break: break-word;
            margin-bottom: 10px;
        }
	</style>
</head>
<body>
<div class="bellini-cont p-30">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="ver-alg-top">
					<table>
						@if(!empty($getPersonalDetails))
						<tr>
							<td>
								<h1 class="b-username hone-profilenam">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif <span id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])), {{ $getPersonalDetails['main_job_title'] }}@endif</span></h1><br>
								<div class="b-main-cont">
									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
									<h2 id="ExtraDetails">&nbsp;{{ implode(", ",$address) }}</h2>
									@endif

									@if(!empty($getResumeFullNameEmail))
									<a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">&nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a>
									{{--<ul>
										<li id="Email_Text"><a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">&nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a></li>
									</ul>--}}
									@endif
									@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
										@php 
											$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
										@endphp
									<p>&nbsp;{{ implode(", ",$location) }}</p>
									@endif
								</div>
							</td>
						</tr>
						@else
						<tr>
							<td>
								<h1 class="b-username"></h1>
								<div class="b-main-cont">
								<h2></h2>
									<ul><li></li></ul>
								</div>
							</td>
						</tr>
						@endif
						@if(!empty($getPersonalDetails))
						@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td>
								<h2 class="be-username">Profile</h2>
								<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
							</td>
							@endif
						@else
							<tr>
							<td>
								<h2 class="be-username" id="ProfileSummary" style="display: none;">Profile</h2>
								<hr class="hone-hr">
								<p id="ProfessionalSummary_Text"></p>
							</td> 
						</tr>
							@endif
						@if(!empty($getCareers) && count($getCareers) > 0)
						<tr id="EmployerDetails_Text">
							<td>
								<h2 class="be-username">Employment history</h2>
								<table class="w-100 be-emp-his" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										$vars_a = array_filter(array($employer_details['uc_job_title'],$employer_details['uc_company_name'],$employer_details['uc_city']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
												@if($employer_details['uc_is_present'] == 0)
													<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="present-label">{{ implode(" - ", $vars) }}</span>
												@endif
											</h4>
											@if(!empty($employer_details['career_description']))
											<div class="de-ul-dec ml-40">
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
								<h2 class="be-username" style="display: none;">Employment history</h2>								
								<table class="w-100 employ-histry" id="EmployerDetails_new">
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getEducation) && count($getEducation) > 0)
						<tr id="EducationDetails_Text">
							<td>
								<h2 class="be-username">Education</h2>
								<table class="w-100 be-emp-his" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
										$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
												@if($education_details['ue_is_present'] == 0)
													<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="education-label">{{ implode(" - ", $vars) }}</span>
												@endif
											</h4>
											@if(!empty($education_details['education_description']))
											<div class="de-ul-dec ml-40">
												<div class=" education-description-text">{!! $education_details['education_description'] !!}</div>
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
								<h2 class="be-username" style="display: none;">Education</h2>								
								<table class="w-100 employ-histry" id="EducationDetails_new">
								</table>
							</td>
						</tr>
						@endif

						@if(!empty($getCourse) && count($getCourse) > 0) 
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="be-username">Courses</h2>
								<table class="w-100 be-emp-his" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
										$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
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
								<h2 class="be-username" style="display: none;">Courses</h2>								
								<table class="w-100 employ-histry" id="CourseSectionDetails_new">
								</table>
							</td>
						</tr>
						@endif
						
						@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
						<tr id="ExtraCurricularActivityDetails_Text">
							<td>
								<h2 class="be-username">Extra-curricular Activity</h2>
								<table class="w-100 be-emp-his" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
										$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
												@if($extra_curricular_section_details['ueca_is_present'] == 0)
													<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
												@endif
											</h4>
											@if(!empty($extra_curricular_section_details['extra_curricular_description']))
											<div class="de-ul-dec ml-40">
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
								<h2 class="be-username" style="display: none;">Extra-curricular Activity</h2>								
								<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
								</table>
							</td>
						</tr>
						@endif

						@if(!empty($getInternship) && count($getInternship) > 0) 
						<tr id="InternshipDetails_Text">
							<td>
								<h2 class="be-username">Internships</h2>
								<table class="w-100 be-emp-his" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
										$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
												@if($internship_details['ui_is_present'] == 0)
                                                    <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
											</h4>
											@if(!empty($internship_details['internship_description']))
											<div class="de-ul-dec ml-40">
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
								<h2 class="be-username" style="display: none;">Internships</h2>								
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
								<h2 class="be-username">{{ $custom_heading }}</h2>
								<table class="w-100 be-emp-his" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
										$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
									@endphp
									<tr>
										<td>
											<h3 class="b-emp-his">{{ implode(", ", $vars_a) }}</h3>
											<h4 class="d-timep">
												@if($custom_section_details['ucs_is_present'] == 0)
                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
											</h4>
											@if(!empty($custom_section_details['custom_description']))
											<div class="de-ul-dec ml-40">
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
								<h2 class="be-username" style="display: none;">Custom</h2>								
								<table class="w-100 employ-histry" id="CustomSectionDetails_new">
								</table>
							</td>
						</tr>
						@endif

						@if(!empty($getReference) && count($getReference) > 0) 
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="be-username">Reference</h2>
								<table class="w-100 be-emp-his" id="ReferenceDetails_new">
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
											<h4>{{ implode(" from ", $vars) }}</h4>
											<h5 class="d-refer">{{ implode(" | ", $vars_a) }}</h5>
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
								<h2 class="be-username" style="display: none;">Reference</h2>								
								<table class="w-100 employ-histry" id="ReferenceDetails_new">
								</table>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="be-rig-sec ver-alg-top">
					<table class="w-100">
						@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['phone']))
							@php 
								$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
							@endphp
						<tr>
							<td>
								<h2 class="be-username mt-0">DETAILS</h2>
								<p class="be-address-sec">
									{{ implode(", ",$address) }}
									{{--<span class="baddress-ln-fs">{{ $getPersonalDetails['address'] }}</span>
									<span class="baddress-ln-se d-block"><span class="city-name common-break">{{ $getPersonalDetails['city'] }}</span><span id="PostalCode_Text" class="postal-code">, {{ $getPersonalDetails['postal_code'] }}</span>
									<span class="country-name common-break">, {{ $getPersonalDetails['country'] }}</span></span>
									<span class="baddress-ln-phone">{{ $getPersonalDetails['phone'] }}</span>--}}
								</p>
								<p>{{ $getPersonalDetails['phone'] }}</p>
							</td>
						</tr>
						@else
						<tr>
							<td>
								<h2 id="Extra_Details" style="display: none;">Details</h2>
								<p class="extra-details">
									<span class="address-text common-break"></span>
									<span class="city-name common-break"></span><span id="PostalCode_Text" class="postal-code"></span>
									<span class="country-name common-break"></span>
									<span class="contact-number common-break"></span>
									<a href="mailto:someone@example.com" class="email-text"></a>
								</p>
								<h5 class="date-place-of-birth" style="display: none;">Date/Place of Birth</h5>
								<p id="DateOfBirth_Text"></p>
								<p id="PlaceOfBirth_Text"></p>
							</td>
						</tr>
						@endif

						@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="be-username">Links</h2>
								<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
									@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
										<tr id="WebsiteSocialLinksData_{{ $key }}>      
			                                <td class="pb-2">
			                            	<td>
					                            <p class="website-social-label">
									 				<a class="website-lnk" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
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
								<h2 class="website-links-section" style="display: none;">Links</h2>
								<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getSkill) && count($getSkill) > 0) 
						<tr id="Skills_Text">
							<td>
								<h2 class="be-username">Skills</h2>
								<table class="w-100" id="SkillDetails_new">
										<tr>
											<td>
												@foreach($getSkill as $key => $skill_details)
												<div class="belin-skl-con">
													<h3>{{ $skill_details['us_skill'] }}</h3>
													@if($skill_details['us_skill_level'] == 1)
													<div class="belin-progress">
														<div class="belin-bar" style="width:20%">
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 2)
													<div class="belin-progress">
														<div class="belin-bar" style="width:40%">
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 3)
													<div class="belin-progress">
														<div class="belin-bar" style="width:60%">
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 4)
													<div class="belin-progress">
														<div class="belin-bar" style="width:80%">
														</div>
													</div>
													@else
													<div class="belin-progress">
														<div class="belin-bar" style="width:100%">
														</div>
													</div>
													@endif	
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
								<h2 class="be-username">Languages</h2>
								<table class="w-100" id="LanguageDetails_new">
										<tr>
											<td>
												@foreach($getLanguage as $key => $language_details)
												<div class="belin-skl-con">
													<h3>{{ $language_details['ul_language'] }}</h3>
													@if($language_details['ul_language_level_id'] == 1)
													<div class="belin-progress">
														<div class="belin-bar" style="width:20%">
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 2)
													<div class="belin-progress">
														<div class="belin-bar" style="width:40%">
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 3)
													<div class="belin-progress">
														<div class="belin-bar" style="width:60%">
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 4)
													<div class="belin-progress">
														<div class="belin-bar" style="width:80%">
														</div>
													</div>
													@else
													<div class="belin-progress">
														<div class="belin-bar" style="width:100%">
														</div>
													</div>
													@endif	
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
								<h2 class="skill-section" style="display: none;">Languages</h2>
								<table class="w-100" id="LanguageDetails_new">
								</table>											
							</td>
						</tr>
						@endif

						@if(!empty($getHobby))
							@if(!empty($getHobby['uh_hobby']))
								<tr id="HobbiesSection">
								<td>
									<h2 class="be-username">Hobbies</h2>
									<p class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
								</td>
							</tr>
							@endif
						@else
						<tr id="HobbiesSection">
							<td>
								<h2 class="be-username" style="display: none;">Hobbies</h2>
								<p class="hobbies" id="Hobbies_Text"></p>
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