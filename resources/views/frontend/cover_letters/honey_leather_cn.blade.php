
<!DOCTYPE html>
<html>
<head>
	<title>Honey leather</title>
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
	    .c-honey_leather-con{padding: 30px 50px;}
	    .hny-con{color: #1b1b1b;font-size: 42px;text-transform: uppercase;font-weight: bold;letter-spacing: 4px;}
	    .hny-dev{color: #9c9c9c;font-size: 18px;font-weight: bold;margin-bottom: 30px;text-transform: capitalize;}
	    .hn-br-btm{border-bottom: 1px solid #d4d4d4;}
	    .brd-r-c{border-right: 1px solid #d4d4d4;}
	    .p-tb-50{padding: 50px 0;}
	    .p-l-30{padding-left: 45px;}
	    .p-r-30{padding-right: 45px;}
	    .c-honey_leather-con p {margin-bottom: 10px;color: #7a7a7a;}
	    .c-honey_leather-con ul, .c-honey_leather-con div{color: #7a7a7a;}
	    .ml-40, .c-honey_leather-con ul{margin-left: 40px;}
	    .mb-10, .c-honey_leather-con ul{margin-bottom: 10px;}
	    .hon-to-con, .hon-frm-con{color: #9e9e9e;font-weight: bold;margin-bottom: 14px;}
	    .hon-name-con{margin-bottom: 3px;font-weight: bold;color: #626262;text-transform: uppercase;}
	    .hon-his-con{color: #929292;margin-bottom: 30px;}
	    .h-a-dc{color: #909090;margin-bottom: 10px;}
	    .text-d-none{text-decoration: none;}
	    .w-50p{width: 25%;max-width: 25%;}
	    .c-honey_leather-con p, .c-honey_leather-con a, .comp-mail, .hon-email-con{/*word-break: break-all;*/}
	    .c-honey_leather-con li{margin-bottom: 10px;}
	    .hon-his-cons{margin-bottom: 3px;}
	</style>
</head>
<body>
<div class="c-honey_leather-con">
	<table class="w-100">
		<tbody>
			<tr>
				<td class="hn-br-btm">
					<h1 class="hny-con">@if(!empty($getCoverLetterFullNameEmail))
						@php $name = explode(' ', $getCoverLetterFullNameEmail['resume_fullname']); 
							$firstname = array_slice($name, 0, -1);
						@endphp
						<span>{{ implode(" ", $firstname) }}</span>
						<br>
						<span>{{ end($name) }}</span>@endif
					</h1>
					@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<h2 class="hny-dev">{{ $getPersonalDetails['cl_job_title'] }}</h2>@endif
				</td>
			</tr>
			<tr>
				<td>
					<table class="w-100">
						<tr>
							<td class="p-tb-50 ver-alg-top p-r-30 brd-r-c w-50p">
								<div class="hon-to-wrp">
									@if(!empty($getPersonalDetails) && (!empty($getPersonalDetails['cl_emp_hiring_manager_name']) || !empty($getPersonalDetails['cl_emp_company_name'])))
										<div class="hon-to-con">To</div>
										<div class="hon-name-con">{{ $getPersonalDetails['cl_emp_hiring_manager_name'] }}</div><div class="hon-his-cons">{{ $getPersonalDetails['cl_emp_company_name'] }}</div>
									@endif
									@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_address']))
									<div class="company-address w-240">
										<div class="address-line-1"><p>{{ $getPersonalDetails['cl_emp_address']}}</p></div>
									</div>
									@endif
									<div class="comp-phone"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_phone'])){{ $getPersonalDetails['cl_emp_phone']}}@endif</p></div>
									<div class="comp-mail"><p>@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_email'])){{ $getPersonalDetails['cl_emp_email']}}@endif</p></div><br>
								</div>
								<div class="hon-frm-wrp">
									<div class="hon-frm-con">From</div>
									<div class="hon-name-con">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_fullname'] }}@endif</div>
									@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_job_title']))<div class="hon-his-cons h-a-dc">{{ $getPersonalDetails['cl_job_title'] }}</div>@endif
									<div class="hon-his-cons">@if(!empty($getPersonalDetails['cl_address'])){{ $getPersonalDetails['cl_address']}}@endif</div>
									<div class="hon-his-cons">@if(!empty($getPersonalDetails['cl_phone'])){{ $getPersonalDetails['cl_phone']}}@endif</div>
									<div class="hon-his-cons"><a href="#" class="h-a-dc text-d-none">@if(!empty($getCoverLetterFullNameEmail)){{ $getCoverLetterFullNameEmail['resume_email'] }}@endif</a></div>
								</div>
							</td>
							<td class="p-tb-50 ver-alg-top p-l-30">
								@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_details']))
								<div class="date-cont"><p>{{ date('M d, Y') }}</p></div><br>					
								{{--<div class="u-name-cont">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['cl_emp_hiring_manager_name']))Dear {{ $getPersonalDetails['cl_emp_hiring_manager_name']}}, @endif</div><br>--}}
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