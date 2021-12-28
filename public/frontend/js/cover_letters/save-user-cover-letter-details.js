let time = 0;
$('#cl_title, #cl_job_title, #cl_address, #cl_phone, #cl_emp_company_name, #cl_emp_hiring_manager_name, #cl_emp_address, #cl_emp_phone, #cl_emp_email').on('input', function() {
     clearTimeout(time);
     time = setTimeout(function() {
      $(".loader-cont").fadeIn();
	    ajaxCoverLetterSave();
      $(".loader-cont").fadeOut();
     }, 2000);
});

CKEDITOR.instances.cl_details.on('change', function() { 
	clearTimeout(time);
    time = setTimeout(function() {
      $(".loader-cont").fadeIn();
	    ajaxCoverLetterSave();
      $(".loader-cont").fadeOut();
    }, 2000);
});

function ajaxCoverLetterSave(){
  $(".loader-cont").fadeIn();
  var formData = new FormData($('#CoverLetterForm')[0]);
  formData.append('template',template_id);
  formData.append('cl_id',r_id);
  formData.append('cl_details', CKEDITOR.instances['cl_details'].getData());
  $.ajax({
      url: base_url + '/store-user-cover-letter-data',
      cache : false,
      contentType: false,
      processData: false,
      data : formData,
      type: "POST",
      headers: {
        'X-CSRF-TOKEN': csrftoken
      },
      success: function (data, textStatus, jqXHR) {
        setTimeout(function(){
          $(".loader-cont").fadeOut();
          saveReloadPDF();
        }, 800);
      },
      error: function(jqXHR, textStatus, errorThrown){
        toastr.error(jqXHR.responseJSON.responseMessage);
      }
  });
}

function saveReloadPDF(){
	loadPDF();
}

$("#DownloadPDF").click(function(){
  var formData = new FormData($('#ResumeForm')[0]);
  formData.append('template',template_id);
  formData.append('cl_id',r_id);
  formData.append('cl_details', CKEDITOR.instances['cl_details'].getData());
  $.ajax({
      url: "generate-cover-letter-pdf",
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
      }
  });
});

function ChangeColorCode(id, color){
  $(".loader-cont").fadeIn();
  $.ajax(
          {
              url : base_url + '/change-cover-letter-color',
              type: "POST",
              headers: {
                'X-CSRF-Token': csrftoken
              },
              data: {
                'cl_id': id,
                'color': color
              },
              success:function(data, textStatus, jqXHR) 
              {
                $(".cover-letter-color-codes").load(location.href + " .cover-letter-color-codes");
                setTimeout(function() {
                  $(".loader-cont").fadeOut();
                  saveReloadPDF();
                }, 500);
              },
              error: function(jqXHR, textStatus, errorThrown) 
              {
                toastr.error(jqXHR.responseJSON.responseMessage);
              }
          });
}