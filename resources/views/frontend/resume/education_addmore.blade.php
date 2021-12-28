@if($template_id == 21)
<td class="pt-2r pb-2r" id="EducationAddMore_section_{{ $education_add_more_count_index }}" class="education-add-more-section">
								 				<h2 class="f-18px education-school" id="educationSchool_{{ $education_add_more_count_index }}"></h2>
								 				<h3 class="f-16px education-degree" id="educationDegree_{{ $education_add_more_count_index }}"></h3>
								 				{{-- <p id="educationCity_{{ $education_add_more_count_index }}" class="education-city"></p> --}}
								 				<span id="educationStartDate_{{ $education_add_more_count_index }}" class="education-start-date">
								 				</span>
								 				<span id="educationEndDate_{{ $education_add_more_count_index }}" class="education-end-date">
								 				</span>
								 				<p id="educationDescription_{{ $education_add_more_count_index }}" class="education-description-text">
								 				</p>
								 			</td>
								 			@elseif($template_id == 22)
								 			<tr id="EducationAddMore_section_{{ $education_add_more_count_index }}" class="education-add-more-section">
		                                        <td class="pt-1 pb-2 pr-2p w-20p vert-aling-top border-botm">
		                                            <h2 class="f-14px letter-spacing-1-5"><span id="educationStartDate_{{ $education_add_more_count_index }}" class="education-start-date"></span><span id="educationEndDate_{{ $education_add_more_count_index }}" class="education-end-date"></span></h2>
		                                        </td>
		                                        <td class="pt-1 pb-2 border-botm">
		                                            <div class="emp-his">
		                                                <h2 class="f-16px mb-10px"><b><span id="educationDegree_{{ $education_add_more_count_index }}" class="education-degree"></span><span id="educationSchool_{{ $education_add_more_count_index }}" class="education-school"></span></b></h2>
		                                                <p class="f-14px mb-8px education-description-text" id="educationDescription_{{ $education_add_more_count_index }}"></p>
		                                                <h4 class="f-16px education-city" id="educationCity_{{ $education_add_more_count_index }}"></h4>
		                                            </div>
		                                        </td>
		                                    </tr>
		                                    @elseif($template_id == 17)
		                                    <tr id="EducationAddMore_section_{{ $education_add_more_count_index }}" class="education-add-more-section">
												<td>
													<h4><span id="educationDegree_{{ $education_add_more_count_index }}" class="education-degree"></span><span id="educationSchool_{{ $education_add_more_count_index }}" class="education-school"></span><span id="educationCity_{{ $education_add_more_count_index }}" class="education-city"></span></h4>
													<h5><span class="education-start-date" id="educationStartDate_{{ $education_add_more_count_index }}"></span><span class="education-end-date" id="educationEndDate_{{ $education_add_more_count_index }}"></span></h5>
													<div class="f-18px mb-8px education-description-text" id="educationDescription_{{ $education_add_more_count_index }}">
														{{--<ul>
															<li class="f-18px mb-8px education-description-text" id="educationDescription_{{ $education_add_more_count_index }}"></li>
														</ul>--}}
													</div>
												</td> 
											</tr>
								 			@endif