<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body,div,ul,ol,li,h1,h2,h3,h4,h5,h6,form,input,button,p,th,td {
	    margin: 0;
	    padding: 0;
	    font-family: "Calibri";
    }
    h1,h2,h3,h4,h5,h6 {
        font-weight: normal;
        color: #242424;
    }
    p {
        color: #222;
    }
    table {
        border-collapse: collapse;
    }
    .w-100 {
        width: 100%;
    }
    .w-90 {
        width: 90%;
    }
    .w-50{width: 50%}
    .ver-alg-top{vertical-align: top;}
    .m-auto{margin: auto;}   
    .madri-profile-img{
    	height: 230px;
	    width: 230px;
	    object-fit: cover;
    }
    .w-230{width: 230px;}
    .user-se{
    background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
    {{--@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
    	border-left: 10px solid #fff;
    @endif--}}
    padding-left: 3rem;
    height: 234px;
    }
    .user-se h1{
    font-size: 56px;
    line-height: 0.8;
    text-transform: uppercase;
    font-weight: bold;
    }
    .user-se h2{
    font-weight: bold;
    margin-top: 5px;
    font-size: 22px;
    }
    .detail-cont h2{
    margin-top: 35px;
    background-color: #0d111a;
    color: #fff;
    display: inline-block;
    padding: 3px 10px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
    }
    .sub-tit{
    font-size: 20px;
    font-weight: bold;
    }
    p{font-size: 18px;}
    .cur-pos{
    text-transform: uppercase;
    color: #a8abb3;
    font-size: 14px;
    margin-top: 4px;
    margin-bottom: 10px;
    }
    .mb-12{margin-bottom: 12px;}
    .soc-con{
    color: #0d111a;
    font-size: 16px;
    margin-right: 15px;
    }
    .progress {		  
	 padding: 0;
    width: 100%;
    height: 8px;
    overflow: hidden;
    background: #e5e5e5;
	}

	.bar {
		position:relative;
	  float:left;
	  min-width:1%;
	  height:100%;
	  background:#0d111a;
	  width: 0%;
	  transition: all 0.8s linear 1s;
	}

	.percent {
		position:absolute;
	  top:50%;
	  left:50%;
	  transform:translate(-50%,-50%);
	  margin:0;
	  font-family:tahoma,arial,helvetica;
	  font-size:12px;
	  color:white;
	}
	.skl-con {
	    width: 45%;
	    float: left;
	    padding-right: 3rem;
	    margin-bottom: 15px;
	}
	.skl-con h3{
	 font-size: 18px;
    margin-bottom: 5px;
    text-transform: capitalize;
	}
	.madrid-cont p{
            word-break: break-word;
    }
    .madrid-cont ul{margin-left:  15px;}
    .madrid-cont li{margin-bottom: 5px;}
    .madrid-cont li:last-child{margin-bottom: 25px;}
    .madrid-cont p{margin-bottom: 10px;}
	</style>
</head>
<body>
	<div class="madrid-cont">
		<table class="w-100">
			<tbody>
				@if(!empty($getPersonalDetails))
				<tr>
					@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
					<td class="w-230">
							<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="madri-profile-img"> 
					</td>
					<td class="user-se">
						<h1 class="first-name last-name">@if(!empty($getResumeFullNameEmail))
						@php $name = explode(' ', $getResumeFullNameEmail['resume_fullname']); 
							$firstname = array_slice($name, 0, -1);
						@endphp
						<span>{{ implode(" ", $firstname) }}</span>
						<br>
						<span>{{ end($name) }}</span>@endif</h1>
						<h2 id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
					</td>
					@else
					<td class="w-230">
						<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="madri-profile-img"> 
					</td>
					<td class="user-se">
						<h1 class="first-name last-name">@if(!empty($getResumeFullNameEmail))
						@php $name = explode(' ', $getResumeFullNameEmail['resume_fullname']); 
							$firstname = array_slice($name, 0, -1);
						@endphp
						<span>{{ implode(" ", $firstname) }}</span>
						<br>
						<span>{{ end($name) }}</span>
						@endif</h1>
						<h2 id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
					</td>
					@endif
				</tr>
				@else
				<tr>
					<td class="w-230">
						 <img src="{{ asset('/frontend/images/resume_templates/madrid-images/madrid-profile.jpeg') }}" alt="profile image" class="madri-profile-img"> 
					</td>
					<td class="user-se">
						<h1 class="first-name last-name"></h1>
						<h2 id="JobTitle_Text"></h2>
					</td>
				</tr>
				@endif
				<tr>
					<td colspan="2" style="padding-top: 10px;">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>