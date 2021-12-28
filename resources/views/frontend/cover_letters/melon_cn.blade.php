
<!DOCTYPE html>
<html>
<head>
	<title>Melon</title>
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
	    .p-lr{padding: 30px 50px;}
	    .m-name{color: #4a4a4a;text-transform: capitalize;font-size: 34px;}
	    .m-s-name{font-size: 18px;color: #a8a8a8;text-transform: capitalize;}
	    .c-melon-con p {margin-bottom: 10px;}
	    .ml-40, .c-melon-con ul{margin-left: 40px;}
	    .mb-10, .c-melon-con ul{margin-bottom: 10px;}
	    .p-tb-15{padding: 15px 0px;}
	    .pl-50{padding-left: 50px;}
	    .w-23{width: 23%;}
	    .ml-tf-con{color: #868686;font-weight: bold;margin-bottom: 15px;font-size: 16px;}
	    .ml-name-cont{/*color: #c8b489;*/color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#B58E58" }} @endif; font-size: 16px; /*margin-bottom: 3px;*/}
	    .pos-con-m, .ml-address-con, .ml-phone-con, .ml-email-con{color: #acacac;font-size: 16px;margin-bottom: 20px;}
	    .p-pl-s-30{padding: 0 30px;}
	    .c-melon-con p, .c-melon-con a {/*word-break: break-all;*/}
	    .c-melon-con li{margin-bottom: 10px;}
	    .pos-con-mm{margin-bottom: 3px;}
	</style>
</head>
<body>
<div class="c-melon-con">
	<table class="w-100">
		<tr>
			<td class="p-lr">
				<h1 class="m-name">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="m-s-name">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
			</td>
		</tr>
		<tr>
			<td class="p-tb-15">
				<table class="w-100">
					<tr>
						<td class="ver-alg-top pl-50 w-23">
							@if(!empty($getPersonalDetails) && (!empty($getPersonalDetails['cl_emp_hiring_manager_name']) || !empty($getPersonalDetails['cl_emp_company_name'])))
							<div class="ml-snd-sec">
								<div class="ml-tf-con">To</div>
								<div class="ml-name-cont">{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</div>
								<div class="pos-con-m">{{ $getPersonalDetails['cl_emp_company_name']}}</div>
							</div>
							@endif
							@if(!empty($getCoverLetterFullNameEmail))
							<div class="ml-snd-sec">
								<div class="ml-tf-con">From</div>
								<div class="ml-name-cont">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</div>
								@if(!empty($getPersonalDetails))
								<div class="pos-con-mm">{{ $getPersonalDetails['cl_job_title'] }}</div>
								<div class="pos-con-mm">{{ $getPersonalDetails['cl_address']}}</div>
								<div class="pos-con-mm">{{ $getPersonalDetails['cl_phone']}}</div>
								@endif
								<div class="pos-con-m">{{ $getCoverLetterFullNameEmail['resume_email'] }}</div>
							</div>
							@endif
						</td>
						<td class="ver-alg-top p-pl-s-30">
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
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>