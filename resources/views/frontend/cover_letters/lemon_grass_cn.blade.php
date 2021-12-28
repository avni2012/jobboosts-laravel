<!DOCTYPE html>
<html>
<head>
	<title>Lemon Grass</title>
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
	    .lg-namecon {padding: 15px 35px;}
	    .lg-namecon h1{color: #40444d;font-size: 42px;font-weight: bold;}
	    .lg-namecon h2{font-size: 18px;color: #545860;text-transform: capitalize;font-weight: bold;margin-bottom: 8px;}
	    .i-svg-img {height: 28px;width: 28px;fill: #363c49;margin-right: 3px;}
	    .icon-con{display: flex;align-items: center;border-bottom: 1px solid #f4f4f4;padding: 3px 0;color: #3c4049;font-size: 18px;font-weight: bold;}
	    .justify-content-center{justify-content: center;}
	    .p-l-35{padding-left: 35px;}
	    .lg-con-d{margin-top: 15px;}
	    .lg-con-d h6{color: #5b5b5b;font-weight: bold;font-size: 16px;}
	    .lg-con-d div{color: #777777;font-size: 16px;}
	    .lg-con-d div a{color: #777777;text-decoration: none;}
	    .w-20p{width: 25%;}
	    .c-lemon-grass-con p {margin-bottom: 10px;color: #777777;text-align: justify;}
	    .c-lemon-grass-con div {color: #777777;}
	    .ml-40, .c-lemon-grass-con ul{margin-left: 40px;}
	    .mb-10, .c-lemon-grass-con ul{margin-bottom: 10px;}
	    .plr-30{padding: 0 40px;}
	    .c-lemon-grass-con p, .c-lemon-grass-con a {/*word-break: break-all;*/}
	    .c-lemon-grass-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-lemon-grass-con">
	<table class="w-100">
		<tr>
			<td>
				<div class="lg-namecon">
					<h1>@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2>{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<table class="w-100">
					<tr>
						<td class="p-l-35 ver-alg-top w-20p">
							@if(!empty($getCoverLetterFullNameEmail))
							<h3 class="icon-con">
								<svg version="1.1" id="Capa_1" class="i-svg-img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
								<g>
									<g id="account-circle">
										<path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
											c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
											c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z"/>
									</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
								</svg>
								Personal Info
							</h3>
							@if(!empty($getPersonalDetails['cl_phone']))
							<div class="lg-con-d">
								<h6>Phone</h6>
								<div>{{ $getPersonalDetails['cl_phone']}}</div>
							</div>
							@endif
							@if(!empty($getPersonalDetails['cl_address']))
							<div class="lg-con-d">
								<h6>Address</h6>
								<div>{{ $getPersonalDetails['cl_address']}}</div>
							</div>
							@endif
							<div class="lg-con-d">
								<h6>Email</h6>
								<div><a href="#">{{ $getCoverLetterFullNameEmail['resume_email'] }}</a></div>
							</div>
							@endif
						</td>
						<td class="ver-alg-top plr-30">
							<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>	
							<div class="u-name-cont"><b>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name'])){{ $getPersonalDetails['cl_emp_hiring_manager_name']}}@endif</b></div>
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
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>