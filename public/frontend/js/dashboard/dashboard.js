function deleteResume(id){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover resume!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax(
              {
                  url : base_url+ '/delete-resume-builder/' + id,
                  type: 'POST',
                  data : {"_token":csrftoken},  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      //if fails
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
      }
    });
  }

let time = 0;
function changeResumeTitle(id){
    $("#ResumeMainTitle_"+id).select();
    $('#ResumeMainTitle_'+id).focus();
    $('#ResumeMainTitle_'+id).on('input', function() {
      var resume_title = $('#ResumeMainTitle_'+id).val();
      clearTimeout(time);
      time = setTimeout(function() {
        updateResumeTitle(id,resume_title);
      }, 2000);
    });
}

$(".resume-builders").on('input',function(){
  var id = $(this).attr('data-id');
  var resume_title = $(this).val();
  clearTimeout(time);
  time = setTimeout(function() {
    updateResumeTitle(id,resume_title);
  }, 2000);
});

function updateResumeTitle(id,resume_title){
  $.ajax(
              {
                  url : base_url+ '/change-resume-title',
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': csrftoken
                  },
                  data: {
                    'resume_id': id,
                    'resume_title': resume_title
                  },  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
}

function changeCoverLetterTitle(id){
    $("#CoverLetterMainTitle_"+id).select();
    $('#CoverLetterMainTitle_'+id).focus();
    $('#CoverLetterMainTitle_'+id).on('input', function() {
      var cover_title = $('#CoverLetterMainTitle_'+id).val();
      clearTimeout(time);
      time = setTimeout(function() {
        updateCoverLetterTitle(id,cover_title);
      }, 2000);
    });
}

$(".cover-letters").on('input',function(){
  var id = $(this).attr('data-id');
  var cover_title = $(this).val();
  clearTimeout(time);
  time = setTimeout(function() {
    updateCoverLetterTitle(id,cover_title);
  }, 2000);
});

function updateCoverLetterTitle(id,cover_title){
  $.ajax(
              {
                  url : base_url+ '/change-cover-letter-title',
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': csrftoken
                  },
                  data: {
                    'cl_id': id,
                    'cover_title': cover_title
                  },  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
}

function deleteCoverLetter(id){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover cover letter!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax(
              {
                  url : base_url+ '/delete-cover-letter/' + id,
                  type: 'POST',
                  data : {"_token":csrftoken},  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      //if fails
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
      }
    });
  }

function changeEmailTemplateTitle(id){
    $("#EmailTemplateMainTitle_"+id).select();
    $('#EmailTemplateMainTitle_'+id).focus();
    $('#EmailTemplateMainTitle_'+id).on('input', function() {
      var email_template_title = $('#EmailTemplateMainTitle_'+id).val();
      clearTimeout(time);
      time = setTimeout(function() {
        updateEmailTemplateTitle(id,email_template_title);
      }, 2000);
    });
}

$(".email-templates").on('input',function(){
  var id = $(this).attr('data-id');
  var email_template_title = $(this).val();
  clearTimeout(time);
  time = setTimeout(function() {
    updateEmailTemplateTitle(id,email_template_title);
  }, 2000);
});

function updateEmailTemplateTitle(id,email_template_title){
  $.ajax(
              {
                  url : base_url+ '/change-email-template-title',
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': csrftoken
                  },
                  data: {
                    'email_id': id,
                    'email_template_title': email_template_title
                  },  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
}

function deleteEmailTemplate(id){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover email template!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax(
              {
                  url : base_url+ '/delete-email-template/' + id,
                  type: 'POST',
                  data : {"_token":csrftoken},  
                  success:function(data, textStatus, jqXHR) 
                  {
                      toastr.success(jqXHR.responseJSON.responseMessage);
                      location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      //if fails
                      toastr.error(jqXHR.responseJSON.responseMessage);
                  }
              });
      }
    });
  }