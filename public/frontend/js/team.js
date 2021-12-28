$('.show-profile').click(function(){    
    var id = $(this).attr('id');
    $("#fancy"+id+', #about-me'+id+', #social'+id).fadeOut('slow', function(){
        $('#btn-'+id).fadeIn('slow');
    });
  });
  $(".manuul").click(function(){
    var id = $(this).attr('id');
    $('#'+id).fadeOut('slow', function(){
      var val = id.substr(id.indexOf("-") + 1);
      $('#fancy'+val+', #about-me'+val+', #social'+val).fadeIn('slow');
    });
  });