
<!DOCTYPE html>
<html>
<head>
	<title>Cotton</title>
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
	    .c-cotton-con{padding: 30px 55px;}
	    .cot-name-con{width: 40%;margin: auto;text-align: center;border: 2px solid #313131;padding: 35px 10px;}
	    .cot-name-con h1{color: #060606;text-transform: uppercase;font-weight: bold;letter-spacing: 4px;margin-bottom: 6px;}
	    .cot-name-con h2{color: #8f8f8f;text-transform: uppercase;font-size: 18px;font-weight: bold;}
	    .s-con-d{text-align: center;margin: 45px 0;}
	    .s-con-d ul{display: block;}
	    .s-con-d ul li{display: inline-block;margin: 0 5px;}
	    .co-con{border-bottom-color: #e0e0e0;}
	    .l-s-bod-co{border-right: 1px solid #9a9a9a;padding: 10px 0;padding-right: 30px;width: 25%;}
	    .cotbd-con{padding: 45px 0px;}
	    .titl-con{color: #d9d9d9;margin-bottom: 22px;font-weight: bold;text-transform: uppercase;}
	    .t-namec{font-weight: bold;color: #272727;margin-bottom: 22px;}
	    .d-po{color: #a9a9a9;}
	    .mb-0{margin-bottom: 0;}
	    .r-s-cot-c{padding: 10px 50px;padding-right: 0;}
	    .c-cotton-con p {margin-bottom: 10px;}
	    .ml-40, .c-cotton-con ul{margin-left: 40px;}
	    .mb-10, .c-cotton-con ul{margin-bottom: 10px;}
	    .sm-adc{font-size: 16px;font-weight: bold;}
	    .c-cotton-con p, .c-cotton-con a {/*word-break: break-all;*/}
	    .c-cotton-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-cotton-con">
	<table class="w-100">
		<tr>
			<td>
				<div class="cot-name-con">
					<h1>@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2>{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</div>
				<div class="s-con-d">
					@if(!empty($getPersonalDetails['cl_address']))<h5 class="sm-adc">{{ $getPersonalDetails['cl_address']}}</h5>@endif
					<ul>
						@if(!empty($getPersonalDetails['cl_phone']))<li>{{ $getPersonalDetails['cl_phone']}}</li>@endif
						@if(!empty($getCoverLetterFullNameEmail))<li>{{ $getCoverLetterFullNameEmail['resume_email'] }}</li>@endif
					</ul>
				</div>
				<hr class="co-con">
			</td>
		</tr>
		<tr>
			<td class="cotbd-con">
				<table class="w-100">
					<tr>
						<td class="l-s-bod-co ver-alg-top">
							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))
							<div class="c-cot-to-con titl-con">To</div>
							<div class="c-con-to-name t-namec">{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</div>
							<br><br>
							@endif
							@if(!empty($getCoverLetterFullNameEmail))
							<div class="c-cot-to-con titl-con">From</div>
							<div class="c-con-to-name t-namec mb-0">{{ $getCoverLetterFullNameEmail['resume_fullname'] }}</div>
							<div class="c-con-to-postn d-po">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title'])){{ $getPersonalDetails['cl_job_title'] }}@endif</div>
							@endif
						</td>
						<td class="ver-alg-top r-s-cot-c">
							<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>	
							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))
							<div class="comp-name">{{ $getPersonalDetails['cl_emp_company_name']}}</div>				
							@endif
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
								<div class="sincrl-con">Best Regarads,</div><br>
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