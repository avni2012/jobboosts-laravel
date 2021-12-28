@if(!empty($get_careers))
	@foreach($get_careers as $career)
		<div class="accordion" id="EmploymentForm_{{ $index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Employment_{{ $index }}" aria-expanded="true" aria-controls="Employment_{{ $index }}">
						          <span id="employment_section_title_{{ $index }}">{{ ($career->uc_job_title != null) ? $career->uc_job_title : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Employment_{{ $index }}" class="collapse" aria-labelledby="headingOne" data-parent="#EmploymentForm_{{ $index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="employer_job_title_{{ $index }}">Job Title:</label>
									      	<input type="text" class="form-control employer-job-title" id="employer_job_title_{{ $index }}" name="employer_job_title[{{ $index }}]" oninput="EmployerJobTitle(this,'{{ $index }}')" value="{{ $career->uc_job_title }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="employer_{{ $index }}">Employer:</label>
									      	<input type="text" class="form-control employer" id="employer_{{ $index }}" name="employer[{{ $index }}]" oninput="EmployerName(this,'{{ $index }}')" value="{{ $career->uc_company_name }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="employer_start_date_{{ $index }}">Start Date:</label>
											      	<input class="start_datepicker form-control employer-start-date" type="text" placeholder="MM/YYYY" name="employer_start_date[{{ $index }}]" id="employer_start_date_{{ $index }}" onchange="EmployerStartDate(this,'{{ $index }}')" value="{{ $career->uc_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="employer_end_date_{{ $index }}">End Date:</label>
											      	<input class="end_datepicker form-control employer-end-date" type="text" placeholder="MM/YYYY" id="employer_end_date_{{ $index }}" onchange="EmployerEndDate(this,'{{ $index }}')" value="@if($career->uc_is_present == 0){{ $career->uc_end_date }}@else{{"Present"}}@endif" @if($career->uc_is_present == 1){{"disabled"}}@endif>
											      	<input type="hidden" id="employer_enddate_{{ $index }}" name="employer_end_date[{{ $index }}]" class="employer-enddate" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="employer_city_{{ $index }}">City:</label>
										      	<input type="text" class="form-control employer-city" id="employer_city_{{ $index }}" name="employer_city[{{ $index }}]" oninput="EmployerCity(this,'{{ $index }}')" value="{{ $career->uc_city }}">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="EmploymentcustomSwitches_{{ $index }}" @if($career->uc_is_present != 0) {{ 'checked' }} @else @endif>
					                        <label class="custom-control-label" for="EmploymentcustomSwitches_{{ $index }}">Currently work here</label>
					                        <input type="hidden" name="present_label[{{ $index }}]" class="present-label" id="PresentLabel_{{ $index }}" value="">
					                        <input type="hidden" name="present_label[{{ $index }}]" class="emp-present-label" id="PresentLabelActive_{{ $index }}" value="">
					                        <script type="text/javascript">
					                        	if($("#EmploymentcustomSwitches_{{ $index }}").is(":checked"))
											  	{
											      $("#PresentLabel_{{ $index }}").val('Present');
											      $("#PresentLabelActive_{{ $index }}").val('1');
											      $("#employer_enddate_{{ $index }}").val('Present');
											  	}	
											  	$("#EmploymentcustomSwitches_{{ $index }}").change(function() 
											  	{ 
											    if(this.checked) { 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      $("#employer_end_date_{{ $index }}").prop("disabled",true); 
											      $("#employer_enddate_{{ $index }}").val('Present');
											      $("#employer_end_date_{{ $index }}").val("Present"); 
											      $("#PresentLabel_{{ $index }}").val('Present');
											      $("#PresentLabelActive_{{ $index }}").val('1');
											        ajaxEmploymentSave();
											      }, 2000);
											    }else{ 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      $("#employer_end_date_{{ $index }}").prop("disabled",false); 
											      $("#employer_enddate_{{ $index }}").val(''); 
											      $("#employer_end_date_{{ $index }}").val(""); 
											      $("#PresentLabel_{{ $index }}").val('0');
											      $("#PresentLabelActive_{{ $index }}").val('0');
											        ajaxEmploymentSave();
											      }, 2000);
											    }
											  });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="employment_description_{{ $index }}">Description:</label>
								  			<textarea cols="80" id="employment_description_{{ $index }}" class="employer-description" rows="10" name="employment_description[{{ $index }}]" data-sample-short>{!! $career->career_description !!}</textarea>
								  			<script type="text/javascript">
								  				CKEDITOR.replace("employment_description_{{ $index }}", { height: 150 });
											  CKEDITOR.instances['employment_description_{{ $index }}'].on('change', function(cnt) { 
											    clearTimeout(time);
											    time = setTimeout(function() {
											      ajaxEmploymentSave();
											    }, 2000);
											  });
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="EmployerDelete_{{ $index }}" onclick="DeleteEmployer('{{ $career->id }}','{{ $index }}')" href="javascript:void()" class="delete-button"><i class="fa fa-trash"></i></a>
						</div>
		@php $index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="EmploymentForm_{{ $index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Employment_{{ $index }}" aria-expanded="true" aria-controls="Employment_{{ $index }}">
						          <span id="employment_section_title_{{ $index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Employment_{{ $index }}" class="collapse" aria-labelledby="headingOne" data-parent="#EmploymentForm_{{ $index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="employer_job_title_{{ $index }}">Job Title:</label>
									      	<input type="text" class="form-control employer-job-title" id="employer_job_title_{{ $index }}" name="employer_job_title[{{ $index }}]" oninput="EmployerJobTitle(this,'{{ $index }}')" value="">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="employer_{{ $index }}">Employer:</label>
									      	<input type="text" class="form-control employer" id="employer_{{ $index }}" name="employer[{{ $index }}]" oninput="EmployerName(this,'{{ $index }}')" value="">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="employer_start_date_{{ $index }}">Start Date:</label>
											      	<input class="start_datepicker form-control employer-start-date" type="text" placeholder="MM/YYYY" name="employer_start_date[{{ $index }}]" id="employer_start_date_{{ $index }}" onchange="EmployerStartDate(this,'{{ $index }}')" value="">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="employer_end_date_{{ $index }}">End Date:</label>
											      	<input class="end_datepicker form-control employer-end-date" type="text" placeholder="MM/YYYY" id="employer_end_date_{{ $index }}" onchange="EmployerEndDate(this,'{{ $index }}')" value="">
											      	<input type="hidden" id="employer_enddate_{{ $index }}" name="employer_end_date[{{ $index }}]" class="employer-enddate" value="">
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="employer_city_{{ $index }}">City:</label>
										      	<input type="text" class="form-control employer-city" id="employer_city_{{ $index }}" name="employer_city[{{ $index }}]" oninput="EmployerCity(this,'{{ $index }}')" value="">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="EmploymentcustomSwitches_{{ $index }}">
					                        <label class="custom-control-label" for="EmploymentcustomSwitches_{{ $index }}">Currently work here</label>
					                        <input type="hidden" name="present_label[{{ $index }}]" class="present-label" id="PresentLabel_{{ $index }}" value="">
					                        <input type="hidden" name="present_label[{{ $index }}]" class="emp-present-label" id="PresentLabelActive_{{ $index }}" value="">
					                        <script type="text/javascript">
					                        	$("#EmploymentcustomSwitches_{{ $index }}").change(function() 
											  	{ 
											    if(this.checked) { 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      $("#employer_end_date_{{ $index }}").prop("disabled",true); 
											      $("#employer_enddate_{{ $index }}").val('Present');
											      $("#employer_end_date_{{ $index }}").val("Present"); 
											      $("#PresentLabel_{{ $index }}").val('Present');
											      $("#PresentLabelActive_{{ $index }}").val('1');
											        ajaxEmploymentSave();
											      }, 2000);
											    }else{ 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      $("#employer_end_date_{{ $index }}").prop("disabled",false); 
											      $("#employer_enddate_{{ $index }}").val(''); 
											      $("#employer_end_date_{{ $index }}").val(""); 
											      $("#PresentLabel_{{ $index }}").val('0');
											      $("#PresentLabelActive_{{ $index }}").val('0');
											        ajaxEmploymentSave();
											      }, 2000);
											    }
											  });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="employment_description_{{ $index }}">Description:</label>
								  			<textarea cols="80" id="employment_description_{{ $index }}" class="employer-description" rows="10" name="employment_description[{{ $index }}]" data-sample-short></textarea>
								  			<script type="text/javascript">
								  			CKEDITOR.replace("employment_description_{{ $index }}", { height: 150 });
											CKEDITOR.instances['employment_description_{{ $index }}'].on('change', function(cnt) { 
											    clearTimeout(time);
											    time = setTimeout(function() {
											      ajaxEmploymentSave();
											    }, 2000);
											  });
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="EmployerDelete_{{ $index }}" @if(!empty($careers)) onclick="DeleteEmployer('{{ $careers->id }}','{{ $index }}')" @endif href="javascript:void()" class="delete-button"><i class="fa fa-trash"></i></a>
						</div>
						
@endif
