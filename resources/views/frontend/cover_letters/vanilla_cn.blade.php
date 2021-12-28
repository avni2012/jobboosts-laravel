
<!DOCTYPE html>
<html>
<head>
	<title>Vanilla</title>
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
	    .vnl-u-name{color: #343434;font-size: 42px;}
	    .vnl-namecont{padding: 30px 0px;}
	    .vnl-s-pos{position: relative; border: 1px solid #e5e5e5; width:215px; margin: auto; margin-top: -18px; z-index: 1; background-color: #fff; border-radius: 26px; padding: 5px 15px;}
	    .vnl-s-pos h2{font-size: 18px;}
	    .c-vanilla-con p {margin-bottom: 10px;color: #646464;}
	    .c-vanilla-con div, .c-vanilla-con a{color: #646464;} 
	    .ml-40, .c-vanilla-con ul{margin-left: 40px;}
	    .mb-10, .c-vanilla-con ul{margin-bottom: 10px;}
	    .vnl-desc-cont{width: 70%;margin: auto;text-align: justify;}
	    .p-30{padding: 30px;}
	    .i-svg-img {height: 14px;width: 14px;fill: #646464;margin-right: 3px;}
	    .icon-con{display: flex;align-items: center;}
	    .justify-content-center{justify-content: center;}
	    .vnl-ml-co-ph{padding: 14px 25px;border-top: 1px solid #e5e5e5;color: #646464;}
	    .t3-c-con{width: 33.33%;}
	    .h-10vh{height: 100vh;}
	    .h-100{height: 100%;}
	    .hcl{height: calc(100vh - 145px);}
	    .det-con{font-size: 16px;}
	    .c-vanilla-con p, .c-vanilla-con a {/*word-break: break-all;*/}
	    .c-vanilla-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-vanilla-con h-10vh">
	<table class="w-100 h-100">
		<tbody>
			<tr>
				<td class="vnl-namecont">
					<h1 class="vnl-u-name text-center">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
				</td>
			</tr>
			<tr>
				<td style="border-top: 1px solid #e5e5e5;">
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<div class="vnl-s-pos"><h2 class="text-center">{{ $getPersonalDetails['cl_job_title'] }}</h2></div>@endif
				</td>
			</tr>
			<tr class="hcl">
				<td class="p-30">
					<div class="vnl-desc-cont">
						<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>	
						<div class="u-name-cont">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name'])){{ $getPersonalDetails['cl_emp_hiring_manager_name']}}@endif</div>
						<div class="comp-name">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name'])){{ $getPersonalDetails['cl_emp_company_name']}}@endif</div>
						@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
						<div class="company-address w-240">
							<div class="address-line-1">{{ $getPersonalDetails['cl_emp_address']}}</div>
						</div>
						@endif
						<div class="comp-phone">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</div>
						<div class="comp-mail">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</div><br>

						@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
						{{--<div class="u-name-cont">Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}},</div><br>--}}
						<div class="cont-description">
							{!! $getPersonalDetails['cl_details'] !!}
						</div><br>
						@if(!empty($getCoverLetterFullNameEmail))
							<div class="sincrl-con">Sincerely,</div><br>
							<div class="name-cont">{{ $getCoverLetterFullNameEmail['resume_fullname'] }}</div>
							<div class="name-cont">{{ $getPersonalDetails['cl_phone']}}</div>
							<div class="name-cont">{{ $getCoverLetterFullNameEmail['resume_email'] }}</div>
						@endif
						@endif
					</div>					
				</td>
			</tr>
			<tr>
				<td>
					<div class="vnl-ml-co-ph">
						<table class="w-100 text-center">
							<tr>
								<td class="t3-c-con">
									<h5 class="icon-con justify-content-center det-con">
										<!-- <span class="i-back-round"> -->
										@if(!empty($getCoverLetterFullNameEmail))
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="i-svg-img" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
												</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
												</svg>
											<!-- </span> -->
											{{ $getCoverLetterFullNameEmail['resume_email'] }}
										@endif
									</h5>
								</td>

								<td class="t3-c-con">
									<h5 class="icon-con justify-content-center det-con">
										@if(!empty($getPersonalDetails['cl_phone']))
										<!-- <span class="i-back-round">				 -->					
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="i-svg-img" viewBox="0 0 513.64 513.64" style="enable-background:new 0 0 513.64 513.64;" xml:space="preserve">
											<g>
												<g>
													<path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
														c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
														c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
														l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"/>
												</g>
											</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
											</svg>
									<!-- 	</span> -->
											{{ $getPersonalDetails['cl_phone']}}
										@endif
									</h5>
								</td>

								<td class="t3-c-con">
									<h5 class="icon-con justify-content-center det-con">
										<!-- <span class="i-back-round"> -->
										@if(!empty($getPersonalDetails['cl_address']))
											<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="i-svg-img" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
											<g>
												<g>
													<path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5
														c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021
														C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333
														s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z"/>
												</g>
											</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
											</svg>
										<!-- </span> -->
											{{ $getPersonalDetails['cl_address']}}
										@endif
									</h5>
								</td>
							</tr>
						</table>	
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>