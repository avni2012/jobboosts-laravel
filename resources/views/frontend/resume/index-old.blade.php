@extends('layouts.master')

@section('title', 'Home')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/croppie.css') }}">

<!-- <link rel="stylesheet" href="{{ asset('/frontend/css/croppie.css') }}" /> -->
@endsection

@section('style')
<style type="text/css">
	.body{
		font-size: 6px;
	}
</style>
@endsection

@section('content')

<div id="BuildResume">
<div class="split left">
	  <div class="container" id="container_data">
		<form action="" method="POST" id="ResumeForm">
			@csrf
			<input type="text" name="main_title" id="ResumeMainTitle" class="form-control col-md-3">
			<fieldset>
			  <legend>Personal Details</legend>
			  <hr>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
			      		<label for="job_title">Job Title:</label>
			      		<input type="text" class="form-control" id="job_title" name="job_title">
			    	</div>
			    	<div class="form-group col-md-6">
				      	<label for="image">Upload Photo:</label>
				      	 <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#ImageModal">
						  Upload photo
						</button>
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
			      		<label for="first_name">First Name:</label>
			      		<input type="text" class="form-control first-name" id="first_name" name="first_name">
			    	</div>
			  		<div class="form-group col-md-6">
				      	<label for="last_name">Last Name:</label>
				      	<input type="text" class="form-control last-name" id="last_name" name="last_name">
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
			      		<label for="email">Email:</label>
			      		<input type="email" class="form-control" id="email" name="email">
			    	</div>
			  		<div class="form-group col-md-6">
				      	<label for="phone">Phone:</label>
				      	<input type="text" class="form-control" id="phone" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
				      	<label for="country">Country:</label>
				      	<input type="text" class="form-control" id="country" name="country">
				    </div>
			  		<div class="form-group col-md-6">
				      	<label for="city">City:</label>
				      	<input type="text" class="form-control" id="city" name="city">
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
				      	<label for="address">Address:</label>
				      	<input type="text" class="form-control" id="address" name="address">
				    </div>
			  		<div class="form-group col-md-6">
				      	<label for="postal_code">Postal Code:</label>
				      	<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="postal_code" name="postal_code">
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
				      	<label for="driving_licence">Driving Licence:</label>
				      	<input type="text" class="form-control" id="driving_licence" name="driving_licence">
				    </div>
			  		<div class="form-group col-md-6">
				      	<label for="nationality">Nationality:</label>
				      	<input type="text" class="form-control" id="nationality" name="nationality">
				    </div>
			  	</div>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-6">
				      	<label for="place_of_birth">Place Of Birth:</label>
				      	<input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
				    </div>
			  		<div class="form-group col-md-6">
				      	<label for="date_of_birth">Date Of Birth:</label>
				      	<input type="text" class="form-control" id="date_of_birth" name="date_of_birth">
				    </div>
			  	</div>
			  
			</fieldset>
			<fieldset>
			  <legend>Professional Summary</legend>
			  <hr>
			  <div class="row col-md-12">
			  		<div class="form-group col-md-12">
				      	<textarea cols="80" id="professional_summary" name="professional_summary" rows="10" data-sample-short></textarea>
				    </div>
			  	</div>
			</fieldset>
			<fieldset>
			  <legend>Employment History</legend>
			  <hr>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-12">
			  			<button class="btn btn-primary" id="AddEmployerForm" type="button"><i class="fa fa-plus">&nbsp;&nbsp;Add employment</i></button>
			  			<br><br>
			  			<div id="ShowEmployerForm"></div>
				    </div>
			  	</div>
			</fieldset>
			<fieldset>
			  <legend>Education</legend>
			  <hr>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-12">
			  			<button class="btn btn-primary" id="AddEducationForm" type="button"><i class="fa fa-plus">&nbsp;&nbsp;Add education</i></button>
			  			<br><br>
			  			<div id="ShowEducationForm"></div>
				    </div>
			  	</div>
			</fieldset>
			<fieldset>
			  <legend>Website & Social Links</legend>
			  <hr>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-12">
			  			<button class="btn btn-primary" id="AddWebsiteSocialLinkForm" type="button"><i class="fa fa-plus">&nbsp;&nbsp;Add link</i></button>
			  			<br><br>
			  			<div id="ShowWebsiteAndSocialLinkForm"></div>
				    </div>
			  	</div>
			</fieldset>
			<fieldset>
			  <legend>Skills</legend>
			  <hr>
			  	<div class="row col-md-12">
			  		<div id="ShowAutoSuggestSkills">
			  		@if(!empty($skill))
			  				@foreach($skill as $skill_name)
			  					<div class="chip skill-tag" id="{{ $skill_name->skill }}">
			  						<a href="javascript:void(0)" onclick="mapSkill('{{ $skill_name->skill }}')">{{ $skill_name->skill }}</a>
								  <i class="fa fa-plus"></i>
								</div>
			  				@endforeach
			  			@endif
			  		</div>
			  		<div class="form-group col-md-12">
			  			<button class="btn btn-primary" id="AddSkillsForm" type="button"><i class="fa fa-plus">&nbsp;&nbsp;Add Skill</i></button>
			  			<br><br>
			  			<div id="ShowSkillsForm"></div>
				    </div>
			  	</div>
			</fieldset>
			<fieldset>
			  	<div class="row col-md-12">
			  		<div class="form-group col-md-12">
			  			<div id="ShowCustomSectionForm"></div>
				    </div>
			  	</div>
			</fieldset>
			<div id="CourseSection" style="display: none;">
				<fieldset>
				  <legend>Courses&nbsp;<button type="button" onclick="DeleteCourseSection()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
				  <hr>
				  	<div class="row col-md-12">
				  		<div class="form-group col-md-12">
				  			<div id="ShowCoursesForm"></div>
				  			<br>
				  			<button class="btn btn-primary add-course-form" id="ShowCourseAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Courses</button>
					    </div>
				  	</div>
				</fieldset>
			</div>
			<div id="ExtraCurricularActivitySection" style="display: none;">
				<fieldset>
				  <legend>Extra-curricular Activities&nbsp;<button type="button" onclick="DeleteExtraCurricularActivity()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
				  <hr>
				  	<div class="row col-md-12">
				  		<div class="form-group col-md-12">
				  			<div id="ShowExtraCurricularActivityForm"></div>
				  			<br>
				  			<button class="btn btn-primary add-extra-curricular-activity-form" id="ShowExtraCurricularActivityAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add activity</button>
					    </div>
				  	</div>
				</fieldset>
			</div>
			<div id="HobbiesSection" style="display: none;">
				<fieldset>
				  <legend>Hobbies&nbsp;<button type="button" onclick="DeleteHobbies()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
				  <hr>
				  	<div class="row col-md-12">
				  		<div class="form-group col-md-12">
				  			<div id="ShowHobbiesForm"></div>
					    </div>
				  	</div>
				</fieldset>
			</div>
			<div id="InternshipSection" style="display: none;">
				<fieldset>
				  <legend>Internships&nbsp;<button type="button" onclick="DeleteInternship()" class="btn btn"><i class="fa fa-trash"></i></button></legend>
				  <hr>
				  	<div class="row col-md-12">
				  		<div class="form-group col-md-12">
				  			<div id="ShowInternshipForm"></div>
				  			<br>
				  			<button class="btn btn-primary add-internship-form" id="ShowInternshipAfterSelect" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Internship</button>
					    </div>
				  	</div>
				</fieldset>
			</div>
			<fieldset>
				<legend>Add Section</legend>
				<div class="row">
				    <div class="col">
				      	<button class="btn extra-section" id="AddCustomSection" type="button"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Custom Section</button>
						<button class="btn extra-section add-extra-curricular-activity-form" id="AddExtraCurricularActivityForm" type="button"><i class="fa fa-futbol-o"></i>&nbsp;&nbsp;Extra-curricular Activities</button>
						<button class="btn extra-section" type="button" id="AddHobbiesForm"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Hobbies</button>
						<button class="btn extra-section" type="button"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Languages</button>
				    </div>
				    <div class="col">
				      	<button class="btn extra-section add-course-form" id="AddCoursesForm" type="button"><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;Courses</button>
						<button class="btn extra-section add-internship-form" type="button" id="AddInternshipForm"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Internships</button>
						<button class="btn extra-section" type="button"><i class="fa fa-language"></i>&nbsp;&nbsp;Languages</button>
						<button class="btn extra-section" type="button"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Languages</button>
				    </div>
				  </div>
			</fieldset>
		</form>
	</div>
	</div>

	<div class="split right" id="template_view">
		<a href="javascript:void(0)" id="BackToSelectTemplatePage"><button style="float: right;"><i class="fa fa-close"></i></button></a>
	  <div class="centered">
	  	<div id="select_frame" class="select_frame">
	  		<!-- <div id="JobTitle_Text"></div>
	  		<div><span id="FirstName_Text"></span>&nbsp;<span id="LastName_Text"></span></div>
	  		<div id="Email_Text"></div>
	  		<div id="ContactNumber_Text"></div>
	  		<div id="CountryName_Text"></div>
	  		<div id="CityName_Text"></div>
	  		<div id="Address_Text"></div>
	  		<div id="PostalCode_Text"></div>
	  		<div id="DrivingLicence_Text"></div>
	  		<div id="Nationality_Text"></div>
	  		<div id="PlaceOfBirth_Text"></div>
	  		<div id="DateOfBirth_Text"></div>
	  		<div id="ProfileImage"><img id="ProfilePictureImage"></div>
	  		<div id="ProfessionalSummary_Text"></div>
	  		<div id=" "></div>
	  		<div id="EducationDetails_Text"></div>
	  		<div id="WebsiteSocialLinks_Text"></div>
	  		<div id="Skills_Text"></div> -->
	  	</div>
	  	<!-- <a href="{{ url('generate-resume-pdf') }}">Download PDF</a> -->
	  	<!-- <button class="btn btn-primary" type="button" id="DownloadPDF" onclick="window.location='{{ route("generate-resume-pdf") }}'">Download PDF</button> -->
	  	<form method="POST"><button class="btn btn-primary" type="button" id="DownloadPDF">Download PDF</button></form>
	  </div>
	</div>
</div>
 <div class="modal" tabindex="-1" id="ImageModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="profile_picture_form">
      		<input type="file" class="form-control" name="profile_picture" id="profile_picture" accept="image/*" />
					       <br />
					       <div id="uploaded_image"></div>
					       <img id="uploaded_image_view" style="width: 60px;">
					       <div class="delete-profile"></div> 
        	<!-- <input type="file" name="profile_picture" id="profile_picture"><br><br>
        	<img id="showProfileImage"> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Image crop and rotate -->
<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/frontend/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/frontend/js/croppie.js') }}"></script>
<script src="{{ asset('/frontend/js/htmlpdfgenerator.js') }}"></script>
<script src="{{ asset('/frontend/js/resume.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/course.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/extra-curricular-activity.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/hobbies.js') }}"></script>
<script src="{{ asset('/frontend/js/resumes/internship.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    $(document).ready(function(){
    	$.ajax({
	      url: "get-sample-template",
	      dataType: 'html',
	      success: function (data) { 
	        $("#select_frame").html(data);
	      },
	      error: function(error){
	        alert('error');
	      }
	  });
    });
</script>
@endsection

@section('script')
@endsection


