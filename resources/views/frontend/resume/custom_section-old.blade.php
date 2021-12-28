<div class="accordion" id="CustomSectionForm_{{ $custom_section_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFive">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#CustomSection_{{ $custom_section_count_index }}" aria-expanded="true" aria-controls="CustomSection_{{ $custom_section_count_index }}">
						          <span id="custom_section_title_{{ $custom_section_count_index }}">@if(!empty($get_custom_section['ucs_title'])) {{ $get_custom_section['ucs_title'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="CustomSection_{{ $custom_section_count_index }}" class="collapse" aria-labelledby="headingFive" data-parent="#CustomSectionForm_{{ $custom_section_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<input type="hidden" name="custom_section_heading[{{ $custom_section_count_index }}]" id="custom_section_heading_{{ $custom_section_count_index }}" value="">
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="custom_title_{{ $custom_section_count_index }}">Activity name, job title, book title</label>
									      	<input type="text" class="form-control custom-job-title" id="custom_title_{{ $custom_section_count_index }}" name="custom_title[{{ $custom_section_count_index }}]" oninput="CustomJobTitle(this,'{{ $custom_section_count_index }}')" value="@if(!empty($get_custom_section)){{ $get_custom_section['ucs_title'] }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="custom_section_city_{{ $custom_section_count_index }}">City</label>
										    <input type="text" class="form-control custom-section-city" id="custom_section_city_{{ $custom_section_count_index }}" name="custom_section_city[{{ $custom_section_count_index }}]" oninput="CustomSectionCity(this,'{{ $custom_section_count_index }}')" value="@if(!empty($get_custom_section)){{ $get_custom_section['ucs_city'] }}@endif">
								  		</div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="custom_start_date_{{ $custom_section_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control custom-start-date" type="text" name="custom_start_date[{{ $custom_section_count_index }}]" id="custom_start_date_{{ $custom_section_count_index }}" onchange="CustomStartDate(this,'{{ $custom_section_count_index }}')" value="@if(!empty($get_custom_section)){{ $get_custom_section['ucs_start_date'] }}@endif">

											      	{{--<div class="start_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control custom-start-date" name="custom_start_date[{{ $custom_section_count_index }}]" id="custom_start_date_{{ $custom_section_count_index }}" onchange="CustomStartDate(this,'{{ $custom_section_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="custom_end_date_{{ $custom_section_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control custom-end-date" type="text" id="custom_end_date_{{ $custom_section_count_index }}" onchange="CustomEndDate(this,'{{ $custom_section_count_index }}')" value="@if(!empty($get_custom_section)) @if($get_custom_section['ucs_is_present'] == 0) {{ $get_custom_section['ucs_end_date'] }} @else {{ "Present" }} @endif @endif" @if(!empty($get_custom_section) && ($get_custom_section['ucs_is_present'] == 1)) {{ "disabled" }} @endif>
											      	<input type="hidden" id="custom_enddate_{{ $custom_section_count_index }}" name="custom_end_date[{{ $custom_section_count_index }}]" value="">

											      	{{--<div class="end_datepicker date input-group p-0 shadow-sm">
					                                  <input type="text" placeholder="MM/YYYY" class="form-control custom-end-date" name="custom_end_date[{{ $custom_section_count_index }}]" id="custom_end_date_{{ $custom_section_count_index }}" onchange="CustomEndDate(this,'{{ $custom_section_count_index }}')" value="">
					                                  <div class="input-group-append"></div>
					                              	</div>--}}
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CustomSectionSwitches_{{ $custom_section_count_index }}"@if(!empty($get_custom_section)) @if($get_custom_section['ucs_is_present'] != 0) {{ 'checked' }} @else @endif @endif>
					                        <label class="custom-control-label" for="CustomSectionSwitches_{{ $custom_section_count_index }}">Present</label>
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="custom-present-label" id="CustomPresentLabel_{{ $custom_section_count_index }}" value="">
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="cus-present-label" id="CustomLabelActive_{{ $custom_section_count_index }}" value="">
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="custom_description_{{ $custom_section_count_index }}">Description</label>
									      	<textarea cols="80" id="custom_description_{{ $custom_section_count_index }}" class="custom-description" name="custom_description[{{ $custom_section_count_index }}]" rows="10" data-sample-short>@if(!empty($get_custom_section)){!! $get_custom_section['custom_description'] !!}@endif</textarea>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="custom-section-delete" id="CustomSectionDelete_{{ $custom_section_count_index }}" @if(!empty($get_custom_section)) onclick="DeleteCustomSection('{{ $get_custom_section["id"] }}','{{ $custom_section_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="CustomSectionDelete_{{ $custom_section_count_index }}" onclick="DeleteCustomSection('{{ $custom_section_count_index }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
						</div>
						