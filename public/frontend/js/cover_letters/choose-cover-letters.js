/*$("#choose_cover_letters form").submit(function(e)
    {   
      //STOP default action
      e.preventDefault();
        var formURL = $(this).attr("action");
        var formid = $(this).attr("id");
        $.ajax(
        {
            url : formURL,
            type: "GET",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            success:function(data, textStatus, jqXHR) 
            {
              var template = data.data.template_id;
              if(data.data.resume_fullname != null && data.data.resume_email != null){
                $.ajax({
                  url: base_url + '/save-user-cover-letter',
                  type: 'POST',
                  headers: {
                    'X-CSRF-Token': csrftoken 
                  },
                  data: {
                    'user_id' : data.data.user_id,
                    'template_id' : template
                  },
                  success: function(data, textStatus, jqXHR){
                    location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    toastr.error(jqXHR.responseJSON.responseMessage);
                  }
                });
              }else{
                $("#coverLetterPopup").modal('show'); 
                $("#t_id").text(data.data.template_id);
                // $("#template_name").text(data.data.template_id);
                  if(data.data.resume_fullname != null){
                    $("#resume_fullname").val(data.data.resume_fullname).prop('readonly', true);
                  }
                  if(data.data.resume_email != null){
                    $("#resume_email").val(data.data.resume_email).prop('readonly', true);
                  }
              }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              $("#exampleModalCenter").modal('show');
            }
        });
    }); */

$(".cover-letter-detail-form form").submit(function(e)
    {   
      //STOP default action
        e.preventDefault();
        // var template_name = $("#template_name").text();
        var template_id = $("#t_id").text();
        var postData = $(this).serializeArray();
        postData.push({name: "template_id", value: template_id});
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
            data : postData,
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
    }); 

function chooseCoverLetterTemplate(cl_id) {
  $.ajax(
        {
            url : base_url + '/choose-cover-letters/' + cl_id,
            type: "GET",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            success:function(data, textStatus, jqXHR) 
            {
              var template = data.data.template_id;
              if(data.data.resume_fullname != null && data.data.resume_email != null){
                $.ajax({
                  url: base_url + '/save-user-cover-letter',
                  type: 'POST',
                  headers: {
                    'X-CSRF-Token': csrftoken 
                  },
                  data: {
                    'user_id' : data.data.user_id,
                    'template_id' : template
                  },
                  success: function(data, textStatus, jqXHR){
                    location.href = data.redirect_url;
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    toastr.error(jqXHR.responseJSON.responseMessage);
                  }
                });
              }else{
                $("#coverLetterPopup").modal('show'); 
                $("#t_id").text(data.data.template_id);
                  if(data.data.resume_fullname != null){
                    $("#resume_fullname").val(data.data.resume_fullname).prop('readonly', true);
                  }
                  if(data.data.resume_email != null){
                    $("#resume_email").val(data.data.resume_email).prop('readonly', true);
                  }
              }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              $("#exampleModalCenter").modal('show');
            }
        });
}

function selectUpdateCoverLetter(cl_id,temp_id) {
  $.ajax(
        {
            url : base_url + '/update-choose-cover-letter-template',
            type: "POST",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            data: {
              'cover_letter_id': cl_id,
              'template_id': temp_id
            },
            success:function(data, textStatus, jqXHR) 
            {
              location.href = data.redirect_url;
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              toastr.error(jqXHR.responseJSON.responseMessage);
            }
        });
}

function selectUpdateCoverLetterExample(cl_id,temp_id) {
  $.ajax(
        {
            url : base_url + '/update-choose-cover-letter-example',
            type: "POST",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            data: {
              'cover_letter_id': cl_id,
              'cover_letter_example_id': temp_id
            },
            success:function(data, textStatus, jqXHR) 
            {
              location.href = data.redirect_url;
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              toastr.error(jqXHR.responseJSON.responseMessage);
            }
        });
}
