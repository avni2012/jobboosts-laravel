@if(!empty($get_course))
	@foreach($get_course as $course)
		<div class="accordion" id="CoursesForm_{{ $course_link_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSix">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Course_{{ $course_link_count_index }}" aria-expanded="true" aria-controls="Course_{{ $course_link_count_index }}">
						          <span id="course_section_title_{{ $course_link_count_index }}">{{ ($course->ucr_course_name != null) ? $course->ucr_course_name : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Course_{{ $course_link_count_index }}" class="collapse" aria-labelledby="headingSix" data-parent="#CoursesForm_{{ $course_link_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="course_title_{{ $course_link_count_index }}">Course</label>
									      	<input type="text" class="form-control course-title" id="course_title_{{ $course_link_count_index }}" name="course_title[{{ $course_link_count_index }}]" oninput="CourseTitle(this,'{{ $course_link_count_index }}')" value="{{ $course->ucr_course_name }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="institution_{{ $course_link_count_index }}">Institution</label>
									      	<input type="text" class="form-control institution-name" id="institution_{{ $course_link_count_index }}" name="institution[{{ $course_link_count_index }}]" oninput="InstitutionName(this,'{{ $course_link_count_index }}')" value="{{ $course->ucr_institute }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="course_start_date_{{ $course_link_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control course-start-date" type="text" name="course_start_date[{{ $course_link_count_index }}]" id="course_start_date_{{ $course_link_count_index }}" onchange="CourseStartDate(this,'{{ $course_link_count_index }}')" value="{{ $course->ucr_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="course_end_date_{{ $course_link_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control course-end-date" type="text" id="course_end_date_{{ $course_link_count_index }}" onchange="CourseEndDate(this,'{{ $course_link_count_index }}')" value="@if($course->ucr_is_present == 0) {{ $course->ucr_end_date }} @else {{ "Present" }} @endif" @if($course->ucr_is_present == 1) {{ "disabled" }} @endif>
											      	<input type="hidden" id="course_enddate_{{ $course_link_count_index }}" name="course_end_date[{{ $course_link_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CoursecustomSwitches_{{ $course_link_count_index }}"@if($course->ucr_is_present != 0) {{ 'checked' }} @else @endif>
					                        <label class="custom-control-label" for="CoursecustomSwitches_{{ $course_link_count_index }}">Present</label>
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="course-present-label" id="CoursePresentLabel_{{ $course_link_count_index }}" value="">
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="cor-present-label" id="CourseLabelActive_{{ $course_link_count_index }}" value="">
					                        <script type="text/javascript">
					                        	if($("#CoursecustomSwitches_{{ $course_link_count_index }}").is(":checked"))
											  	{
											      $("#CoursePresentLabel_{{ $course_link_count_index }}").val('Present');
											      $("#CourseLabelActive_{{ $course_link_count_index }}").val('1');
											      $("#course_enddate_{{ $course_link_count_index }}").val('Present');
											  	}
											  	$("#CoursecustomSwitches_{{ $course_link_count_index }}").change(function() 
											  	{ 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#course_end_date_{{ $course_link_count_index }}").prop("disabled",true); 
												      $("#course_enddate_{{ $course_link_count_index }}").val("Present"); 
												      $("#course_end_date_{{ $course_link_count_index }}").val("Present"); 
												      $("#CoursePresentLabel_{{ $course_link_count_index }}").val('Present');
												      $("#CourseLabelActive_{{ $course_link_count_index }}").val('1');
												      ajaxCourseSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#course_end_date_{{ $course_link_count_index }}").prop("disabled",false); 
												      $("#course_end_date_{{ $course_link_count_index }}").val(""); 
												      $("#course_enddate_{{ $course_link_count_index }}").val(""); 
												      $("#CoursePresentLabel_{{ $course_link_count_index }}").val('0');
												      $("#CourseLabelActive_{{ $course_link_count_index }}").val('0');
												      ajaxCourseSave();
												      }, 2000);
													}
											  	});
					                        </script>
					                    </div>
					                </div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="CourseDelete_{{ $course_link_count_index }}" onclick="DeleteCourse('{{ $course->id }}','{{ $course_link_count_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
		@php $course_link_count_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="CoursesForm_{{ $course_link_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSix">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Course_{{ $course_link_count_index }}" aria-expanded="true" aria-controls="Course_{{ $course_link_count_index }}">
						          <span id="course_section_title_{{ $course_link_count_index }}">{{ ($course->ucr_course_name != null) ? $course->ucr_course_name : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Course_{{ $course_link_count_index }}" class="collapse" aria-labelledby="headingSix" data-parent="#CoursesForm_{{ $course_link_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="course_title_{{ $course_link_count_index }}">Course</label>
									      	<input type="text" class="form-control course-title" id="course_title_{{ $course_link_count_index }}" name="course_title[{{ $course_link_count_index }}]" oninput="CourseTitle(this,'{{ $course_link_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="institution_{{ $course_link_count_index }}">Institution</label>
									      	<input type="text" class="form-control institution-name" id="institution_{{ $course_link_count_index }}" name="institution[{{ $course_link_count_index }}]" oninput="InstitutionName(this,'{{ $course_link_count_index }}')">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="course_start_date_{{ $course_link_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control course-start-date" type="text" name="course_start_date[{{ $course_link_count_index }}]" id="course_start_date_{{ $course_link_count_index }}" onchange="CourseStartDate(this,'{{ $course_link_count_index }}')">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="course_end_date_{{ $course_link_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control course-end-date" type="text" id="course_end_date_{{ $course_link_count_index }}" onchange="CourseEndDate(this,'{{ $course_link_count_index }}')">
											      	<input type="hidden" id="course_enddate_{{ $course_link_count_index }}" name="course_end_date[{{ $course_link_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CoursecustomSwitches_{{ $course_link_count_index }}">
					                        <label class="custom-control-label" for="CoursecustomSwitches_{{ $course_link_count_index }}">Present</label>
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="course-present-label" id="CoursePresentLabel_{{ $course_link_count_index }}" value="">
					                        <input type="hidden" name="course_present_label[{{ $course_link_count_index }}]" class="cor-present-label" id="CourseLabelActive_{{ $course_link_count_index }}" value="">
					                        <script type="text/javascript">
					                        	$("#CoursecustomSwitches_{{ $course_link_count_index }}").change(function() 
											  	{ 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#course_end_date_{{ $course_link_count_index }}").prop("disabled",true); 
												      $("#course_end_date_{{ $course_link_count_index }}").val("Present"); 
												      $("#CoursePresentLabel_{{ $course_link_count_index }}").val('Present');
												      $("#CourseLabelActive_{{ $course_link_count_index }}").val('1');
												      ajaxCourseSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#course_end_date_{{ $course_link_count_index }}").prop("disabled",false);
												      $("#course_end_date_{{ $course_link_count_index }}").val("");  
												      $("#CoursePresentLabel_{{ $course_link_count_index }}").val('0');
												      $("#CourseLabelActive_{{ $course_link_count_index }}").val('0');
												      ajaxCourseSave();
												      }, 2000);
													}
											  	});
					                        </script>
					                    </div>
					                </div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="CourseDelete_{{ $course_link_count_index }}" @if(!empty($course)) onclick="DeleteCourse('{{ $course->id }}','{{ $course_link_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
