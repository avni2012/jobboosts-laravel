
<!DOCTYPE html>
<html>
<head>
	<title>Ginger</title>
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
	    .text-right{text-align: right;}
	    .ver-alg-mid{vertical-align: middle;}
	    .ver-alg-top{vertical-align: top;}
	    .g-uname{color: #2e3334;text-transform: uppercase;margin-bottom: 10px;font-size: 34px;font-weight: bold;}
	    .g-pos{color: #848484;font-size: 16px;text-transform: uppercase;margin-bottom: 40px;}
	    .gin-l-s{padding-right: 25px;width: 30%;border-right: 2px solid #b6b6b6;}
	    .gin-to-sec{margin-bottom: 30px;}
	    .gin-a{color: #000;}
	    .c-ginger-con p {margin-bottom: 10px;}
	    .ml-40, .c-ginger-con ul{margin-left: 40px;}
	    .mb-10, .c-ginger-con ul{margin-bottom: 10px;}
	    .p-30{padding: 30px;}
	    .c-ginger-con{padding: 50px 0px;}
	    .c-ginger-con p, .c-ginger-con a {/*word-break: break-all;*/}
	    .c-ginger-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-ginger-con">
	<table class="w-100">
		<tr>
			<td class="ver-alg-top text-right gin-l-s">
				<h1 class="g-uname">@if(!empty($getCoverLetterFullNameEmail))
					@php $name = explode(' ', $getCoverLetterFullNameEmail['resume_fullname']); 
						$firstname = array_slice($name, 0, -1);
					@endphp
					<span>{{ implode(" ", $firstname) }}</span>
					<br>
					<span>{{ end($name) }}</span>@endif
				</h1>
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="g-pos">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				<div class="gin-to-sec">
					<div><b>To</b></div>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<div class="gin-name-c"><p>{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</p></div>@endif
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<div class="gin-adress"><p>{{ $getPersonalDetails['cl_emp_company_name']}}</p></div>@endif
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))<div class="gin-address"><p>{{ $getPersonalDetails['cl_emp_address']}}</p></div>@endif
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone']))<div class="gin-phone"><p>{{ $getPersonalDetails['cl_emp_phone']}}</p></div>@endif
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email']))<div class="gin-email"><a href="#" class="gin-a">{{ $getPersonalDetails['cl_emp_email']}}</a></div>@endif
				</div>
				<div class="gni-from-sec">
					<div class="gin-frm-name"><b>From</b></div>
					<div class="gin-name-con">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</div>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<div class="gin-pos">{{ $getPersonalDetails['cl_job_title'] }}</div>@endif
					@if(!empty($getPersonalDetails['cl_address']))<div class="gin-address">{{ $getPersonalDetails['cl_address']}}</div>@endif
					@if(!empty($getPersonalDetails['cl_phone']))<div class="gin-phone">{{ $getPersonalDetails['cl_phone']}}</div>@endif
					@if(!empty($getCoverLetterFullNameEmail))<div class="gin-email"><a href="#" class="gin-a">{{ $getCoverLetterFullNameEmail['resume_email'] }}</a></div>@endif
				</div>
			</td>
			<td class="p-30">
				@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
				<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>	
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
</div>
</body>
</html>