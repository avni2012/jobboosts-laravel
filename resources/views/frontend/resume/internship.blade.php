@if(!empty($get_internship))
	@foreach($get_internship as $internship)
		<div class="accordion" id="InternshipForm_{{ $internship_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingEight">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Internship_{{ $internship_count_index }}" aria-expanded="true" aria-controls="Internship_{{ $internship_count_index }}">
						          <span id="internship_section_title_{{ $internship_count_index }}">{{ ($internship->ui_job_title != null) ? $internship->ui_job_title : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Internship_{{ $internship_count_index }}" class="collapse" aria-labelledby="headingEight" data-parent="#InternshipForm_{{ $internship_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="internship_job_title_{{ $internship_count_index }}">Job Title:</label>
									      	<input type="text" class="form-control internship-job-title" id="internship_job_title_{{ $internship_count_index }}" name="internship_job_title[{{ $internship_count_index }}]" oninput="InternshipJobTitle(this,'{{ $internship_count_index }}')" value="{{ $internship->ui_job_title }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="internship_employer_{{ $internship_count_index }}">Employer:</label>
									      	<input type="text" class="form-control internship-employer" id="internship_employer_{{ $internship_count_index }}" name="internship_employer[{{ $internship_count_index }}]" oninput="InternshipEmployerName(this,'{{ $internship_count_index }}')" value="{{ $internship->ui_employer }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="internship_start_date_{{ $internship_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control internship-start-date" type="text" name="internship_start_date[{{ $internship_count_index }}]" id="internship_start_date_{{ $internship_count_index }}" onchange="InternshipStartDate(this,'{{ $internship_count_index }}')" value="{{ $internship->ui_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="internship_end_date_{{ $internship_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control internship-end-date" type="text" id="internship_end_date_{{ $internship_count_index }}" onchange="InternshipEndDate(this,'{{ $internship_count_index }}')" value="@if($internship->ui_is_present == 0) {{ $internship->ui_end_date }} @else {{ "Present" }} @endif" @if($internship->ui_is_present == 1) {{ "disabled" }} @endif>
											      	<input type="hidden" id="internship_enddate_{{ $internship_count_index }}" name="internship_end_date[{{ $internship_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="internship_city_{{ $internship_count_index }}">City:</label>
										      	<input type="text" class="form-control internship-city" id="internship_city_{{ $internship_count_index }}" name="internship_city[{{ $internship_count_index }}]" oninput="InternshipCity(this,'{{ $internship_count_index }}')" value="{{ $internship->ui_city }}">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="InternshipcustomSwitches_{{ $internship_count_index }}"@if($internship->ui_is_present != 0) {{ 'checked' }} @else @endif>
					                        <label class="custom-control-label" for="InternshipcustomSwitches_{{ $internship_count_index }}">Currently work here</label>
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="internship-present-label" id="InternshipPresentLabel_{{ $internship_count_index }}" value="">
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="intern-present-label" id="InternshipLabelActive_{{ $internship_count_index }}" value="">
					                        <script type="text/javascript">
					                        	if($("#InternshipcustomSwitches_{{ $internship_count_index }}").is(":checked"))
											  	{
											      $("#InternshipPresentLabel_{{ $internship_count_index }}").val('Present');
											      $("#InternshipLabelActive_{{ $internship_count_index }}").val('1');
											      $("#internship_enddate_{{ $internship_count_index }}").val('Present');
											  	}
											  	$("#InternshipcustomSwitches_{{ $internship_count_index }}").change(function()
												  { 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#internship_end_date_{{ $internship_count_index }}").prop("disabled",true); 
												      $("#internship_end_date_{{ $internship_count_index }}").val("Present"); 
												      $("#internship_enddate_{{ $internship_count_index }}").val("Present"); 
												      $("#InternshipPresentLabel_{{ $internship_count_index }}").val('Present');
												      $("#InternshipLabelActive_{{ $internship_count_index }}").val('1');
												      ajaxInternshipSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#internship_end_date_{{ $internship_count_index }}").prop("disabled",false); 
												      $("#internship_end_date_{{ $internship_count_index }}").val("");
												      $("#internship_enddate_{{ $internship_count_index }}").val(""); 
												      $("#InternshipPresentLabel_{{ $internship_count_index }}").val('0');
												      $("#InternshipLabelActive_{{ $internship_count_index }}").val('0');
												      ajaxInternshipSave();
												      }, 2000);
												    }
												});
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="internship_description_{{ $internship_count_index }}">Description:</label>
									      	<textarea cols="80" id="internship_description_{{ $internship_count_index }}" class="internship-description" name="internship_description[{{ $internship_count_index }}]" rows="10" data-sample-short>{!! $internship->internship_description !!}</textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("internship_description_{{ $internship_count_index }}", { height: 150 });
												CKEDITOR.instances['internship_description_{{ $internship_count_index }}'].on('change', function(cnt) {
												    clearTimeout(time);
												      time = setTimeout(function() {
												     ajaxInternshipSave();
												    }, 2000);
												});
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="InternshipDelete_{{ $internship_count_index }}" onclick="DeleteInternshipDetails('{{ $internship->id }}','{{ $internship_count_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $internship_count_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="InternshipForm_{{ $internship_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingEight">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Internship_{{ $internship_count_index }}" aria-expanded="true" aria-controls="Internship_{{ $internship_count_index }}">
						          <span id="internship_section_title_{{ $internship_count_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Internship_{{ $internship_count_index }}" class="collapse" aria-labelledby="headingEight" data-parent="#InternshipForm_{{ $internship_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="internship_job_title_{{ $internship_count_index }}">Job Title:</label>
									      	<input type="text" class="form-control internship-job-title" id="internship_job_title_{{ $internship_count_index }}" name="internship_job_title[{{ $internship_count_index }}]" oninput="InternshipJobTitle(this,'{{ $internship_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="internship_employer_{{ $internship_count_index }}">Employer:</label>
									      	<input type="text" class="form-control internship-employer" id="internship_employer_{{ $internship_count_index }}" name="internship_employer[{{ $internship_count_index }}]" oninput="InternshipEmployerName(this,'{{ $internship_count_index }}')">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="internship_start_date_{{ $internship_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control internship-start-date" type="text" name="internship_start_date[{{ $internship_count_index }}]" id="internship_start_date_{{ $internship_count_index }}" onchange="InternshipStartDate(this,'{{ $internship_count_index }}')">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="internship_end_date_{{ $internship_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control internship-end-date" type="text" id="internship_end_date_{{ $internship_count_index }}" onchange="InternshipEndDate(this,'{{ $internship_count_index }}')">
											      	<input type="hidden" id="internship_enddate_{{ $internship_count_index }}" name="internship_end_date[{{ $internship_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="internship_city_{{ $internship_count_index }}">City:</label>
										      	<input type="text" class="form-control internship-city" id="internship_city_{{ $internship_count_index }}" name="internship_city[{{ $internship_count_index }}]" oninput="InternshipCity(this,'{{ $internship_count_index }}')">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="InternshipcustomSwitches_{{ $internship_count_index }}">
					                        <label class="custom-control-label" for="InternshipcustomSwitches_{{ $internship_count_index }}">Currently work here</label>
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="internship-present-label" id="InternshipPresentLabel_{{ $internship_count_index }}" value="">
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="intern-present-label" id="InternshipLabelActive_{{ $internship_count_index }}" value="">
					                        <script type="text/javascript">
					                        	$("#InternshipcustomSwitches_{{ $internship_count_index }}").change(function()
												  { 
												    if(this.checked) { 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#internship_end_date_{{ $internship_count_index }}").prop("disabled",true); 
												      $("#internship_end_date_{{ $internship_count_index }}").val("Present"); 
												      $("#InternshipPresentLabel_{{ $internship_count_index }}").val('Present');
												      $("#InternshipLabelActive_{{ $internship_count_index }}").val('1');
												      ajaxInternshipSave();
												      }, 2000);
												    }else{ 
												      clearTimeout(time);
												      time = setTimeout(function() {
												      $("#internship_end_date_{{ $internship_count_index }}").prop("disabled",false); 
												      $("#internship_end_date_{{ $internship_count_index }}").val(""); 
												      $("#InternshipPresentLabel_{{ $internship_count_index }}").val('0');
												      $("#InternshipLabelActive_{{ $internship_count_index }}").val('0');
												      ajaxInternshipSave();
												      }, 2000);
												    }
												});
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="internship_description_{{ $internship_count_index }}">Description:</label>
									      	<textarea cols="80" id="internship_description_{{ $internship_count_index }}" class="internship-description" name="internship_description[{{ $internship_count_index }}]" rows="10" data-sample-short></textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("internship_description_{{ $internship_count_index }}", { height: 150 });
								  				CKEDITOR.instances['internship_description_{{ $internship_count_index }}'].on('change', function(cnt) {
												    clearTimeout(time);
												      time = setTimeout(function() {
												     ajaxInternshipSave();
												    }, 2000);
												});
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="InternshipDelete_{{ $internship_count_index }}" @if(!empty($internship)) onclick="DeleteInternshipDetails('{{ $internship->id }}','{{ $internship_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
