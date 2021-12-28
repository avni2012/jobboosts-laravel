<p>
<!DOCTYPE html>
<html>
<head>
	<title>Bellini</title>
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
	    .c-bellini-con{padding: 40px 60px;color: #8d8d8d;}  
	    .u-n-con, .heading-phone-email{display: block;}	
	    .heading-phone-email div{display: inline-block;}	    
	    .u-n-con h2, .h-email{margin-left: 3px;}
	    .u-n-con h1,.u-n-con h2{display: inline-block;font-size: 28px;text-transform: capitalize;/*color: #cc3440;*/color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#00C571" }} @endif;}
	    .h-ln{border-top-color: #e4e4e4;margin: 45px 0px;}
	    .c-bellini-con p, .c-bellini-con li {margin-bottom: 10px;color: #8d8d8d;}
	    .ml-40, .c-bellini-con ul{margin-left: 40px;}
	    .mb-10, .c-bellini-con ul{margin-bottom: 10px;}
	    .w-20p{width: 25%;}
	    .c-bellini-con p, .c-bellini-con a {/*word-break: break-all;*/}	   
	    .sincrl-con, .name-cont{color: #8d8d8d;}
	</style>
</head>
<body>
<div class="c-bellini-con">
	<table class="w-100">
		<tbody>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td>
								<div class="u-n-con">
									<h1>@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
									<h2>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title'])), {{ $getPersonalDetails['cl_job_title'] }}@endif</h2>
								</div>
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_address']))
								<div class="heading-address">{{ $getPersonalDetails['cl_address']}}</div>@endif
								<div class="heading-phone-email">
									@if(!empty($getPersonalDetails['cl_phone']))<div class="h-phone">{{ $getPersonalDetails['cl_phone']}}, </div>@endif
									<div class="h-email">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_email'] }}@endif</div>					 
								</div>
								<hr class="h-ln">
							</td>
						</tr>
					</table>					
				</td>
			</tr>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td class="ver-alg-top w-20p">
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<h3>{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</h3>@endif
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<h4>{{ $getPersonalDetails['cl_emp_company_name']}}</h4>@endif
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
									<div class="company-address w-240">
										<div class="address-line-1"><p>{{ $getPersonalDetails['cl_emp_address']}}</p></div>
									</div>
									@endif
									<div class="comp-phone"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</p></div>
									<div class="comp-mail"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</p></div><br>	
							</td>
							<td class="ver-alg-top">
									<div class="date-cont">{{ date('M d, Y') }}</div><br>
									
									@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
									{{--<div class="u-name-cont">Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}},</div><br>--}}
									<div class="cont-description">
										{!! $getPersonalDetails['cl_details'] !!}
									</div><br>
									@if(!empty($getCoverLetterFullNameEmail))
										<div class="sincrl-con">Best Regards,</div><br>
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