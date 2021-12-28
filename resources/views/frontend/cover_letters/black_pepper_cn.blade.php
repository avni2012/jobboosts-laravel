
<!DOCTYPE html>
<html>
<head>
	<title>Black Pepper</title>
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
	    .c-black-paper-con{padding: 45px 90px;}
	    .nam{font-size: 42px;text-transform: uppercase;font-weight: bold;color: #11111a;}
	    .s-nam{font-size: 18px;font-weight: bold;color: #4b4b4b;}
	    .r-addres-s{color: #d2d2d2;font-size: 18px;}
	    .y-hr{/*border-top: 3px solid #fce432;*/border-top: 3px solid @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#FFE14C" }} @endif; margin: 30px auto;}
	    .c-black-paper-con p {margin-bottom: 10px;}
	    .ml-40, .c-black-paper-con ul{margin-left: 40px;}
	    .mb-10, .c-black-paper-con ul{margin-bottom: 10px;}
	    .t-con{padding: 1px 7px;background-color: #02080e;color: #989ba4;font-weight: bold;margin-right: 4px;}
	    .c-black-paper-con p, .c-black-paper-con a {/*word-break: break-all;*/}
	    .c-black-paper-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-black-paper-con">
	<table class="w-100">
		<tr>
			<td>
				<table class="w-100">
					<tr>
						<td class="ver-alg-top">
							<h1 class="nam">@if(!empty($getCoverLetterFullNameEmail))
								@php $name = explode(' ', $getCoverLetterFullNameEmail['resume_fullname']); 
									$firstname = array_slice($name, 0, -1);
								@endphp
								<span>{{ implode(" ", $firstname) }}</span>
								<br>
								<span>{{ end($name) }}</span>@endif
							</h1>
							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="s-nam">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
						</td>
						<td class="ver-alg-top">
							<div class="r-addres-s">
								@if(!empty($getPersonalDetails['cl_address']))<div class="address-c">{{ $getPersonalDetails['cl_address']}}</div>@endif
								<div class="mail-c">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_email'] }}@endif</div>
								@if(!empty($getPersonalDetails['cl_phone']))<div class="phone-c">{{ $getPersonalDetails['cl_phone']}}</div>@endif
							</div>
						</td>
					</tr>
				</table>
				<hr class="y-hr">
			</td>			
		</tr>
		<tr>
			<td>
				<table class="w-100">
					<tr>
						<td>
							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))
							<div class="u-name-cont">{{--<span class="t-con">To</span>--}} <b>{{ $getPersonalDetails['cl_emp_hiring_manager_name']}}</b></div><br>
							@endif
							{{--@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))
							<div class="u-name-cont">Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}},</div><br>
							@endif--}}
							<div class="comp-name">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_company_name'])){{ $getPersonalDetails['cl_emp_company_name']}}@endif</div>
							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
							<div class="company-address w-240">
								<div class="address-line-1">{{ $getPersonalDetails['cl_emp_address']}}</div>
								</div>
							@endif
							<div class="comp-phone">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</div>
							<div class="comp-mail">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</div><br>

							@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
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