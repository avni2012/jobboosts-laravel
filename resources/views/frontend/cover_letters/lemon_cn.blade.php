<!DOCTYPE html>
<html>
<head>
	<title>Lemon</title>
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
	    .l-l-b{/*border-left: 15px solid #004e42;*/border-left: 15px solid @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#084C41" }} @endif; }
	    .lc-name{font-size: 34px;padding-top: 40px;font-weight: bold;text-transform: capitalize;}
	    .l-hr{width: 15px;border-top: 2px solid #cccccc;}
	    .l-pos-n{color: #b0b0b0;font-size: 18px;text-transform: uppercase;}
	    .c-lemon-con p {margin-bottom: 10px;}
	    .ml-40, .c-lemon-con ul{margin-left: 40px;}
	    .mb-10, .c-lemon-con ul{margin-bottom: 10px;}
	    .p-40{padding: 55px;}
	    .p-t-60{padding-top: 75px;}
	    .r-l-ad-d{margin-bottom: 15px;}
	    .r-l-ad-d h4{color: #c6c6c6;text-transform: uppercase;font-weight: bold;}
	    .r-l-ad-d div, .r-l-ad-d div a{color: #656565;font-weight: bold;}
	    .r-l-ad-d div a{text-decoration: none;}
	    .le-s-c{width: 25%;padding-right: 15px;}
	    .c-lemon-con p, .c-lemon-con a {/*word-break: break-all;*/}
	    .c-lemon-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-lemon-con l-l-b">
	<table class="w-100"> 
		<tbody>
			<tr>
				<td>
					<h1 class="text-center lc-name">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					<hr class="l-hr">
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))
					<h2 class="text-center l-pos-n">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</td>
			</tr>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td class="p-40 ver-alg-top">
								<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<h3><b>To {{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</b></h3>@endif
									
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
							<td class="ver-alg-top p-t-60 le-s-c">
								@if(!empty($getPersonalDetails['cl_address']))
								<div class="r-l-ad-d">
									<h4>Address</h4>
									<div>{{ $getPersonalDetails['cl_address']}}</div>
								</div>
								@endif
								@if(!empty($getCoverLetterFullNameEmail))
								<div class="r-l-ad-d">
									<h4>Email</h4>
									<div><a href="#">{{ $getCoverLetterFullNameEmail['resume_email'] }}</a></div>
								</div>
								@endif
								@if(!empty($getPersonalDetails['cl_phone']))	
								<div class="r-l-ad-d">
									<h4>Phone</h4>
									<div>{{ $getPersonalDetails['cl_phone']}}</div>
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