<div class="accordion" id="CoursesForm_{{ $course_link_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSix">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Course_{{ $course_link_count_index }}" aria-expanded="true" aria-controls="Course_{{ $course_link_count_index }}">
						          <span id="course_section_title_{{ $course_link_count_index }}">@if(!empty($get_course['ucr_course_name'])) {{ $get_course['ucr_course_name'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Course_{{ $course_link_count_index }}" class="collapse" aria-labelledby="headingSix" data-parent="#CoursesForm_{{ $course_link_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="course_title_{{ $course_link_count_index }}">Course</label>
									      	<input type="text" class="form-control course-title" id="course_title_{{ $course_link_count_index }}" name="course_title[{{ $course_link_count_index }}]" oninput="CourseTitle(this,'{{ $course_link_count_index }}')" value="@if(!empty($get_course)){{ $get_course['ucr_course_name'] }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="institution_{{ $course_link_count_index }}">Institution</label>
									      	<input type="text" class="form-control institution-name" id="institution_{{ $course_link_count_index }}" name="institution[{{ $course_link_count_index }}]" oninput="InstitutionName(this,'{{ $course_link_count_index }}')" value="@if(!empty($get_course)){{ $get_course['ucr_institute'] }}@endif">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="course_start_date_{{ $course_link_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control course-start-date" type="text" name="course_start_date[{{ $course_link_count_index }}]" id="course_start_date_{{ $course_link_count_index }}" onchange="CourseStartDate(this,'{{ $course_link_count_index }}')" value="@if(!empty($get_course)){{ $get_course['ucr_start_date'] }}@endif">

											      	{{--<div class="start_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control course-start-date" name="course_start_date[{{ $course_link_count_index }}]" id="course_start_date_{{ $course_link_count_index }}" onchange="CourseStartDate(this,'{{ $course_link_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="course_end_date_{{ $course_link_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control course-end-date" type="text" id="course_end_date_{{ $course_link_count_index }}" onchange="CourseEndDate(this,'{{ $course_link_count_index }}')" value="@if(!empty($get_course)) @if($get_course['ucr_is_present'] == 0) {{ $get_course['ucr_end_date'] }} @else {{ "Present" }} @endif @endif" @if(!empty($get_course) && ($get_course['ucr_is_present'] == 1)) {{ "disabled" }} @endif>
											      	<input type="hidden" id="course_enddate_{{ $course_link_count_index }}" name="course_end_date[{{ $course_link_count_index }}]" value="">

											      	{{--<div class="end_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control course-end-date" name="course_end_date[{{ $course_link_count_index }}]" id="course_end_date_{{ $course_link_count_index }}" onchange="CourseEndDate(this,'{{ $course_link_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CoursecustomSwitches_{{ $course_link_count_index }}"@if(!empty($get_course)) @if($get_course['ucr_is_present'] != 0) {{ 'checked' }} @else @endif @endif>
					                        <label class="custom-control-label" for="CoursecustomSwitches_{{ $course_link_count_index }}">Present</label>
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="course-present-label" id="CoursePresentLabel_{{ $course_link_count_index }}" value="">
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="cor-present-label" id="CourseLabelActive_{{ $course_link_count_index }}" value="">
					                    </div>
					                </div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="CourseDelete_{{ $course_link_count_index }}" @if(!empty($get_course)) onclick="DeleteCourse('{{ $get_course["id"] }}','{{ $course_link_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="CourseDelete_{{ $course_link_count_index }}" onclick="DeleteCourse('{{ $course_link_count_index }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
						</div>
						