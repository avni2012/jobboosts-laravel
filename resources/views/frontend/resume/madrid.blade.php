
<!DOCTYPE html>
<html>
<head>
	<title>Madrid</title>
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
    table {
        border-collapse: collapse;
    }
    .w-100 {
        width: 100%;
    }
    .w-90 {
        width: 90%;
    }
    .w-50{width: 50%}
    .ver-alg-top{vertical-align: top;}
    .m-auto{margin: auto;}   
    .madri-profile-img{
    	height: 230px;
	    width: 230px;
	    object-fit: cover;
    }
    .w-230{width: 230px;}
    .user-se{
    background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
    {{--@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
    	border-left: 10px solid #fff;
    @endif--}}
    padding-left: 3rem;
    height: 234px;
    }
    .user-se h1{
    font-size: 56px;
    line-height: 0.8;
    text-transform: uppercase;
    font-weight: bold;
    }
    .user-se h2{
    font-weight: bold;
    margin-top: 5px;
    font-size: 22px;
    }
    .detail-cont h2{
    margin-top: 35px;
    background-color: #0d111a;
    color: #fff;
    display: inline-block;
    padding: 3px 10px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
    }
    .sub-tit{
    font-size: 20px;
    font-weight: bold;
    }
    p{font-size: 18px;}
    .cur-pos{
    text-transform: uppercase;
    color: #a8abb3;
    font-size: 14px;
    margin-top: 4px;
    margin-bottom: 10px;
    }
    .mb-12{margin-bottom: 12px;}
    .soc-con{
    color: #0d111a;
    font-size: 16px;
    margin-right: 15px;
    }
    .progress {		  
	 padding: 0;
    width: 100%;
    height: 8px;
    overflow: hidden;
    background: #e5e5e5;
	}

	.bar {
		position:relative;
	  float:left;
	  min-width:1%;
	  height:100%;
	  background:#0d111a;
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
	.skl-con {
	    width: 45%;
	    float: left;
	    padding-right: 3rem;
	    margin-bottom: 15px;
	}
	.skl-con h3{
	 font-size: 18px;
    margin-bottom: 5px;
    text-transform: capitalize;
	}
	.madrid-cont p{
            word-break: break-word;
    }
    .madrid-cont ul{margin-left:  15px;}
    .madrid-cont li{margin-bottom: 5px;}
    .madrid-cont li:last-child{margin-bottom: 25px;}
    .madrid-cont p{margin-bottom: 10px;}
	</style>

</head>
<body>
	<div class="madrid-cont">
		<table class="w-100">
			<tbody>
				
				@if(!empty($getPersonalDetails))
				<tr>
					<td colspan="2">
						<table class="w-90 m-auto detail-cont">
							<tr>
								<td>
									<h2>Details</h2>
									<table class="w-100">
										<tr>
											<td class="w-50 ver-alg-top">
												@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']) || !empty($getPersonalDetails['country']))
													@php 
														$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
													@endphp
												<h4 class="sub-tit">Contact</h4>
												<p>{{ implode(", ",$address) }}<br>
												@endif
													<a id="Email_Text">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_email'] }}@endif</a><br>
													@if(!empty($getPersonalDetails['phone'])){{ $getPersonalDetails['phone'] }}@endif
												</p>
											</td>
											<td class="w-50 ver-alg-top">
												@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
												<h4 class="sub-tit date-place-of-birth">Date/Current Location</h4>
												@endif
												<p id="DateOfBirth_Text">{{ $getPersonalDetails['date_of_birth'] }}<br>
												<span id="PlaceOfBirth_Text">{{ $getPersonalDetails['place_of_birth'] }}</span>
												</p>
											</td>
										</tr> 
									</table>
								</td>							
							</tr>
							@else
							<tr>
								<td>
									<h2>Details</h2>
									<table class="w-100">
										<tr>
											<td class="w-50 ver-alg-top">
												<h4 class="sub-tit">Contact</h4>
												<p class="extra-details other-details" id="ExtraDetails"><span id="Address_Text"></span><span id="CityName_Text"></span><span id="PostalCode_Text"></span><span id="CountryName_Text"></span><br>
													<a href="mailto:someone@example.com" id="Email_Text" class="other-details"></a><br>
													<span id="ContactNumber_Text" class="other-details"></span>
												</p>
											</td>
											<td class="w-50 ver-alg-top">
												<h4 class="sub-tit date-place-of-birth" style="display: none;">Date/Place of birth</h4>
		 										<p id="DateOfBirth_Text"><br>
													<span id="PlaceOfBirth_Text"></span>
												</p>
											</td>
										</tr> 
									</table>
								</td>							
							</tr>
							@endif
							@if(!empty($getPersonalDetails))
		 						@if($getPersonalDetails['profile_summary'] != '')
							<tr>
								<td>
									<h2>Profile</h2>				
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
							<tr id="EmployerDetails_Text">
								<td>
									<h2>Employment history</h2>		
									<table class="w-100" id="EmployerDetails_new">
										@foreach($getCareers as $key => $employer_details)
										@php 
											$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
											$vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name'],$employer_details['uc_city']));
										@endphp
										<tr class="employer-add-more-section" id="EmployerAddMore_section_{{ $key }}">
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos employer-start-date">
												@if($employer_details['uc_is_present'] == 0)
													<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="present-label">{{ implode(" - ", $vars) }}</span>
												@endif
												</h6>
												<p class="mb-12 employer-description-text">{!! $employer_details['career_description'] !!}</p>		
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
									<table class="w-100" id="EmployerDetails_new">
									</table>	
								</td>		
							</tr>
							@endif
							@if(!empty($getEducation) && count($getEducation) > 0)
							<tr id="EducationDetails_Text">
								<td>
									<h2 class="education-section">Education</h2>		
									<table class="w-100" id="EducationDetails_new">		
										@foreach($getEducation as $key => $education_details)	
										@php 
											$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
											$vars_a = array_filter(array($education_details['ue_degree'],$education_details['ue_school_name'],$education_details['ue_city']));
										@endphp			
										<tr>
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos education-start-date">
												@if($education_details['ue_is_present'] == 0)
													<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="education-label">{{ implode(" - ", $vars) }}</span>
												@endif
												</h6>
												<p class="mb-12 education-description-text">{!! $education_details['education_description'] !!}</p>	
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
									<table class="w-100" id="EducationDetails_new">							
									</table>																
								</td>		
							</tr>
							@endif
							@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
							<tr id="WebsiteSocialLinks_Text">
								<td>
									<h2>Links</h2>
									<div id="WebsiteSocialLinks_new">
										@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
											<a href="{{ $website_social_links_details['uwsl_website_link'] }}" class="soc-con">{{ $website_social_links_details['uwsl_website_label'] }}</a>
										@endforeach
									</div>
								</td>		
							</tr>
							@else
							<tr id="WebsiteSocialLinks_Text">
								<td>
									<h2 class="website-links-section" style="display: none;">Links</h2>
									<div id="WebsiteSocialLinks_new"> 
									</div>
								</td>		
							</tr>
							@endif
							@if(!empty($getSkill) && count($getSkill) > 0) 
							<tr id="Skills_Text">
								<td>
									<h2>Skills</h2>
									<table class="w-100" id="SkillDetails_new">
										<tr>
											<td>
											@foreach($getSkill as $key => $skill_details)
												<div class="skl-con">
													<h3 class="skill-name">{{ $skill_details['us_skill'] }}</h3>
													@if($skill_details['us_skill_level'] == 1)
													<div class="progress">
														<div class="bar" style="width:20%">					
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 2)
													<div class="progress">
														<div class="bar" style="width:40%">					
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 3)
													<div class="progress">
														<div class="bar" style="width:60%">					
														</div>
													</div>
													@elseif($skill_details['us_skill_level'] == 4)
													<div class="progress">
														<div class="bar" style="width:80%">					
														</div>
													</div>
													@else
													<div class="progress">
														<div class="bar" style="width:100%">				
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
									<h2>Languages</h2>
									<table class="w-100" id="LanguageDetails_new">
										<tr>
											<td>
											@foreach($getLanguage as $key => $language_details)
												<div class="skl-con">
													<h3 class="skill-name">{{ $language_details['ul_language'] }}</h3>
													@if($language_details['ul_language_level_id'] == 1)
													<div class="progress">
														<div class="bar" style="width:100%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 2)
													<div class="progress">
														<div class="bar" style="width:90%">			
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 3)
													<div class="progress">
														<div class="bar" style="width:81%">			
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 4)
													<div class="progress">
														<div class="bar" style="width:72%">			
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 5)
													<div class="progress">
														<div class="bar" style="width:63%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 6)
													<div class="progress">
														<div class="bar" style="width:54%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 7)
													<div class="progress">
														<div class="bar" style="width:45%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 8)
													<div class="progress">
														<div class="bar" style="width:36%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 9)
													<div class="progress">
														<div class="bar" style="width:27%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 10)
													<div class="progress">
														<div class="bar" style="width:18%">		
														</div>
													</div>
													@elseif($language_details['ul_language_level_id'] == 11)
													<div class="progress">
														<div class="bar" style="width:9%">		
														</div>
													</div>
													@else
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
									<h2 class="language-section" style="display: none;">Languages</h2>
									<table class="w-100" id="LanguageDetails_new">
									</table>									
								</td>		
							</tr>
							@endif
							@if(!empty($getInternship) && count($getInternship) > 0) 
							<tr id="InternshipDetails_Text">
								<td>
									<h2 class="internship-section">Internship</h2>		
									<table class="w-100" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)	
										@php 
											$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
											$vars_a = array_filter(array($internship_details['ui_job_title'],$internship_details['ui_employer'],$internship_details['ui_city']));
										@endphp				
										<tr>
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos">
                                                    @if($internship_details['ui_is_present'] == 0)  
                                                    	<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                   	@else
                                                   		<span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</h6>
												<p class="mb-12 internship-description-text">{!! $internship_details['internship_description'] !!}</p>
											</td>
										</tr>
									@endforeach
									</table>																
								</td>		
							</tr>
							@else
							<tr id="InternshipDetails_Text">
								<td>
									<h2 class="internship-section" style="display: none;">Internship</h2>	
									<table class="w-100" id="InternshipSectionDetails_new">					</table>																
								</td>		
							</tr>
							@endif
							@if(!empty($getHobby))
								@if(!empty($getHobby['uh_hobby']))
							<tr id="HobbiesSection">
								<td>
									<h2 class="hobbies-section">Hobbies</h2>						
									<p id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>			
								</td>		
							</tr>
								@endif
							@else
							<tr id="HobbiesSection">
								<td>
									<h2 class="hobbies-section" style="display: none;">Hobbies</h2>						
									<p id="Hobbies_Text"></p>								
								</td>		
							</tr>
							@endif
							@if(!empty($getReference) && count($getReference) > 0) 
							<tr>
								<td>
									<h2>reference</h2>
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
												<h4 class="sub-tit">
													{{ implode(" from ", $vars) }}
												</h4>	
												<h6 class="cur-pos">
													{{ implode(" | ", $vars_a) }}
												</h6>
											</td>
										</tr>
										@endforeach
										@endif
									</table>					
									{{--<h4 class="sub-tit">Reference available upon request</h4>--}}		
								</td>		
							</tr>
							@else
							<tr>
								<td>
									<h2 style="display: none;">reference</h2>				
									<table class="w-100" id="ReferenceDetails_new"></table>			
								</td>		
							</tr>
							@endif
							@if(!empty($getCourse) && count($getCourse) > 0) 
							<tr id="CourseSectionDetails_Text">
								<td>
									<h2>Courses</h2>		
									<table class="w-100" id="CourseSectionDetails_new">	
									@foreach($getCourse as $key => $course_details)		
										@php 
											$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
											$vars_a = array_filter(array($course_details['ucr_course_name'],$course_details['ucr_institute']));
										@endphp			
										<tr>
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos">
                                                    @if($course_details['ucr_is_present'] == 0)
                                                    	<span class="course-end-date">{{ implode(" - ", $vars) }}</span>
                                                   	@else
                                                    	<span class="course-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</h6>			
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
									<table class="w-100" id="CourseSectionDetails_new">						
									</table>																
								</td>		
							</tr>
							@endif
							@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
							<tr id="ExtraCurricularActivityDetails_Text">
								<td>
									<h2 class="activity-section">extracurricular activities</h2>		
									<table class="w-100" id="ExtraCurricularSectionDetails_new">	
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)	
										@php 
											$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'],$extra_curricular_section_details['ueca_end_date']));
											$vars_a = array_filter(array($extra_curricular_section_details['ueca_function_title'],$extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
										@endphp	
										<tr class="extra-curricular-add-more-section">
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos">
                                                    @if($extra_curricular_section_details['ueca_is_present'] == 0)
                                                    	<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
                                                   	@else
                                                    	<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
                                                    @endif
												</h6>	
												<p class="mb-12 extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</p>	
											</td>
										</tr>
									@endforeach
									</table>									
								</td>		
							</tr>
							@else
							<tr id="ExtraCurricularActivityDetails_Text">
								<td>
									<h2 class="activity-section" style="display: none;">extracurricular activities</h2>		
									<table class="w-100" id="ExtraCurricularSectionDetails_new">			
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
									<h2 class="activity-section">{{ $custom_heading }}</h2>		
									<table class="w-100" id="CustomSectionDetails_new">	
									@foreach($getCustomSection as $key => $custom_section_details)	
										@php 
											$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
											$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
										@endphp		
										<tr class="extra-curricular-add-more-section">
											<td>
												<h4 class="sub-tit">{{ implode(", ", $vars_a) }}</h4>	
												<h6 class="cur-pos">
												@if($custom_section_details['ucs_is_present'] == 0)
                                                    <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                                @else
                                                	<span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                                @endif
												</h6>	
												<p class="mb-12 custom-description-text">{!! $custom_section_details['custom_description'] !!}</p>	
											</td>
										</tr>
									@endforeach
									</table>															
								</td>		
							</tr>
							@else
							<tr id="CustomSectionDetails_Text">
								<td>
									<h2 class="internship-section" style="display: none;">Custom</h2>		
									<table class="w-100" id="CustomSectionDetails_new">			
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