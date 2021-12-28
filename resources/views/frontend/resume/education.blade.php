@if(!empty($get_education))
	@foreach($get_education as $education)
		<div class="accordion" id="EducationForm_{{ $education_index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Education{{ $education_index }}" aria-expanded="true" aria-controls="Education{{ $education_index }}">
						          <span id="education_section_title_{{ $education_index }}">
						          {{ ($education->ue_school_name != null) ? $education->ue_school_name : "Not Specified" }}
						          </span>
						        </button>
						      </h2>
						    </div>
						    <div id="Education{{ $education_index }}" class="collapse" aria-labelledby="headingOne" data-parent="#EducationForm_{{ $education_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="education_school_">School:</label>
									      	<input type="text" class="form-control education-school" id="education_school_{{ $education_index }}" name="education_school[{{ $education_index }}]" oninput="EducationSchool(this,'{{ $education_index }}')" value="{{ $education->ue_school_name }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="education_degree_">Degree:</label>
									      	<input type="text" class="form-control education-degree" id="education_degree_{{ $education_index }}" name="education_degree[{{ $education_index }}]" oninput="EducationDegree(this,'{{ $education_index }}')" value="{{ $education->ue_degree }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="education_start_date_{{ $education_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control education-start-date" type="text" name="education_start_date[{{ $education_index }}]" id="education_start_date_{{ $education_index }}" onchange="EducationStartDate(this,'{{ $education_index }}')" value="{{ $education->ue_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="education_end_date_">End Date:</label>
											      	<input class="end_datepicker form-control education-end-date" type="text" id="education_end_date_{{ $education_index }}" onchange="EducationEndDate(this,'{{ $education_index }}')" value="@if($education->ue_is_present == 0) {{ $education->ue_end_date }} @else {{ "Present" }} @endif" @if($education->ue_is_present == 1) {{ "disabled" }} @endif>
											      	<input type="hidden" id="education_enddate_{{ $education_index }}" name="education_end_date[{{ $education_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="education_city_{{ $education_index }}">City:</label>
										      	<input type="text" class="form-control" id="education_city_{{ $education_index }}" name="education_city[{{ $education_index }}]" oninput="EducationCity(this,'{{ $education_index }}')" value="{{ $education->ue_city }}">
										    </div>
								  		</div>
								  	</div>
								  	<div class="">
				                      <div class="custom-control custom-switch">
				                            <input type="checkbox" class="custom-control-input" id="EducationcustomSwitches_{{ $education_index }}"@if($education->ue_is_present != 0) {{ 'checked' }} @else @endif>
				                            <label class="custom-control-label" for="EducationcustomSwitches_{{ $education_index }}">Currently study here</label>
				                            <input type="hidden" name="education_label[{{ $education_index }}]" class="education-label" id="education_label_{{ $education_index }}" value="">
				                            <input type="hidden" name="education_label[{{ $education_index }}]" class="edu-present-label" id="EducationLabelActive_{{ $education_index }}" value="">
				                            <script type="text/javascript">
				                            	if($("#EducationcustomSwitches_{{ $education_index }}").is(":checked"))
												  {
												      $("#education_label_{{ $education_index }}").val('Present');
												      $("#EducationLabelActive_{{ $education_index }}").val('1');
												      $("#education_enddate_{{ $education_index }}").val('Present');
												  }
												  
												  $("#EducationcustomSwitches_{{ $education_index }}").change(function() { 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#education_end_date_{{ $education_index }}").prop("disabled",true); 
												      $("#education_enddate_{{ $education_index }}").val("Present"); 
												      $("#education_end_date_{{ $education_index }}").val("Present"); 
												      $("#education_label_{{ $education_index }}").val("Present");
												      $("#EducationLabelActive_{{ $education_index }}").val('1');
												      $(".education-label").val('1');
												      ajaxEducationSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#education_end_date_{{ $education_index }}").prop("disabled",false); 
												      $("#education_enddate_{{ $education_index }}").val(""); 
												      $("#education_end_date_{{ $education_index }}").val(""); 
												      $("#education_label_{{ $education_index }}").val("");
												      $(".education-label").val('0');
												      $("#EducationLabelActive_{{ $education_index }}").val('0');
												      ajaxEducationSave();
												      }, 2000);
												    } 
												  });
				                            </script>
				                          </div>
				                    </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="education_description_{{ $education_index }}">Description:</label>
									      	<textarea cols="80" id="education_description_{{ $education_index }}" class="education-description" name="education_description[{{ $education_index }}]" rows="10" data-sample-short>{!! $education->education_description !!}</textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("education_description_{{ $education_index }}", { height: 150 });
												CKEDITOR.instances['education_description_{{ $education_index }}'].on('change', function(cnt) { 
												clearTimeout(time);
												time = setTimeout(function() {
													ajaxEducationSave('{{ $education_index }}');
												   	}, 2000);
												});
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="EducationDelete{{ $education_index }}" onclick="DeleteEducation('{{ $education->id }}','{{ $education_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $education_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="EducationForm_{{ $education_index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Education{{ $education_index }}" aria-expanded="true" aria-controls="Education{{ $education_index }}">
						          <span id="education_section_title_{{ $education_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Education{{ $education_index }}" class="collapse" aria-labelledby="headingOne" data-parent="#EducationForm_{{ $education_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="education_school_">School:</label>
									      	<input type="text" class="form-control education-school" id="education_school_{{ $education_index }}" name="education_school[{{ $education_index }}]" oninput="EducationSchool(this,'{{ $education_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="education_degree_">Degree:</label>
									      	<input type="text" class="form-control education-degree" id="education_degree_{{ $education_index }}" name="education_degree[{{ $education_index }}]" oninput="EducationDegree(this,'{{ $education_index }}')">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="education_start_date_{{ $education_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control education-start-date" type="text" name="education_start_date[{{ $education_index }}]" id="education_start_date_{{ $education_index }}" onchange="EducationStartDate(this,'{{ $education_index }}')">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="education_end_date_">End Date:</label>
											      	<input class="end_datepicker form-control education-end-date" type="text" id="education_end_date_{{ $education_index }}" onchange="EducationEndDate(this,'{{ $education_index }}')">
											      	<input type="hidden" id="education_enddate_{{ $education_index }}" name="education_end_date[{{ $education_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="education_city_{{ $education_index }}">City:</label>
										      	<input type="text" class="form-control" id="education_city_{{ $education_index }}" name="education_city[{{ $education_index }}]" oninput="EducationCity(this,'{{ $education_index }}')">
										    </div>
								  		</div>
								  	</div>
								  	<div class="">
				                      <div class="custom-control custom-switch">
				                            <input type="checkbox" class="custom-control-input" id="EducationcustomSwitches_{{ $education_index }}">
				                            <label class="custom-control-label" for="EducationcustomSwitches_{{ $education_index }}">Currently study here</label>
				                            <input type="hidden" name="education_label[{{ $education_index }}]" class="education-label" id="education_label_{{ $education_index }}" value="">
				                            <input type="hidden" name="education_label[{{ $education_index }}]" class="edu-present-label" id="EducationLabelActive_{{ $education_index }}" value="">
				                            <script type="text/javascript">
				                            	if($("#EducationcustomSwitches_{{ $education_index }}").is(":checked"))
												  {
												      $("#education_label_{{ $education_index }}").val('Present');
												      $("#EducationLabelActive_{{ $education_index }}").val('1');
												      $("#education_enddate_{{ $education_index }}").val('Present');
												  }
												  
												  $("#EducationcustomSwitches_{{ $education_index }}").change(function() { 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#education_end_date_{{ $education_index }}").prop("disabled",true); 
												      $("#educationEndDate_{{ $education_index }}").val("Present"); 
												      $("#education_end_date_{{ $education_index }}").val("Present"); 
												      $("#education_label_{{ $education_index }}").val("Present");
												      $("#EducationLabelActive_{{ $education_index }}").val('1');
												      $(".education-label").val('1');
												      ajaxEducationSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#education_end_date_{{ $education_index }}").prop("disabled",false); 
												      $("#educationEndDate_{{ $education_index }}").val(""); 
												      $("#education_end_date_{{ $education_index }}").val(""); 
												      $("#education_label_{{ $education_index }}").val("");
												      $(".education-label").val('0');
												      $("#EducationLabelActive_{{ $education_index }}").val('0');
												      ajaxEducationSave();
												      }, 2000);
												    } 
												  });
				                            </script>
				                          </div>
				                    </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="education_description_{{ $education_index }}">Description:</label>
									      	<textarea cols="80" id="education_description_{{ $education_index }}" class="education-description" name="education_description[{{ $education_index }}]" rows="10" data-sample-short></textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("education_description_{{ $education_index }}", { height: 150 });
								  				CKEDITOR.instances['education_description_{{ $education_index }}'].on('change', function(cnt) { 
												clearTimeout(time);
												time = setTimeout(function() {
													ajaxEducationSave('{{ $education_index }}');
												   	}, 2000);
												});
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="EducationDelete{{ $education_index }}" @if(!empty($education)) onclick="DeleteEducation('{{ $education->id }}','{{ $education_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
