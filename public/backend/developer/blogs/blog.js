$('.publish_date').datepicker({
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    startDate: new Date(),
    autoclose: true
  });
  $('.blog-tag').select2();

$("#youtube_video_link").on("keyup change", function(e) {
    var url = $('#youtube_video_link').val();
    if (url != undefined || url != '') {        
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[2].length == 11) {
        } else {
            $("#youtube_video_link_error").html('Provide proper youtube video link as per given format or directly use youtube video link.')
            // Do anything for not being valid
        }
    }
});
