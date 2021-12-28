@if($template_id == 21)
<table class="w-100 custom-add-more-section"  id="CustomSectionAddMore_section_{{ $custom_section_add_more_index }}">
	<tr> 
		<td class="bord-btm w-25p pl-8 pt-2r pb-2r first ver-alg-top">
			<h5 id="CustomSectionHeading__{{ $custom_section_add_more_index }}" class="custom-section-heading"></h5>
		</td>
		<td class="bord-btm ver-alg-top">
			<table class="w-100">
				<tr>
					<td class="pt-2r pb-2r ver-alg-top"> 
						<div class="job">
							<h2 id="customsection_city_{{ $custom_section_add_more_index }}" class="custom-section-city"></h2>
							<h3 id="custom_job_title_{{ $custom_section_add_more_index }}" class="custom-job-title"></h3>
								{{-- <p id="employercity_{{ $custom_section_add_more_index }}" class="employer-city"></p> --}}
							<h4>
								<span class="custom-start-date" id="custom_startdate_{{ $custom_section_add_more_index }}"></span>
								<span class="custom-end-date" id="custom_enddate_{{ $custom_section_add_more_index }}"></span>
							</h4>
							<p id="customdescription_{{ $custom_section_add_more_index }}" class="custom-description-text"></p>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
@elseif($template_id == 22)
<tr id="CustomSectionAddMore_section_{{ $custom_section_add_more_index }}" class="custom-add-more-section">
	                               	<td class="pt-1 pb-2 pr-2p w-20p vert-aling-top">
	                                	<h2 class="f-14px letter-spacing-1-5"><span class="custom-start-date" id="custom_startdate_{{ $custom_section_add_more_index }}"></span><span class="custom-end-date" id="custom_enddate_{{ $custom_section_add_more_index }}"></span></h2>
	                                </td>
	                                <td class="pt-1 pb-2">
	                                	<div class="emp-his">
	                                    	<h2 class="f-16px mb-10px"><b><span id="custom_job_title_{{ $custom_section_add_more_index }}" class="custom-job-title"></span></b></h2>
	                                        <p class="f-14px mb-8px custom-description-text" id="customdescription_{{ $custom_section_add_more_index }}"></p>
	                                        <h4 class="f-16px custom-section-city" id="customsection_city_{{ $custom_section_add_more_index }}"></h4>
	                                    </div>
	                                </td>
	                            </tr>
@elseif($template_id == 17)
@endif



