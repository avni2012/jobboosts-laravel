								@if($template_id == 21)
								<tr id="EmployerAddMore_section_{{ $employment_add_more_count_index }}" class="employer-add-more-section">
						 			<td class="pt-2r pb-2r ver-alg-top">
						 				<div class="job">
											<h2 id="employer_name_{{ $employment_add_more_count_index }}" class="employer"></h2>
											<h3 id="job_title_{{ $employment_add_more_count_index }}" class="employer-job-title"></h3>
											{{-- <p id="employercity_{{ $employment_add_more_count_index }}" class="employer-city"></p> --}}
											<h4>
												<span class="employer-start-date" id="employer_startdate_{{ $employment_add_more_count_index }}"></span>
												<span class="employer-end-date" id="employer_enddate_{{ $employment_add_more_count_index }}"></span>
											</h4>
											<p id="employerdescription_{{ $employment_add_more_count_index }}" class="employer-description-text"></p>
										</div>
						 			</td>
						 		</tr>
						 		@elseif($template_id == 22)
						 		<tr id="EmployerAddMore_section_{{ $employment_add_more_count_index }}" class="employer-add-more-section">
	                               	<td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
	                                	<h2 class="f-14px letter-spacing-1-5"><span class="employer-start-date" id="employer_startdate_{{ $employment_add_more_count_index }}"></span><span class="employer-end-date" id="employer_enddate_{{ $employment_add_more_count_index }}"></span></h2>
	                                </td>
	                                <td class="pt-1 pb-2 border-botm">
	                                	<div class="emp-his">
	                                    	<h2 class="f-16px mb-10px"><b><span id="job_title_{{ $employment_add_more_count_index }}" class="employer-job-title"></span><span id="employer_name_{{ $employment_add_more_count_index }}" class="employer"></span></b></h2>
	                                        <p class="f-14px mb-8px employer-description-text" id="employerdescription_{{ $employment_add_more_count_index }}"></p>
	                                        <h4 class="f-16px employer-city" id="employercity_{{ $employment_add_more_count_index }}"></h4>
	                                    </div>
	                                </td>
	                            </tr>
	                            @elseif($template_id == 17)
	                            <tr id="EmployerAddMore_section_{{ $employment_add_more_count_index }}" class="employer-add-more-section">
									<td>
										<h4><span id="job_title_{{ $employment_add_more_count_index }}" class="employer-job-title"></span><span id="employer_name_{{ $employment_add_more_count_index }}" class="employer"></span><span id="employercity_{{ $employment_add_more_count_index }}" class="employer-city"></span></h4>
										<h5><span class="employer-start-date" id="employer_startdate_{{ $employment_add_more_count_index }}"></span><span class="employer-end-date" id="employer_enddate_{{ $employment_add_more_count_index }}"></span></h5>
										<div>
											<ul>
												<li class="f-18px mb-8px employer-description-text" id="employerdescription_{{ $employment_add_more_count_index }}"></li>
											</ul>
										</div>
									</td> 
								</tr>
						 		@endif
						 		