@if($template_id == 21)
<td class="pt-2r pb-2r ver-alg-top" id="WebsiteSocialLinksData_{{ $website_social_link_add_more_count_index }}">
					 							<ul class="talent">
					 								<li id="WebsiteSocialLabel_{{ $website_social_link_add_more_count_index }}" class="website-social-label">
						 								<a href="javascript:void()" id="WebsiteSocialLink_{{ $website_social_link_add_more_count_index }}"></a>
						 							</li>
													{{-- <li id="WebsiteSocialLabel_{{ $website_social_link_add_more_count_index }}" class="website-social-label"></li>
													<li id="WebsiteSocialLink_{{ $website_social_link_add_more_count_index }}" class="website-social-link"></li> --}}
												</ul>
								 			</td>
								 			@elseif($template_id == 22)
								 			{{-- <tr id="WebsiteSocialLinksData_{{ $website_social_link_add_more_count_index }}">           
				                                <td class="pb-2">
				                                    <div class="emp-his"> --}}
				                                    	<ul id="WebsiteSocialLinksData_{{ $website_social_link_add_more_count_index }}">
							 								<li id="WebsiteSocialLabel_{{ $website_social_link_add_more_count_index }}" class="website-social-label f-16px">
								 								<a href="javascript:void()" id="WebsiteSocialLink_{{ $website_social_link_add_more_count_index }}"></a>
								 							</li>
														</ul>
				                                        {{-- <h2 class="f-22px mb-10px"><b>Lorem ipsum dolor sit amet gfdf</b></h2>
				                                        <p class="f-18px mb-8px">Lorem ipsum dolor sit amet</p>
				                                    </div>
				                                </td>
				                            </tr> --}}
				                            @elseif($template_id == 17)
				                            <tr id="WebsiteSocialLinksData_{{ $website_social_link_add_more_count_index }}">           
				                                <td class="pb-2">
				                            	<td>
						                            <li id="WebsiteSocialLabel_{{ $website_social_link_add_more_count_index }}" class="website-social-label">
										 				<a href="javascript:void()" id="WebsiteSocialLink_{{ $website_social_link_add_more_count_index }}"></a>
										 			</li>
										 		</td>
										 	</tr>
								 			@endif
