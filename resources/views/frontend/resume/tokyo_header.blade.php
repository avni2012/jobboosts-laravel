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
    .tokyo-cont table {
        border-collapse: collapse;
    }
    .w-100 {
        width: 100%;
    }
    .w-90 {
        width: 90%;
    }
    .m-auto{margin: auto;}    
	.pt-30{	padding-top: 30px;}
	.pl-50{padding-left: 50px;}
    .txt-center {
        text-align: center;
    }
    .vert-alg-top{vertical-align: top;}
    .profile-img{
    height: 90px;
    width: 90px;
    object-fit: cover;
    border-radius: 45px;
    object-position: center;
    }
    .name-section{
   	background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
    /*padding: 70px;*/
    /*display: block;*/
    }
    .pad-70{padding: 30px;}
    .pad-r-0{padding-right: 0;}
    .pad-l-0{padding-left: 0;}
    .w-148px{width: 148px;}
    .profile-name h1, .profile-name h2{color: #fff;/*text-transform: uppercase;*/font-style: italic;}
    .profile-name h1{font-size: 36px;font-weight: bold;margin-bottom: 10px;}
    .profile-name h2{font-size: 14px;letter-spacing: 4px;text-transform: uppercase;}
    .pl-70{padding-left: 70px;}
    .cont-det{border-bottom: 2px solid #eee;padding: 20px 0;}
    .detail-cnt{
    	font-size: 12px;
    }
    .detail-cnt a{
    color: #000;
    text-decoration: none;
   /* display: flex;  */
    align-items: center;  
     font-size: 16px;
     line-height: 1px;
    }
    .detail-cnt a img{
    margin-right: 5px;
    height: 18px;
    width: 18px;
    object-fit: contain;  
    }
    .fst-cont{   
    width: 70%;
    vertical-align: top;
    border-right: 2px solid #eee;
    padding-right: 50px;
    }
    .detail-wrp h2{
	font-style: italic;
	/*font-size:24px;*/
	font-size: 22px;
	font-weight: bold;
	margin-bottom: 0px;
	margin-top: 30px;
	text-transform: capitalize;
    }
    .detail-wrp h4{font-size: 16px;margin-top: 3px;text-transform: capitalize;}
    .detail-wrp p{font-size: 16px;margin-top: 10px;}
    .detail-wrp h5{
    color: #b6b6b6;
    font-size: 14px;
    font-style: italic;
    }
    .employ-histry ul{
    margin-left: 45px;
    margin-top: 10px;
    }
    .employ-histry ul li{
    font-size: 16px;
    margin-bottom: 10px;
    }
    .mt-0{margin-top: 0!important;}
    .mb-0{margin-bottom: 0;}
    .mt-10p{margin-top: 10px;}
    .mail-cnt{color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;font-size: 16px;margin-top: 0px;display: block;}
    .rating-desc{font-size: 20px;
    margin-top: 10px;
    text-transform: capitalize;}
    /*.skill-rating-cont{
	display: flex;
    margin-top: 12px;
    width: 80%;
    }
    .skill-rating-cont li {
    list-style: none;
    background-color: #eaebef;
    width: 100%;
    height: 10px;
    transform: skew(-25deg);
    margin-bottom: 2px;
    margin-right: 8px;
	}
 	.skill-rating-cont li.active {background-color: #b21f25;}*/
 	.main-details{
	 	/*padding-left: 25px;*/
 	}
 	.common-break{
 		display: block;
 	}
 	.website-social-label{
 		list-style: none;
 	}
 	.skill-rating-cont{
	display: block;
    margin-top: 12px;
    width: 80%;
    }
    .skill-rating-cont div {
    list-style: none;
    background-color: #eaebef;
    width: 8px;
    height: 10px;
    transform: skew(-25deg);
    margin-bottom: 2px;
    margin-right: 8px;
    display: inline-block;
	}
 	.skill-rating-cont div.active {background-color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
 	.profile-font{
 		font-size: 14px;
 	}
 	.other-details{
 		font-size: 12px;
 	}
 	.website-lnk{
 		color: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;
 		text-decoration: none;
 	}
 	.tokyo-cont p{
        word-break: break-word;
        margin-bottom: 10px;
    }
    .n-svg-img{height: 12px;width: 12px;fill: @if(!empty($getPersonalDetails) && !empty($getPersonalDetails['resume_variation'])){{ $getPersonalDetails['resume_variation'] }} @endif;}
    .employ-histry .internship-description-text p{
    	margin-bottom: 15px;
    }
	</style>
</head>
<body>
	<div class="tokyo-cont w-100 common-template-height">
		<table class="w-100">
		<tbody>
			@if(!empty($getPersonalDetails))
			<tr class="name-section">
				@if(!empty($getProfilePicture) && !empty($getProfilePicture['profile_image']))
				<td class="w-148px pad-70 pad-r-0">
						<img src="{{ asset('/frontend/images/profile_pictures/'.$getProfilePicture['profile_image']) }}" alt="profile image" class="profile-img"> 
				</td>
				<td class="profile-name pad-70  main-details">
					<h1 class="first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
					<h2 id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
				</td>
				@else
				<td class="w-148px pad-70 pad-r-0">
					<img src="{{ asset('/frontend/images/default_profile.jpg') }}" alt="profile image" class="profile-img"> 
				</td>
				<td class="profile-name pad-70  main-details">
					<h1 class="first-name last-name">@if(!empty($getResumeFullNameEmail)){{ $getResumeFullNameEmail['resume_fullname'] }}@endif</h1>
					<h2 id="JobTitle_Text">@if(!empty($getPersonalDetails) && !empty($getPersonalDetails['main_job_title'])){{ $getPersonalDetails['main_job_title'] }}@endif</h2>
				</td>
				@endif
			</tr>
			@else
			<tr class="name-section">
				<td class="w-148px pad-70 profile-image">
					{{-- <img src="https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=540" alt="profile image" class="profile-img"> --}}
				</td>
				<td class="profile-name main-details">
					<h1><span id="FirstName_Text" class="first-name"></span> <span id="LastName_Text" class="last-name"></span></h1>
					<h2 id="JobTitle_Text"></h2>
				</td>
			</tr>
			@endif
			<tr>
				<td colspan="2" style="padding-top: 15px;">
					
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>