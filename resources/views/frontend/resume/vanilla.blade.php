
<!DOCTYPE html>
<html>
<head>
	<title>Vanilla</title>
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
	    .vanilla-cont{background-color: #f7f3f1;padding: 0 30px;}
	    .vanl-profile{width: 525px;height: 535px;object-fit: cover;border-bottom: 15px solid #f1d5bf;}
	    .vnl-img-con{width: 525px;vertical-align: top;}
	    .vnl-pro-cont{background-color: #fff;width: 265px;padding: 30px;position: absolute;left: -80px;bottom: 23px;}
	    .position-relative{position: relative;}
	    .vnl-pro-cont h1{color: #353138;font-size: 28px;font-weight: bold;margin-bottom: 8px;}
	    .vnl-pro-cont h2{color: #c07b4b;margin-bottom: 6px;}
	    .vnl-pro-cont p{color: #454545;}
	    .vnl-heading{margin-top: 25px;margin-bottom: 10px;font-size: 22px;color: #3f3b41;text-transform: capitalize;}
	    .vnl-brnad-colr, .vanilla-cont ul, .vanilla-cont p, .vanilla-cont a{color: #7c7a79;}
	    .vanilla-cont a{text-decoration: none;}
	    .awd-citn-con, .vnl-edu-detl-c{margin-left: 10px;}
	    .mt-15{margin-top: 15px;}
	    .mb-10{margin-bottom: 10px;}
	    .vnl-hed-c{color: #c07b4b;font-weight: bold;font-size: 18px;text-transform: capitalize;}
	    .vnl-s-dec{color: #c07b4b;font-size: 16px;text-transform: capitalize;margin-bottom: 3px;}
	    .vnl-edu-detl-c li:last-child{margin-bottom: 20px;}
	    .pl-20{padding-left: 30px;}
	    .pr-20{padding-right: 30px;}
	    .px-20{padding: 0 30px;}
	    .sec-vnl-det{width: 33.33%;}
	    .vnl-cen-brd{border-left: 2px solid #f0e5e1;border-right: 2px solid #f0e5e1;}
	    .position-initial{position: initial;}
	    .vanilla-cont p{
            word-break: break-word;
        }
        .vnl-edu-detl-c p{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="vanilla-cont">
	<table class="w-100">
		<tbody>
			<tr>
				<td colspan="2">
					<table class="w-100">
						<tr>
							@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
							<td class="vnl-img-con">
								<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="vanl-profile"> 
							</td>
							<td class="position-relative">
								<div class="vnl-pro-cont">
									<h1>@if(isset($getResumeFullNameEmail['resume_fullname'])){{$getResumeFullNameEmail['resume_fullname']}}@endif</h1>
									<h2>@if(isset($getPersonalDetails['main_job_title'])){{$getPersonalDetails['main_job_title']}}@endif</h2>
									<p>
										@if((!empty($getPersonalDetails)))
                        					@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['phone']))
                        					<span>{{$getPersonalDetails['address']}}</span>
                        					<span>,{{ $getPersonalDetails['postal_code'] }}</span>
                        					<span>,{{$getPersonalDetails['phone']}}</span>
                        					@endif
                        				@endif
                        			</p>
								</div>
							</td>
							@else
							<td class="vnl-img-con">
								<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="vanl-profile"> 
							</td>
							<td class="position-relative">
								<div class="vnl-pro-cont">
									<h1>@if(isset($getResumeFullNameEmail['resume_fullname'])){{$getResumeFullNameEmail['resume_fullname']}}@endif</h1>
									<h2>@if(isset($getPersonalDetails['main_job_title'])){{$getPersonalDetails['main_job_title']}}@endif</h2>
									<p>
										@if((!empty($getPersonalDetails)))
                        					@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['phone']))
                        					<span>{{$getPersonalDetails['address']}}</span>
                        					<span>,{{ $getPersonalDetails['postal_code'] }}</span>
                        					<span>,{{$getPersonalDetails['phone']}}</span>
                        					@endif
                        				@endif
                        			</p>
								</div>
							</td>
							@endif
						</tr>
					</table>
				</td>				
			</tr>
			<tr>
				<td class="ver-alg-top pr-20 sec-vnl-det">
					<table class="w-100" class="vnl-desc-sec">
						@if((!empty($getSkill) && count($getSkill) > 0))
						<tr id="Skills_Text">
							<td>
								<h2 class="vnl-heading">Professional Skills</h2>
								<table class="w-100 vnl-skills vnl-brnad-colr" id="SkillDetails_new">
									<tr>
										<td>											
											<ul class="list-s-none">
												@foreach($getSkill as $key => $skill_details)
													<li>{{ $skill_details['us_skill'] }}</li>
												@endforeach
											</ul>
										</td>										
									</tr>									
								</table>
							</td>
						</tr>
						@else
						<tr id="Skills_Text">
							<td>
								<h2 class="vnl-heading skill-section" style="display: none">Professional Skills</h2>
								<table class="w-100 vnl-skills vnl-brnad-colr" id="SkillDetails_new">
								</table>
							</td>
						</tr>
						@endif
						@if((!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0))
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="vnl-heading website-links-section">Links</h2>
								<ul class="awd-citn-con" id="WebsiteSocialLinks_new">
									@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
										@if(!empty($website_social_links_details['uwsl_website_label']))
										<li>
											<a style="font-size: medium" class="language-title" target="_blank" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
										</li>
										@endif
									@endforeach
								</ul>
							</td>
						</tr>
						@else
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="vnl-heading website-links-section" style="display: none;">Links</h2>
								<ul class="awd-citn-con" id="WebsiteSocialLinks_new">
								</ul>
							</td>
						</tr>
						@endif
						@if((!empty($getPersonalDetails)))
                        	@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['phone']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']))
						<tr>
							<td>
								<h2 class="vnl-heading">How to reach me:</h2>
								<table class="w-100 vnl-brnad-colr" id="address-sec-con">
									{{--<tr>
										<td>Home:</td>
										<td>{{$getPersonalDetails['phone']}}</td>
									</tr>--}}
									{{--<tr>
										<td>Cell:</td>
										<td>{{$getPersonalDetails['phone']}}</td>
									</tr>--}}
									<tr>
										<td>Email:</td>
										<td>@if(isset($getResumeFullNameEmail['resume_email']) && $getResumeFullNameEmail['resume_email']!=''){{$getResumeFullNameEmail['resume_email']}}@endif</td>
									</tr>
									<tr>
										<td>Location:</td>
										@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
										@php 
											$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
										@endphp
										
											<td>{{ implode(", ",$location) }}</td>
										@endif
									</tr>
									{{--<tr>
										<td>Address:</td>
										@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
											<td>{{ implode(", ",$address) }}</td>
										@endif
									</tr>--}}
									{{--<tr>
										<td>Linkedin:</td>
										<td>@linkedinname</td>
									</tr>--}}
								</table>
								<div class="vnl-address-det-c mt-15">
									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
										<p>{{ implode(", ",$address) }}</p>
									@endif
									{{--<p>{{$getPersonalDetails['address']}}</p>
									<p>{{$getPersonalDetails['city']}}, {{$getPersonalDetails['country']}}</p>--}}
								</div>
								{{--<div class="vnl-mail-cont mt-15 mb-10">
									<p>yourmail@name.com</p>
									<p>www.reallyname.com</p>
								</div>--}}
							</td>	
						</tr>
							@endif
						@else
						<tr>
							<td>
							</td>	
						</tr>
						@endif
						@if((!empty($getLanguage) && count($getLanguage) > 0))
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="vnl-heading language-section">Languages</h2>
								<ul class="awd-citn-con" id="LanguageDetails_new">
									@foreach($getLanguage as $key => $language_details)
										<li>{{ $language_details['ul_language'] }}</li>
									@endforeach
								</ul>
							</td>
						</tr>
						@else
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="vnl-heading language-section" style="display: none;">Languages</h2>
								<ul class="awd-citn-con" id="LanguageDetails_new">
								</ul>
							</td>
						</tr>
						@endif
						@if((isset($getHobby['uh_hobby']) && $getHobby['uh_hobby']!=''))
						<tr id="HobbiesSection">
							<td>
								<h2 class="vnl-heading hobbies-section">Hobbies</h2>
								<ul class="awd-citn-con" id="Hobbies_Text">
									<li>{{ $getHobby['uh_hobby'] }}</li>
								</ul>
							</td>
						</tr>
						@else
						<tr id="HobbiesSection">
							<td>
								<h2 class="vnl-heading hobbies-section" style="display: none;">Hobbies</h2>
								<ul class="awd-citn-con" id="Hobbies_Text">
								</ul>
							</td>
						</tr>
						@endif
						@if((!empty($getReference) && count($getReference) > 0))
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="vnl-heading reference-section">Reference</h2>
								<ul class="awd-citn-con" id="ReferenceDetails_new">
									@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                        <p>I'd like to hide references and make them available only upon request</p>
                                    @else
									@foreach($getReference as $key => $reference_details)
									@php 
										$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
										$vars_a = array_filter(array($reference_details['ur_refer_email'],$reference_details['ur_refer_phone']));
									@endphp
										<li>
											{{ implode(" | ", $vars) }}
											<br>
											{{ implode(" | ", $vars_a) }}
										</li>
									@endforeach
									@endif
								</ul>
							</td>
						</tr>
						@else
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="vnl-heading reference-section" style="display: none;">Reference</h2>
								<ul class="awd-citn-con" id="ReferenceDetails_new">
								</ul>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="ver-alg-top px-20 sec-vnl-det vnl-cen-brd">
					<table class="w-100">
						@if((!empty($getEducation) && count($getEducation) > 0))
						<tr id="EducationDetails_Text">
							<td>
								<h2 class="vnl-heading education-section">Education Training</h2>
								<table class="w-100" class="vnl-educ-cont" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c education-school">{{ $education_details['ue_school_name'] }}</h3>
											<h4 class="vnl-s-dec">{{ $education_details['ue_degree'] }}
											</h4>
											<h4 class="vnl-s-dec">
												<span>
													@if($education_details['ue_is_present'] == 0)
                                                        <span class="employer-end-date">{{ implode(" To ", $vars) }}</span>
                                                    @else
                                                    	<span class="present-label">{{ implode(" To ", $vars) }}</span>
                                                    @endif
												</span>
											</h4>
											@if(!empty($education_details['education_description']))
											<ul class="vnl-edu-detl-c education-description-text">
												<li>
													{!! $education_details['education_description'] !!}
												</li>
											</ul>
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
								<h2 class="vnl-heading education-section" style="display: none;">Education Training</h2>
								<table class="w-100" class="vnl-educ-cont" id="EducationDetails_new">
								</table>
							</td>
						</tr>
						@endif
						@if((!empty($getCourse) && count($getCourse) > 0))
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="vnl-heading courses-section">Courses</h2>
								<table class="w-100" class="vnl-educ-cont" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c course-title">{{ $course_details['ucr_course_name'] }}</h3>
											<h4 class="vnl-s-dec institution-name">{{ $course_details['ucr_institute'] }}</h4>
											<h5 class="vnl-edu-detl-c">
												@if($course_details['ucr_is_present'] == 0)
                                                    <span class="course-end-date mb-10">{{ implode(" - ", $vars) }}</span>
                                               	@else
                                                	<span class="course-present-label mb-10">{{ implode(" - ", $vars) }}</span>
                                                @endif
											</h5>
										</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						@else
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="vnl-heading courses-section" style="display: none;">Courses</h2>
								<table class="w-100" class="vnl-educ-cont" id="CourseSectionDetails_new">
								</table>
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
								<h2 class="vnl-heading custom-section">{{ $custom_heading }}</h2>
								<table class="w-100" class="vnl-educ-cont" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'], $custom_section_details['ucs_end_date']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c custom-job-title">{{ $custom_section_details['ucs_title'] }}</h3>
											<h5 class="vnl-edu-detl-c">
											@if($custom_section_details['ucs_is_present'] == 0)
                                            	<span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                            	<span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif
											</h5>
											@if(!empty($custom_section_details['custom_description']))
											<ul class="vnl-edu-detl-c extra-curricular-description-text">
												<li>
													{!! $custom_section_details['custom_description'] !!}
												</li>
											</ul>
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
								<h2 class="vnl-heading custom-section" style="display: none;">Custom</h2>
								<table class="w-100" class="vnl-educ-cont" id="CustomSectionDetails_new">
								</table>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="ver-alg-top pl-20 sec-vnl-det">
					<table class="w-100">
						@if((!empty($getCareers) && count($getCareers) > 0))
						<tr id="EmployerDetails_Text">
							<td>
								<h2 class="vnl-heading employment-section">Work Experience</h2>
								<table class="w-100" class="vnl-educ-cont" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										$vars_a = array_filter(array($employer_details['uc_company_name'],$employer_details['uc_city']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c">{{ $employer_details['uc_job_title'] }}</h3>
											<h4 class="vnl-s-dec">
												{{ implode(" - ", $vars_a) }}
											</h4>
											<h4 class="vnl-s-dec">
												<span>
													@if($employer_details['uc_is_present'] == 0)
                                                        <span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                    	<span class="present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</span>
											</h4>
											@if(!empty($employer_details['career_description']))
											<div class="vnl-edu-detl-c employer-description-text">
												<div>
													{!! $employer_details['career_description'] !!}
												</div>
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
								<h2 class="vnl-heading employment-section" style="display: none;">Work Experience</h2>
								<table class="w-100" class="vnl-educ-cont" id="EmployerDetails_new">
								</table>
							</td>
						</tr>
						@endif
						@if((!empty($getInternship) && count($getInternship) > 0))
						<tr id="InternshipDetails_Text">
							<td>
								<h2 class="vnl-heading internship-section">Internships</h2>
								<table class="w-100" class="vnl-educ-cont" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'], $internship_details['ui_end_date']));
										$vars_a = array_filter(array($internship_details['ui_employer'],$internship_details['ui_city']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c internship-job-title">{{ $internship_details['ui_job_title'] }}</h3>
											<h4 class="vnl-s-dec">
												{{ implode(", ", $vars_a) }}
											</h4>
											<h4 class="vnl-s-dec">
												<span>
													@if($internship_details['ui_is_present'] == 0)
                                                        <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                    	<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</span>
											</h4>
											@if(!empty($internship_details['internship_description']))
											<div class="vnl-edu-detl-c internship-description-text">
												<div>
													{!! $internship_details['internship_description'] !!}
												</div>
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
								<h2 class="vnl-heading internship-section" style="display: none;">Internships</h2>
								<table class="w-100" class="vnl-educ-cont" id="InternshipSectionDetails_new">
								</table>
							</td>
						</tr>
						@endif
						@if((!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0))
						<tr id="ExtraCurricularActivityDetails_Text">
							<td>
								<h2 class="vnl-heading activity-section">Extra Curricular Activities</h2>
								<table class="w-100" class="vnl-educ-cont" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
										$vars_a = array_filter(array($extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
									@endphp
									<tr>
										<td>
											<h3 class="vnl-hed-c">{{ $extra_curricular_section_details['ueca_function_title'] }}</h3>
											<h4 class="vnl-s-dec">
												{{ implode(" - ", $vars_a) }}
											</h4>
											<h4 class="vnl-s-dec">
												<span>
													@if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                        <span class="employer-end-dateextra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                    @else
                                                    	<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</span>
											</h4>
											@if(!empty($extra_curricular_section_details['extra_curricular_description']))
											<div class="vnl-edu-detl-c extra-curricular-description-text">
												<div>
													{!! $extra_curricular_section_details['extra_curricular_description'] !!}
												</div>
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
								<h2 class="vnl-heading activity-section" style="display: none;">Extra Curricular Activities</h2>
								<table class="w-100" class="vnl-educ-cont" id="ExtraCurricularSectionDetails_new">
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