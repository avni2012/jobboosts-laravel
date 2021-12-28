function setDiscountedPrice(){
        var discount_type = $('#discount_type').val();
        var price = parseInt($('#price').val());
        var discount = parseInt($('#discount_value').val());
        var discount_price = 0;
        
        if(discount_type==1){
            //%
            discount_price = Math.round(price - ((price * discount)/100));
        }else{
            //RS
            discount_price = Math.round(price - discount);
        }
        if(discount_price || discount_price == 0) {
            $('#discounted_price').val(discount_price);
        }
    }

$(document).ready(function() {
    $('.job-training').select2();
    
    if(job_search_plan_check == true){
        $(".job-search-plan").show();
    }
    if(job_search_coaching_check == true){
        $(".job-search-coaching").show();
    }
    if(job_search_training_check == true){
        $(".job-search-training").show();
    }
    $("input[type='checkbox']").on("change", function () {
        var id = $(this).data("id");
        if($(this).is(':checked')) {
            if(id == "job_search_plan"){
                $(".job-search-plan").show();
            }
            if(id == "job_search_coaching"){
                $(".job-search-coaching").show();
            }
            if(id == "job_search_training"){
                $(".job-search-training").show();
            }
        }else{
            if(id == "job_search_plan"){
                $('.job-search-plan input').val("");
                $(".job-search-plan").hide();
            }
            if(id == "job_search_coaching"){
                $(".job-search-coaching input").val("");
                $(".job-search-coaching").hide();
            }
            if(id == "job_search_training"){
                $(".job-search-training input").val("");
                $(".job-search-training").hide();
            }
        }
    });
});