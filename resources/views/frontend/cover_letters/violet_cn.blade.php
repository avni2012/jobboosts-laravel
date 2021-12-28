
<!DOCTYPE html>
<html>
<head>
	<title>Violet</title>
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
	    .v-back{/*background-color: #363c48;*/color: #fff; background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#363C48" }} @endif; padding: 30px 45px 15px;}
	    .v-nam-con{font-size: 38px;text-transform: capitalize;color: #fff;margin-bottom: 3px;}
	    .v-procon{font-size: 20px;text-transform: capitalize;margin-bottom: 20px;}
	    .mb-10{margin-bottom: 10px;}
	    .v-det-c{padding: 20px 45px;}
	    .ml-40, .c-violet-cont ul{margin-left: 40px;}
	    .mb-10, .c-violet-cont ul{margin-bottom: 10px;}
	    .c-violet-cont p, .c-violet-cont a{margin-bottom: 10px;/*word-break: break-all;*/}	 
	    .c-violet-cont li{margin-bottom: 10px;}   
	</style>
</head>
<body>
<div class="c-violet-cont">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="v-back">
					<h1 class="v-nam-con"><b>@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</b></h1>
					<h2 class="v-procon">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title'])){{ $getPersonalDetails['cl_job_title'] }}@endif</h2>
					@if(!empty($getPersonalDetails['cl_phone']))<div class="mb-10"><b>Phone:</b> {{ $getPersonalDetails['cl_phone']}}</div>@endif
					@if(!empty($getCoverLetterFullNameEmail))<div class="mb-10"><b>E-mail:</b> {{ $getCoverLetterFullNameEmail['resume_email'] }}</div>@endif
					@if(!empty($getPersonalDetails['cl_address']))<div><b>Address:</b> {{ $getPersonalDetails['cl_address']}}</div>@endif
				</td>
			</tr>
			<tr>
				<td class="v-det-c">
					<div class="date-cont"><p>{{ date('M d, Y') }} </p></div><br>	
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<div class="u-name-cont"><b>{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</b></div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<div class="comp-name">{{ $getPersonalDetails['cl_emp_company_name']}}</div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
				<div class="company-address w-240">
					<div class="address-line-1">{{ $getPersonalDetails['cl_emp_address']}}</div>
				</div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone']))<div class="comp-phone">{{ $getPersonalDetails['cl_emp_phone']}}</div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email']))<div class="comp-mail">{{ $getPersonalDetails['cl_emp_email']}}</div><br>@endif
								
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
				{{--<div class="u-name-cont">Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}},</div>--}}<br>
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
		</tbody>
	</table>
</div>
</body>
</html>