$(document).ready(function(){
        loadTemplate(r_id);
    });
    function loadTemplate(template_id){
        $.ajax({
          url: "get-cover-template/" + r_id,
          dataType: 'html',
          success: function (data, textStatus, jqXHR) { 
            $("#select_frame").html(data);
            $("#MainHeading").hide();
          },
          error: function(jqXHR, textStatus, errorThrown){
            toastr.error(jqXHR.responseJSON.responseMessage);
          }
        });
    }

CKEDITOR.replace('cl_details', {
    height: 150
  });