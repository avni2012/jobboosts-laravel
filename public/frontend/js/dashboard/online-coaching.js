$(document).ready(function(){
    var coach_id = $("#coachId").val();
    if(coach_id != ''){
      getCoachDates(coach_id);
    }
  });
  $("input:radio[name='coach']").change(function () {
    var coach_id = $(this).val();
    $("#ch_id").val(coach_id);
    $("#coachId").val(coach_id);
    getCoachDates(coach_id);
  });
  function getCoachDates(coach_id){
    $.ajax(
        {
            url : base_url + '/get-coach-available-dates',
            method: "POST",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            data :{
              'coach_id': coach_id
            },
            success:function(data, textStatus, jqXHR) 
            {
              if(data.data != null){
                $(".coach-date-show").empty();
                $(".coach-time-show").empty();
                $(".datetimepicker-input").attr('disabled',false);             
                $("#coach_date").show(); 
                $("#coach_time").next(".select2-container").show();
                coach_date(JSON.parse(data.data.dates_arr));
              }else{
                $("#coach_date").hide();
                $(".coach-date-show").html('<label class="form-group">No dates available for selected coach.</label>');
                $("#coach_time").next(".select2-container").hide();
                $(".coach-time-show").html('<label class="form-group">No time available for selected coach.</label>');
              }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              if(coach_id != null){
                toastr.error(jqXHR.responseJSON.responseMessage);
              }
            }
        });
  }
  function coach_date(dates){
    $("#coach_date").datepicker("destroy");
    availableDates = dates;
    var month = availableDates[0].substring(0, 2);
    $('#coach_date').datepicker({
    dateFormat: 'yyyy-mm-dd',
    // defaultDate: new Date(2017,5,03),
    // startDate: d.setMonth(m),
    beforeShowDay: function(d) {
        var dmy = (d.getMonth()+1)
        if(d.getMonth()<9) 
            dmy="0"+dmy; 
        dmy+= "-"; 
        if(d.getDate()<10) dmy+="0"; 
            dmy+=d.getDate() + "-" + d.getFullYear();
        if ($.inArray(dmy, availableDates) != -1) {
            return true;
        } else{
             return false;
        }
    },
    changeDate: function(){
            var selected = $(this).val();
            alert(selected);
        },
    autoclose: true
    });
  }
  function convert(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [date.getFullYear(), mnth, day].join("-");
}
  $('#coach_date').on('changeDate', function (selected) {
    var date = convert(selected.date);
    var coach_id = $("#ch_id").val();
    var coach_id = $("#coachId").val();
    $.ajax(
        {
            url : base_url + '/get-coach-available-time-slots',
            method: "POST",
            headers: {
              'X-CSRF-Token': csrftoken,
            },
            data :{
              'coach_id': coach_id,
              'coach_date': date
            },
            success:function(data, textStatus, jqXHR) 
            {
              console.log(data);
              $("#coach_time").empty();
              if(data.data != null){
                $(".coach-time-show").empty();
                $.each(data.data, function(key,value){
                    $("#coach_time").append('<option value="' + value.start_time + ' - ' + value.end_time + '">' + value.start_time + ' - ' + value.end_time + '</option>');
                });
                $("#coach_time").next(".select2-container").show();
              }else{
                $("#coach_time").next(".select2-container").hide();
                $(".coach-time-show").html('<label class="form-group">No time available for selected coach.</label>');
                // toastr.success(jqXHR.responseJSON.responseMessage);
              } 
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
              toastr.error(jqXHR.responseJSON.responseMessage);
            }
        });
});