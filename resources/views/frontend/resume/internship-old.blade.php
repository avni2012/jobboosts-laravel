<div class="accordion" id="InternshipForm_{{ $internship_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingEight">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Internship_{{ $internship_count_index }}" aria-expanded="true" aria-controls="Internship_{{ $internship_count_index }}">
						          <span id="internship_section_title_{{ $internship_count_index }}">@if(!empty($get_internship['ui_job_title'])) {{ $get_internship['ui_job_title'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Internship_{{ $internship_count_index }}" class="collapse" aria-labelledby="headingEight" data-parent="#InternshipForm_{{ $internship_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="internship_job_title_{{ $internship_count_index }}">Job Title:</label>
									      	<input type="text" class="form-control internship-job-title" id="internship_job_title_{{ $internship_count_index }}" name="internship_job_title[{{ $internship_count_index }}]" oninput="InternshipJobTitle(this,'{{ $internship_count_index }}')" value="@if(!empty($get_internship)){{ $get_internship['ui_job_title'] }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="internship_employer_{{ $internship_count_index }}">Employer:</label>
									      	<input type="text" class="form-control internship-employer" id="internship_employer_{{ $internship_count_index }}" name="internship_employer[{{ $internship_count_index }}]" oninput="InternshipEmployerName(this,'{{ $internship_count_index }}')" value="@if(!empty($get_internship)){{ $get_internship['ui_employer'] }}@endif">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="internship_start_date_{{ $internship_count_index }}">Start Date:</label>
											      	<input class="start_datepicker form-control internship-start-date" type="text" name="internship_start_date[{{ $internship_count_index }}]" id="internship_start_date_{{ $internship_count_index }}" onchange="InternshipStartDate(this,'{{ $internship_count_index }}')" value="@if(!empty($get_internship)){{ $get_internship['ui_start_date'] }}@endif">

											      	{{--<div class="start_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control internship-start-date" name="internship_start_date[{{ $internship_count_index }}]" id="internship_start_date_{{ $internship_count_index }}" onchange="InternshipStartDate(this,'{{ $internship_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="internship_end_date_{{ $internship_count_index }}">End Date:</label>
											      	<input class="end_datepicker form-control internship-end-date" type="text" id="internship_end_date_{{ $internship_count_index }}" onchange="InternshipEndDate(this,'{{ $internship_count_index }}')" value="@if(!empty($get_internship)) @if($get_internship['ui_is_present'] == 0) {{ $get_internship['ui_end_date'] }} @else {{ "Present" }} @endif @endif" @if(!empty($get_internship) && ($get_internship['ui_is_present'] == 1)) {{ "disabled" }} @endif>
											      	<input type="hidden" id="internship_enddate_{{ $internship_count_index }}" name="internship_end_date[{{ $internship_count_index }}]" value="">

											      	{{--<div class="end_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control internship-end-date" name="internship_end_date[{{ $internship_count_index }}]" id="internship_end_date_{{ $internship_count_index }}" onchange="InternshipEndDate(this,'{{ $internship_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="internship_city_{{ $internship_count_index }}">City:</label>
										      	<input type="text" class="form-control internship-city" id="internship_city_{{ $internship_count_index }}" name="internship_city[{{ $internship_count_index }}]" oninput="InternshipCity(this,'{{ $internship_count_index }}')" value="@if(!empty($get_internship)){{ $get_internship['ui_city'] }}@endif">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="InternshipcustomSwitches_{{ $internship_count_index }}"@if(!empty($get_internship)) @if($get_internship['ui_is_present'] != 0) {{ 'checked' }} @else @endif @endif>
					                        <label class="custom-control-label" for="InternshipcustomSwitches_{{ $internship_count_index }}">Currently work here</label>
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="internship-present-label" id="InternshipPresentLabel_{{ $internship_count_index }}" value="">
					                        <input type="hidden" name="internship_present_label[{{ $internship_count_index }}]" class="intern-present-label" id="InternshipLabelActive_{{ $internship_count_index }}" value="">
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="internship_description_{{ $internship_count_index }}">Description:</label>
									      	<textarea cols="80" id="internship_description_{{ $internship_count_index }}" class="internship-description" name="internship_description[{{ $internship_count_index }}]" rows="10" data-sample-short>@if(!empty($get_internship)){!! $get_internship['internship_description'] !!}@endif</textarea>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="InternshipDelete_{{ $internship_count_index }}" @if(!empty($get_internship)) onclick="DeleteInternshipDetails('{{ $get_internship["id"] }}','{{ $internship_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="InternshipDelete_{{ $internship_count_index }}" onclick="DeleteInternship('{{ $internship_count_index }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
						</div>
						