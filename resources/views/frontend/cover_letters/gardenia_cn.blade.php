
<!DOCTYPE html>
<html>
<head>
	<title>Gardenia</title>
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
	    .gr-fcon{/*background-color: #f8de78;*/background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#F8DE78" }} @endif; padding: 25px 40px;}
	    .grd-sec-p{padding: 25px 40px;}
	    .gr-mal-ph{display: block;}
	    .gr-mal-ph div{display: inline-block;}
	    .gr-mal-ph span{margin: 0 5px;}
	    .grd-nm{color: #14120a;text-transform: uppercase;font-size: 36px;}
	    .grd-pos{color: #14120a;text-transform: uppercase;font-size: 22px;margin-bottom: 5px;}
	    .grd-address, .gr-mal-ph {font-size: 18px;color: #3a361d;}
	    .ml-40, .c-gardenia-con ul{margin-left: 40px;}
	    .mb-10, .c-gardenia-con ul{margin-bottom: 10px;}
	    .c-gardenia-con p, .c-gardenia-con a {margin-bottom: 10px;/*word-break: break-all;*/}	   
	    .c-gardenia-con li{margin-bottom: 10px;} 
	</style>
</head>
<body>
<div class="c-gardenia-con">
	<table class="w-100">
		<tr>
			<td class="gr-fcon">
				<h1 class="grd-nm">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="grd-pos">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				<div class="gr-mal-ph">
					@if(!empty($getCoverLetterFullNameEmail))<div>{{ $getCoverLetterFullNameEmail['resume_email'] }}</div>@endif @if(!empty($getPersonalDetails['cl_phone']))<span>|</span>
					<div>{{ $getPersonalDetails['cl_phone']}}</div>@endif
				</div>
				@if(!empty($getPersonalDetails['cl_address']))<div class="grd-address">{{ $getPersonalDetails['cl_address']}}</div>@endif
			</td>
		</tr>
		<tr>
			<td class="grd-sec-p">
				<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>	
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<div class="u-name-cont">{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<div class="comp-name">{{ $getPersonalDetails['cl_emp_company_name']}}</div>@endif
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
				<div class="company-address w-240">
					<div class="address-line-1">{{ $getPersonalDetails['cl_emp_address']}}</div>
				</div>
				@endif
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
	</table>
</div>
</body>
</html>