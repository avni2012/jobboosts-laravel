<div class="accordion" id="SkillsForm_{{ $skill_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFour">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Skills{{ $skill_index }}" aria-expanded="true" aria-controls="Skills{{ $skill_index }}">
						          <span id="skill_section_title_{{ $skill_index }}">@if(!empty($get_skills) && !empty($get_skills['us_skill'])) {{ $get_skills['us_skill'] }} @else {{ "Not Specified" }} @endif</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Skills{{ $skill_index }}" class="collapse" aria-labelledby="headingFour" data-parent="#SkillsForm_{{ $skill_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="skill_">Skill:</label>
									      	<input type="text" class="form-control skill-name" id="skill_{{ $skill_index }}" name="skill[{{ $skill_index }}]" oninput="SkillName(this,'{{ $skill_index }}')" value="@if(!empty($get_skills)){{ $get_skills['us_skill'] }}@else{{ $skill_name }}@endif">
									    </div>
								  		<div class="form-group col-md-6">
								  			{{-- <label for="skill_level">Level:</label>
											<input type="range" class="custom-range" id="skill_level_{{ $skill_index }}" name="skill_level[{{ $skill_index }}]" min="1" max="5"> --}}
									      	<label for="skill_level">Level:</label>
									      	<div id="slider-1_{{ $skill_index }}" class="slider-1 skill-level"></div>
									      	<input type="hidden" name="skill_level[{{ $skill_index }}]" id="skillLevel_{{ $skill_index }}" value="5"> 
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="SkillDelete{{ $skill_index }}" @if(!empty($get_skills)) onclick="DeleteSkill('{{ $get_skills["id"] }}','{{ $skill_index }}','{{ $skill_name }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						  {{-- <button type="button" id="SkillDelete{{ $skill_index }}" onclick="DeleteSkill('{{ $skill_index }}','{{ $skill_name }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
						</div>
						