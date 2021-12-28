@if(!empty($get_website_links))
	@foreach($get_website_links as $website_links)
		<div class="accordion" id="WebsiteSocialLinkForm_{{ $website_social_link_index }}">
						  <div class="card">
						    <div class="card-header" id="headingThree">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#WebsiteSocialLinks{{ $website_social_link_index }}" aria-expanded="true" aria-controls="WebsiteSocialLinks{{ $website_social_link_index }}">
						          <span id="website_social_link_section_title_{{ $website_social_link_index }}">{{ ($website_links['uwsl_website_label'] != null) ? $website_links['uwsl_website_label'] : "Not Specified" }}</span>
						        </button>
						      </h2>
						    </div>
						    <div id="WebsiteSocialLinks{{ $website_social_link_index }}" class="collapse" aria-labelledby="headingThree" data-parent="#WebsiteSocialLinkForm_{{ $website_social_link_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="website_social_label_{{ $website_social_link_index }}">Label:</label>
									      	<input type="text" class="form-control website-social-link" id="website_social_label_{{ $website_social_link_index }}" name="website_social_label[{{ $website_social_link_index }}]" oninput="WebsiteSocialLabel(this,'{{ $website_social_link_index }}')" value="{{ $website_links->uwsl_website_label }}">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="website_social_link_{{ $website_social_link_index }}">Link:</label>
									      	<input type="text" class="form-control website-social-link" id="website_social_link_{{ $website_social_link_index }}" name="website_social_link[{{ $website_social_link_index }}]" oninput="WebsiteSocialLinks(this,'{{ $website_social_link_index }}')" value="{{ $website_links->uwsl_website_link }}">
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="WebsiteSocialLinkDelete{{ $website_social_link_index }}" onclick="DeleteWebsiteSocialLink('{{ $website_links->id }}','{{ $website_social_link_index }}')" href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
	@php $website_social_link_index++ @endphp
	@endforeach
	@else
	<div class="accordion" id="WebsiteSocialLinkForm_{{ $website_social_link_index }}">
						  <div class="card">
						    <div class="card-header" id="headingThree">
						      <h2 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#WebsiteSocialLinks{{ $website_social_link_index }}" aria-expanded="true" aria-controls="WebsiteSocialLinks{{ $website_social_link_index }}">
						          <span id="website_social_link_section_title_{{ $website_social_link_index }}">Not Specified</span>
						        </button>
						      </h2>
						    </div>
						    <div id="WebsiteSocialLinks{{ $website_social_link_index }}" class="collapse" aria-labelledby="headingThree" data-parent="#WebsiteSocialLinkForm_{{ $website_social_link_index }}">
						      <div class="card-body">
						        <!-- <form> -->
						        	<div class="row">
								  		<div class="form-group col-md-6">
									      	<label for="website_social_label_{{ $website_social_link_index }}">Label:</label>
									      	<input type="text" class="form-control website-social-link" id="website_social_label_{{ $website_social_link_index }}" name="website_social_label[{{ $website_social_link_index }}]" oninput="WebsiteSocialLabel(this,'{{ $website_social_link_index }}')">
									    </div>
								  		<div class="form-group col-md-6">
									      	<label for="website_social_link_{{ $website_social_link_index }}">Link:</label>
									      	<input type="text" class="form-control website-social-link" id="website_social_link_{{ $website_social_link_index }}" name="website_social_link[{{ $website_social_link_index }}]" oninput="WebsiteSocialLinks(this,'{{ $website_social_link_index }}')">
									    </div>
								  	</div>
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>
						  <a class="" id="WebsiteSocialLinkDelete{{ $website_social_link_index }}" @if(!empty($websiteLinks)) onclick="DeleteWebsiteSocialLink('{{ $websiteLinks->id }}','{{ $website_social_link_index }}')" @endif href="javascript:void()"><i class="fa fa-trash"></i></a>
						</div>
@endif