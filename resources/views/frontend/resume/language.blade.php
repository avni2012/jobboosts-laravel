@if(!empty($get_language))
	@foreach($get_language as $language)
		<div class="accordion" id="LanguageForm_{{ $language_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingEight">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Language_{{ $language_count_index }}" aria-expanded="true" aria-controls="Language_{{ $language_count_index }}">
						          <span id="language_section_title_{{ $language_count_index }}">{{ ($language->ul_language) ? $language->ul_language : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Language_{{ $language_count_index }}" class="collapse" aria-labelledby="headingEight" data-parent="#LanguageForm_{{ $language_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="language_title_{{ $language_count_index }}">Language</label>
									      	<input type="text" class="form-control language-title" id="language_title_{{ $language_count_index }}" name="language_title[{{ $language_count_index }}]" oninput="LanguageTitle(this,'{{ $language_count_index }}')" value="{{ $language->ul_language }}">
									    </div>
									    <div class="form-group col-md-6">
									      	<label for="language_level_{{ $language_count_index }}">Level</label>
									      	<select class="form-control language-select" name="language_level[{{ $language_count_index }}]" id="language_level_{{ $language_count_index }}" onchange="ChangeLanguageLevel('{{ $language->id }}',this)">
									      		<option value="">Select Level</option>
									      		@if(!empty($language_levels))
									      		@foreach($language_levels as $level)
									      			<option value="{{ $level->level }}" data-id="{{ $level->id }}" @if($language->ul_language_level_id == $level->id) {{ "selected" }} @endif>{{ $level->level }}</option>
									      		@endforeach
									      		@endif
									      	</select>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="LanguageDelete_{{ $language_count_index }}" onclick="DeleteLanguageDetails('{{ $language->id }}','{{ $language_count_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $language_count_index++ @endphp
	@endforeach
	@else
		<div class="accordion" id="LanguageForm_{{ $language_count_index }}">
						  <div class="card">
						    <div class="card-header" id="headingEight">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Language_{{ $language_count_index }}" aria-expanded="true" aria-controls="Language_{{ $language_count_index }}">
						          <span id="language_section_title_{{ $language_count_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Language_{{ $language_count_index }}" class="collapse" aria-labelledby="headingEight" data-parent="#LanguageForm_{{ $language_count_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="language_title_{{ $language_count_index }}">Language</label>
									      	<input type="text" class="form-control language-title" id="language_title_{{ $language_count_index }}" name="language_title[{{ $language_count_index }}]" oninput="LanguageTitle(this,'{{ $language_count_index }}')">
									    </div>
									    <div class="form-group col-md-6">
									      	<label for="language_level_{{ $language_count_index }}">Level</label>
									      	<select class="form-control language-select" name="language_level[{{ $language_count_index }}]" id="language_level_{{ $language_count_index }}">
									      		<option value="">Select Level</option>
									      		@foreach($language_levels as $level)
									      			<option value="{{ $level->level }}" data-id="{{ $level->id }}">{{ $level->level }}</option>
									      		@endforeach
									      	</select>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="LanguageDelete_{{ $language_count_index }}" @if(!empty($language)) onclick="DeleteLanguageDetails('{{ $language->id }}','{{ $language_count_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
