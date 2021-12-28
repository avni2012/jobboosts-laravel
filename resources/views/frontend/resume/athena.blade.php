
<!DOCTYPE html>
<html>
<head>
	<title>Athena</title>
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
	    .text-right{text-align: right;}
	    .ver-alg-mid{vertical-align: middle;}
	    .ver-alg-top{vertical-align: top;}
	    .athena-cont{background-image: url(http://cp-20.whb.tempwebhost.net/~demohd3z/mumbailall/jay/JobBoosts/images/athena.jpg);background-size: contain;background-repeat: no-repeat;width: 100%;height: 100%;min-width: 1240px;min-height: 1754px;}
	    .athena-wrp{padding: 30px 50px;}
	    .athena-profle{width: 500px;height: 500px;margin-top: 15px;border-radius: 500px;object-fit: cover;}
	    .athna-name{color: #2c403c;font-size: 62px;text-transform: uppercase;letter-spacing: 3px;font-weight: bold;}
	    .w-200p{width: 200px;}
	    .athna-profs{color: #ce9788;text-transform: uppercase;letter-spacing: 3px;font-size: 26px;}
	    .ath-p-det, .athena-cont p, .athena-cont a, .athena-cont ul{color: #334641;}
	    .athena-cont a{text-decoration: none;}
	    .ath-p-det{margin: 15px 0;text-transform: uppercase;font-weight: bold;}
	    .w-50p{width: 50%;}
	    .p-lr-30{padding: 0 30px;}
	    .p-t-65{padding-top: 65px;}	   
	    .w-400, .at-min-con{width: 400px;}
	    .w-500p{width: 500px;}
	    .at-min-con{min-height: 410px;}
	    .athena-skill-cont h6{color: #000;font-size: 18px;text-transform: capitalize;}
	    .athena-skill-cont{margin-bottom: 3px;}
	    .athena-proj-skill ul{list-style: none;display: block;}
	    .athena-proj-skill ul li{display: inline-block;}
	    .athena-proj-skill ul li span{height: 12px;width: 12px;border-radius: 25px;background-color: #a4a4a4;display: block;margin-top: 5px;margin-right: 4px;}
	    .athena-proj-skill ul li span.athena-active{background-color: #5f404c;}
	    .ath-skillc-sec{min-height: 300px;}
	    .ath-edu-cont{margin-bottom: 20px;}
	    .ath-ed-sth{color: #2c403c;font-weight: bold;text-transform: uppercase;margin-bottom: 0px;font-size: 18px;}
	    .ath-ed-pas-y{color: #787878;text-transform: capitalize;font-size: 16px;}
	    .atn-exp-yr{font-size: 18px;font-weight: bold;color: #384a47;padding-right: 10px;margin-bottom: 0}
	    .atn-exp-nam{font-size: 18px;font-weight: bold;color: #384a47;text-transform: uppercase;margin-bottom: 0;}
	    .atn-exp-sub{font-size: 18px;font-weight: normal;color: #384a47;text-transform: uppercase;}
	    .atn-exp-u-con{margin-left: 20px;}
	    .atn-exp-u-con li, .ath-edu-cont li{margin-bottom: 3px;}
	    #EducationDetails_new li, #EducationDetails_new ul, #EducationDetails_new p {margin-bottom: 10px;}
	    .atn-exp-u-con li:last-child, .ath-edu-cont li::last-child, .athena-cont li::last-child {margin-bottom: 25px;}
	    .mb-10-p{margin-bottom: 10px;}
	    .athena-cont p{word-break: break-word;}
	</style>
</head>
<body>
<div class="athena-cont">
	<div class="athena-wrp">
		<table class="w-100">
			<tr>
				<td class="w-500p">
					@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
					<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="athena-profle">
					@else
					<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="athena-profle">
					@endif
				</td>
				<td class="w-200p">
					<div class="text-right">
						<h1 class="athna-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
						<h2 class="athna-profs">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
					</div>
				</td>
			</tr>
			<tr>
				<td class="w-50p p-lr-30 p-t-65 ver-alg-top">
					<table class="w-100">
						@if(!empty($getPersonalDetails))
		 					@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td>
								<h2 class="ath-p-det">About me</h2>
								<div class="at-min-con">
									<p class="w-400" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
								</div>
							</td>
						</tr>
							@endif
						@endif
						@if(!empty($getSkill) && count($getSkill) > 0) 
						<tr id="Skills_Text">
							<td>
								<div class="ath-skillc-sec">
									<h2 class="ath-p-det">Skill</h2>
									<table class="w-100" id="SkillDetails_new">
										@foreach($getSkill as $key => $skill_details)
										<tr>
											<td><p>{{ $skill_details['us_skill'] }}</p></td>
											<td>
												<div class="athena-skill-cont">					
													<div class="athena-proj-skill">
														<ul>
															@if($skill_details['us_skill_level'] == 1)
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($skill_details['us_skill_level'] == 2)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($skill_details['us_skill_level'] == 3)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($skill_details['us_skill_level'] == 4)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															@else
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															@endif
														</ul>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</table>
								</div>	
							</td>													
						</tr>
						@endif
						@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="ath-p-det">Links</h2>
								<table class="w-100" class="WebsiteSocialLinks_new">
									@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
									 	<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getPersonalDetails))
						<tr>
							<td>
								<h2 class="ath-p-det">Contact</h2>
								<div class="art-con-info">
									@php 
										$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
									@endphp
									<p class="athn-phone">@if(!empty($getPersonalDetails['phone'])){{ $getPersonalDetails['phone'] }}@endif</p>
									{{--<p class="athn-mobile">+79 209 1029 2019</p>--}}
									<p class="athn-mail"><a href="mailto:someone@example.com">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_email'] }}@endif</a></p>
									<p class="athn-phone">{{ implode(", ",$address) }}</p>
									{{--<p class="athn-web">www.yourwebname.com</p>--}}
								</div>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="w-50p p-lr-30 p-t-65 ver-alg-top">
					<table class="w-100">
						@if(!empty($getEducation) && count($getEducation) > 0)
						<tr id="EducationDetails_Text">
							<td>
								<h2 class="ath-p-det">Education</h2>
								<table class="w-100" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
									@endphp
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth education-school">{{ $education_details['ue_school_name'] }}</h3>
												<h4 class="ath-ed-pas-y mb-10-p">
													{{--<span class="education-start-date">{{ $education_details['ue_start_date'] }}</span>--}}
													@if($education_details['ue_is_present'] == 0)
														<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="education-label">{{ implode(" - ", $vars) }}</span>
													@endif
												<span>
													@if($education_details['ue_degree'] != null)
														| {{ $education_details['ue_degree'] }}
													@endif
												</span></h4>
												@if(!empty($education_details['education_description']))
												<div class="atn-exp-u-con">
													<div class="f-18px mb-8px employer-description-text">{!! $education_details['education_description'] !!}</div>
												</div>
												@endif
												{{--@if(!empty($education_details['education_description']))	
												<ul class="atn-exp-u-con">
													<li class="f-18px mb-8px education-description-text">{!! $education_details['education_description'] !!}</li>
												</ul>			
												@endif--}}
											</div>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getCareers) && count($getCareers) > 0)
						<tr id="EmployerDetails_Text">
							<td>
								<h2 class="ath-p-det">Experience</h2>
								<table class="w-100" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									<tr>
										{{--<td class="ver-alg-top">
											<h5 class="atn-exp-yr">
												<span class="employer-start-date">{{ $employer_details['uc_start_date'] }}</span>
												@if($employer_details['uc_is_present'] == 0)
													-&nbsp;<span class="employer-end-date">{{ $employer_details['uc_end_date'] }}</span>
												@else
													-&nbsp;<span class="present-label">{{ "Present" }}</span>
												@endif
											</h5>
										</td>--}} 
										@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										@endphp
										<td class="ver-alg-top">
											<h3 class="atn-exp-nam">{{ $employer_details['uc_company_name'] }}</h3>
											<h4 class="atn-exp-sub">{{ $employer_details['uc_job_title'] }}</h4>
											<h5 class="ath-ed-pas-y mb-10-p">
												{{--<span class="employer-start-date">{{ implode(' - ', $vars) }}</span>--}}
												@if($employer_details['uc_is_present'] == 0)
													<span class="employer-end-date">{{ implode(' - ', $vars) }}</span>
												@else
													<span class="present-label">{{ implode(' - ', $vars) }}</span>
												@endif
											</h5>
											@if(!empty($employer_details['career_description']))
											<div class="atn-exp-u-con">
												<div class="f-18px mb-8px employer-description-text">{!! $employer_details['career_description'] !!}</div>
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getCourse) && count($getCourse) > 0) 
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="ath-p-det">Courses</h2>
								<table class="w-100" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
									@endphp
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth course-title">{{ $course_details['ucr_course_name'] }}</h3>
												<h4 class="ath-ed-pas-y mb-10-p">
													{{--<span class="course-start-date">{{ $course_details['ucr_start_date'] }}</span>--}}
													@if($course_details['ucr_is_present'] == 0)
				                                    	<span class="course-end-date">{{ implode(" - ", $vars) }}</span>
				                                    @else
				                                    	<span class="course-present-label">{{ implode(" - ", $vars) }}</span>
				                                    @endif
												<span>
													@if(($course_details['ucr_start_date'] != null || $course_details['ucr_end_date'] != null) && $course_details['ucr_institute'] != null)
														| {{ $course_details['ucr_institute'] }}
													@else
														{{ $course_details['ucr_institute'] }}
													@endif
												</span></h4>
											</div>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getInternship) && count($getInternship) > 0) 
						<tr id="InternshipDetails_Text">
							<td>
								<h2 class="ath-p-det">Internships</h2>
								<table class="w-100" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'], $internship_details['ui_end_date']));
									@endphp
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth internship-job-title">{{ $internship_details['ui_job_title'] }}</h3>
												<h4 class="ath-ed-pas-y mb-10-p">
													{{--<span class="internship-start-date">{{ $internship_details['ui_start_date'] }}</span>--}}
													@if($internship_details['ui_is_present'] == 0)
				                                        <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
				                                    @else
				                                    	<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
				                                    @endif
												<span>
													@if(($internship_details['ui_start_date'] != null || $internship_details['ui_end_date'] != null) && $internship_details['ui_employer'] != null)
														| {{ $internship_details['ui_employer'] }}
													@else
														{{ $internship_details['ui_employer'] }}
													@endif
												</span></h4>
												@if(!empty($internship_details['internship_description']))	
												<div class="atn-exp-u-con">
													<div class="f-18px mb-8px internship-description-text">{!! $internship_details['internship_description'] !!}</div>
												</div>			
												@endif
											</div>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
						<tr id="ExtraCurricularActivityDetails_Text">
							<td>
								<h2 class="ath-p-det">Extra Curricular Activity</h2>
								<table class="w-100" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
									@endphp
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth function-title">{{ $extra_curricular_section_details['ueca_function_title'] }}</h3>
												<h4 class="ath-ed-pas-y mb-10-p">
													{{--<span class="extra-curricular-start-date">{{ $extra_curricular_section_details['ueca_start_date'] }}</span>--}}
													@if($extra_curricular_section_details['ueca_is_present'] == 0)
														<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
													@else
														<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
													@endif
												<span>
													@if(($extra_curricular_section_details['ueca_start_date'] != null || $extra_curricular_section_details['ueca_end_date'] != null) && $extra_curricular_section_details['ueca_employer'] != null)
														| {{ $extra_curricular_section_details['ueca_employer'] }}
													@else
														{{ $extra_curricular_section_details['ueca_employer'] }}
													@endif
												</span></h4>
												@if(!empty($extra_curricular_section_details['extra_curricular_description']))	
												<div class="atn-exp-u-con">
													<div class="f-18px mb-8px extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>
												</div>			
												@endif	
											</div>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getHobby))
							@if(!empty($getHobby['uh_hobby']))
						<tr id="EducationDetails_Text">
							<td>
								<h2 class="ath-p-det">Hobbies</h2>
								<table class="w-100" id="EducationDetails_new">
									<tr>
										<td>
											<p id="ProfessionalSummary_Text">{{ $getHobby['uh_hobby'] }}</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
							@endif
						@endif
						@if(!empty($getLanguage) && count($getLanguage) > 0) 
						<tr id="LanguageDetails_Text">
							<td>
								<div class="ath-skillc-sec_n">
									<h2 class="ath-p-det">Languages</h2>
									<table class="w-100" id="LanguageDetails_new">
										@foreach($getLanguage  as $key => $language_details)
										<tr>
											<td><p>{{ $language_details['ul_language'] }}</p></td>
											<td>
												<div class="athena-skill-cont">					
													<div class="athena-proj-skill">
														<ul>
															@if($language_details['ul_language_level_id'] == 1)
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($language_details['ul_language_level_id'] == 2)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($language_details['ul_language_level_id'] == 3)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															<li><span></span></li>
															@elseif($language_details['ul_language_level_id'] == 4)
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span></span></li>
															@else
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															<li><span class="athena-active"></span></li>
															@endif
														</ul>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</table>
								</div>	
							</td>													
						</tr>
						@endif
						@if(!empty($getReference) && count($getReference) > 0)
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="ath-p-det">Reference</h2>
								<table class="w-100" id="ReferenceDetails_new">
									@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
		                                <p>I'd like to hide references and make them available only upon request</p>
		                            @else
		                            @foreach($getReference as $key => $reference_details)
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth">
													<span class="reference-name">{{ $reference_details['ur_refer_full_name'] }}</span><span class="reference-company">
													@if($reference_details['ur_refer_full_name'] != null)
													from {{ $reference_details['ur_refer_company_name'] }}@else {{ $reference_details['ur_refer_company_name'] }} @endif</span>
												</h3>
												<h4 class="ath-ed-pas-y mb-10-p">
													<span class="referent-email">{{ $reference_details['ur_refer_email'] }}</span> 
													@if($reference_details['ur_refer_phone'] != null)
                                                    <span class="referent-phone"> | {{ $reference_details['ur_refer_phone'] }} @else {{ $reference_details['ur_refer_phone'] }} @endif</span>
												</h4>
											</div>
										</td>
									</tr>
									@endforeach
									@endif
								</table>
							</td>
						</tr>
						@endif
						@if(!empty($getCustomSection) && count($getCustomSection) > 0) 
						@php $custom_heading = ''; @endphp
						@foreach($getCustomSection as $custom)
							@php $custom_heading = $custom->ucs_main_heading; @endphp
						@endforeach
						<tr id="CustomSectionDetails_Text">
							<td>
								<h2 class="ath-p-det">{{ $custom_heading }}</h2>
								<table class="w-100" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'], $custom_section_details['ucs_end_date']));
									@endphp
									<tr>
										<td>
											<div class="ath-edu-cont">
												<h3 class="ath-ed-sth custom-job-title">{{ $custom_section_details['ucs_title'] }}</h3>
												<h4 class="ath-ed-pas-y">
													{{--<span class="custom-start-date">{{ $custom_section_details['ucs_start_date'] }}</span>--}}
													@if($custom_section_details['ucs_is_present'] == 0)
				                                    	<span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
				                                    @else
				                                    	<span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
				                                    @endif
												<span>
													@if(($custom_section_details['ucs_start_date'] != null || $custom_section_details['ucs_end_date'] != null) && $custom_section_details['ucs_city'] != null)
														| {{ $custom_section_details['ucs_city'] }}
													@else
														{{ $custom_section_details['ucs_city'] }}
													@endif
												</span></h4>
												@if(!empty($custom_section_details['custom_description']))
												<div class="atn-exp-u-con">
													<div class="f-18px mb-8px custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
												</div>
												@endif
											</div>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@endif
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>