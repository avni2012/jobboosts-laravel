var delay = 1000;
$(".email-template-form form").submit(function(e)
    {   
      //STOP default action
        e.preventDefault();
        var formData = new FormData($('#EmailTemplateForm')[0]);
  		formData.append('template',template_id);
  		formData.append('et_id',r_id);
  		formData.append('uet_content', CKEDITOR.instances['uet_content'].getData());
        var type = "POST";
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: type,
            cache : false,
      		contentType: false,
      		processData: false,
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            data : formData,
            success:function(data, textStatus, jqXHR) 
            {
              	toastr.success(jqXHR.responseJSON.responseMessage);
				        setTimeout(function(){ location.href = data.redirect_url; }, delay);
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              toastr.error(jqXHR.responseJSON.responseMessage);
              if(jqXHR.responseJSON[0] != null){
                setTimeout(function(){ location.href = jqXHR.responseJSON[0] }, delay);
              }
            }
        });
    });

CKEDITOR.replace('uet_content', { height: 200 });
