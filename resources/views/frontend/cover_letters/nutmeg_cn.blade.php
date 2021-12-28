
<!DOCTYPE html>
<html>
<head>
	<title>Nutmeg</title>
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
	    .num-condet{display: block;}
	    .num-condet div{display: inline-block;}
	    .nut-name-col{/*color: #9d2e02;*/color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_variation'])){{ $getPersonalDetails['cl_variation'] }}@else {{ "#87300D" }} @endif; }
	    .n-shortname{border: 1px solid #7a6767; width: 85px; height: 85px; text-align: center; line-height: 85px; border-radius: 50px; font-size: 36px; text-transform: capitalize;}
	    .w-110{width: 110px;}
	    .nu-name{font-size: 36px;text-transform: uppercase;}
	    .nu-s-name{font-size: 18px;color: #847272;margin-bottom: 5px;}
	    .nu-fs-name-con{padding: 30px 40px;border-bottom: 1px solid #e7e7e7;}
	    .c-nutmeg-con p {margin-bottom: 10px;}
	    .ml-40, .c-nutmeg-con ul{margin-left: 40px;}
	    .mb-10, .c-nutmeg-con ul{margin-bottom: 10px;}
	    .p-lr-60-40{padding: 60px 70px;}
	    .c-nutmeg-con p, .c-nutmeg-con a {/*word-break: break-all;*/}
	    .c-nutmeg-con li{margin-bottom: 10px;}
	</style>
</head>
<body>
<div class="c-nutmeg-con">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="nu-fs-name-con">
					<table class="w-100">
						<tr>
							<td class="w-110">
								@if(!empty($getCoverLetterFullNameEmail))
								<div class="n-shortname nut-name-col">
								@php 
									$words = explode(" ", $getCoverLetterFullNameEmail['resume_fullname']);
									$fullname = '';
								@endphp 
								@foreach($words as $word)
									@php $fullname .= $word[0] @endphp
								@endforeach
								{{ $fullname }}
								</div>
								@endif
							</td>
							<td>
								<h1 class="nut-name-col nu-name">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</h1>
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="nu-s-name">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
								<div class="num-condet">
									@php 
										$vars = array_filter(array($getCoverLetterFullNameEmail['resume_email'], $getPersonalDetails['cl_phone'],$getPersonalDetails['cl_address']));
									@endphp
									<div class="nc-phone-con nc-phone-con nc-address-con">{{ implode(" | ", $vars) }}</div>
									{{--@if(!empty($getCoverLetterFullNameEmail))<div class="nc-mail-con">{{ $getCoverLetterFullNameEmail['resume_email'] }}</div>@endif
									<div class="nc-phone-con"><span>@if(!empty($getPersonalDetails['cl_phone'])) | {{ $getPersonalDetails['cl_phone']}}</span>@endif</div>  
									@if(!empty($getPersonalDetails['cl_address']))
									<div class="nc-address-con">{{ $getPersonalDetails['cl_address']}}</div>@endif--}}
								</div>
							</td> 
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="p-lr-60-40">
					<table class="w-100">
						<tr>
							<td>
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
		</tbody>
	</table>
</div>
</body>
</html>