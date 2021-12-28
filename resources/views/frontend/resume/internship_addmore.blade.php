								@if($template_id == 21)
								<tr id="InternshipAddMore_section_{{ $internship_add_more_count_index }}" class="internship-add-more-section">
						 			<td class="bord-btm pt-2r pb-2r ver-alg-top">
						 				<div class="job">
											<h2 id="internship_employer_name_{{ $internship_add_more_count_index }}" class="internship-employer"></h2>
											<h3 id="internship_jobtitle_{{ $internship_add_more_count_index }}" class="internship-job-title"></h3>
											{{-- <p id="internshipcity_{{ $internship_add_more_count_index }}" class="internship-city"></p> --}}
											<h4>
												<span class="internship-start-date" id="internship_startdate_{{ $internship_add_more_count_index }}"></span>
												<span class="internship-end-date" id="internship_enddate_{{ $internship_add_more_count_index }}"></span>
											</h4>
											<p id="internshipdescription_{{ $internship_add_more_count_index }}" class="internship-description-text"></p>
										</div>
						 			</td>
						 		</tr>
						 		@elseif($template_id == 22)
						 		<tr id="InternshipAddMore_section_{{ $internship_add_more_count_index }}" class="internship-add-more-section">
	                               	<td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
	                                	<h2 class="f-14px letter-spacing-1-5"><span class="internship-start-date" id="internship_startdate_{{ $internship_add_more_count_index }}"></span><span class="internship-end-date" id="internship_enddate_{{ $internship_add_more_count_index }}"></span></h2>
	                                </td>
	                                <td class="pt-1 pb-2">
	                                	<div class="emp-his">
	                                    	<h2 class="f-16px mb-10px"><b><span id="internship_jobtitle_{{ $internship_add_more_count_index }}" class="internship-job-title"></span><span id="internship_employer_name_{{ $internship_add_more_count_index }}" class="internship-employer"></span></b></h2>
	                                        <p class="f-14px mb-8px internship-description-text" id="internshipdescription_{{ $internship_add_more_count_index }}"></p>
	                                        <h4 class="f-16px internship-city" id="internshipcity_{{ $internship_add_more_count_index }}"></h4>
	                                    </div>
	                                </td>
	                            </tr>
						 		@elseif($template_id == 17)
						 		@endif
						 		