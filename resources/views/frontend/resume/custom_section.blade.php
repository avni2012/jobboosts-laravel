@if(!empty($get_custom_section))
	@foreach($get_custom_section as $custom)
		<div class="accordion" id="CustomSectionForm_{{ $custom_section_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFive">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#CustomSection_{{ $custom_section_count_index }}" aria-expanded="true" aria-controls="CustomSection_{{ $custom_section_count_index }}">
						          <span id="custom_section_title_{{ $custom_section_count_index }}">{{ ($custom['ucs_title'] != null) ? $custom['ucs_title'] : "Not Specified" }}</span>
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
									      	<input type="text" class="form-control custom-job-title" id="custom_title_{{ $custom_section_count_index }}" name="custom_title[{{ $custom_section_count_index }}]" oninput="CustomJobTitle(this,'{{ $custom_section_count_index }}')" value="{{ $custom->ucs_title }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="custom_section_city_{{ $custom_section_count_index }}">City</label>
										    <input type="text" class="form-control custom-section-city" id="custom_section_city_{{ $custom_section_count_index }}" name="custom_section_city[{{ $custom_section_count_index }}]" oninput="CustomSectionCity(this,'{{ $custom_section_count_index }}')" value="{{ $custom->ucs_city }}">
								  		</div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="custom_start_date_{{ $custom_section_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control custom-start-date" type="text" name="custom_start_date[{{ $custom_section_count_index }}]" id="custom_start_date_{{ $custom_section_count_index }}" onchange="CustomStartDate(this,'{{ $custom_section_count_index }}')" value="{{ $custom->ucs_start_date }}">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="custom_end_date_{{ $custom_section_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control custom-end-date" type="text" id="custom_end_date_{{ $custom_section_count_index }}" onchange="CustomEndDate(this,'{{ $custom_section_count_index }}')" value=" @if($custom->ucs_is_present == 0) {{ $custom->ucs_end_date }} @else {{ "Present" }} @endif" @if($custom->ucs_is_present == 1) {{ "disabled" }} @endif>
											      	<input type="hidden" id="custom_enddate_{{ $custom_section_count_index }}" name="custom_end_date[{{ $custom_section_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CustomSectionSwitches_{{ $custom_section_count_index }}"@if($custom->ucs_is_present != 0) {{ 'checked' }} @else @endif>
					                        <label class="custom-control-label" for="CustomSectionSwitches_{{ $custom_section_count_index }}">Present</label>
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="custom-present-label" id="CustomPresentLabel_{{ $custom_section_count_index }}" value="">
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="cus-present-label" id="CustomLabelActive_{{ $custom_section_count_index }}" value="">
					                        <script type="text/javascript">
					                        	if($("#CustomSectionSwitches_{{ $custom_section_count_index }}").is(":checked"))
											    {
											        $("#CustomPresentLabel_{{ $custom_section_count_index }}").val('Present');
											        $("#CustomLabelActive_{{ $custom_section_count_index }}").val('1');
											        $("#custom_enddate_{{ $custom_section_count_index }}").val('Present');
											    }
											    $("#CustomSectionSwitches_{{ $custom_section_count_index }}").change(function() 
											    { 
											      if(this.checked) { 
											        clearTimeout(time);
											      time = setTimeout(function() {
											        $("#custom_end_date_{{ $custom_section_count_index }}").prop("disabled",true); 
											        $("#custom_enddate_{{ $custom_section_count_index }}").val("Present"); 
											        $("#custom_end_date_{{ $custom_section_count_index }}").val("Present"); 
											        $("#CustomPresentLabel_{{ $custom_section_count_index }}").val('Present');
											        $("#CustomLabelActive_{{ $custom_section_count_index }}").val('1');
											        ajaxCustomSectionSave();
											      }, 2000);
											      }else{ 
											        clearTimeout(time);
											      time = setTimeout(function() {
											        $("#custom_end_date_{{ $custom_section_count_index }}").prop("disabled",false); 
											        $("#custom_enddate_{{ $custom_section_count_index }}").val(""); 
											        $("#custom_end_date_{{ $custom_section_count_index }}").val("");
											        $("#CustomPresentLabel_{{ $custom_section_count_index }}").val('0');
											        $("#CustomLabelActive_{{ $custom_section_count_index }}").val('0');
											        ajaxCustomSectionSave();
											      }, 2000);
											      }
											    });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="custom_description_{{ $custom_section_count_index }}">Description</label>
									      	<textarea cols="80" id="custom_description_{{ $custom_section_count_index }}" class="custom-description" name="custom_description[{{ $custom_section_count_index }}]" rows="10" data-sample-short>{!! $custom->custom_description !!}</textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("custom_description_{{ $custom_section_count_index }}", { height: 150 });
											    CKEDITOR.instances['custom_description_{{ $custom_section_count_index }}'].on('change', function(cnt) { 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      	ajaxCustomSectionSave();
											      }, 2000);
											    });
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="custom-section-delete" id="CustomSectionDelete_{{ $custom_section_count_index }}" onclick="DeleteCustomSection('{{ $custom->id }}','{{ $custom_section_count_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $custom_section_count_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="CustomSectionForm_{{ $custom_section_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFive">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#CustomSection_{{ $custom_section_count_index }}" aria-expanded="true" aria-controls="CustomSection_{{ $custom_section_count_index }}">
						          <span id="custom_section_title_{{ $custom_section_count_index }}">Not Specified</span>
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
									      	<input type="text" class="form-control custom-job-title" id="custom_title_{{ $custom_section_count_index }}" name="custom_title[{{ $custom_section_count_index }}]" oninput="CustomJobTitle(this,'{{ $custom_section_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="custom_section_city_{{ $custom_section_count_index }}">City</label>
										    <input type="text" class="form-control custom-section-city" id="custom_section_city_{{ $custom_section_count_index }}" name="custom_section_city[{{ $custom_section_count_index }}]" oninput="CustomSectionCity(this,'{{ $custom_section_count_index }}')">
								  		</div>
								  	</div>
								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="row">
								  				<div class="form-group col-md-6">
											      	<label for="custom_start_date_{{ $custom_section_count_index }}">Start Date</label>
											      	<input class="start_datepicker form-control custom-start-date" type="text" name="custom_start_date[{{ $custom_section_count_index }}]" id="custom_start_date_{{ $custom_section_count_index }}" onchange="CustomStartDate(this,'{{ $custom_section_count_index }}')">
											    </div>
								  				<div class="form-group col-md-6">
											      	<label for="custom_end_date_{{ $custom_section_count_index }}">End Date</label>
											      	<input class="end_datepicker form-control custom-end-date" type="text" id="custom_end_date_{{ $custom_section_count_index }}" onchange="CustomEndDate(this,'{{ $custom_section_count_index }}')">
											      	<input type="hidden" id="custom_enddate_{{ $custom_section_count_index }}" name="custom_end_date[{{ $custom_section_count_index }}]" value="">
											    </div>
											</div>
								  		</div>
								  	</div>
								  	 <div class="">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="CustomSectionSwitches_{{ $custom_section_count_index }}">
					                        <label class="custom-control-label" for="CustomSectionSwitches_{{ $custom_section_count_index }}">Present</label>
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="custom-present-label" id="CustomPresentLabel_{{ $custom_section_count_index }}" value="">
					                        <input type="hidden" name="custom_present_label[{{ $custom_section_count_index }}]" class="cus-present-label" id="CustomLabelActive_{{ $custom_section_count_index }}" value="">
					                        <script type="text/javascript">
					                        	$("#CustomSectionSwitches_{{ $custom_section_count_index }}").change(function() 
											    { 
											      if(this.checked) { 
											        clearTimeout(time);
											      time = setTimeout(function() {
											        $("#custom_end_date_{{ $custom_section_count_index }}").prop("disabled",true); 
											        $("#custom_end_date_{{ $custom_section_count_index }}").val("Present"); 
											        $("#CustomPresentLabel_{{ $custom_section_count_index }}").val('Present');
											        $("#CustomLabelActive_{{ $custom_section_count_index }}").val('1');
											        ajaxCustomSectionSave();
											      }, 2000);
											      }else{ 
											        clearTimeout(time);
											      time = setTimeout(function() {
											        $("#custom_end_date_{{ $custom_section_count_index }}").prop("disabled",false); 
											        $("#custom_end_date_{{ $custom_section_count_index }}").val(""); 
											        $("#CustomPresentLabel_{{ $custom_section_count_index }}").val('0');
											        $("#CustomLabelActive_{{ $custom_section_count_index }}").val('0');
											        ajaxCustomSectionSave();
											      }, 2000);
											      }
											    });
					                        </script>
					                    </div>
					                </div>
								  	<div class="row">
								  		<div class="form-group col-md-12">
								  			<label for="custom_description_{{ $custom_section_count_index }}">Description</label>
									      	<textarea cols="80" id="custom_description_{{ $custom_section_count_index }}" class="custom-description" name="custom_description[{{ $custom_section_count_index }}]" rows="10" data-sample-short></textarea>
									      	<script type="text/javascript">
								  				CKEDITOR.replace("custom_description_{{ $custom_section_count_index }}", { height: 150 });
								  				CKEDITOR.instances['custom_description_{{ $custom_section_count_index }}'].on('change', function(cnt) { 
											      clearTimeout(time);
											      time = setTimeout(function() {
											      	ajaxCustomSectionSave();
											      }, 2000);
											    });
								  			</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="custom-section-delete" id="CustomSectionDelete_{{ $custom_section_count_index }}" @if(!empty($custom)) onclick="DeleteCustomSection('{{ $custom->id }}','{{ $custom_section_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
