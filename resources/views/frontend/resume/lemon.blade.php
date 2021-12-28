
<!DOCTYPE html>
<html>
<head>
	<title>Lemon</title>
	<style type="text/css">
	body,div,ul,ol,li,h1,h2,h3,h4,h5,h6,form,input,button,p,th,td {
        margin: 0;
        padding: 0;
        font-family: "Calibri";
    }
    table {
        border-collapse: collapse;
    }
    .w-100 {
        width: 100%;
    }
    .w-50{width: 50%;}
    h1,h2,h3,h4,h5,h6 {
        font-weight: normal;       
    }
    .m-auto{margin: auto;}
    .f-12px{font-size: 12px;}
    .f-14px{font-size: 14px;}
    .f-16px{font-size: 16px;}
    .f-18px{font-size: 18px;}
    .f-22px{font-size: 22px;}
    .f-24px{font-size: 24px;}
    .f-26px{font-size: 26px;}
    .text-capitalize{text-transform: capitalize;}
    .text-upper{text-transform: uppercase;}
    .text-center{text-align: center;}
    .ver-alg-mid{vertical-align: middle;}
    .ver-alg-top{vertical-align: top;}
    .lemon-cont{border-left: 20px solid @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; padding: 50px 30px 0;}
    .profile-i{width: 130px;object-fit: cover;border: 2px solid #eff0f2;}
    .nam{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; text-transform: uppercase;letter-spacing: 3.1px;margin-top: 7px;font-weight: bold;font-size: 26px;}
    .cur-pos{color: #444440;text-transform: uppercase;letter-spacing: 3.1px;font-size: 14px;margin-bottom: 25px;}
    .lemon-cont p, .lemon-cont ul{color: #989896;}
    .hedding-c{border-top: 1px solid #f1f1f1;border-bottom: 1px solid #f1f1f1;margin: 20px 0px;padding: 8px 0px;font-size: 18px;text-transform: uppercase;color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif; font-weight: bold;letter-spacing: 2px;}
    .mb-10{margin-bottom: 10px;}
    .mb-20{margin-bottom: 20px;}
    .inst-con{list-style: none;}
    .inst-con li {margin-bottom: 8px;}
    .inst-con img{margin-right: 8px;width: 13px;vertical-align: middle;}
    .mt-0{margin-top: 0;}
    .acd{font-size: 18px;font-weight: bold;margin-bottom: 2px;color: #474747;margin-top: 15px;}
    .sub-cat{color: #989896;margin-bottom: 10px;}
    .ldot-con{margin-left: 20px;}
    .ldot-con li{margin-bottom: 6px;}
    .pl-20{padding-left: 20px;}
    a.other-details {color: #989896;}
    #WebsiteSocialLinks_new a {text-decoration: none;color: #989896;}
    .lemon-cont p{
	   	word-break: break-word;
	}
	.n-svg-img{height: 12px;width: 12px;fill: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
	</style>
</head>
<body>
<div class="lemon-cont">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="w-50 ver-alg-top">
					<table class="left-cont w-100">
						@if(!empty($getPersonalDetails))
						<tr>
							<td class="text-center">
								@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
                                    <img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="profile-i">
                                    {{--<img src=data:image/png;base64,'.base64_encode($getProfilePicture['profile_image']).'  alt="profile image" class="profile-i"/>--}}
                                @else
                                	<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="profile-i" style="border: 0px solid #eff0f2;width: 160px;">
                                @endif
								<div>
									<h1 class="nam">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
									<h2 class="cur-pos"id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
								</div>
							</td>
						</tr>
						@else
						<tr>
							<td class="text-center">
								{{-- <img src="{{ asset('/frontend/images/resume_templates/lemon-images/profile.jpeg') }}" alt="profile" class="profile-i"> --}}
								<div>
									<h1 class="nam"></h1>
									<h2 class="cur-pos"></h2>
								</div>
							</td>							
						</tr>
						@endif

						@if(!empty($getPersonalDetails))
		 					@if($getPersonalDetails['profile_summary'] != '')
							<tr>
								<td>
									<h2 class="hedding-c">Career Goals</h2>
									<p class="mb-10" id="ProfessionalSummary_Text">{!! $getPersonalDetails['profile_summary'] !!}</p>
								</td>
							</tr>
							@endif
		 				@else
							<tr>
								<td>
									<h2 class="hedding-c" style="display: none;">Profile</h2>
									<p class="mb-10" id="ProfessionalSummary_Text"></p>
								</td> 
							</tr>
		 				@endif
						@if(!empty($getSkill) && count($getSkill) > 0) 
						<tr id="Skills_Text">
							<td>
								<h2 class="hedding-c">Skills</h2>
								<ul class="inst-con" id="SkillDetails_new">
								@foreach($getSkill as $key => $skill_details)
								
									<li><svg height="417pt" viewBox="0 -46 417.81333 417" width="417pt" class="n-svg-img" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"/></svg>{{--<img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-rig.png') }}" alt="mark">--}} {{ $skill_details['us_skill'] }}
										@if($skill_details['us_skill_level'] != null)
											@if($skill_details['us_skill_level'] == 1)
												({{ "Low" }})
											@elseif($skill_details['us_skill_level'] == 2)
												({{ "Average" }})
											@elseif($skill_details['us_skill_level'] == 3)
												({{ "Intermediate" }})
											@elseif($skill_details['us_skill_level'] == 4)
												({{ "Experienced" }})
											@else
												({{ "Experts" }})
											@endif
										@endif
									</li>
								@endforeach
								</ul>
							</td>
						</tr>
						@else
						<tr id="Skills_Text">
							<td>
								<h2 class="hedding-c" style="display: none;">Skills</h2>
								<ul class="inst-con" id="SkillDetails_new"></ul>
							</td>
						</tr>
						@endif
						@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="hedding-c">Links</h2>
								<ul class="inst-con" id="WebsiteSocialLinks_new">
								@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
									<li>{{--<img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-rig.png') }}" alt="mark">--}}<a href="{{ $website_social_links_details['uwsl_website_link'] }}">{{ $website_social_links_details['uwsl_website_label'] }}</a></li>
								@endforeach
								</ul>
							</td>
						</tr>
						@else
						<tr id="WebsiteSocialLinks_Text">
							<td>
								<h2 class="hedding-c" style="display: none;">Links</h2>
								<ul class="inst-con" id="WebsiteSocialLinks_new"></ul>
							</td>
						</tr>
						@endif
						@if(!empty($getLanguage) && count($getLanguage) > 0) 
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="hedding-c">Language</h2>
								<ul class="inst-con" id="LanguageDetails_new">
								@foreach($getLanguage as $key => $language_details)
									<li>{{--<img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-rig.png') }}" alt="mark">--}}{{ $language_details['ul_language'] }}
										@if($language_details['ul_language_level_id'] != null)
											({{ $language_details->language_level->level }})
										@endif
									</li>
								@endforeach
								</ul>
							</td>
						</tr>
						@else
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="hedding-c" style="display: none;">Language</h2>
								<ul class="inst-con" id="LanguageDetails_new"></ul>
							</td>
						</tr>
						@endif	
						@if(!empty($getHobby))
							@if(!empty($getHobby['uh_hobby']))
							<tr id="LanguageDetails_Text">
								<td>
									<h2 class="hedding-c">Hobbies</h2>
									<p class="hobbies" id="Hobbies_Text">{{ $getHobby['uh_hobby'] }}</p>
								</td>
							</tr>
							@endif
						@else
						<tr id="LanguageDetails_Text">
							<td>
								<h2 class="hedding-c" style="display: none;">Hobbies</h2>
								<ul class="inst-con" id="LanguageDetails_new"></ul>
							</td>
						</tr>
						@endif
						@if(!empty($getPersonalDetails))
						<tr>
							<td>
								<h2 class="hedding-c">Reach Me At</h2>
								<ul class="inst-con">
									@if(!empty($getPersonalDetails['phone']))
									<li><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 503.604 503.604" class="n-svg-img" style="enable-background:new 0 0 503.604 503.604;" xml:space="preserve">
<g>
	<g>
		<path d="M337.324,0H167.192c-28.924,0-53.5,23.584-53.5,52.5v398.664c0,28.916,24.056,52.44,52.98,52.44l170.412-0.184
			c28.92,0,52.58-23.528,52.58-52.448l0.248-398.5C389.908,23.452,366.364,0,337.324,0z M227.68,31.476h49.36
			c4.336,0,7.868,3.52,7.868,7.868c0,4.348-3.532,7.868-7.868,7.868h-49.36c-4.348,0-7.868-3.52-7.868-7.868
			C219.812,34.996,223.332,31.476,227.68,31.476z M198.02,33.98c2.916-2.912,8.224-2.952,11.136,0c1.46,1.456,2.324,3.5,2.324,5.588
			c0,2.048-0.864,4.088-2.324,5.548c-1.452,1.46-3.504,2.32-5.548,2.32c-2.084,0-4.088-0.86-5.588-2.32
			c-1.452-1.456-2.28-3.5-2.28-5.548C195.736,37.48,196.568,35.436,198.02,33.98z M250.772,488.008
			c-12.984,0-23.544-10.568-23.544-23.548c0-12.984,10.56-23.548,23.544-23.548s23.544,10.564,23.544,23.548
			C274.316,477.44,263.752,488.008,250.772,488.008z M365.488,424.908H141.232V74.756h224.256V424.908z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg> &nbsp;{{ $getPersonalDetails['phone'] }}</li>
									@endif

									@if(!empty($getWebsiteSocialLink) && count($getWebsiteSocialLink) > 0)
									<li><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.332,0,187.62,0,256
			s26.629,132.668,74.98,181.02C123.333,485.371,187.62,512,256,512s132.667-26.629,181.02-74.98
			C485.371,388.668,512,324.38,512,256S485.371,123.332,437.02,74.98z M256,497C123.112,497,15,388.888,15,256S123.112,15,256,15
			s241,108.112,241,241S388.888,497,256,497z"/>
	</g>
</g>
<g>
	<g>
		<path d="M415.806,96.194C373.12,53.508,316.367,30,256,30S138.88,53.508,96.194,96.194C53.508,138.88,30,195.634,30,256
			c0,28.04,5.087,55.428,15.121,81.402c1.492,3.863,5.833,5.789,9.699,4.294c3.864-1.492,5.786-5.835,4.293-9.698
			c-8.468-21.923-13.148-44.932-13.969-68.498h79.165c0.716,48.513,8.371,94.793,21.655,134.065
			c-10.163,4.852-20.039,10.393-29.569,16.61c-17.814-15.708-33.118-34.528-45.003-55.943c-2.01-3.622-6.576-4.929-10.197-2.918
			c-3.622,2.01-4.928,6.575-2.918,10.197c13.633,24.563,31.461,45.943,52.299,63.449c0.251,0.244,0.519,0.462,0.797,0.665
			c21.585,17.965,46.363,31.789,73.035,40.713c0.587,0.286,1.209,0.484,1.844,0.608C208.464,478.166,231.96,482,256,482
			c60.367,0,117.12-23.508,159.806-66.194C458.492,373.12,482,316.366,482,256C482,195.634,458.492,138.88,415.806,96.194z
			 M168.37,64.077c-6.379,11.007-12.142,23.144-17.247,36.2c-7.671-3.718-15.162-7.862-22.451-12.412
			C140.931,78.559,154.231,70.558,168.37,64.077z M45.148,248.5c2.103-59.879,29.271-113.484,71.317-150.629
			c9.509,6.198,19.361,11.724,29.499,16.564c-13.284,39.272-20.938,85.552-21.655,134.065H45.148z M128.613,424.17
			c7.308-4.563,14.819-8.719,22.51-12.447c5.101,13.048,10.861,25.178,17.235,36.179C154.288,441.47,140.955,433.513,128.613,424.17
			z M248.5,466.865c-19.34-0.688-38.241-4.028-56.254-9.748c-10.587-14.396-19.807-31.812-27.457-51.491
			c26.456-10.837,54.719-16.864,83.711-17.751V466.865z M248.5,372.869c-30.749,0.886-60.731,7.215-88.812,18.637
			c-12.479-37.386-19.679-81.555-20.38-128.006H248.5V372.869z M248.5,248.5H139.308c0.701-46.451,7.901-90.62,20.38-128.006
			c28.081,11.422,58.063,17.751,88.812,18.637V248.5z M248.5,124.126c-28.993-0.887-57.255-6.914-83.711-17.751
			c7.657-19.698,16.887-37.127,27.486-51.531c17.84-5.664,36.699-9.01,56.225-9.696V124.126z M466.852,248.5h-79.161
			c-0.716-48.513-8.371-94.793-21.655-134.065c10.138-4.84,19.99-10.366,29.499-16.564
			C437.581,135.016,464.749,188.621,466.852,248.5z M383.328,87.865c-7.289,4.55-14.78,8.693-22.451,12.412
			c-5.105-13.056-10.868-25.193-17.247-36.199C357.768,70.559,371.069,78.559,383.328,87.865z M263.501,45.148
			c19.525,0.685,38.384,4.031,56.224,9.696c10.599,14.404,19.829,31.833,27.487,51.531c-26.456,10.837-54.718,16.864-83.711,17.751
			V45.148z M263.5,139.131c30.749-0.886,60.731-7.215,88.812-18.637c12.48,37.386,19.68,81.555,20.38,128.006H263.5V139.131z
			 M263.5,263.5h109.192c-0.701,46.451-7.901,90.62-20.38,128.006c-28.081-11.422-58.063-17.751-88.812-18.637V263.5z
			 M263.5,466.852v-78.978c28.993,0.887,57.255,6.914,83.711,17.751c-7.657,19.698-16.887,37.127-27.486,51.531
			C301.885,462.82,283.026,466.166,263.5,466.852z M343.63,447.923c6.379-11.007,12.142-23.144,17.247-36.2
			c7.671,3.718,15.162,7.862,22.451,12.412C371.069,433.441,357.769,441.442,343.63,447.923z M395.535,414.129
			c-9.509-6.198-19.361-11.724-29.499-16.564c13.284-39.272,20.938-85.552,21.655-134.065h79.161
			C464.749,323.379,437.581,376.984,395.535,414.129z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>@foreach($getWebsiteSocialLink as $key => $website_social_links_details)
										<a class="other-details" href="{{ $website_social_links_details['uwsl_website_link'] }}"> &nbsp;{{ $website_social_links_details['uwsl_website_label'] }}</a>
										@endforeach
									</li>
									@endif

									@if(!empty($getResumeFullNameEmail))
									<li><a href="mailto:{{ $getResumeFullNameEmail['resume_email'] }}" class="other-details">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<polygon points="339.392,258.624 512,367.744 512,144.896 		"/>
	</g>
</g>
<g>
	<g>
		<polygon points="0,144.896 0,367.744 172.608,258.624 		"/>
	</g>
</g>
<g>
	<g>
		<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>
	</g>
</g>
<g>
	<g>
		<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856
			L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg> &nbsp;{{ $getResumeFullNameEmail['resume_email'] }}</a></li>
									@endif
									@if(!empty($getPersonalDetails['place_of_birth']) || !empty($getPersonalDetails['date_of_birth']))
										@php 
											$location = array_filter(array($getPersonalDetails['date_of_birth'],$getPersonalDetails['place_of_birth']));
										@endphp
									<li>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="n-svg-img" width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
<g>
	<path d="M516.316,337.52l94.233,193.581c3.832,7.873-0.196,14.314-8.952,14.314H10.402c-8.756,0-12.785-6.441-8.952-14.314
		L95.684,337.52c1.499-3.079,5.528-5.599,8.952-5.599h80.801c2.49,0,5.853,1.559,7.483,3.442
		c5.482,6.335,11.066,12.524,16.634,18.65c5.288,5.815,10.604,11.706,15.878,17.735h-95.891c-3.425,0-7.454,2.519-8.952,5.599
		L58.163,505.589h495.67l-62.421-128.242c-1.498-3.08-5.527-5.599-8.953-5.599h-96.108c5.273-6.029,10.591-11.92,15.879-17.735
		c5.585-6.144,11.2-12.321,16.695-18.658c1.628-1.878,4.984-3.434,7.47-3.434h80.971
		C510.789,331.921,514.817,334.439,516.316,337.52z M444.541,205.228c0,105.776-88.058,125.614-129.472,227.265
		c-3.365,8.26-14.994,8.218-18.36-0.04c-37.359-91.651-112.638-116.784-127.041-198.432
		c-14.181-80.379,41.471-159.115,122.729-166.796C375.037,59.413,444.541,124.204,444.541,205.228z M379.114,205.228
		c0-40.436-32.779-73.216-73.216-73.216s-73.216,32.78-73.216,73.216c0,40.437,32.779,73.216,73.216,73.216
		S379.114,245.665,379.114,205.228z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg> &nbsp;{{ implode(", ",$location) }}</li>
									@endif

									@if(!empty($getPersonalDetails['address']) || !empty($getPersonalDetails['country']) || !empty($getPersonalDetails['city']) || !empty($getPersonalDetails['postal_code']))
										@php 
											$address = array_filter(array($getPersonalDetails['address'],$getPersonalDetails['city'],$getPersonalDetails['postal_code'],$getPersonalDetails['country']));
										@endphp
									<li>
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg> &nbsp;{{ implode(', ',$address) }}</li>
									@endif

								</ul>
							</td>
						</tr>
						@else
						<tr>
							<td>
								<h2 class="hedding-c">Reach Me At</h2>
								<ul class="inst-con">
									<li><img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-mob.png') }}" alt="mobile"> 123-456-4569</li>
									<li><img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-phone.png') }}" alt="phone"> 987-654-3210</li>
									<li><img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-web.png') }}" alt="web"> www.domainname.com</li>
									<li><img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-mail.png') }}" alt="mail"> yourmail@name.com</li>
									<li><img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-map.png') }}" alt="location"> 123, Location Address, City, Country, 132456</li>
								</ul>
							</td>
						</tr>
						@endif
					</table>
				</td>
				<td class="ver-alg-top pl-20">
					<table class="left-cont w-100">
						@if(!empty($getEducation) && count($getEducation) > 0)
						<tr id="EducationDetails_Text">
							<h2 class="hedding-c mt-0">Academic History</h2>
							<td>
								<table class="w-100" id="EducationDetails_new">
									@foreach($getEducation as $key => $education_details)
									@php 
										$vars = array_filter(array($education_details['ue_start_date'], $education_details['ue_end_date']));
										$vars_a = array_filter(array($education_details['ue_degree'], $education_details['ue_school_name'],$education_details['ue_city']));
									@endphp
									<tr>
										<td>
											
											<h3 class="acd"><span class="education-school">{{ $education_details['ue_school_name'] }}</span></h3>
											<h4 class="sub-cat">
												{{ implode(" | ", $vars_a) }}
											</h4>
											<h4 class="sub-cat">
												@if($education_details['ue_is_present'] == 0)
													<span class="education-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="education-label">{{ implode(" - ", $vars) }}</span>
												@endif
											</h4>
											@if(!empty($education_details['education_description']))
											<ul class="ldot-con">
												<li class="employer-description-text">{!! $education_details['education_description'] !!}</li>	
											</ul>
											@endif
										</td>
									</tr>
									@endforeach
								</table>								
							</td>
						</tr>
						@else
							<tr id="EducationDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Education</h2>
									<table class="w-100 employ-histry" id="EducationDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getCareers) && count($getCareers) > 0)
						<tr id="EmployerDetails_Text">
							<td>
								<h2 class="hedding-c">Career History</h2>
								<table class="w-100" id="EmployerDetails_new">
									@foreach($getCareers as $key => $employer_details)
									@php 
										$vars = array_filter(array($employer_details['uc_start_date'], $employer_details['uc_end_date']));
										$vars_a = array_filter(array($employer_details['uc_job_title'], $employer_details['uc_company_name'],$employer_details['uc_city']));
									@endphp
									<tr>
										<td>
											<h3 class="acd"><span class="employer-job-title">{{ $employer_details['uc_job_title'] }}</span></h3>
											<h4 class="sub-cat">
												{{ implode(" | ", $vars_a) }}
											</h4>
											<h4 class="sub-cat">
												@if($employer_details['uc_is_present'] == 0)
													<span class="employer-end-date">{{ implode(" - ", $vars) }}</span>
												@else
													<span class="present-label">{{ implode(" - ", $vars) }}</span>
												@endif
											</h4>
											@if(!empty($employer_details['career_description']))
											<div class="ldot-con">
												<div class="employer-description-text">{!! $employer_details['career_description'] !!}</div>	
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</table>								
							</td>
						</tr>
						@else
							<tr id="EmployerDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Career History</h2>
									<table class="w-100 employ-histry" id="EmployerDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getCourse) && count($getCourse) > 0) 
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="hedding-c">Courses</h2>

								<ul class="inst-con" id="CourseSectionDetails_new">
									@foreach($getCourse as $key => $course_details)
									@php 
										$vars = array_filter(array($course_details['ucr_start_date'], $course_details['ucr_end_date']));
										$vars_a = array_filter(array($course_details['ucr_course_name'], $course_details['ucr_institute']));
									@endphp
										<li><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" class="n-svg-img" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<polygon points="512,197.816 325.961,185.585 255.898,9.569 185.835,185.585 0,197.816 142.534,318.842 95.762,502.431 
			255.898,401.21 416.035,502.431 369.263,318.842 		"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>{{--<img src="{{ asset('/frontend/images/resume_templates/lemon-images/lemon-star.png') }}" alt="star">--}} 
									{{ implode(" | ", $vars_a) }}&nbsp;&nbsp;&nbsp;&nbsp;
									@if($course_details['ucr_is_present'] == 0)
	                                	<span class="course-end-date">{{ implode(" - ", $vars) }}</span>
	                                @else
	                                	<span class="course-present-label">{{ implode(" - ", $vars) }}</span>
	                                @endif
                                    </li>
									@endforeach								
								</ul>
							</td>
						</tr>
						@else
						<tr id="CourseSectionDetails_Text">
							<td>
								<h2 class="hedding-c" style="display: none;">Courses</h2>
								<ul class="inst-con" id="CourseSectionDetails_new"></ul>
							</td>
						</tr>
						@endif

						@if(!empty($getExtraCurricularActivity) && count($getExtraCurricularActivity) > 0) 
						<tr id="ExtraCurricularActivityDetails_Text">
							<td>
								<h2 class="hedding-c">Extra-Curricular Activity</h2>
								<table class="w-100" id="ExtraCurricularSectionDetails_new">
									@foreach($getExtraCurricularActivity as $key => $extra_curricular_section_details)
									@php 
										$vars = array_filter(array($extra_curricular_section_details['ueca_start_date'], $extra_curricular_section_details['ueca_end_date']));
										$vars_a = array_filter(array($extra_curricular_section_details['ueca_employer'],$extra_curricular_section_details['ueca_city']));
									@endphp
									<tr>
										<td>
											<h3 class="acd"><span class="function-title">{{ $extra_curricular_section_details['ueca_function_title'] }}</span></h3>
											<h4 class="sub-cat">
												{{ implode(" | ", $vars_a) }}	
											</h4>
											<h4 class="sub-cat">
											@if($extra_curricular_section_details['ueca_is_present'] == 0)
												<span class="extra-curricular-end-date">{{ implode(" - ", $vars) }}</span>
											@else
												<span class="extra-curricular-present-label">{{ implode(" - ", $vars) }}</span>
											@endif
											</h4>
											@if(!empty($extra_curricular_section_details['extra_curricular_description']))
											<div class="ldot-con">
												<div class="extra-curricular-description-text">{!! $extra_curricular_section_details['extra_curricular_description'] !!}</div>				
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</table>								
							</td>
						</tr>
						@else
							<tr id="ExtraCurricularActivityDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Extra-Curricular Activity</h2>
									<table class="w-100 employ-histry" id="ExtraCurricularSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getInternship) && count($getInternship) > 0) 
						<tr id="InternshipDetails_Text">
							<td>
								<h2 class="hedding-c">Internships</h2>
								<table class="w-100" id="InternshipSectionDetails_new">
									@foreach($getInternship as $key => $internship_details)
									@php 
										$vars = array_filter(array($internship_details['ui_start_date'],$internship_details['ui_end_date']));
										$vars_a = array_filter(array($internship_details['ui_employer'],$internship_details['ui_city']));
									@endphp
									<tr>
										<td>
											<h3 class="acd"><span class="internship-job-title">{{ $internship_details['ui_job_title'] }}</span></h3>
											<h4 class="sub-cat">
												{{ implode(" | ", $vars_a) }}
											</h4>
											<h4 class="sub-cat">
											@if($internship_details['ui_is_present'] == 0)
                                                <span class="internship-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="internship-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif
											</h4>
											@if(!empty($internship_details['internship_description']))
											<div class="ldot-con">
												<div class="internship-description-text">{!! $internship_details['internship_description'] !!}</div>			
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</table>								
							</td>
						</tr>
						@else
							<tr id="InternshipDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Internships</h2>
									<table class="w-100 employ-histry" id="InternshipSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getCustomSection) && count($getCustomSection) > 0) 
						<tr id="CustomSectionDetails_Text">
							@php $custom_heading = ''; @endphp
							@foreach($getCustomSection as $custom)
								@php $custom_heading = $custom->ucs_main_heading; @endphp
							@endforeach
							<td>
								<h2 class="hedding-c">{{ $custom_heading }}</h2>
								<table class="w-100" id="CustomSectionDetails_new">
									@foreach($getCustomSection as $key => $custom_section_details)
									@php 
										$vars = array_filter(array($custom_section_details['ucs_start_date'],$custom_section_details['ucs_end_date']));
										$vars_a = array_filter(array($custom_section_details['ucs_title'],$custom_section_details['ucs_city']));
									@endphp
									<tr>
										<td>
											<h3 class="acd"><span class="custom-job-title">{{ implode(" | ", $vars_a) }}</span></h3>
											<h4 class="sub-cat">
											@if($custom_section_details['ucs_is_present'] == 0)
                                                <span class="custom-end-date">{{ implode(" - ", $vars) }}</span>
                                            @else
                                                <span class="custom-present-label">{{ implode(" - ", $vars) }}</span>
                                            @endif
											</h4>
											@if(!empty($custom_section_details['custom_description']))
											<div class="ldot-con">
												<div class="custom-description-text">{!! $custom_section_details['custom_description'] !!}</div>
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</table>								
							</td>
						</tr>
						@else
							<tr id="CustomSectionDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Custom</h2>
									<table class="w-100 employ-histry" id="CustomSectionDetails_new">
									</table>
								</td>
							</tr>
						@endif

						@if(!empty($getReference) && count($getReference) > 0) 
						<tr id="ReferenceDetails_Text">
							<td>
								<h2 class="hedding-c">Reference</h2>
								<table class="w-100" id="ReferenceDetails_new">
									@if(!empty($getPersonalDetails) && ($getPersonalDetails['is_reference_hide'] == 1)) 
                                        <p>I'd like to hide references and make them available only upon request</p>
                                    @else
									@foreach($getReference as $key => $reference_details)
									@php 
										$vars = array_filter(array($reference_details['ur_refer_full_name'],$reference_details['ur_refer_company_name']));
										$vars_a = array_filter(array($reference_details['ur_refer_phone'],$reference_details['ur_refer_email']));
									@endphp
									<tr>
										<td>
											<h3 class="acd">
												{{ implode(" from ", $vars) }}
											</h3>
											<h4 class="sub-cat">
												{{ implode(" | ", $vars_a) }}
											</h4>
										</td>
									</tr>
									@endforeach
									@endif
								</table>								
							</td>
						</tr>
						@else
							<tr id="ReferenceDetails_Text">
								<td>
									<h2 class="hedding-c mt-0" style="display: none;">Reference</h2>
									<table class="w-100 employ-histry" id="ReferenceDetails_new">
									</table>
								</td>
							</tr>
						@endif
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>