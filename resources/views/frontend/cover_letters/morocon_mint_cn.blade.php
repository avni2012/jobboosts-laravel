
<!DOCTYPE html>
<html>
<head>
	<title>Moroccon Mint</title>
	<style type="text/css">
		:root{
			--bg-athna: #6884c1;
		}
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
	    .c-moroccon-mint{padding: 45px 55px;/*border-top: 10px solid #002851;*/border-top: 10px solid @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#082A4D" }} @endif; }
	    .m-u-name{color: #141414;font-size: 34px;font-weight: bold;}
	    .m-u-s-name{color: #949494;font-size: 14px;font-weight: bold;text-transform: uppercase;margin-top: 3px;margin-bottom: 40px;}
	    .m-to-sc-name{color: #1e1e1e;font-size: 22px;}
	    .c-moroccon-mint p {margin-bottom: 10px;color: #6f6f6f;}
	    .c-moroccon-mint div, .c-moroccon-mint a{color: #6f6f6f;}
	    .c-moroccon-mint a{text-decoration: none;}
	    .ml-40, .c-moroccon-mint ul{margin-left: 40px;}
	    .mb-10, .c-moroccon-mint ul{margin-bottom: 10px;}
	    .pr-40{padding-right: 40px;}
	    .w-25p{width: 25%;}
	    .mr-ad-sec{margin-bottom: 15px;}
	    .mr-ad-sec h5{font-size: 14px;color: #b7b7b7;text-transform: uppercase;margin-bottom: 3px;}
	    .c-moroccon-mint p, .c-moroccon-mint a {/*word-break: break-all;*/}
	    .c-moroccon-mint li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-moroccon-mint">
	<table class="w-100">
		<tbody>
			<tr>
				<td>
					<h1 class="m-u-name">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="m-u-s-name">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</td>
			</tr>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td>
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<h3 class="m-to-sc-name"><b>To: {{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</b></h3>@endif
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<h4 class="m-u-s-name">{{ $getPersonalDetails['cl_emp_company_name']}}</h4>@endif
							</td>
						</tr>
						<tr>
							<td class="ver-alg-top pr-40">
								<div class="date-cont"><p>{{ date('M d, Y') }}</p></div>	
								{{--<div class="u-name-cont">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name'])){{ $getPersonalDetails['cl_emp_hiring_manager_name']}}@endif</div>
								<div class="comp-name">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name'])){{ $getPersonalDetails['cl_emp_company_name']}}@endif</div>--}}

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
							<td class="ver-alg-top w-25p">
								@if(!empty($getPersonalDetails['cl_address']))
								<div class="mr-ad-sec">
									<h5>Address</h5>
									<div><p>{{ $getPersonalDetails['cl_address']}}</p></div>
								</div>
								@endif
								@if(!empty($getCoverLetterFullNameEmail))
								<div class="mr-ad-sec">
									<h5>Email</h5>
									<div><a href="#">{{ $getCoverLetterFullNameEmail['resume_email'] }}</a></div>
								</div>
								@endif
								@if(!empty($getPersonalDetails['cl_phone']))	
								<div class="mr-ad-sec">
									<h5>Phone</h5>
									<div><p>{{ $getPersonalDetails['cl_phone']}}</p></div>
								</div>
								@endif
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div> 
</body>
</html>