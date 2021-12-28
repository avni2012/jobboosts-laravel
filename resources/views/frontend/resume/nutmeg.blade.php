<!DOCTYPE html>
<html>
<head>
	<title>Nutmeg</title>
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
    .user-det h2{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; margin-bottom: 25px;}
    .profile-im{height: 125px;width: 125px;object-fit: cover;border-radius: 70px;}
    .fst-cont{width: 190px;padding: 70px 5px 25px 50px;}
    .user-det{vertical-align: top;padding-top: 70px;}
    .user-det h1{font-size: 40px;font-weight: bold;}
    #nut-det-cont h5{margin-bottom: 10px;color: #5c5c5c;}
    .tit-pad{padding-left: 50px;padding-top: 25px;vertical-align: top;}
    .tit-pad h2{text-transform: uppercase;font-size: 20px;}
    .nutmeg_cont p{color: #908f8f;word-break: break-word;}
    .nutmeg_cont a{ color: #908f8f; text-decoration: none; }
    .sum-det{vertical-align: top;padding-top: 28px;/*padding-bottom: 30px;*/padding-right: 50px;}
    .det-c{padding-top: 15px;padding-right: 50px;}
    .nut-bor-top{border-top: 2px solid @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
    .f-pad-20{padding-top:10px;padding-bottom: 10px;}
    .car-cont-hed{width: 170px;}
    .nut-color{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
    .f-w-bold{font-weight: bold;}
    .w-co{max-width: 130px;}
    .desc-c{margin-left: 18px;}
    .desc-c li{color: #908f8f;}
    .desc-c li:nth-last-child {margin-bottom: 40px;}
    .ver-alg-mid{vertical-align: middle;}
    .ver-alg-top{vertical-align: top;}
    .n-svg-img{height: 12px;width: 12px;fill: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}  
    .mb-0{margin-bottom: 0;}  
	</style>
</head>
<body>
	<div class="nutmeg_cont">
		<table class="w-100">
			<tbody>
				@if(!empty($getPersonalDetails))
				<tr>
					<td class="fst-cont">
						@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
						<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="User name" class="profile-im">
						@else
						<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="User name" class="profile-im">
						@endif
					</td> 
					<td class="user-det"> 
						<h1 class="text-capitalize first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1> 
						<h2 class="f-22px" id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
						<table class="w-100" id="nut-det-cont">
							<tr>
								<td>
									@if(!empty($getPersonalDetails['phone']))
									<h5 class="f-16px call-img contact-number" id="ContactNumber_Text">{{--<img src="{{ asset('/frontend/images/resume_templates/nutmeg-images/nutmeg_mobile.png') }}" alt="Mobile">--}}<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
</svg> &nbsp;{{ $getPersonalDetails['phone'] }}</h5>
									@endif
								</td>
								<td>
									@if(!empty($getResumeFullNameEmail))
									<h5 class="f-16px email-img email-text" id="Email_Text">{{--<img src="{{ asset('/frontend/images/resume_templates/nutmeg-images/nutmeg_mail.png') }}" alt="Mail">--}}<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
									<a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">&nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a></h5>
									@endif</td>
							</tr> 
							<tr>
								<td>
									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
									<h5 class="f-16px call-img contact-number" id="ContactNumber_Text">{{--<img src="{{ asset('/frontend/images/resume_templates/nutmeg-images/nutmeg_mobile.png') }}" alt="Mobile">--}}
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="n-svg-img" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
											<g>
												<g>
													<path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5
														c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021
														C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333
														s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z"></path>
												</g>
											</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
											</svg> &nbsp;{{ implode(", ",$address) }}</h5>
									@endif
								</td>
								<td>
									@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
										@php 
											$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
										@endphp
									<h5 class="f-16px email-img email-text" id="Email_Text">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="n-svg-img" width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
<g>
	<path d="M516.316,337.52l94.233,193.581c3.832,7.873-0.196,14.314-8.952,14.314H10.402c-8.756,0-12.785-6.441-8.952-14.314
		L95.684,337.52c1.499-3.079,5.528-5.599,8.952-5.599h80.801c2.49,0,5.853,1.559,7.483,3.442
		c5.482,6.335,11.066,12.524,16.634,18.65c5.288,5.815,10.604,11.706,15.878,17.735h-95.891c-3.425,0-7.454,2.519-8.952,5.599
		L58.163,505.589h495.67l-62.421-128.242c-1.498-3.08-5.527-5.599-8.953-5.599h-96.108c5.273-6.029,10.591-11.92,15.879-17.735
		c5.585-6.144,11.2-12.321,16.695-18.658c1.628-1.878,4.984-3.434,7.47-3.434h80.971
		C510.789,331.921,514.817,334.439,516.316,337.52z M444.541,205.228c0,105.776-88.058,125.614-129.472,227.265
		c-3.365,8.26-14.994,8.218-18.36-0.04c-37.359-91.651-112.638-116.784-127.041-198.432
		c-14.181-80.379,41.471-159.115,122.729-166.796C375.037,59.413,444.541,124.204,444.541,205.228z M379.114,205.228
		c0-40.436-32.779-73.216-73.216-73.216s-73.216,32.78-73.216,73.216c0,40.437,32.779,73.216,73.216,73.216
		S379.114,245.665,379.114,205.228z"/>
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
</svg> &nbsp;{{ implode(", ",$location) }}</h5>
									@endif
								</td>
							</tr>
						</table>
					</td>
				</tr> 
				@else
				<tr class="name-section">
					<td class="fst-cont">
						<img src="https://images.pexels.com/photos/789535/pexels-photo-789535.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=512&w=512" alt="User name" class="profile-im">
					</td> 
					<td class="user-det profile-name main-details">
						<h1><span id="FirstName_Text" class="first-name"></span> <span id="LastName_Text" class="last-name"></span></h1>
						<h2 id="JobTitle_Text"></h2>
					</td>
				</tr>
				@endif
				@if(!empty($getPersonalDetails))
		 			@if($getPersonalDetails['profile_summary'] != '')
						<tr>
							<td class="tit-pad">
								<h2>Summary</h2>
							</td>
							<td class="sum-det">
								<p id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
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
				<tr>
					<td class="tit-pad">
						<h2 class="employment-section">Career</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="EmployerDetails_new">
							@foreach($getCareers as $key => $employer_details)
							@php 
								$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
									@if($employer_details['uc_is_present'] == 0)
										<span class="present-label">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="present-label">{{ implode(" - ", $vars) }}</span>
									@endif
									</h4>
								</td>
								<td class="f-pad-20">
									<h4 class="text-upper f-18px f-w-bold"><span class="employer-job-title">{{ $employer_details['uc_job_title'] }}</span></h4>
								</td>
							</tr> 
							@php 
								$vars_a = array_filter(array($employer_details['uc_company_name'],$employer_details['uc_city']));
							@endphp
							<tr>
								<td class="ver-alg-top">
									<p class="w-co">
										{{ implode(", ", $vars_a) }}
									</p>
								</td>
								<td>
									@if(!empty($employer_details['career_description']))
									<div class="desc-c">										
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
						<td class="tit-pad"><h2 class="employment-section" style="display: none;">Career</h2></td>
						<td class="det-c">
							<table class="w-100 employ-histry" id="EmployerDetails_new">
							</table>
						</td>
					</tr>
				@endif
				@if(!empty($getEducation) && count($getEducation) > 0)
				<tr id="EducationDetails_Text">
					<td class="tit-pad">
						<h2 class="education-section">Education</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="EducationDetails_new">
							@foreach($getEducation as $key => $education_details)
							@php 
								$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
										@if($education_details['ue_is_present'] == 0)
											<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
										@else
											<span class="education-label">{{ implode(" - ", $vars) }}</span>
										@endif
									</h4>
								</td>
								<td class="f-pad-20"><h4 class="text-upper f-18px f-w-bold"><span class="education-degree">{{ $education_details['ue_degree'] }}</span></h4></td>
							</tr> 
							@php 
								$vars_a = array_filter(array($education_details['ue_school_name'],$education_details['ue_city']));
							@endphp
							<tr>
								<td class="ver-alg-top">
									<p class="w-co">
										{{ implode(", ", $vars_a) }}
									</p>
								</td>
								<td>
									@if(!empty($education_details['education_description']))
									<div class="desc-c">
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
						<td class="tit-pad">
							<h2 class="education-section" style="display: none;">Education</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="EducationDetails_new">
							</table>
						</td>
					</tr>
				@endif
				@if(!empty($getSkill) && count($getSkill) > 0) 
					<tr id="Skills_Text">
						<td class="tit-pad">
							<h2 class="skill-section">Skills</h2>
						</td>
						<td class="sum-det">
							<table class="w-100 nut-bor-top">
							<tr><td class="f-pad-20 car-cont-hed"> <p class="rating-desc skill-name">
								@php  $str = ''; @endphp
							@foreach($getSkill as $key => $skill_details)
							@php $str = ($str == '' ? '' : $str . ', ') . $skill_details['us_skill'] @endphp
							@endforeach
							{{ $str }}							
							</p></td></tr>
							</table>
						</td>
					</tr>
				@else
					<tr id="Skills_Text">
						<td class="tit-pad">
							<h2 class="skill-section" style="display: none;">Skills</h2>
						</td>
						<td class="sum-det">
							<p class="rating-desc skill-name"></p>											
						</td>
					</tr>
				@endif
				@if(!empty($getCourse) && count($getCourse) > 0) 
				<tr id="CourseSectionDetails_Text">
					<td class="tit-pad">
						<h2>Courses</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="CourseSectionDetails_new">
							@foreach($getCourse as $key => $course_details)
							@php 
								$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
									@if($course_details['ucr_is_present'] == 0)
										<span class="course-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="course-present-label">{{ implode(" - ", $vars) }}</span>
									@endif
									</h4>
								</td>
								<td class="f-pad-20"><h4 class="text-upper f-18px f-w-bold"><span class="course-title">{{ $course_details['ucr_course_name'] }}</span></h4></td>
							</tr> 
							<tr>
								<td class="ver-alg-top">
									<p class="w-co"><span class="institution-name">{{ $course_details['ucr_institute'] }}</span></p>
								</td>
								<td>
									
								</td>
							</tr>
							@endforeach
							 
						</table>
					</td>
				</tr>
				@else
					<tr id="CourseSectionDetails_Text">
						<td class="tit-pad" >
							<h2 style="display: none;">Courses</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="CourseSectionDetails_new">
							</table>
						</td>
					</tr>
				@endif
				@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
				<tr id="WebsiteSocialLinks_Text">
						<td class="tit-pad">
							<h2 class="website-links-section">Links</h2>
						</td>
						<td class="sum-det">
							<table class="w-100 nut-bor-top">
							<tr><td class="f-pad-20 car-cont-hed">
							<p class="rating-desc skill-name">
								@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
									<span class="website-social-label">
						 				<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a>
					 				</span>
					 			@endforeach						
							</p>
							</td></tr></table>
						</td>
					</tr>
				@else
					<tr id="WebsiteSocialLinks_Text">
						<td class="tit-pad">
							<h2 class="website-links-section" style="display: none;">Links</h2>
						</td>
						<td class="sum-det">
							<p class="rating-desc skill-name"></p>									
						</td>
					</tr>
				@endif

				@if(!empty($getLanguage) && count($getLanguage) > 0) 
				<tr id="LanguageDetails_Text">
						<td class="tit-pad">
							<h2 class="language-section">Language</h2>
						</td>
						<td class="sum-det">
							<table class="w-100 nut-bor-top">
							<tr><td class="f-pad-20 car-cont-hed">
							<p class="rating-desc skill-name mb-0">
								@php  $str = ''; @endphp
								@foreach($getLanguage as $key => $language_details)
								@php $str = ($str == '' ? '' : $str . ', ') . $language_details['ul_language'] @endphp
								@endforeach
								{{ $str }}							
							</p>
							</td></tr></table>
						</td>
					</tr>
				@else
					<tr id="LanguageDetails_Text">
						<td class="tit-pad">
							<h2 class="language-section" style="display: none;">Language</h2>
						</td>
						<td class="sum-det">
							<p class="rating-desc skill-name"></p>											
						</td>
					</tr>
				@endif
				@if(!empty($getHobby))
					@if(!empty($getHobby['uh_hobby']))
					<tr id="HobbiesSection">
						<td class="tit-pad">
							<h2 class="hobbies-section">Hobbies</h2>
						</td>
						<td class="sum-det">
							<table class="w-100 nut-bor-top">
							<tr><td class="f-pad-20 car-cont-hed">
							<p class="rating-desc skill-name" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
							</td></tr></table>
						</td>
					</tr>
					@endif
				@else
				<tr id="HobbiesSection">
						<td class="tit-pad">
							<h2 class="hobbies-section" style="display: none;">Hobbies</h2>
						</td>
						<td class="sum-det">
							<p class="rating-desc skill-name"></p>									
						</td>
					</tr>
				@endif

				@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
				<tr id="ExtraCurricularActivityDetails_Text">
					<td class="tit-pad">
						<h2 class="activity-section">Extra-curricular Activity</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="ExtraCurricularSectionDetails_new">
							@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
							@php 
								$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
									@if($extra_curricular_section_details['ueca_is_present'] == 0)
										<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
									@endif
									</h4>
								</td>
								<td class="f-pad-20">
									<h4 class="text-upper f-18px f-w-bold"><span class="function-title">{{ $extra_curricular_section_details['ueca_function_title'] }}</span></h4>
								</td>
							</tr> 
							@php 
								$vars_a = array_filter(array($extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
							@endphp
							<tr>
								<td class="ver-alg-top">
									<p class="w-co">
										{{ implode(", ", $vars_a) }}
									</p>
								</td>
								<td>
									@if(!empty($extra_curricular_section_details['extra_curricular_description']))
									<div class="desc-c">
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
						<td class="tit-pad" >
							<h2 style="display: none;">Extra-curricular Activity</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
							</table>
						</td>
					</tr>
				@endif

				@if(!empty($getInternship) && count($getInternship) > 0) 
				<tr id="InternshipDetails_Text">
					<td class="tit-pad">
						<h2>Internships</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="CourseSectionDetails_new">
							@foreach($getInternship as $key => $internship_details)
							@php 
								$vars = array_filter(array($internship_details['ui_start_date'], $internship_details['ui_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
									@if($internship_details['ui_is_present'] == 0)
										<span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
									@endif
									</h4>
								</td>
								<td class="f-pad-20"><h4 class="text-upper f-18px f-w-bold"><span class="internship-job-title">{{ $internship_details['ui_job_title'] }}</span></h4></td>
							</tr> 
							@php 
								$vars_a = array_filter(array($internship_details['ui_employer'],$internship_details['ui_city']));
							@endphp
							<tr>
								<td class="ver-alg-top">
									<p class="w-co">
										{{ implode(", ", $vars_a) }}
									</p>
								</td>
								<td>
									@if(!empty($internship_details['internship_description']))
									<div class="desc-c">
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
						<td class="tit-pad" >
							<h2 style="display: none;">Internships</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="CourseSectionDetails_new">
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
					<td class="tit-pad">
						<h2 class="activity-section">{{ $custom_heading }}</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="CustomSectionDetails_new">
							@foreach($getCustomSection as $key => $custom_section_details)
							@php 
								$vars = array_filter(array($custom_section_details['ucs_start_date'], $custom_section_details['ucs_end_date']));
							@endphp
							<tr>
								<td class="f-pad-20 car-cont-hed">
									<h4 class="text-upper f-18px nut-color">
									@if($custom_section_details['ucs_is_present'] == 0)
										<span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
									@else
										<span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
									@endif
									</h4>
								</td>
								<td class="f-pad-20">
									<h4 class="text-upper f-18px f-w-bold"><span class="custom-job-title">{{ $custom_section_details['ucs_title'] }}</span></h4>
								</td>
							</tr> 
							<tr>
								<td class="ver-alg-top">
									<p class="w-co"><span class="custom-section-city">{{ $custom_section_details['ucs_city'] }}</span></p>
								</td>
								<td>
									@if(!empty($custom_section_details['custom_description']))
									<div class="desc-c">
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
						<td class="tit-pad" >
							<h2 style="display: none;">Custom</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="CustomSectionDetails_new">
							</table>
						</td>
					</tr>
				@endif


				@if(!empty($getReference) && count($getReference) > 0) 
				<tr id="ReferenceDetails_Text">
					<td class="tit-pad">
						<h2 class="activity-section">Reference</h2>
					</td>
					<td class="det-c">
						<table class="w-100 nut-bor-top" id="ReferenceDetails_new">
							@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
								<p>I'd like to hide references and make them available only upon request</p>
							@else
							@foreach($getReference as $key => $reference_details)
							@php 
								$vars = array_filter(array($reference_details['ur_refer_full_name'], $reference_details['ur_refer_company_name']));
								$vars_a = array_filter(array($reference_details['ur_refer_email'], $reference_details['ur_refer_phone']));
							@endphp
							<tr class="custom-section">
								<td class="f-pad-20">
									<h4>
										{{ implode(" from ", $vars) }}
									</h4>
									<h5>
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
						<td class="tit-pad" >
							<h2 style="display: none;">Reference</h2>
						</td>
						<td>
							<table class="w-100 employ-histry" id="ReferenceDetails_new">
							</table>
						</td>
					</tr>
				@endif

			</tbody> 
		</table>
	</div>
</body>
</html>