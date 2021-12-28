<div class="accordion" id="EmploymentForm_{{ $index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Employment_{{ $index }}" aria-expanded="true" aria-controls="Employment_{{ $index }}">
						          <span id="employment_section_title_{{ $index }}">@if(!empty($get_careers) && !empty($get_careers['uc_job_title'])) {{ $get_careers['uc_job_title'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Employment_{{ $index }}" class="collapse" aria-labelledby="headingOne" data-parent="#EmploymentForm_{{ $index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="employer_job_title_{{ $index }}">Job Title:</label>
									      	<input type="text" class="form-control employer-job-title" id="employer_job_title_{{ $index }}" name="employer_job_title[{{ $index }}]" oninput="EmployerJobTitle(this,'{{ $index }}')" value="@if(!empty($get_careers)){{ $get_careers['uc_job_title'] }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="employer_{{ $index }}">Employer:</label>
									      	<input type="text" class="form-control employer" id="employer_{{ $index }}" name="employer[{{ $index }}]" oninput="EmployerName(this,'{{ $index }}')" value="@if(!empty($get_careers)){{ $get_careers['uc_company_name'] }}@endif">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="employer_start_date_{{ $index }}">Start Date:</label>
											      	<input class="start_datepicker form-control employer-start-date" type="text" placeholder="MM/YYYY" name="employer_start_date[{{ $index }}]" id="employer_start_date_{{ $index }}" onchange="EmployerStartDate(this,'{{ $index }}')" value="@if(!empty($get_careers)){{ $get_careers['uc_start_date'] }}@endif">
											      	{{--<div class="start_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control employer-start-date" name="employer_start_date[{{ $index }}]" id="employer_start_date_{{ $index }}" onchange="EmployerStartDate(this,'{{ $index }}')" value="@if(!empty($get_careers)){{ $get_careers['uc_start_date'] }}@endif">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="employer_end_date_{{ $index }}">End Date:</label>
											      	<input class="end_datepicker form-control employer-end-date" type="text" placeholder="MM/YYYY" id="employer_end_date_{{ $index }}" onchange="EmployerEndDate(this,'{{ $index }}')" value="@if(!empty($get_careers)) @if($get_careers['uc_is_present'] == 0){{ $get_careers['uc_end_date'] }}@else{{"Present"}}@endif @endif" @if(!empty($get_careers) && ($get_careers['uc_is_present'] == 1)){{"disabled"}}@endif>
											      	<input type="hidden" id="employer_enddate_{{ $index }}" name="employer_end_date[{{ $index }}]" class="employer-enddate" value="">
											      	{{--<div class="end_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control employer-end-date" name="employer_end_date[{{ $index }}]" id="employer_end_date_{{ $index }}" onchange="EmployerEndDate(this,'{{ $index }}')" value="@if(!empty($get_careers)) {{ $get_careers['uc_end_date'] }} @endif" @if(!empty($get_careers)) @if($get_careers['uc_is_present'] == 1) {{ "disabled" }} @endif @endif>
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
					                              	{{--<input type="hidden" name="employer_end_date[{{ $index }}]" class="employer-enddate" value="">--}}
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="employer_city_{{ $index }}">City:</label>
										      	<input type="text" class="form-control employer-city" id="employer_city_{{ $index }}" name="employer_city[{{ $index }}]" oninput="EmployerCity(this,'{{ $index }}')" value="@if(!empty($get_careers)){{ $get_careers['uc_city'] }}@endif">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="EmploymentcustomSwitches_{{ $index }}" @if(!empty($get_careers)) @if($get_careers['uc_is_present'] != 0) {{ 'checked' }} @else @endif @endif>
					                        <label class="custom-control-label" for="EmploymentcustomSwitches_{{ $index }}">Currently work here</label>
					                        <input type="hidden" name="present_label[{{ $index }}]" class="present-label" id="PresentLabel_{{ $index }}" value="">
					                        <input type="hidden" name="present_label[{{ $index }}]" class="emp-present-label" id="PresentLabelActive_{{ $index }}" value="">
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="employment_description_{{ $index }}">Description:</label>
								  			<textarea cols="80" id="employment_description_{{ $index }}" class="employer-description" rows="10" name="employment_description[{{ $index }}]" data-sample-short>@if(!empty($get_careers)){!! $get_careers['career_description'] !!}@endif</textarea>
									      	{{--<textarea cols="80" id="employment_description_{{ $index }}" class="employer-description" name="employment_description[{{ $index }}]" rows="10" data-sample-short></textarea>--}}
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="EmployerDelete_{{ $index }}" @if(!empty($get_careers)) onclick="DeleteEmployer('{{ $get_careers["id"] }}','{{ $index }}')" @endif href="javascript:void()" class="delete-button"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="EmployerDelete_{{ $index }}" onclick="DeleteEmployer('{{ $index }}')" class=""><i class="fa fa-trash"></i></button> --}}
						</div>
						