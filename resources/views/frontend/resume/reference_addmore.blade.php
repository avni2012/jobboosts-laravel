@if($template_id == 21)

@elseif($template_id == 22)
<tr id="ReferenceAddMore_section_{{ $reference_add_more_count_index }}" class="reference-add-more-section">
	                                <td class="pt-1 pb-2">
	                                	<p id="hideReference" class="hide-reference f-14px"></p>
	                                	<div class="emp-his referenceDetail">
	                                    	<h2 class="f-16px mb-10px"><b><span id="referentname_{{ $reference_add_more_count_index }}" class="reference-name"></span><span id="referencecompany_{{ $reference_add_more_count_index }}" class="reference-company"></span></b></h2>
	                                    	<p class="f-14px mb-8px"><span class="referent-email" id="referentemail_{{ $reference_add_more_count_index }}"></span><span class="referent-phone" id="referentphone_{{ $reference_add_more_count_index }}"></span></p>
	                                    </div>
	                                </td>
	                            </tr>
@elseif($template_id == 17)

@endif