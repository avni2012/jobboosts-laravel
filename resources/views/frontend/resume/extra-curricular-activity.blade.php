@if(!empty($get_extra_activity))
	@foreach($get_extra_activity as $extra_activity)
		<div class="accordion" id="ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSeven">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" aria-expanded="true" aria-controls="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}">
						          <span id="extra_curricular_activity_section_title_{{ $extra_curricular_activity_count_index }}">{{ ($extra_activity->ueca_function_title != null) ? $extra_activity->ueca_function_title : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" class="collapse" aria-labelledby="headingSeven" data-parent="#ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="function_title_{{ $extra_curricular_activity_count_index }}">Function Title</label>
									      	<input type="text" class="form-control function-title" id="function_title_{{ $extra_curricular_activity_count_index }}" name="function_title[{{ $extra_curricular_activity_count_index }}]" oninput="FunctionTitle(this,'{{ $extra_curricular_activity_count_index }}')" value="{{ $extra_activity->ueca_function_title }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}">Employer</label>
									      	<input type="text" class="form-control extra-curricular-section-employer" id="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_section_employer[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularEmployerName(this,'{{ $extra_curricular_activity_count_index }}')" value="{{ $extra_activity->ueca_employer }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_start_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularStartDate(this,'{{ $extra_curricular_activity_count_index }}')" value="{{ $extra_activity->ueca_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularEndDate(this,'{{ $extra_curricular_activity_count_index }}')" value="@if($extra_activity->ueca_is_present == 0) {{ $extra_activity->ueca_end_date }} @else {{ "Present" }} @endif" @if($extra_activity->ueca_is_present == 1) {{ "disabled" }} @endif>
											      	<input type="hidden" id="extracurricular_enddate_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="extra_curricular_city_{{ $extra_curricular_activity_count_index }}">City</label>
										      	<input type="text" class="form-control extra-curricular-city" id="extra_curricular_city_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_city[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularCity(this,'{{ $extra_curricular_activity_count_index }}')" value="{{ $extra_activity->ueca_city }}">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}"@if($extra_activity->ueca_is_present != 0) {{ 'checked' }} @else @endif>
					                        <label class="custom-control-label" for="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}">Present</label>
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-curricular-present-label" id="ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}" value="">
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-cur-present-label" id="ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}" value="">
					                        <script type="text/javascript">
					                        	if($("#ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}").is(":checked"))
												{
												    $("#ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}").val('Present');
												    $("#ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}").val('1');
												    $("#extracurricular_enddate_{{ $extra_curricular_activity_count_index }}").val('Present');
												}
												$("#ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}").change(function() 
												{ 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").prop("disabled",true); 
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").val("Present"); 
												      $("#extracurricular_enddate_{{ $extra_curricular_activity_count_index }}").val("Present"); 
												      $("#ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}").val('Present');
												      $("#ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}").val('1');
												      ajaxExtraCurricularActivitySave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").prop("disabled",false); 
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").val(""); 
												      $("#extracurricular_enddate_{{ $extra_curricular_activity_count_index }}").val(""); 
												      $("#ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}").val('0');
												      $("#ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}").val('0');
												      ajaxExtraCurricularActivitySave();
												      }, 2000);
												    }
												  });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="extra_curricular_description_{{ $extra_curricular_activity_count_index }}">Description</label>
									      	<textarea cols="80" id="extra_curricular_description_{{ $extra_curricular_activity_count_index }}" class="extra-curricular-description" name="extra_curricular_description[{{ $extra_curricular_activity_count_index }}]" rows="10" data-sample-short>{!! $extra_activity->extra_curricular_description !!}</textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("extra_curricular_description_{{ $extra_curricular_activity_count_index }}", { height: 150 });
											  	CKEDITOR.instances['extra_curricular_description_{{ $extra_curricular_activity_count_index }}'].on('change', function(cnt) { 
											    		clearTimeout(time);
											    		time = setTimeout(function() {
											    			ajaxExtraCurricularActivitySave();
											      	}, 2000);
											  	});
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="ExtraCurricularSectionDelete_{{ $extra_curricular_activity_count_index }}" onclick="DeleteExtraCurricularSection('{{ $extra_activity->id }}','{{ $extra_curricular_activity_count_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
		@php $extra_curricular_activity_count_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSeven">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" aria-expanded="true" aria-controls="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}">
						          <span id="extra_curricular_activity_section_title_{{ $extra_curricular_activity_count_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" class="collapse" aria-labelledby="headingSeven" data-parent="#ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="function_title_{{ $extra_curricular_activity_count_index }}">Function Title</label>
									      	<input type="text" class="form-control function-title" id="function_title_{{ $extra_curricular_activity_count_index }}" name="function_title[{{ $extra_curricular_activity_count_index }}]" oninput="FunctionTitle(this,'{{ $extra_curricular_activity_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}">Employer</label>
									      	<input type="text" class="form-control extra-curricular-section-employer" id="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_section_employer[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularEmployerName(this,'{{ $extra_curricular_activity_count_index }}')">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_start_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularStartDate(this,'{{ $extra_curricular_activity_count_index }}')">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularEndDate(this,'{{ $extra_curricular_activity_count_index }}')">
											      	<input type="hidden" id="extracurricular_enddate_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="extra_curricular_city_{{ $extra_curricular_activity_count_index }}">City</label>
										      	<input type="text" class="form-control extra-curricular-city" id="extra_curricular_city_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_city[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularCity(this,'{{ $extra_curricular_activity_count_index }}')">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}">
					                        <label class="custom-control-label" for="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}">Present</label>
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-curricular-present-label" id="ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}" value="">
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-cur-present-label" id="ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}" value="">
					                        <script type="text/javascript">
					                        	$("#ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}").change(function() 
												{ 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").prop("disabled",true); 
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").val("Present"); 
												      $("#ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}").val('Present');
												      $("#ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}").val('1');
												      ajaxExtraCurricularActivitySave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").prop("disabled",false); 
												      $("#extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}").val(""); 
												      $("#ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}").val('0');
												      $("#ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}").val('0');
												      ajaxExtraCurricularActivitySave();
												      }, 2000);
												    }
												  });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="extra_curricular_description_{{ $extra_curricular_activity_count_index }}">Description</label>
									      	<textarea cols="80" id="extra_curricular_description_{{ $extra_curricular_activity_count_index }}" class="extra-curricular-description" name="extra_curricular_description[{{ $extra_curricular_activity_count_index }}]" rows="10" data-sample-short></textarea>
									      	<script type="text/javascript">
											  	CKEDITOR.replace("extra_curricular_description_{{ $extra_curricular_activity_count_index }}", { height: 150 });
											  	CKEDITOR.instances['extra_curricular_description_{{ $extra_curricular_activity_count_index }}'].on('change', function(cnt) { 
											    		clearTimeout(time);
											    		time = setTimeout(function() {
											    			ajaxExtraCurricularActivitySave();
											      	}, 2000);
											  	});
									      	</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="ExtraCurricularSectionDelete_{{ $extra_curricular_activity_count_index }}" @if(!empty($extra_activity)) onclick="DeleteExtraCurricularSection('{{ $extra_activity->id }}','{{ $extra_curricular_activity_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
