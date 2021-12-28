<div class="accordion" id="ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingSeven">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" aria-expanded="true" aria-controls="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}">
						          <span id="extra_curricular_activity_section_title_{{ $extra_curricular_activity_count_index }}">@if(!empty($get_extra_activity['ueca_function_title'])) {{ $get_extra_activity['ueca_function_title'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="ExtraCurricularActivity_{{ $extra_curricular_activity_count_index }}" class="collapse" aria-labelledby="headingSeven" data-parent="#ExtraCurricularActivityForm_{{ $extra_curricular_activity_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="function_title_{{ $extra_curricular_activity_count_index }}">Function Title</label>
									      	<input type="text" class="form-control function-title" id="function_title_{{ $extra_curricular_activity_count_index }}" name="function_title[{{ $extra_curricular_activity_count_index }}]" oninput="FunctionTitle(this,'{{ $extra_curricular_activity_count_index }}')" value="@if(!empty($get_extra_activity)){{ $get_extra_activity['ueca_function_title'] }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}">Employer</label>
									      	<input type="text" class="form-control extra-curricular-section-employer" id="extra_curricular_section_employer_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_section_employer[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularEmployerName(this,'{{ $extra_curricular_activity_count_index }}')" value="@if(!empty($get_extra_activity)){{ $get_extra_activity['ueca_employer'] }}@endif">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_start_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularStartDate(this,'{{ $extra_curricular_activity_count_index }}')" value="@if(!empty($get_extra_activity)){{ $get_extra_activity['ueca_start_date'] }}@endif">

											      	{{--<div class="start_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control extra-curricular-start-date" name="extra_curricular_start_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_start_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularStartDate(this,'{{ $extra_curricular_activity_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control extra-curricular-start-date" type="text" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularEndDate(this,'{{ $extra_curricular_activity_count_index }}')" value="@if(!empty($get_extra_activity)) @if($get_extra_activity['ueca_is_present'] == 0) {{ $get_extra_activity['ueca_end_date'] }} @else {{ "Present" }} @endif @endif" @if(!empty($get_extra_activity) && ($get_extra_activity['ueca_is_present'] == 1)) {{ "disabled" }} @endif>
											      	<input type="hidden" id="extracurricular_enddate_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" value="">

											      	{{--<div class="end_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control extra-curricular-end-date" name="extra_curricular_end_date[{{ $extra_curricular_activity_count_index }}]" id="extra_curricular_end_date_{{ $extra_curricular_activity_count_index }}" onchange="ExtraCurricularEndDate(this,'{{ $extra_curricular_activity_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
											</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										      	<label for="extra_curricular_city_{{ $extra_curricular_activity_count_index }}">City</label>
										      	<input type="text" class="form-control extra-curricular-city" id="extra_curricular_city_{{ $extra_curricular_activity_count_index }}" name="extra_curricular_city[{{ $extra_curricular_activity_count_index }}]" oninput="ExtraCurricularCity(this,'{{ $extra_curricular_activity_count_index }}')" value="@if(!empty($get_extra_activity)){{ $get_extra_activity['ueca_city'] }}@endif">
										    </div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}"@if(!empty($get_extra_activity)) @if($get_extra_activity['ueca_is_present'] != 0) {{ 'checked' }} @else @endif @endif>
					                        <label class="custom-control-label" for="ExtraCurricularcustomSwitches_{{ $extra_curricular_activity_count_index }}">Present</label>
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-curricular-present-label" id="ExtraCurricularPresentLabel_{{ $extra_curricular_activity_count_index }}" value="">
					                        <input type="hidden" name="extra_curricular_present_label[{{ $extra_curricular_activity_count_index }}]" class="extra-cur-present-label" id="ExtraCurricularLabelActive_{{ $extra_curricular_activity_count_index }}" value="">
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="extra_curricular_description_{{ $extra_curricular_activity_count_index }}">Description</label>
									      	<textarea cols="80" id="extra_curricular_description_{{ $extra_curricular_activity_count_index }}" class="extra-curricular-description" name="extra_curricular_description[{{ $extra_curricular_activity_count_index }}]" rows="10" data-sample-short>@if(!empty($get_extra_activity)){!! $get_extra_activity['extra_curricular_description'] !!}@endif</textarea>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="ExtraCurricularSectionDelete_{{ $extra_curricular_activity_count_index }}" @if(!empty($get_extra_activity)) onclick="DeleteExtraCurricularSection('{{ $get_extra_activity["id"] }}','{{ $extra_curricular_activity_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="ExtraCurricularSectionDelete_{{ $extra_curricular_activity_count_index }}" onclick="DeleteExtraCurricularSection('{{ $extra_curricular_activity_count_index }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
						</div>
						