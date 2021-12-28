<!DOCTYPE html>
<html>
<head>
	<title>Hibiscus</title>
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
	    .hibiscus-cont{background-image: url(http://cp-20.whb.tempwebhost.net/~demohd3z/mumbailall/jay/JobBoosts/images/hibiscus_bg.jpg);background-size: cover;background-repeat: no-repeat;width: 100%;height: 100%;min-width: 1240px;min-height: 1754px;min-height: 1240px;}
	    .hibiscus-erp{padding: 30px 50px;}
	    .hibiscus-profle{width: 100px;height: 100px;object-fit: cover;border-radius: 80px;margin-top: 15px;margin-bottom: 10px;}
	    .heb-col{color: #000;font-size: 28px;text-transform: capitalize;font-weight: bold;}
	    .heb-p-s-nam{color: #5d5d5d;font-size: 22px;text-transform: capitalize;}
	    .heb-c-address h5{font-size: 16px;text-transform: uppercase;}
	    .hibiscus-cont p, .hibiscus-cont a, .hibiscus-cont ul{color: #5d5d5d;}
	    .hibiscus-cont a{text-decoration: none;}  
	    .heb-c-address p{margin-bottom: 10px;font-size: 16px;color: #000;}
	    .p-tb-30{padding: 30px 0px;}
	    .p-b-30{padding-bottom: 30px}
	    .w-18{width: 18%;}
	    .heb-p-h{font-weight: bold;text-transform: uppercase;font-size: 20px;margin-bottom: 10px;}
	    .heb-date-h{font-size: 14px;text-transform: capitalize;}
	    .hed-s-h{font-size: 12px;color: #5d5d5d;margin: 8px 0px;}
	    .hed-emph-hed{font-size: 24px;text-transform: capitalize;color: #000;font-weight: bold;margin-bottom: 10px;}
	    .hibiscus-cont ul{margin-left: 20px;}
	    .hibiscus-cont ul li{margin-bottom: 4px;}
	    .hibiscus-cont ul li:last-child{margin-bottom: 30px;}
	    .hibiscus-skill-cont h6{color: #000;font-size: 18px;text-transform: capitalize;}
	    .hibiscus-skill-cont{margin-bottom: 10px;}
	    .hibiscus-proj-skill ul{list-style: none;display: block;}
	    .hibiscus-proj-skill ul li{display: inline-block;}
	    .hibiscus-proj-skill ul li span{height: 10px;width: 10px;border-radius: 25px;background-color: #e4e4e4;display: block;margin-top: 8px;margin-right: 8px;}
	    .hibiscus-proj-skill ul li span.hibiscus-active{background-color: #000;}
	    .hibiscus-proj-skill ul li:last-child{margin-bottom: 4px;}
	    .hibiscus-cont p{
            word-break: break-word;
            margin-bottom: 10px;
        }
	</style>
</head>
<body>
<div class="hibiscus-cont">
	<div class="hibiscus-erp">
		<table class="w-100">
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td>
								<div class="hic-pro-con text-center">
									@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
									<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="hibiscus-profle"> 
									@else
									<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="hibiscus-profle"> 
									@endif							
									<h1 class="heb-col">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
									<h2>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
								</div>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
			<tr>
				<td class="p-tb-30">
					<table class="w-100 heb-c-address">
						@if(!empty($getPersonalDetails))
						<tr>
								@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
									@php 
										$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
									@endphp
							<td class="ver-alg-top">
								<h5>Address</h5>
							</td>
							<td class="ver-alg-top">
								<p class="address-fst">{{ implode(", ",$address) }}</p>
							</td>
								@endif
							@if(!empty($getPersonalDetails['phone']))
							<td>
								<h5>Phone</h5>
							</td>
							<td>
								<p>{{ $getPersonalDetails['phone'] }}</p>
							</td>
							@endif
						</tr>
						<tr>
							@if(!empty($getResumeFullNameEmail))
							<td>
								<h5>Email</h5>
							</td>
							<td>
								{{ $getResumeFullNameEmail['resume_email'] }}
							</td>
							@endif
							@if(!empty($getPersonalDetails['date_of_birth']))
							<td>
								<h5>Date Of Birth</h5>
							</td>
							<td>
								{{ $getPersonalDetails['date_of_birth'] }}
							</td>
							@endif
						</tr>
						<tr>
							@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
							<td>
								<h5>Links</h5>
							</td>
							<td>
								@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
								 	<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
								@endforeach
							</td>
							@endif
							@if(!empty($getPersonalDetails['place_of_birth']))
							<td>
								<h5>Current Location</h5>
							</td>
							<td>
								{{ $getPersonalDetails['place_of_birth'] }}
							</td>
							@endif
						</tr>
						@endif
					</table>
				</td>
			</tr>
			@php $i=1; @endphp
			<tr>
				<td class="p-b-30">
					<table class="w-100">
						@if(!empty($getPersonalDetails))
		 					@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Profile</h2>
							</td>
							<td class="ver-alg-top">
								<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
							</td>
						</tr>	
							@endif					
						@endif
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@if(!empty($getCareers) && count($getCareers) > 0)
			<tr id="EmployerDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Employment history</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										$vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($employer_details['uc_is_present'] == 0)
																<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="present-label">{{ implode(" - ", $vars) }}</span>
															@endif
														</h4>
														<h5 class="hed-s-h">{{ $employer_details['uc_city'] }}</h5>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>
														@if(!empty($employer_details['career_description']))
														<div>
															<div class="employer-description-text">{!! $employer_details['career_description'] !!}</div>
														</div>
														@endif
													</td>
												</tr>
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getEducation) && count($getEducation) > 0)
			<tr id="EducationDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Education</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
										$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($education_details['ue_is_present'] == 0)
																<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="education-label">{{ implode(" - ", $vars) }}</span>
															@endif
														</h4>
														<h5 class="hed-s-h">{{ $education_details['ue_city'] }}</h5>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>	
														@if(!empty($education_details['education_description']))	
														<div>
															<div class="education-description-text">{!! $education_details['education_description'] !!}</div>
														</div>			
														@endif				
													</td>
												</tr>												
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getSkill) && count($getSkill) > 0) 
			<tr id="Skills_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>04</span> Skills</h2>
							</td>
							<td class="ver-alg-top">
								<table class="w-100" id="SkillDetails_new">
									@foreach($getSkill->chunk(2) as $key => $skill_details)
									<tr>
										@foreach($skill_details as $skill)
										<td class="skill-name">{{ $skill['us_skill'] }}</td>
										<td>
											<div class="hibiscus-skill-cont">					
												<div class="hibiscus-proj-skill">
													<ul>
														@if($skill['us_skill_level'] == 1)
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														@elseif($skill['us_skill_level'] == 2)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														@elseif($skill['us_skill_level'] == 3)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														@elseif($skill['us_skill_level'] == 4)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														@elseif($skill['us_skill_level'] == 5)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														@endif
													</ul>
												</div>
											</div>
										</td>
										@endforeach
									</tr>
									@endforeach
								</table>
							</td>							
						</tr>						
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getInternship) && count($getInternship) > 0) 
			<tr id="InternshipDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Internships</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
										$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($internship_details['ui_is_present'] == 0)
				                                                <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
				                                            @else
				                                            	<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
				                                            @endif
														</h4>
														<h5 class="hed-s-h">{{ $internship_details['ui_city'] }}</h5>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>	
														@if(!empty($internship_details['internship_description']))	
														<div>
															<div class="f-18px mb-8px internship-description-text">{!! $internship_details['internship_description'] !!}</div>
														</div>			
														@endif				
													</td>
												</tr>												
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getCourse) && count($getCourse) > 0) 
			<tr id="CourseSectionDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Courses</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
										$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($course_details['ucr_is_present'] == 0)
				                                                <span class="course-end-date">{{ implode(" - ", $vars) }}</span>
				                                            @else
				                                                <span class="course-present-label">{{ implode(" - ", $vars) }}</span>
				                                            @endif
														</h4>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getHobby))
				@if(!empty($getHobby['uh_hobby']))
			<tr>
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Hobbies</h2>
							</td>
							<td class="ver-alg-top">
								<p id="ProfessionalSummary_Text">{{ $getHobby['uh_hobby'] }}</p>
							</td>
						</tr>	
					</table>
				</td>
			</tr>
				@endif					
			@php $i++; @endphp
			@endif
			@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
			<tr id="ExtraCurricularActivityDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Extra Curricular Activity</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
										$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($extra_curricular_section_details['ueca_is_present'] == 0)
																<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
															@endif
														</h4>
														<h5 class="hed-s-h">{{ $extra_curricular_section_details['ueca_city'] }}</h5>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>	
														@if(!empty($extra_curricular_section_details['extra_curricular_description']))	
														<div>
															<div class="extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
														</div>			
														@endif				
													</td>
												</tr>											
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getLanguage) && count($getLanguage) > 0) 
			<tr id="LanguageDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> Languages</h2>
							</td>
							<td class="ver-alg-top">
								<table class="w-100" id="LanguageDetails_new">
									@foreach($getLanguage->chunk(2)  as $key => $language_details)
									<tr>
										@foreach($language_details as $language)
										<td class="skill-name">{{ $language['ul_language'] }}</td>
										<td>
											<div class="hibiscus-skill-cont">					
												<div class="hibiscus-proj-skill">
													<ul>
														@if($language['ul_language_level_id'] == 1)
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														<li><span></span></li>
														@elseif($language['ul_language_level_id'] == 2)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														<li><span></span></li>
														@elseif($language['ul_language_level_id'] == 3)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														@elseif($language['ul_language_level_id'] == 4)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span></span></li>
														@elseif($language['ul_language_level_id'] == 5)
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														<li><span class="hibiscus-active"></span></li>
														@endif
													</ul>
												</div>
											</div>
										</td>
										@endforeach
									</tr>
									@endforeach
								</table>
							</td>							
						</tr>						
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getReference) && count($getReference) > 0) 
			<tr id="ReferenceDetails_Text">
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> References</h2>
							</td>							
						</tr>
						<tr>
							<td>
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
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<p>
															<h4 class="heb-date-h">{{ implode(" from ", $vars) }}</h4>
															<p>{{ implode(" | ", $vars_a) }}</p>
														</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									@endforeach
                            		@endif
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
			@if(!empty($getCustomSection) && count($getCustomSection) > 0) 
			<tr id="CustomSectionDetails_Text">
				@php $custom_heading = ''; @endphp
				@foreach($getCustomSection as $custom)
					@php $custom_heading = $custom->ucs_main_heading; @endphp
				@endforeach
				<td class="p-b-30">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-18">
								<h2 class="heb-p-h"><span>0{{ $i }}</span> {{ $custom_heading }}</h2>
							</td>							
						</tr>
						<tr>
							<td>
								<table class="w-100" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
										$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
									@endphp
									<tr>
										<td class="ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="w-18 ver-alg-top">
														<h4 class="heb-date-h">
															@if($custom_section_details['ucs_is_present'] == 0)
				                                                <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
				                                            @else
				                                                <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
				                                            @endif
														</h4>
														<h5 class="hed-s-h">{{ $custom_section_details['ucs_city'] }}</h5>
													</td>
													<td class="ver-alg-top">
														<h3 class="hed-emph-hed">{{ implode(", ", $vars_a) }}</h3>
														@if(!empty($custom_section_details['custom_description']))
														<div>
															<div class="custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
														</div>
														@endif
													</td>
												</tr>
											</table>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@php $i++; @endphp
			@endif
		</table>
	</div>
</div>
</body>
</html>