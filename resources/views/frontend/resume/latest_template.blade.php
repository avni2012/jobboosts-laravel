
<!DOCTYPE html>
 <html>
 <head>
 	<title>Table format</title>
 	<style type="text/css">
 		body{color: #444;}
 		body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, button, textarea, p, blockquote, th, td {
		    margin: 0;
		    padding: 0;
		}
		h1, h2, h3, h4, h5, h6 {
		    font-weight: normal;
		}
 		.main-tabl{width: 100%;margin: auto;background-color: #f5f5f5;border-top: 8px solid #666;border-bottom: 2px solid #666}
 		table{border-collapse: collapse;}
 		.bord-btm{border-bottom: 1px solid #ccc;} 
 		.w-100{width: 100%;}
 		.w-70p{width: 70%;}
 		.w-25p{width: 25%;}
 		.pl-8{padding-left: 8%;}
 		.pr-8{padding-right: 8%;}
 		.f-16px{font-size: 16px;}
 		.f-18px{font-size: 18px;}
 		.pr-10{padding-right: 10rem;}
 		.pt-2r{padding-top: 2rem;}
 		.pt-3r{padding-top: 3rem;}
 		.pb-2r{padding-bottom: 2rem;}
 		.mr-3r{margin-right: 3rem;}
 		.ver-alg-top{vertical-align: top;}
 		.main-heading{max-width: 250px; }
 		h1, h2, h3, h4 {
		    color: #333;
		}
		h1 {
		    font-size: 36px;
		    text-transform: uppercase;
		    letter-spacing: 3px;
		}
		a#pdf {
		    display: block;
		    float: left;
		    background: #666;
		    color: white;
		    padding: 6px;
		    margin-bottom: 6px;
		    text-decoration: none;
		}
		a {
		    color: #990003;
		}
		.mal-con, .f-16px {
		    font-size: 16px;
		}
		.mnsev h2 {
		    text-transform: uppercase;
		    letter-spacing: 2px;
		}

		.first h2 {
		    font-style: italic;
		    font-size: 22px;
		}

		.first h5 {
		    font-style: italic;
		    font-size: 22px;
		}

		.talent h2 {
		    margin-bottom: 6px;
		    font-size: 22px;
		}
		.talent p {
		    font-size: 100%;
		    line-height: 18px;
		    padding-right: 3em;
		}
		.talent li {
		    line-height: 24px;
		    /*border-bottom: 1px solid #ccc;*/
		}		
		li {
		    list-style: none;
		}
		.last {
		    border: none;
		}
		.job{position: relative;}
		.job p {
		    margin: 0.75em 0 15px 0;
		    font-size: 13px;
		    line-height: 18px;
		    padding-right: 3em;
		}
		.job h2 {
		    font-size: 18px;
		}
		.job h3{
			font-size: 16px;
		}
		.job h4 {
		    position: absolute;
		    top: 0px;
    		right: 45px;
		}
		.ftrsec{text-align: center;padding-top: 5px;padding-bottom: 4rem;font-size: 12px;}
		.progress {		  
		  padding:0;
		  width:50%;
		  height:20px;
		  overflow:hidden;
		  background:#e5e5e5;
		  border-radius:6px;
		}

		.bar {
			position:relative;
		  float:left;
		  min-width:1%;
		  height:100%;
		  background:cornflowerblue;
		  width: 0%;
		  transition: all 0.8s linear 1s;
		}

		.percent {
			position:absolute;
		  top:50%;
		  left:50%;
		  transform:translate(-50%,-50%);
		  margin:0;
		  font-family:tahoma,arial,helvetica;
		  font-size:12px;
		  color:white;
		}

		.skill-bar-css{
			height: 2px; 
			background-color: black; 
			border-radius: 50px;
		}
		.profile p{
			text-align: justify;
    		padding-right: 2rem;	
		}
		.talent h6{
			font-size: 16px;
		}
 	</style> 
 </head>
 <body> 	
 	<div class="cont-wrp common-template-height" style="width: 100%; overflow: hidden;">
		 <table class="main-tabl">
		 	<tbody>	
		 		@if(!empty($formData))
		 		<tr>	
		 			@if(!empty($formData['first_name']) || !empty($formData['last_name']) || !empty($formData['job_title']) || !empty($formData['email']) || !empty($formData['phone']))
		 				<td class="bord-btm w-70p pl-8 pt-3r pb-2r first mnsev main-heading">
			 				<h1><span id="FirstName_Text" class="first-name">{{ $formData['first_name'] }}</span>&nbsp;<span id="LastName_Text" class="last-name">{{ $formData['last_name'] }}</span></h1>
			 				<h2 id="JobTitle_Text">{{ $formData['job_title'] }}</h2>
			 			</td>
			 			<td class="bord-btm pt-3r pb-2r">
			 				<h3 class="mr-3r" id="Email_Text"><a href="mailto:name@yourdomain.com" class="mal-con">{{ $formData['email'] }}</a></h3>
			 				<h3 class="f-16px" id="ContactNumber_Text">{{ $formData['phone'] }}</h3>
			 			</td>
		 			@endif
		 		</tr>
		 		@else
		 		<tr id="MainHeading">
		 			<td class="bord-btm w-70p pl-8 pt-3r pb-2r first mnsev main-heading profile-main">
			 			<h1>
			 				<span id="FirstName_Text" class="first-name"></span>&nbsp;<span id="LastName_Text" class="last-name"></span>
			 			</h1>
			 			<h2 id="JobTitle_Text"></h2>
			 		</td>
			 		<td class="bord-btm pt-3r pb-2r profile-main">
		 				<h3 class="mr-3r" id="Email_Text">
		 					<a href="mailto:name@yourdomain.com" class="mal-con"></a>
		 				</h3>
		 				<h3 class="f-16px" id="ContactNumber_Text"></h3>
		 			</td>
		 		</tr>
		 		@endif
				@if(!empty($formData))
		 			@if($professionalSummary != '')
			 		<tr>
				 		<td colspan="2">
				 			<table class="w-100">
				 				<tr>
				 					<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
							 			{{-- <h2>Profile</h2> --}}
							 			<h5>Profile</h5>
							 		</td>
							 		<td class="bord-btm pt-2r pb-2r">
							 			<p class="enlarge pr-10 f-18px profile" id="ProfessionalSummary_Text">
							 					{!! $professionalSummary !!}
							 			</p>
							 		</td>
				 				</tr>
				 			</table>
				 		</td>
			 		</tr>
					@endif
		 		@else
		 		<tr id="ProfileSummary">
			 		<td colspan="2">
			 			<table class="w-100 profile-summary" style="display: none;">
			 				<tr>
			 					<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
						 			{{-- <h2>Profile</h2> --}}
						 			<h5>Profile</h5>
						 		</td>
						 		<td class="bord-btm pt-2r pb-2r profile-summary">
						 			<p class="enlarge pr-10 f-18px profile" id="ProfessionalSummary_Text">
						 			</p>
						 		</td>
			 				</tr>
			 			</table>
			 		</td>
		 		</tr>
		 		@endif
		 		@if(!empty($formData) && !empty($skills_arr['skill_details'])) 
		 		<tr id="Skills_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				{{-- <h2>Skills</h2> --}}
					 				<h5>Skills</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="SkillDetails_new">
											@foreach($skills_arr['skill_details'] as $key => $skill_details)
						 					<tr>
												<td class="pt-2r pb-2r ver-alg-top skill-add-more-section" id="SkillAddMore_section_{{ $key }}" >
									 				<div class="talent">
														<h6 id="SkillName_{{ $key }}" class="skill-name">{{ $skill_details['skill'] }}</h6>
														<div id="show_bar_{{ $key }}" class="skill-level">
															@if($skill_details['skill_level'] == 1)
																<div style="width: 20%;" class="skill-level-bar skill-bar-css" id="show-skill-bar_{{ $key }}"></div>
															@elseif($skill_details['skill_level'] == 2)
																<div style="width: 40%;" class="skill-level-bar skill-bar-css" id="show-skill-bar_{{ $key }}"></div>
															@elseif($skill_details['skill_level'] == 3)
																<div style="width: 60%;" class="skill-level-bar skill-bar-css" id="show-skill-bar_{{ $key }}"></div>
															@elseif($skill_details['skill_level'] == 4)
																<div style="width: 80%;" class="skill-level-bar skill-bar-css" id="show-skill-bar_{{ $key }}"></div>
															@else
																<div style="width: 100%;" class="skill-level-bar skill-bar-css" id="show-skill-bar_{{ $key }}"></div>
															@endif
														</div>
													</div>
									 			</td>
						 					</tr>
											@endforeach
					 				</table>
					 			</td>					 			
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="Skills_Text">
		 			<td colspan="2">
		 				<table class="w-100 skill-section" style="display: none;">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				{{-- <h2>Skills</h2> --}}
					 				<h5>Skills</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
							 		<table class="w-100" id="SkillDetails_new">
							 		</table>
							 	</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
				@endif
				@if(!empty($formData) && !empty($website_social_link_arr['website_social_links_details']))
		 		<tr id="WebsiteSocialLinks_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				{{-- <h2>Links</h2> --}}
					 				<h5>Links</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100">
					 					<tr id="WebsiteSocialLinks_new">
												@foreach($website_social_link_arr['website_social_links_details'] as $key => $website_social_links_details)
												<td class="pt-2r pb-2r ver-alg-top" id="WebsiteSocialLinksData_{{ $key }}">
						 							<ul class="talent">
						 								<li id="WebsiteSocialLabel_{{ $key }}" class="website-social-label">
						 									<a href="{{ $website_social_links_details['website_social_link'] }}">
						 										{{ $website_social_links_details['website_social_label'] }}
						 									</a>
						 								</li>
														{{-- <li id="WebsiteSocialLabel_{{ $key }}" class="website-social-label">{{ $website_social_links_details['website_social_label'] }}</li>
														<li id="WebsiteSocialLink_{{ $key }}" class="website-social-link">{{ $website_social_links_details['website_social_link'] }}</li> --}}
													</ul>
									 			</td>
												@endforeach
					 					</tr>
					 				</table>
					 			</td>
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="WebsiteSocialLinks_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top website-links-section" style="display: none;">
					 				{{-- <h2>Links</h2> --}}
					 				<h5>Links</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100">
					 					<tr id="WebsiteSocialLinks_new">
					 					</tr>
					 				</table>
					 			</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
		 		@endif
				@if(!empty($formData) && !empty($employment_arr['employer_details'])) 
		 		<tr id="EmployerDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr> {{-- rowspan="3" --}}
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				{{-- <h2>Employment History</h2> --}}
					 				<h5>Employment History</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="EmployerDetails_new">
											@foreach($employment_arr['employer_details'] as $key => $employer_details)
					 							<tr>
					 								<td class="pt-2r pb-2r ver-alg-top">
														<div class="job" id="EmployerAddMore_section_{{ $key }}" class="employer-add-more-section">
															<h2 id="employer_name_{{ $key }}" class="employer">{{ $employer_details['employer'] }}</h2>
															<h3 id="job_title_{{ $key }}" class="employer-job-title">{{ $employer_details['employer_job_title'] }}</h3>
															{{-- <p id="employercity_{{ $key }}" class="employer-city">{{ $employer_details['employer_city'] }}</h4>
															</p> --}}
															<h4>
																<span class="employer-start-date" id="employer_startdate_{{ $key }}">{{ $employer_details['employer_start_date'] }}</span>
																@if(!empty($employer_details['employer_end_date']))
																	-&nbsp;<span class="employer-end-date" id="employer_enddate_{{ $key }}">{{ $employer_details['employer_end_date'] }}</span>
																@endif
																@if(!empty($employer_details['present_label']))
																	-&nbsp;<span class="present-label" id="PresentLabel_{{ $key }}">{{ $employer_details['present_label'] }}</span>
																@endif
															</h4>
															<p id="employerdescription_{{ $key }}" class="employer-description-text">{!! $employer_details['emp_description'] !!}</p>
														</div>
													</td>
												</tr>
												@endforeach
					 				</table>
					 			</td>	
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="EmployerDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr> {{-- rowspan="3" --}}
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top employment-section" style="display: none;">
					 				{{-- <h2>Employment History</h2> --}}
					 				<h5>Employment History</h5>``
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="EmployerDetails_new">
					 				</table>
					 			</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
		 		@endif
				@if(!empty($formData) && !empty($education_arr['education_details'])) 
		 		<tr id="EducationDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				{{-- <h2>Education</h2> --}}
					 				<h5>Education</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100">
					 					<tr id="EducationDetails_new">
												@foreach($education_arr['education_details'] as $key => $education_details)
													<td class="pt-3r pb-2r" id="EducationAddMore_section_{{ $key }}" class="education-add-more-section">
										 				<h2 class="f-18px education-school" id="educationSchool_{{ $key }}">{{ $education_details['education_school'] }}</h2>
										 				<h3 class="f-16px education-degree" id="educationDegree_{{ $key }}">{{ $education_details['education_degree'] }}</h3>
										 				<span id="educationStartDate_{{ $key }}" class="education-start-date">{{ $education_details['education_start_date'] }}</span>
										 				@if(!empty($education_details['education_end_date']))
															-&nbsp;<span class="education-end-date" id="educationEndDate_{{ $key }}">{{ $education_details['education_end_date'] }}</span>
														@endif
														@if(!empty($education_details['education_label']))
															-&nbsp;<span class="education-label" id="education_label_{{ $key }}">{{ $education_details['education_label'] }}</span>
														@endif
										 				<p id="educationDescription_{{ $key }}" class="education-description-text">{!! $education_details['education_desc'] !!}</p>
										 			</td>
												@endforeach
					 					</tr>
					 				</table>
					 			</td>
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="EducationDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top education-section" style="display: none;">
					 				{{-- <h2>Education</h2> --}}
					 				<h5>Education</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100">
					 					<tr id="EducationDetails_new">
					 					</tr>
					 				</table>
					 			</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
		 		@endif
		 		<tr id="CustomSectionDetails_Text">
		 			<td colspan="2" id="CustomSectionDetails_new">
		 				@if(!empty($formData) && !empty($custom_section_arr['custom_section_details'])) 
							@foreach($custom_section_arr['custom_section_details'] as $key => $custom_section_details)
				 				<table class="w-100">
				 					<tr> 
										<td class="bord-btm w-25p pl-8 pb-2r first ver-alg-top custom-add-more-section" id="CustomSectionAddMore_section_{{ $key }}">
											<h5 class="custom-section-heading">{{ $custom_section_details['custom_section_heading'] }}</h5>
										</td>
										<td class="bord-btm ver-alg-top">
											<table class="w-100">
												<tr>
													<td class="pt-2r pb-2r ver-alg-top"> 
														<div class="job">
															<h2 class="custom-section-city">{{ $custom_section_details['custom_section_city'] }}</h2>
															<h3 class="custom-job-title">{{ $custom_section_details['custom_title'] }}</h3>
															<h4>
																<span class="custom-start-date">{{ $custom_section_details['custom_start_date'] }}</span>
																@if(!empty($custom_section_details['custom_end_date']))
																	-&nbsp;<span class="custom-end-date">{{ $custom_section_details['custom_end_date'] }}</span>
																@endif
																@if(!empty($custom_section_details['custom_present_label']))
																	-&nbsp;<span class="custom-present-label">{{ $custom_section_details['custom_present_label'] }}</span>
																@endif
															</h4>
															<p class="custom-description-text">{!! $custom_section_details['custom_section_description'] !!}</p>
														</div>
													</td>
												</tr>
											</table>
										</td>
		 							</tr>
		 						</table>
		 					@endforeach
						@endif
		 			</td> 		 			
		 		</tr>
				@if(!empty($formData) && !empty($course_arr['course_details'])) 
		 		<tr id="CourseSectionDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				<h5>Courses</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="CourseSectionDetails_new">
											@foreach($course_arr['course_details'] as $key => $course_details)
												<tr class="course-section">
								 					<td class="bord-btm pt-2r pb-2r ver-alg-top">
										 				<div class="job">
															<h2 class="course-title">{{ $course_details['course_title'] }}</h2>
															<h3 class="institution-name">{{ $course_details['institution'] }}</h3>
															<h4>
																<span class="course-start-date">{{ $course_details['course_start_date'] }}</span>
																@if(!empty($course_details['course_end_date']))
																	-&nbsp;<span class="course-end-date">{{ $course_details['course_end_date'] }}</span>
																@endif
																@if(!empty($course_details['course_present_label']))
																	-&nbsp;<span class="present-label">{{ $course_details['course_present_label'] }}</span>
																@endif
															</h4>
														</div>
										 			</td>
										 		</tr>
											@endforeach
					 				</table>
					 			</td>	
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="CourseSectionDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top courses-section" style="display: none;">
					 				<h5>Courses</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="CourseSectionDetails_new">
					 				</table>
					 			</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
		 		@endif
				@if(!empty($formData) && !empty($extra_curricular_section_arr['extra_curricular_section_details'])) 
		 		<tr id="ExtraCurricularActivityDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				<h5>Extra-curricular Activity</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="ExtraCurricularSectionDetails_new">
											@foreach($extra_curricular_section_arr['extra_curricular_section_details'] as $key => $extra_curricular_section_details)
												<tr class="course-section">
								 					<td class="bord-btm pt-2r pb-2r ver-alg-top">
										 				<div class="job">
															<h2 class="extra-curricular-section-employer">{{ $extra_curricular_section_details['extra_curricular_section_employer'] }}</h2>
															<h3 class="function-title">{{ $extra_curricular_section_details['function_title'] }}</h3>
															<h4>
																<span class="extra-curricular-start-date">{{ $extra_curricular_section_details['extra_curricular_start_date'] }}</span>
																@if(!empty($extra_curricular_section_details['extra_curricular_end_date']))
																	-&nbsp;<span class="extra-curricular-end-date">{{ $extra_curricular_section_details['extra_curricular_end_date'] }}</span>
																@endif
																@if(!empty($extra_curricular_section_details['extra_curricular_present_label']))
																	-&nbsp;<span class="extra-curricular-present-label">{{ $extra_curricular_section_details['extra_curricular_present_label'] }}</span>
																@endif
															</h4>
															<p class="extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_section_description'] !!}</p>
														</div>
										 			</td>
										 		</tr>
											@endforeach
					 				</table>
					 			</td>	
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr>
		 		@else
		 		<tr id="ExtraCurricularActivityDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr>
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top activity-section" style="display: none;">
					 				<h5>Extra-curricular Activity</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="ExtraCurricularSectionDetails_new">
					 				</table>
					 			</td>
					 		</tr>
					 	</table>
					</td>
				</tr>
		 		@endif
				@if(!empty($formData))
		 			@if(!empty($formData['hobbies']))
			 		<tr>
				 		<td colspan="2">
				 			<table class="w-100">
				 				<tr>
				 					<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
							 			<h5>Hobbies</h5>
							 		</td>
							 		<td class="bord-btm pt-2r pb-2r">
							 			<p class="enlarge pr-10 f-18px hobbies" id="Hobbies_Text">
							 				{{ $formData['hobbies'] }}
							 			</p>
							 		</td>
				 				</tr>
				 			</table>
				 		</td>
			 		</tr>
					@endif
				@else
				<tr id="HobbiesSection">
				 		<td colspan="2">
				 			<table class="w-100 hobbies-section" style="display: none;">
				 				<tr>
				 					<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
							 			<h5>Hobbies</h5>
							 		</td>
							 		<td class="bord-btm pt-2r pb-2r">
							 			<p class="enlarge pr-10 f-18px hobbies" id="Hobbies_Text">
							 		</td>
				 				</tr>
				 			</table>
				 		</td>
			 		</tr>
		 		@endif
		 		{{-- <tr id="InternshipDetails_Text">
		 			<td colspan="2">
		 				<table class="w-100">
		 					<tr> 
		 						<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
					 				<h5>Internships</h5>
					 			</td>
					 			<td class="bord-btm ver-alg-top">
					 				<table class="w-100" id="InternshipDetails_new">
					 				</table>
					 			</td>	
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr> --}}
		 		{{-- <tr>
					<td colspan="2">
						<table class="w-100">
							<tr>
								<td class="bord-btm w-25p pl-8 pt-3r pb-2r first">
									<h2>Process</h2>
								</td>
								<td class="bord-btm pt-3r pb-2r">
									<div class="progress">
										<div class="bar" style="width:35%">
										<p class="percent">35%</p>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr> --}}
		 		{{-- <tr>
		 			<td colspan="3">
		 				<table class="w-100">
		 					<tr>
		 						<td class="ftrsec">
					 				<p>Jonathan Doe — <a href="mailto:name@yourdomain.com">name@yourdomain.com</a> — (313) - 867-5309</p> 
					 			</td>					 			
		 					</tr>
		 				</table>
		 			</td> 		 			
		 		</tr> --}}
		 	</tbody>
		 </table>
 	</div>
 </body>
 </html> 