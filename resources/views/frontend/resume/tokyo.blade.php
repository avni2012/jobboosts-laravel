<!DOCTYPE html>
<html>
<head>
	<title>Tokyo</title>
	<style type="text/css">
	body,div,ul,ol,li,h1,h2,h3,h4,h5,h6,form,input,button,p,th,td {
        margin: 0;
        padding: 0;
        font-family: "Calibri";
    }
    h1,h2,h3,h4,h5,h6 {
        font-weight: normal;
        color: #242424;
    }
    p {
        color: #222;
    }
    .tokyo-cont table {
        border-collapse: collapse;
    }
    .w-100 {
        width: 100%;
    }
    .w-90 {
        width: 90%;
    }
    .m-auto{margin: auto;}    
	.pt-30{	padding-top: 30px;}
	.pl-50{padding-left: 50px;}
    .txt-center {
        text-align: center;
    }
    .vert-alg-top{vertical-align: top;}
    .profile-img{
    height: 90px;
    width: 90px;
    object-fit: cover;
    border-radius: 45px;
    object-position: center;
    }
    .name-section{
   	background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
    /*padding: 70px;*/
    /*display: block;*/
    }
    .pad-70{padding: 30px;}
    .pad-r-0{padding-right: 0;}
    .pad-l-0{padding-left: 0;}
    .w-148px{width: 148px;}
    .profile-name h1, .profile-name h2{color: #fff;/*text-transform: uppercase;*/font-style: italic;}
    .profile-name h1{font-size: 36px;font-weight: bold;margin-bottom: 10px;}
    .profile-name h2{font-size: 14px;letter-spacing: 4px;text-transform: uppercase;}
    .pl-70{padding-left: 70px;}
    .cont-det{border-bottom: 2px solid #eee;padding: 20px 0;}
    .detail-cnt{
    	font-size: 12px;
    }
    .detail-cnt a{
    color: #000;
    text-decoration: none;
   /* display: flex;  */
    align-items: center;  
     font-size: 16px;
     line-height: 1px;
    }
    .detail-cnt a img{
    margin-right: 5px;
    height: 18px;
    width: 18px;
    object-fit: contain;  
    }
    .fst-cont{   
    width: 70%;
    vertical-align: top;
    border-right: 2px solid #eee;
    padding-right: 50px;
    }
    .detail-wrp h2{
	font-style: italic;
	/*font-size:24px;*/
	font-size: 22px;
	font-weight: bold;
	margin-bottom: 0px;
	margin-top: 30px;
	text-transform: capitalize;
    }
    .detail-wrp h4{font-size: 16px;margin-top: 3px;text-transform: capitalize;}
    .detail-wrp p{font-size: 16px;margin-top: 10px;}
    .detail-wrp h5{
    color: #b6b6b6;
    font-size: 14px;
    font-style: italic;
    }
    .employ-histry ul{
    margin-left: 45px;
    margin-top: 10px;
    }
    .employ-histry ul li{
    font-size: 16px;
    margin-bottom: 10px;
    }
    .mt-0{margin-top: 0!important;}
    .mb-0{margin-bottom: 0;}
    .mt-10p{margin-top: 10px;}
    .mail-cnt{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;font-size: 16px;margin-top: 0px;display: block;}
    .rating-desc{font-size: 20px;
    margin-top: 10px;
    text-transform: capitalize;}
    /*.skill-rating-cont{
	display: flex;
    margin-top: 12px;
    width: 80%;
    }
    .skill-rating-cont li {
    list-style: none;
    background-color: #eaebef;
    width: 100%;
    height: 10px;
    transform: skew(-25deg);
    margin-bottom: 2px;
    margin-right: 8px;
	}
 	.skill-rating-cont li.active {background-color: #b21f25;}*/
 	.main-details{
	 	/*padding-left: 25px;*/
 	}
 	.common-break{
 		display: block;
 	}
 	.website-social-label{
 		list-style: none;
 	}
 	.skill-rating-cont{
	display: block;
    margin-top: 12px;
    width: 80%;
    }
    .skill-rating-cont div {
    list-style: none;
    background-color: #eaebef;
    width: 8px;
    height: 10px;
    transform: skew(-25deg);
    margin-bottom: 2px;
    margin-right: 8px;
    display: inline-block;
	}
 	.skill-rating-cont div.active {background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
 	.profile-font{
 		font-size: 14px;
 	}
 	.other-details{
 		font-size: 12px;
 	}
 	.website-lnk{
 		color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
 		text-decoration: none;
 	}
 	.tokyo-cont p{
        word-break: break-word;
        margin-bottom: 10px;
    }
    .n-svg-img{height: 12px;width: 12px;fill: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
    .employ-histry .internship-description-text p{
    	margin-bottom: 15px;
    }
	</style>	
</head>
<body>
<div class="tokyo-cont w-100 common-template-height">
	<table class="w-100">
		<tbody>
			@if(!empty($getPersonalDetails))
				<tr>
					<td colspan="2">
						<table class="w-90 m-auto">
							<tr>
								<td class="cont-det">
									@if(!empty($getResumeFullNameEmail))
									<div class="detail-cnt email-img email-text" id="Email_Text"><a href="mailto:someone@example.com" class="other-details">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<polygon points="339.392,258.624 512,367.744 512,144.896 		"/>
	</g>
</g>
<g>
	<g>
		<polygon points="0,144.896 0,367.744 172.608,258.624 		"/>
	</g>
</g>
<g>
	<g>
		<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>
	</g>
</g>
<g>
	<g>
		<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856
			L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
										{{--<img src="{{ asset('/frontend/images/resume_templates/tokyo-images/tokyo-mail.png') }}"/>--}}&nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a></div>
									@endif
								</td>
								<td class="cont-det">
									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
									<div class="detail-cnt address-img extra-details" id="ExtraDetails" class="other-details"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>{{--<img src="{{ asset('frontend/images/resume_templates/tokyo-images/tokyo-locationl.png') }}"/>--}}&nbsp;{{ implode(", ",$address) }}</div>
									@endif
								</td>
								<td class="cont-det">
									@if(!empty($getPersonalDetails['phone']))
									<div class="detail-cnt call-img contact-number" id="ContactNumber_Text" class="other-details"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 503.604 503.604" class="n-svg-img" style="enable-background:new 0 0 503.604 503.604;" xml:space="preserve">
<g>
	<g>
		<path d="M337.324,0H167.192c-28.924,0-53.5,23.584-53.5,52.5v398.664c0,28.916,24.056,52.44,52.98,52.44l170.412-0.184
			c28.92,0,52.58-23.528,52.58-52.448l0.248-398.5C389.908,23.452,366.364,0,337.324,0z M227.68,31.476h49.36
			c4.336,0,7.868,3.52,7.868,7.868c0,4.348-3.532,7.868-7.868,7.868h-49.36c-4.348,0-7.868-3.52-7.868-7.868
			C219.812,34.996,223.332,31.476,227.68,31.476z M198.02,33.98c2.916-2.912,8.224-2.952,11.136,0c1.46,1.456,2.324,3.5,2.324,5.588
			c0,2.048-0.864,4.088-2.324,5.548c-1.452,1.46-3.504,2.32-5.548,2.32c-2.084,0-4.088-0.86-5.588-2.32
			c-1.452-1.456-2.28-3.5-2.28-5.548C195.736,37.48,196.568,35.436,198.02,33.98z M250.772,488.008
			c-12.984,0-23.544-10.568-23.544-23.548c0-12.984,10.56-23.548,23.544-23.548s23.544,10.564,23.544,23.548
			C274.316,477.44,263.752,488.008,250.772,488.008z M365.488,424.908H141.232V74.756h224.256V424.908z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>{{--<img src="{{ asset('frontend/images/resume_templates/tokyo-images/tokyo-calll.png') }}"/>--}}&nbsp;{{ $getPersonalDetails['phone'] }}</div>
									@endif
								</td>
							</tr>
						</table>
					</td>
				</tr>
			@else
			<tr>
				<td colspan="2">
					<table class="w-90 m-auto">
						<tr>
							<td class="tokyo-extra-details">
								<div class="detail-cnt email-img" id="Email_Text" class="other-details"></div>
							</td>
							<td class="tokyo-extra-details">
								<div class="detail-cnt address-img extra-details" id="ExtraDetails" class="other-details"><span id="Address_Text"></span><span id="CityName_Text"></span><span id="PostalCode_Text"></span><span id="CountryName_Text"></span></div>
							</td>
							<td class="tokyo-extra-details">
								<div class="detail-cnt call-img" id="ContactNumber_Text" class="other-details"></div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			@endif
			<tr>
				<td colspan="2">
					<table class="w-90 m-auto detail-wrp">
						<tr>
							<td class="fst-cont">
								<table class="w-100">
									@if(!empty($getPersonalDetails))
		 								@if($getPersonalDetails['profile_summary'] != '')
		 								<tr>
											<td>
												<h2>Profile</h2>
												<p class="profile-font" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
											</td> 
										</tr>
		 								@endif
		 							@else
		 							<tr>
										<td>
											<h2 id="ProfileSummary" style="display: none;">Profile</h2>
											<p id="ProfessionalSummary_Text"></p>
										</td> 
									</tr>
		 							@endif
		 							@if(!empty($getCareers) && count($getCareers) > 0)
									<tr id="EmployerDetails_Text">
										<td>
											<h2 class="">Employment history</h2>
											<table class="w-100 employ-histry" id="EmployerDetails_new">
												@foreach($getCareers as $key => $employer_details)
												@php 
													$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
													$vars_a = array_filter(array($employer_details['uc_company_name'],$employer_details['uc_city']));
												@endphp
												<tr class="employer-add-more-section" id="EmployerAddMore_section_{{ $key }}">
													<td>
														<h4>{{ implode(", ", $vars_a) }}</h4>
														<h5>
														@if($employer_details['uc_is_present'] == 0)
															<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
														@else
															<span class="present-label">{{ implode(" - ", $vars) }}</span>
														@endif
														</h5>
														<div>
														@if(!empty($employer_details['career_description']))
															<div>
																<div class="f-18px mb-8px employer-description-text">{!! $employer_details['career_description'] !!}</div>
															</div>
														@endif
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
											<h2 class="employment-section" style="display: none;">Employment history</h2>
											<table class="w-100 employ-histry" id="EmployerDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getEducation) && count($getEducation) > 0)
									<tr id="EducationDetails_Text">
										<td>
											<h2 class="education-section">Education</h2>
											<table class="w-100 employ-histry" id="EducationDetails_new">
												@foreach($getEducation as $key => $education_details)
												@php 
													$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
													$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
												@endphp
													<tr id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
														<td>
															<h4>{{ implode(", ", $vars_a) }}</h4>
															<h5>
															@if($education_details['ue_is_present'] == 0)
																<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="education-label">{{ implode(" - ", $vars) }}</span>
															@endif
															</h5>
															<div>
															@if(!empty($education_details['education_description']))
																<div>
																	<div class="f-18px mb-8px education-description-text">{!! $education_details['education_description'] !!}</div>
																</div>
															@endif
															</div>
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
											<h2 class="courses-section">Courses</h2>
											<table class="w-100 employ-histry" id="CourseSectionDetails_new">
												@foreach($getCourse as $key => $course_details)
												@php 
													$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
													$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
												@endphp
													<tr class="course-section">
														<td>
															<h4>{{ implode(", ", $vars_a) }}</h4>
															<h5>
																@if($course_details['ucr_is_present'] == 0)
				                                                    <span class="course-end-date">{{ implode(" - ", $vars) }}</span>
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
									@else
									<tr id="CourseSectionDetails_Text">
										<td>
											<h2 class="courses-section" style="display: none;">Courses</h2>
											<table class="w-100 employ-histry" id="CourseSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
									<tr id="ExtraCurricularActivityDetails_Text">
										<td>
											<h2 class="activity-section">Extra-curricular Activity</h2>
											<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
												@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
												@php 
													$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
													$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
												@endphp
													<tr class="extra-curricular-add-more-section">
														<td>
															<h4>{{ implode(", ", $vars_a) }}</h4>
															<h5>
															@if($extra_curricular_section_details['ueca_is_present'] == 0)
																<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
															@else
																<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
															@endif
															</h5>
															<div>
															@if(!empty($extra_curricular_section_details['extra_curricular_description']))
																<div>
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
									@else
									<tr id="ExtraCurricularActivityDetails_Text">
										<td>
											<h2 class="activity-section" style="display: none;">Extra-curricular Activity</h2>
											<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif

									@if(!empty($getInternship) && count($getInternship) > 0) 
									<tr id="InternshipDetails_Text">
										<td>
											<h2 class="internship-section">Internships</h2>
											<table class="w-100 employ-histry" id="InternshipSectionDetails_new">
												@foreach($getInternship as $key => $internship_details)
												@php 
													$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
													$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
												@endphp
													<tr class="course-section">
														<td>
															<h4>{{ implode(", ", $vars_a) }}</h4>
															<h5>
																@if($internship_details['ui_is_present'] == 0)
				                                                    <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
				                                                @else
				                                                    <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
				                                                @endif
															</h5>
															<div>
															@if(!empty($internship_details['internship_description']))
																<div>
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
									@else
									<tr id="InternshipDetails_Text">
										<td>
											<h2 class="internship-section" style="display: none;">Internships</h2>
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
											<h2 class="custom-section">{{ $custom_heading }}</h2>
											<table class="w-100 employ-histry" id="CustomSectionDetails_new">
												@foreach($getCustomSection as $key => $custom_section_details)
												@php 
													$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
													$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
												@endphp
													<tr class="custom-section">
														<td>
															<h4>{{ implode(", ", $vars_a) }}</h4>
															<h5>
																@if($custom_section_details['ucs_is_present'] == 0)
				                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
				                                                @else
				                                                    <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
				                                                @endif
															</h5>
															<div>
															@if(!empty($custom_section_details['custom_description']))
																<div>
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
									@else
									<tr id="CustomSectionDetails_Text">
										<td>
											<h2 class="internship-section" style="display: none;">Internships</h2>
											<table class="w-100 employ-histry" id="CustomSectionDetails_new">
											</table>
										</td>
									</tr>
									@endif

									@if(!empty($getReference) && count($getReference) > 0) 
									<tr id="ReferenceDetails_Text">
										<td>
											<h2 class="reference-section">Reference</h2>
											<table class="w-100 employ-histry" id="ReferenceDetails_new">
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
															<h5>{{ implode(" | ", $vars_a) }}</h5>
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
											<h2 class="reference-section" style="display: none;">Reference</h2>
											<table class="w-100 employ-histry" id="ReferenceDetails_new">
											</table>
										</td>
									</tr>
									@endif
								</table>								
							</td>
							<td class="pl-50 vert-alg-top">
								<table class="w-100">
									@if(!empty($getPersonalDetails))
										@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['phone']) || !empty($getPersonalDetails['date_of_birth']) || !empty($getPersonalDetails['place_of_birth']))
									<tr>
										<td>
											<h2>Details</h2>
											<p class="extra-details common-break">
												<span class="address-text common-break">{{ $getPersonalDetails['address'] }}</span>
												<span class="city-name common-break">{{ $getPersonalDetails['city'] }}</span><span id="PostalCode_Text" class="postal-code">{{ $getPersonalDetails['postal_code'] }}</span>
												<span class="country-name common-break">{{ $getPersonalDetails['country'] }}</span>
												<span class="contact-number common-break">{{ $getPersonalDetails['phone'] }}</span>
												<a href="mailto:someone@example.com" class="mail-cnt">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</a>
											</p>
											@if($getPersonalDetails['date_of_birth'] != null || $getPersonalDetails['place_of_birth'] != null)
											<h5 class="date-place-of-birth mt-10p mb-0">Date/Current Location</h5>
											<p id="DateOfBirth_Text mt-0">{{ $getPersonalDetails['date_of_birth'] }}</p>
											<p id="PlaceOfBirth_Text mt-0">{{ $getPersonalDetails['place_of_birth'] }}</p>
											@endif
										</td>
									</tr>
										@endif
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
											<h5 class="date-place-of-birth mt-8p" style="display: none;">Date/Place of Birth</h5>
											<p id="DateOfBirth_Text mb-0"></p>
											<p id="PlaceOfBirth_Text"></p>
										</td>
									</tr>
									@endif
									@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
									<tr id="WebsiteSocialLinks_Text">
										<td>
											<h2>Links</h2>
											<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
												@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
													<tr id="WebsiteSocialLinksData_{{ $key }}>      
						                                <td class="pb-2">
						                            	<td>
								                            <li class="website-social-label">
												 				<a class="website-lnk" href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
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
											<h2 class="website-links-section" style="display: none;">Links</h2>
											<table class="w-100 employ-histry" id="WebsiteSocialLinks_new">
											</table>
										</td>
									</tr>
									@endif
									@if(!empty($getSkill) && count($getSkill) > 0) 
									<tr id="Skills_Text">
										<td>
											<h2>Skills</h2>
											<table class="w-100" id="SkillDetails_new">
												@foreach($getSkill as $key => $skill_details)
													<tr>
														<td>
															<h6 class="rating-desc skill-name">{{ $skill_details['us_skill'] }}</h6>
															<div class="skill-rating-cont skill-level">
																@if($skill_details['us_skill_level'] == 1)
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($skill_details['us_skill_level'] == 2)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($skill_details['us_skill_level'] == 3)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($skill_details['us_skill_level'] == 4)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																@else
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																@endif
															</div>
														</td>
													</tr>
												@endforeach
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
											<h2>Language</h2>
											<table class="w-100" id="LanguageDetails_new">
												@foreach($getLanguage as $key => $language_details)
													<tr>
														<td>
															<h6 class="rating-desc language-title">{{ $language_details['ul_language'] }}</h6>
															<div class="skill-rating-cont language-level">
																@if($language_details['ul_language_level_id'] == 1)
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($language_details['ul_language_level_id'] == 2)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($language_details['ul_language_level_id'] == 3)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																	<div class=""></div>
																@elseif($language_details['ul_language_level_id'] == 4)
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class=""></div>
																@else
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																	<div class="active"></div>
																@endif
															</div>
														</td>
													</tr>
												@endforeach
											</table>											
										</td>
									</tr>
									@else
									<tr id="LanguageDetails_Text">
										<td>
											<h2 class="language-section" style="display: none;">Language</h2>
											<table class="w-100" id="LanguageDetails_new">
											</table>											
										</td>
									</tr>
									@endif

									@if(!empty($getHobby))
										@if(!empty($getHobby['uh_hobby']))
		 								<tr id="HobbiesSection">
											<td>
												<h2 class="hobbies-section">Hobbies</h2>
												<p class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
											</td>
										</tr>
										@endif
		 							@else
									<tr id="HobbiesSection">
										<td>
											<h2 class="hobbies-section" style="display: none;">Hobbies</h2>
											<p class="hobbies" id="Hobbies_Text"></p>
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