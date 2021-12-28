$("#SelectTemplate").click(function(e){
	e.preventDefault();
	$.ajax({
		url: base_url + '/resumes',
		type: 'GET',
		headers: {
            'X-CSRF-Token': csrftoken 
        },
        success: function(data, textStatus, jqXHR){
        	$('#page-main').html(data);
        	window.history.pushState('Resumes', 'Title', base_url + '/resumes');
        },
        error: function(jqXHR, textStatus, errorThrown){
        	alert('error');
        }
	});
});

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#uploaded_image_view')
                  .attr('src', e.target.result);
              // $("#uploaded_image").html('<a class="" id="deleteProfilePicture" class="btn btn-danger delete-profile" href="javascript:void()"><i class="fa fa-trash"></i></a>');
          };
          reader.readAsDataURL(input.files[0]);
      }
  }

  function uploadImage(){
    $("#ImageModal").modal('show');
    $("#profile_picture_form").find('input').val('');
    $("#uploaded_image_view").removeAttr('src');
  }

  $("#saveImage").click(function(e){
    e.preventDefault();
    var formData = new FormData($('#profile_picture_form')[0]);
    formData.append('resume_id',r_id);
    formData.append('profile_picture',$('#profile_picture')[0]);
    $.ajax({
        url: "profile-picture-image",
        cache : false,
        contentType: false,
        processData: false,
        data : formData,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': csrftoken
        },
        beforeSend: function() {
          if($("#uploaded_image_view").attr('src') != null){
            $(".loader-image").fadeIn(300);
            $("#saveImage").attr('disabled',true);
          }
          if($("#profile_picture").get(0).files.length != 0){
            $(".loader-image").fadeIn(300);
            $("#saveImage").attr('disabled',true);
          }
          $(".loader-cont").fadeIn();
        },
        success: function (data, textStatus, jqXHR) {
          $(".loader-image").fadeOut(300);
          $("#ImageModal").modal('hide');
          $("#saveImage").attr('disabled',false);
          $(".profile-picture-image").load(location.href + " .profile-picture");
          setTimeout(function() {
            $(".loader-cont").fadeOut();
            saveReloadPDF();
          }, 2000);
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
        }
      });
  });

  $(document).on('click', '#deleteProfilePicture', function(e) {
    $(".loader-cont").fadeIn();
      $.ajax({
        url: "delete-profile-picture",
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'r_id': r_id
        },
        success: function (data, textStatus, jqXHR) { 
          $(".profile-picture-image").load(location.href + " .profile-picture");
          setTimeout(function(){
            $(".loader-cont").fadeOut();
            saveReloadPDF();
            $("#uploaded_image_view").removeAttr('src');
          }, 2000);
        },
        error: function(jqXHR, textStatus, errorThrown){
          console.log(jqXHR);
        }
        });
  });

function StartEndDates(){
  /*var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());*/
  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
  var end = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

  $(".start_datepicker").datepicker({ 
    format: "M, yyyy", 
    viewMode: "months", 
    minViewMode: "months", 
    todayHighlight: true,
    // startDate: today,
    // endDate: end,
    autoclose: true,
  });
  // $('.start_datepicker').datepicker('setDate', today);
  $(".end_datepicker").datepicker({ 
    format: "M, yyyy", 
    viewMode: "months", 
    minViewMode: "months",  
    todayHighlight: true,
    autoclose: true 
    });
  // $('.end_datepicker').datepicker('setDate', today);
}

function mapSkill(skill){
  clearTimeout(time);
  time = setTimeout(function() {
  SkillsCommon(skill);
    $("#"+skill).remove();
  ajaxSkillsSave();
  }, 1000);
}

var employment_count = 0;
$("#AddEmployerForm").click(function(){
  $.ajax({
      url: "get-employer-form/" + employment_count,
      dataType: 'html',
      data: {
        r_id: r_id
      },
      success: function (data, textStatus, jqXHR) { 
        var html = JSON.parse(data);
        $("#ShowEmployerForm").append(html.html);
        // $('#ShowEmployerForm').append(data);
        EmploymentJs(employment_count,template_id);
        employment_count++;
      },
      error: function(jqXHR, textStatus, errorThrown){
        var error = $.parseJSON(jqXHR.responseText);
        toastr.error(error.responseMessage);
      }
  });
});

var education_count = 0;
$("#AddEducationForm").click(function(){
  $.ajax({
      url: "get-education-form/" + education_count,
      dataType: 'html',
      data: {
        r_id: r_id
      },
      success: function (data, textStatus, jqXHR) { 
          var html = JSON.parse(data);
          $("#ShowEducationForm").append(html.html);
          EducationJS(education_count,template_id);
          education_count++;
      },
      error: function(jqXHR, textStatus, errorThrown){
        var error = $.parseJSON(jqXHR.responseText);
        toastr.error(error.responseMessage);
      }
  });
});

var website_social_link_count = 0;
$("#AddWebsiteSocialLinkForm").click(function(){
  $.ajax({
      url: "get-website-and-social-link-form/" + website_social_link_count,
      dataType: 'html',
      data: {
        r_id: r_id
      },
      success: function (data, textStatus, jqXHR) { 
        var html = JSON.parse(data);
        $("#ShowWebsiteAndSocialLinkForm").append(html.html);
        WebsiteSocialLinkJS(website_social_link_count, template_id);
        website_social_link_count++;
      },
      error: function(jqXHR, textStatus, errorThrown){
        var error = $.parseJSON(jqXHR.responseText);
        toastr.error(error.responseMessage);
      }
  });
});

var skills_count = 0;
$("#AddSkillsForm").click(function(){
    SkillsCommon();
});

function SkillsCommon(skill = null){
  $.ajax({
      url: "get-skill-form/" + skills_count,
      dataType: 'html',
      data: {
        skill: skill,
        r_id: r_id
      },
      success: function (data, textStatus, jqXHR) {
        var html = JSON.parse(data);
        $("#ShowSkillsForm").append(html.html);
        // $('#ShowSkillsForm').append(data);
        SkillsJS(skills_count,skill,template_id);
        skills_count++;
      },
      error: function(jqXHR, textStatus, errorThrown){
        var error = $.parseJSON(jqXHR.responseText);
        toastr.error(error.responseMessage);
      }
  });
}

// Generate PDF
$("#DownloadPDF").click(function(){
  var formData = new FormData($('#ResumeForm')[0]);
  formData.append('template',template_id);
  formData.append('r_id',r_id);
  formData.append('professional_summary', CKEDITOR.instances['professional_summary'].getData());
  $.ajax({
      url: "generate-resume-pdf",
      cache : false,
      contentType: false,
      processData: false,
      data : formData,
      type: "POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      xhrFields: {
        responseType: 'blob'
      },
      success: function (data, textStatus, jqXHR) {
          downloadPDF(data, jqXHR);
      },
      error: function(jqXHR, textStatus, errorThrown){
        location.href = base_url + '/dashboard-candidates-pricing';
        // toastr.error('Something is wrong downloading PDF');
        /*var error = $.parseJSON(jqXHR.responseText);
        toastr.error(error.responseMessage);*/
      }
  });
});
