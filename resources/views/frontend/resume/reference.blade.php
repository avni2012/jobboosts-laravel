@if(!empty($get_reference))
	@foreach($get_reference as $reference)
		<div class="accordion" id="ReferenceForm_{{ $reference_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Reference_{{ $reference_count_index }}" aria-expanded="true" aria-controls="Reference_{{ $reference_count_index }}">
						          <span id="reference_section_title_{{ $reference_count_index }}">{{ ($reference->ur_refer_full_name != null) ? $reference->ur_refer_full_name : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Reference_{{ $reference_count_index }}" class="collapse" aria-labelledby="headingOne" data-parent="#ReferenceForm_{{ $reference_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	{{-- <div class="row">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="ReferencecustomSwitches_{{ $reference_count_index }}">
					                        <label class="custom-control-label" for="ReferencecustomSwitches_{{ $reference_count_index }}">I'd like to hide references and make them available only upon request</label>
					                        <input type="hidden" name="reference_present_label[{{ $reference_count_index }}]" class="reference-present-label" id="ReferencePresentLabel_{{ $reference_count_index }}">
					                    </div>
					                </div> --}}
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="referent_name_{{ $reference_count_index }}">Referent's Full Name</label>
									      	<input type="text" class="form-control referent-name" id="referent_name_{{ $reference_count_index }}" name="referent_name[{{ $reference_count_index }}]" oninput="ReferentName(this,'{{ $reference_count_index }}')" value="{{ $reference->ur_refer_full_name }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="reference_company_{{ $reference_count_index }}">Company</label>
									      	<input type="text" class="form-control reference-company" id="reference_company_{{ $reference_count_index }}" name="reference_company[{{ $reference_count_index }}]" oninput="ReferenceCompany(this,'{{ $reference_count_index }}')" value="{{ $reference->ur_refer_company_name }}">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="referent_phone_{{ $reference_count_index }}">Phone</label>
									      	<input type="text" class="form-control referent-phone" id="referent_phone_{{ $reference_count_index }}" name="referent_phone[{{ $reference_count_index }}]" oninput="ReferentPhone(this,'{{ $reference_count_index }}')" value="{{ $reference->ur_refer_phone }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="reference_email_{{ $reference_count_index }}">Email</label>
									      	<input type="text" class="form-control reference-email" id="reference_email_{{ $reference_count_index }}" name="reference_email[{{ $reference_count_index }}]" oninput="ReferentEmail(this,'{{ $reference_count_index }}')" value="{{ $reference->ur_refer_email }}">
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="ReferenceDelete_{{ $reference_count_index }}" @if(!empty($reference)) onclick="DeleteReferenceDetails('{{ $reference->id }}','{{ $reference_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $reference_count_index++ @endphp
	@endforeach
	@else
		<div class="accordion" id="ReferenceForm_{{ $reference_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingOne">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Reference_{{ $reference_count_index }}" aria-expanded="true" aria-controls="Reference_{{ $reference_count_index }}">
						          <span id="reference_section_title_{{ $reference_count_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Reference_{{ $reference_count_index }}" class="collapse" aria-labelledby="headingOne" data-parent="#ReferenceForm_{{ $reference_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	{{-- <div class="row">
					                    <div class="custom-control custom-switch">
					                        <input type="checkbox" class="custom-control-input" id="ReferencecustomSwitches_{{ $reference_count_index }}">
					                        <label class="custom-control-label" for="ReferencecustomSwitches_{{ $reference_count_index }}">I'd like to hide references and make them available only upon request</label>
					                        <input type="hidden" name="reference_present_label[{{ $reference_count_index }}]" class="reference-present-label" id="ReferencePresentLabel_{{ $reference_count_index }}">
					                    </div>
					                </div> --}}
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="referent_name_{{ $reference_count_index }}">Referent's Full Name</label>
									      	<input type="text" class="form-control referent-name" id="referent_name_{{ $reference_count_index }}" name="referent_name[{{ $reference_count_index }}]" oninput="ReferentName(this,'{{ $reference_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="reference_company_{{ $reference_count_index }}">Company</label>
									      	<input type="text" class="form-control reference-company" id="reference_company_{{ $reference_count_index }}" name="reference_company[{{ $reference_count_index }}]" oninput="ReferenceCompany(this,'{{ $reference_count_index }}')">
									    </div>
								  	</div>
								  	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="referent_phone_{{ $reference_count_index }}">Phone</label>
									      	<input type="text" class="form-control referent-phone" id="referent_phone_{{ $reference_count_index }}" name="referent_phone[{{ $reference_count_index }}]" oninput="ReferentPhone(this,'{{ $reference_count_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="reference_email_{{ $reference_count_index }}">Email</label>
									      	<input type="text" class="form-control reference-email" id="reference_email_{{ $reference_count_index }}" name="reference_email[{{ $reference_count_index }}]" oninput="ReferentEmail(this,'{{ $reference_count_index }}')">
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="ReferenceDelete_{{ $reference_count_index }}" @if(!empty($reference)) onclick="DeleteReferenceDetails('{{ $reference->id }}','{{ $reference_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
						
@endif
