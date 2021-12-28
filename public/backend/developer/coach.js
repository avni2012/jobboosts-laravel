$('.day').change(function () {
    if($(this).val() != '') {
        //selected_days.push($(this).val());
        $(this).parent('.form-group').siblings('.start_time_div').children('input').attr('required','required').attr('data-parsley-required-message','Please provide start time.');
        $(this).parent('.form-group').siblings('.end_time_div').children('input').attr('required','required').attr('data-parsley-required-message','Please provide end time.').attr('data-parsley-time','');
    } else {
        //selected_days.removeElem($(this).val());
        $(this).parent('.form-group').siblings('.start_time_div').children('input').removeAttr('required').removeAttr('data-parsley-required-message');
        $(this).parent('.form-group').siblings('.end_time_div').children('input').removeAttr('required').removeAttr('data-parsley-required-message').attr('data-parsley-time');
    }
});

function removeBlock(index){
    $('#available_days_count').val(parseInt($('#available_days_count').val())-1);
    //console.log($('#available_days_count').val());
    $('.available_days').find($('#available_day_block_'+index)).remove();
}

$(function () {
    window.Parsley.addValidator('time', {
        validateString: function(value) {
            return value > $('.start_time').val();
        },
        messages: {
            en: 'Please provide valid end time.',
        }
    });
});