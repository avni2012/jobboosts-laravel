@if($template_id == 21)
								<tr id="ExtraCurricularAddMore_section_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-add-more-section">
						 			<td class="pt-2r pb-2r ver-alg-top">
						 				<div class="job">
											<h2 id="extra_curricular_employer_name_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-section-employer"></h2>
											<h3 id="functiontitle_{{ $extra_curricular_activity_add_more_count_index }}" class="function-title"></h3>
											{{-- <p id="extracurricular_city_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-city"></p> --}}
											<h4>
												<span class="extra-curricular-start-date" id="extracurricular_startdate_{{ $extra_curricular_activity_add_more_count_index }}"></span>
												<span class="extra-curricular-end-date" id="extracurricular_enddate_{{ $extra_curricular_activity_add_more_count_index }}"></span>
											</h4>
											<p id="extracurricular_description_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-description-text"></p>
										</div>
						 			</td>
						 		</tr>
						 		@elseif($template_id == 22)
						 		<tr id="ExtraCurricularAddMore_section_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-add-more-section">
	                               	<td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
	                                	<h2 class="f-14px letter-spacing-1-5"><span class="extra-curricular-start-date" id="extracurricular_startdate_{{ $extra_curricular_activity_add_more_count_index }}"></span><span class="extra-curricular-end-date" id="extracurricular_enddate_{{ $extra_curricular_activity_add_more_count_index }}"></span></h2>
	                                </td>
	                                <td class="pt-1 pb-2 border-botm">
	                                	<div class="emp-his">
	                                    	<h2 class="f-16px mb-10px function-title"><b><span id="functiontitle_{{ $extra_curricular_activity_add_more_count_index }}"></span><span id="extra_curricular_employer_name_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-section-employer"></span></b></h2>
	                                        <p class="f-14px mb-8px extra-curricular-description-text" id="extracurricular_description_{{ $extra_curricular_activity_add_more_count_index }}"></p>
	                                        <h4 class="f-16px extra-curricular-city" id="extracurricular_city_{{ $extra_curricular_activity_add_more_count_index }}"></h4>
	                                    </div>
	                                </td>
	                            </tr>
	                            @elseif($template_id == 17)
	                            <tr id="ExtraCurricularAddMore_section_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-add-more-section">
									<td>
										<h4><span id="functiontitle_{{ $extra_curricular_activity_add_more_count_index }}" class="function-title"></span><span id="extra_curricular_employer_name_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-section-employer"></span><span id="extracurricular_city_{{ $extra_curricular_activity_add_more_count_index }}" class="extra-curricular-city"></span></h4>
										<h5><span class="extra-curricular-start-date" id="extracurricular_startdate_{{ $extra_curricular_activity_add_more_count_index }}"></span><span class="extra-curricular-end-date" id="extracurricular_enddate_{{ $extra_curricular_activity_add_more_count_index }}"></span></h5>
										<div>
											<ul>
												<li class="f-18px mb-8px extra-curricular-description-text" id="extracurricular_description_{{ $extra_curricular_activity_add_more_count_index }}"></li>
											</ul>
										</div>
									</td> 
								</tr>
						 		@endif