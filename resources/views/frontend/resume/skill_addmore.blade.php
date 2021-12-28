@if($template_id == 21)
<tr class="pt-2r pb-2r ver-alg-top skill-add-more-section" id="SkillAddMore_section_{{ $skill_add_more_count_index }}">
			<td>	
								 				<div class="talent">
													<h6 id="SkillName_{{ $skill_add_more_count_index }}" class="skill-name"></h6>
													<div id="show_bar_{{ $skill_add_more_count_index }}" class="skill-level">
													</div>
												</div>
								 			</td>
								 		</tr>
								 		@elseif($template_id == 22)
								 		<tr id="SkillAddMore_section_{{ $skill_add_more_count_index }}">
								 			<td><h3 id="SkillName_{{ $skill_add_more_count_index }}" class="skill-name f-16px"></h3></td>
								 			<td><p id="skill_Level_{{ $skill_add_more_count_index }}" class="skill-level f-16px"></p></td>
								 		</tr>
								 		{{-- <li class="skill-add-more-section" id="SkillAddMore_section_{{ $skill_add_more_count_index }}">
		                        			<h3 id="SkillName_{{ $skill_add_more_count_index }}" class="skill-name"></h3>
		                        			{{-- <p id="show_bar_{{ $skill_add_more_count_index }}" class="skill-level"></p> --}}
		                        			<p id="skill_Level_{{ $skill_add_more_count_index }}" class="skill-level"></p>
		                        		</li> --}}
		                        		@elseif($template_id == 17)
		                        		<tr id="SkillAddMore_section_{{ $skill_add_more_count_index }}">
											<td>
												<h6 class="rating-desc skill-name" id="SkillName_{{ $skill_add_more_count_index }}"></h6>
												<div class="skill-rating-cont skill-level" id="skill_Level_{{ $skill_add_more_count_index }}">
												</div>
											</td>
										</tr>
								 		@endif
