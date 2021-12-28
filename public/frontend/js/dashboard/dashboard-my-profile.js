$(document).ready(function(){
    $('#date_of_birth').datepicker({
	    format: 'yyyy-mm-dd',
	    autoclose: true,
	    endDate: '+0d'
	});
    $('#cont_id').find(".flag-container").empty();
    countrycodeJS();
    $("#country_code").val(cont);
    clickEvent();
});

function countrycodeJS(){
    var input = document.querySelector("#mobile_no");
    window.intlTelInput(input, ({
        initialCountry: "in",
        autoPlaceholder: "polite",
        formatOnDisplay: true,
        separateDialCode: true,
    }));
}
function clickEvent(argument) {
    $('.country-list li').click(function(){
        var dataVal = $(this).data('dial-code');
        $("#country_code").val(dataVal);
    });
}

$("#profile_update").submit(function(e)
	  {   
	  	//STOP default action
	  	e.preventDefault();
	  	// var postData = $(this).serializeArray();
	  	var formElem = $("#profile_update");
		var postData = new FormData(formElem[0]);
	  	postData.append('profile_picture', $('#profile_picture')[0].files[0]);
        var formURL = $(this).attr("action");
        var formid = $(this).attr("id");
        var type = "POST";
        $.ajax(
	      {
	          	url : formURL,
	          	type: type,
	           	headers: {
	                    'X-CSRF-Token': csrftoken,
	               },
	            processData: false,
		        contentType: false,
        		dataType: "json",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		          	toastr.success(jqXHR.responseJSON.responseMessage);
		          	window.setTimeout(function(){
	        			location.href = data.redirect_url;
				    }, 2000);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		          	toastr.error(jqXHR.responseJSON.responseMessage);
		        }
	      });
	  }); 

function readURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function (e) {
        	$('#profile_picture_show').html('<img id="profile_picture_show" src="' + e.target.result + '" class="prev-img-con" alt="Profile">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
    
$("#profile_picture").change(function(){
    var file = $(this).val();
	var ext = file.split('.').pop();
	if(ext != 'jpg' && ext != 'gif' && ext != 'png' && ext != 'PNG' && ext != 'jpeg'){
		$("#file-upload-error").html('Please Upload valid profile picture');
	}else{
		$("#file-upload-error").html('');
	    readURL(this);
	}
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	// $('#uploaded_image').empty();
            $('.profile-pic').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateProfilePicture(user_id) {
	$("#ProfilePictureModal").modal('show');
}

$("#saveProfile").click(function(e){
    e.preventDefault();
    var formData = new FormData($('#profile_picture_form')[0]);
    formData.append('profile_picture',$('#profile_picture')[0]);
    $.ajax({
        url: "dashboard-profile-picture-update",
        cache : false,
        contentType: false,
        processData: false,
        data : formData,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': csrftoken
        },
        beforeSend: function() {
          if($("#profile_picture").get(0).files.length != 0){
            $(".loader-image").fadeIn(300);
            $("#saveProfile").attr('disabled',true);
          }
        },
        success: function (data, textStatus, jqXHR) {
          $(".loader-image").fadeOut(300);
          $("#ProfilePictureModal").modal('hide');
          $("#saveProfile").attr('disabled',false);
          location.href = window.location.href;
        },
        error: function(jqXHR, textStatus, errorThrown){
            toastr.error(jqXHR.responseJSON.responseMessage);
        }
      });
  });

