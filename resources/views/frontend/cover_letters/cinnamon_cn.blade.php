
<!DOCTYPE html>
<html>
<head>
	<title>Cinnamon</title>
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
	    .text-align-justify{text-align: justify;}
	    .ver-alg-mid{vertical-align: middle;}
	    .ver-alg-top{vertical-align: top;}
	    .c-namco{font-size: 52px;color: #fff;text-transform: capitalize;font-weight: bold;}
	    .ci-f-c{padding: 34px 30px;/*background-color: #252833;*/background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#252833" }} @endif;}
	    .c-pt-l{padding: 34px 30px;}
	    .c-cinnamon-con p {margin-bottom: 10px;}
	    .ml-40, .c-cinnamon-con ul{margin-left: 40px;}
	    .mb-10, .c-cinnamon-con ul{margin-bottom: 10px;}
	    .d-b-c{color: #343434;}
	    .ci-r-s-con{background-color: #f4f4f4;width: 30%;}
	    .c-h-con{font-size: 22px;color: #252833;font-weight: bold;padding-bottom: 5px;margin-bottom: 15px;border-bottom: 1px solid #d0d0d0;}
	    .e-h-con{color: #000;font-weight: bold;font-size: 16px;margin-bottom: 5px;}
	    .a-l-con{color: #151515;text-decoration: none;}
	    .cl-pos-con{color: #e9e9e9;font-size: 22px;text-transform: capitalize;}
	    .c-cinnamon-con p, .c-cinnamon-con a {/*word-break: break-all;*/}
	    .c-cinnamon-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-cinnamon-con">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="ci-f-c">
					<h1 class="c-namco">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="cl-pos-con">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</td>
			</tr>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td class="ver-alg-top c-pt-l">
								<div class="date-cont">{{ date('M d, Y') }}</div><br>
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name']))<div class="comp-name d-b-c">{{ $getPersonalDetails['cl_emp_company_name']}}</div><br>@endif	
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))<div class="name-asg-con">RE: {{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</div><br>@endif
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
								<div class="company-address w-240">
									<div class="address-line-1">{{ $getPersonalDetails['cl_emp_address']}}</div>
								</div>
								@endif
								<div class="comp-phone">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</div>
								<div class="comp-mail">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</div><br>

								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
								{{--<div class="u-name-cont">Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}},</div><br>--}}
								<div class="cont-description text-align-justify">
									{!! $getPersonalDetails['cl_details'] !!}
								</div><br>
								@if(!empty($getCoverLetterFullNameEmail))
									<div class="sincrl-con">Sincerely,</div>
									<div class="name-cont">{{ $getCoverLetterFullNameEmail['resume_fullname'] }}</div>
									<div class="name-cont">{{ $getPersonalDetails['cl_phone']}}</div>
									<div class="name-cont">{{ $getCoverLetterFullNameEmail['resume_email'] }}</div>
								@endif
								@endif
							</td>
							<td class="ver-alg-top c-pt-l ci-r-s-con">
								@if(!empty($getPersonalDetails['cl_phone']))<h3 class="c-h-con">Contact</h3><p>{{ $getPersonalDetails['cl_phone']}}</p>@endif
								@if(!empty($getCoverLetterFullNameEmail))
								<h4 class="e-h-con">E-mail</h4>
								<a href="#" class="a-l-con">{{ $getCoverLetterFullNameEmail['resume_email'] }}</a>@endif
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