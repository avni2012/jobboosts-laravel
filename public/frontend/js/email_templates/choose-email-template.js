function chooseEmailTemplate(user_id,temp_id) {
  $.ajax({
                  url: base_url + '/save-user-email-template',
                  type: 'POST',
                  headers: {
                    'X-CSRF-Token': csrftoken 
                  },
                  data: {
                    'user_id' : user_id,
                    'template_id' : temp_id
                  },
                  success: function(data, textStatus, jqXHR){
                    setTimeout(function() {
                      location.href = data.redirect_url;
                    },2000);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    toastr.error(jqXHR.responseJSON.responseMessage);
                  }
                });
}

function LoginUser() {
  $("#exampleModalCenter").modal('show');
}
