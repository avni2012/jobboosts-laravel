<p>
<!DOCTYPE html>
<html>
<head>
	<title>Hibiscus</title>
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
	    .w-100 {width: 100%;}
	    .w-70{width: 70%;}
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
	    .p-30{padding: 45px 70px;}
	    .hib-nm{color: #232323;font-weight: bold;text-transform: capitalize;font-size: 28px;}	    
	    .him-ps{color: #919191;font-size: 18px;font-weight: bold;margin-bottom: 30px;}
	    .hib-det-c td{width: 50%; vertical-align: top;}
	    .hib-f-b{padding-bottom: 40px;border-bottom: 1px solid #cccccc;}
	    .hib-s-b{padding-top: 40px;}
	    .h-hed-v{font-size: 16px;font-weight: bold;margin-bottom: 25px;color: #828282;}
	    .hib-name-con{color: #393939;font-weight: bold;}
	    .hib-work-con{color: #a7a7a7;margin-bottom: 30px;}
	    .c-hibiscus-con p {margin-bottom: 10px;}
	    .ml-40, .c-hibiscus-con ul{margin-left: 40px;}
	    .mb-10, .c-hibiscus-con ul{margin-bottom: 10px;}
	    .w-25{width: 25%;}
	    .c-hibiscus-con p, .c-hibiscus-con a {/*word-break: break-all;*/}
	    .c-hibiscus-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-hibiscus-con p-30">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="hib-f-b">
					<h1 class="text-center hib-nm">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="text-center him-ps">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
					<table class="w-70 m-auto hib-det-c">
						<tr>
							@if(!empty($getPersonalDetails['cl_address']))
							<!-- <td>
								<b>Address</b>
							</td> -->
							<td class="text-center">
								{{ $getPersonalDetails['cl_address']}}
							</td>
							@endif
							@if(!empty($getPersonalDetails['cl_phone']))
							<!-- <td>
								<b>Phone</b>
							</td> -->
							<td class="text-center">
								{{ $getPersonalDetails['cl_phone']}}
							</td>
							@endif
						</tr>
						<tr>
							<td>
								
							</td>							
							@if(!empty($getCoverLetterFullNameEmail))
							<!-- <td>
								<b>Email</b>
							</td> -->
							<td class="text-center">
								{{ $getCoverLetterFullNameEmail['resume_email'] }}
							</td>
							@endif
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="hib-s-b">
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-25">
								<div class="hib-to-con">
									@if(!empty($getPersonalDetails) && (!empty($getPersonalDetails['cl_emp_hiring_manager_name']) || !empty($getPersonalDetails['cl_emp_company_name'])))
										<div class="hib-to-con h-hed-v">To</div>
										<div class="hib-name-con"><p>{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</p></div>
										<div class="hib-work-con"><p>{{ $getPersonalDetails['cl_emp_company_name']}}</p></div>
										@if(!empty($getPersonalDetails) && 	!empty($getPersonalDetails['cl_emp_address']))
										<div class="company-address w-240">
											<div class="address-line-1"><p>{{ $getPersonalDetails['cl_emp_address']}}</p></div>
										</div>
										@endif
										<div class="comp-phone"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</p></div>
										<div class="comp-mail"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</p></div><br>
										@endif
								</div>
								<div class="hib-frm-con">
									<div class="hib-from-con h-hed-v">From</div>
									<div class="hib-name-con">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</div>
									@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<div class="hib-work-con">{{ $getPersonalDetails['cl_job_title'] }}</div>@endif
								</div>
							</td>
							<td class="ver-alg-top">
								<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>
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
		</tbody>
	</table>
</div>
</body>
</html>