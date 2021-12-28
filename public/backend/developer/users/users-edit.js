$(document).ready(function(){
	$('#date_of_birth').datepicker({
	    format: 'yyyy-mm-dd',
	    autoclose: true,
	    endDate: '+0d'
	});
	var input = document.querySelector("#mobile_no");
    window.intlTelInput(input, ({
        initialCountry: "in",
        autoPlaceholder: "polite",
        formatOnDisplay: true,
        separateDialCode: true,
    }));
});

function changeCoach(user_id) {
  var type = "GET";
   $.ajax(
      {
          url : base_url + '/control-panel/manage-users/change-and-get-coach/' + user_id,
          type: type,
          success:function(data, textStatus, jqXHR) 
          {
           	$("#getCoachModal").modal('show');
            $("#u_id").val(user_id);
            $("#old_c_id").val(data.data.coach_id);
            $("#coach .coach-name").remove();
            $.each(data.data, function(key, value){
            	if(key != 'coach_id'){
	            	$("#coach").append('<option class="coach-name" value="' + value.id + '">' + value.name + ' - (' + value.about_me + ')</option>');
    			}
            });
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
}

$(".change-coach-session form").submit(function(e)
  {   //STOP default action
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      var formid =$(this).attr("id");
      var type = "POST";
      
      $.ajax(
      {
          url : formURL,
          type: type,
           headers: {
                    'X-CSRF-Token': csrftoken 
               },
          data : postData,
          beforeSend: function() {
          	if(($('#reason_for_change_coach').val().length != '') && ($('#coach option:selected').val().length != '')){
          		$(".change-coach-loader").fadeIn(300);
            	$(".change-coach-save").attr('disabled',true);
          	}
          },
          success:function(data, textStatus, jqXHR) 
          {
		    if(data.status == 1){
		    	$(".change-coach-loader").fadeOut(300);
	          	$("#getCoachModal").modal('hide');
		        location.href = window.location.href;
		    }
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
    e.preventDefault(); 
  });

/*$("#user_change_password").submit(function(e)
	  {   
	  	//STOP default action
	  	e.preventDefault();
	  	var postData = $(this).serializeArray();
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
		          	window.setTimeout(function(){
	        			location.href = data.redirect_url;
				    }, 2000);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		          	toastr.error(jqXHR.responseJSON.responseMessage);
		        }
	      });
	  }); */