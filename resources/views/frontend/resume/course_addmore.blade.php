@if($template_id == 21)
										<tr id="CourseAddMore_section_{{ $course_add_more_count_index }}" class="course-section">
						 					<td class="pt-2r pb-2r ver-alg-top">
								 				<div class="job">
													<h2 class="course-title" id="coursetitle_{{ $course_add_more_count_index }}"></h2>
													<h3 class="institution-name" id="courseinstitute_{{ $course_add_more_count_index }}"></h3>
													<h4>
														<span class="course-start-date" id="course_startdate_{{ $course_add_more_count_index }}"></span>
														<span class="course-end-date" id="course_enddate_{{ $course_add_more_count_index }}"></span>
													</h4>
												</div>
								 			</td>
								 		</tr>
								 		@elseif($template_id == 22)
								 		<tr id="CourseAddMore_section_{{ $course_add_more_count_index }}" class="course-section">
			                               	<td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
			                                	<h2 class="f-14px letter-spacing-1-5"><span class="course-start-date" id="course_startdate_{{ $course_add_more_count_index }}"></span><span class="course-end-date" id="course_enddate_{{ $course_add_more_count_index }}"></span></h2>
			                                </td>
			                                <td class="pt-1 pb-2">
			                                	<div class="emp-his">
			                                    	<h2 class="f-16px mb-10px"><b><span id="coursetitle_{{ $course_add_more_count_index }}" class="course-title"></span><span id="courseinstitute_{{ $course_add_more_count_index }}" class="institution-name"></span></b></h2>
			                                    </div>
			                                </td>
			                            </tr>
			                            @elseif($template_id == 17)
			                            <tr id="CourseAddMore_section_{{ $course_add_more_count_index }}" class="course-section">
											<td>
												<h4><span id="coursetitle_{{ $course_add_more_count_index }}" class="course-title"></span><span id="courseinstitute_{{ $course_add_more_count_index }}" class="institution-name"></span></h4>
												<h5><span class="course-start-date" id="course_startdate_{{ $course_add_more_count_index }}"></span><span class="course-end-date" id="course_enddate_{{ $course_add_more_count_index }}"></span></h5>
											</td> 
										</tr>
								 		@endif	
								 		