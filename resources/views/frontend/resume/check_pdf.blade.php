<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Check PDF</title>
	<!-- Toastr Style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/toastr.css') }}">
	<script src="{{ asset('/frontend/js/jquery-3.4.1.min.js') }}"></script> 
	<script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
</head>
<body>
	<form method="POST" id="checkPDF">
	@csrf 
		<textarea cols="150" rows="20" name="html" id="html"></textarea>
		<button type="button" id="convertPDf">Convert HTML to PDF</button>
	</form>
	<script src="{{ asset('/frontend/js/htmlpdfgenerator.js') }}"></script>
	<script type="text/javascript">
		$("#convertPDf").click(function(){
			var data = $('textarea').val();
			if(data == ''){
				alert('Please enter HTML');
			}else{
				 $.ajax({
			      url: "convert-html-to-pdf",
			      // dataType: 'html',
			      type: "POST",
			      headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
			      data: {
			      	html: $('textarea').val()
			      },
			      xhrFields: {
                	responseType: 'blob'
            	  },
			      success: function (data, textStatus, jqXHR) { 
			      	if(jqXHR.status == 200){
				      	downloadPDF(data, jqXHR);
			      	}
			      },
			      error: function(jqXHR, textStatus, errorThrown){
			        if(jqXHR.status == 400){
		          		toastr.error(jqXHR.responseJSON);
		          	}	
			      }
			  });
			}
		});
	</script>
</body>
</html>

