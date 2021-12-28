@if(!empty($get_skills))
	@foreach($get_skills as $skill)
		<div class="accordion" id="SkillsForm_{{ $skill_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFour">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Skills{{ $skill_index }}" aria-expanded="true" aria-controls="Skills{{ $skill_index }}">
						          <span id="skill_section_title_{{ $skill_index }}">{{ ($skill->us_skill != null) ? $skill->us_skill : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Skills{{ $skill_index }}" class="collapse" aria-labelledby="headingFour" data-parent="#SkillsForm_{{ $skill_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="skill_">Skill:</label>
									      	<input type="text" class="form-control skill-name" id="skill_{{ $skill_index }}" name="skill[{{ $skill_index }}]" oninput="SkillName(this,'{{ $skill_index }}')" value="{{ $skill->us_skill }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="skill_level">Level:</label>
									      	<div id="slider-1_{{ $skill_index }}" class="slider-1 skill-level"></div>
									      	<input type="hidden" name="skill_level[{{ $skill_index }}]" id="skillLevel_{{ $skill_index }}" value="{{ $skill->us_skill_level }}"> 
									      	<script type="text/javascript">
									      		// var skill_slider = 5;
									      		$("#slider-1_{{ $skill_index }}").slider({ min: 1, max: 5, value: $("#skillLevel_{{ $skill_index }}").val(),
									      			change: function(event, ui) {
									      			$("#skillLevel_{{ $skill_index }}").val(ui.value); 
												        clearTimeout(time);
												     	time = setTimeout(function() {
												         ajaxSkillsSave();
												        }, 2000);
												      } 
									      			}); 
									      	</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="SkillDelete{{ $skill_index }}" onclick="DeleteSkill('{{ $skill->id }}','{{ $skill_index }}','{{ $skill->us_skill }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $skill_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="SkillsForm_{{ $skill_index }}">
						  <div class="card">
						    <div class="card-header" id="headingFour">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Skills{{ $skill_index }}" aria-expanded="true" aria-controls="Skills{{ $skill_index }}">
						          <span id="skill_section_title_{{ $skill_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="Skills{{ $skill_index }}" class="collapse" aria-labelledby="headingFour" data-parent="#SkillsForm_{{ $skill_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="skill_">Skill:</label>
									      	<input type="text" class="form-control skill-name" id="skill_{{ $skill_index }}" name="skill[{{ $skill_index }}]" oninput="SkillName(this,'{{ $skill_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="skill_level">Level:</label>
									      	<div id="slider-1_{{ $skill_index }}" class="slider-1 skill-level"></div>
									      	<input type="hidden" name="skill_level[{{ $skill_index }}]" id="skillLevel_{{ $skill_index }}" value="5"> 
									      	<script type="text/javascript">
									      		var skill_slider = 5;
									      		$("#slider-1_{{ $skill_index }}").slider({ min: 1, max: 5, value: skill_slider,
									      			change: function(event, ui) { 
									      				$("#skillLevel_{{ $skill_index }}").val(ui.value);
												        clearTimeout(time);
												     	time = setTimeout(function() {
												         ajaxSkillsSave();
												        }, 2000);
												    } 
									      		}); 
									      	</script>
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="SkillDelete{{ $skill_index }}" @if(!empty($skillData)) onclick="DeleteSkill('{{ $skillData->id }}','{{ $skill_index }}','')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif
